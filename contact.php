<?php
// Configuración de errores para depuración (comentar en producción)
error_reporting(E_ALL);
ini_set('display_errors', 0); // No mostrar en pantalla
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/data/php_errors.log');

// Cargar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Procesamiento del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    
    // Protección contra spam - Rate limiting
    $ip = $_SERVER['REMOTE_ADDR'];
    $rate_limit_file = 'data/rate_limit.json';
    $max_attempts = 3;
    $time_window = 3600;
    
    // Crear directorio de datos si no existe
    if (!file_exists('data')) {
        mkdir('data', 0755, true);
    }
    
    if (file_exists($rate_limit_file)) {
        $rate_data = json_decode(file_get_contents($rate_limit_file), true) ?: [];
        if (isset($rate_data[$ip])) {
            $attempts = array_filter($rate_data[$ip], function($time) use ($time_window) {
                return (time() - $time) < $time_window;
            });
            
            if (count($attempts) >= $max_attempts) {
                http_response_code(429);
                echo json_encode([
                    'success' => false, 
                    'message' => 'Has excedido el límite de envíos. Por favor esperá una hora.'
                ]);
                exit;
            }
            $rate_data[$ip] = array_merge(array_values($attempts), [time()]);
        } else {
            $rate_data[$ip] = [time()];
        }
    } else {
        $rate_data = [$ip => [time()]];
    }
    file_put_contents($rate_limit_file, json_encode($rate_data, JSON_PRETTY_PRINT));
    
    // Obtener y limpiar datos
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
    $message = isset($_POST['message']) ? strip_tags(trim($_POST['message'])) : '';
    
    // Validaciones
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'El nombre es requerido';
    } elseif (strlen($name) < 2) {
        $errors[] = 'El nombre debe tener al menos 2 caracteres';
    } elseif (strlen($name) > 100) {
        $errors[] = 'El nombre es demasiado largo';
    }
    
    if (empty($email)) {
        $errors[] = 'El email es requerido';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'El email no es válido';
    }
    
    if (empty($message)) {
        $errors[] = 'El mensaje es requerido';
    } elseif (strlen($message) < 10) {
        $errors[] = 'El mensaje debe tener al menos 10 caracteres';
    } elseif (strlen($message) > 5000) {
        $errors[] = 'El mensaje es demasiado largo';
    }
    
    // Detectar spam
    $spam_keywords = ['viagra', 'cialis', 'casino', 'lottery', 'winner', 'click here', 'buy now'];
    $message_lower = strtolower($message);
    foreach ($spam_keywords as $keyword) {
        if (strpos($message_lower, $keyword) !== false) {
            $errors[] = 'Tu mensaje contiene contenido no permitido';
            break;
        }
    }
    
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Por favor corregí los siguientes errores',
            'errors' => $errors
        ]);
        exit;
    }
    
    // ============================================ 
    // CARGAR CONFIGURACIÓN SMTP
    // ============================================ 
    $smtp_config = require 'config/smtp_config.php';
    
    // Verificar que las credenciales estén configuradas
    if (empty($smtp_config['smtp_username']) || empty($smtp_config['smtp_password'])) {
        // Las credenciales no están configuradas, pero guardaremos el mensaje de todos modos
        error_log('⚠️ SMTP no configurado: Archivo .env faltante o credenciales vacías');
        
        // Guardar el contacto de todos modos
        $contact_entry = [
            'id' => uniqid('contact_', true),
            'timestamp' => date('Y-m-d H:i:s'),
            'date_readable' => date('d/m/Y'),
            'time_readable' => date('H:i:s'),
            'ip' => $ip,
            'name' => $name,
            'email' => $email,
            'message' => $message,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
            'status' => 'nuevo'
        ];
        
        $contacts_file = 'data/contacts.json';
        $contacts = [];
        
        if (file_exists($contacts_file)) {
            $contacts = json_decode(file_get_contents($contacts_file), true) ?: [];
        }
        
        $contacts[] = $contact_entry;
        file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        
        // Responder con éxito (el mensaje se guardó)
        echo json_encode([
            'success' => true,
            'message' => '¡Gracias por tu mensaje! Lo hemos recibido y te contactaremos pronto. 📧',
            'email_sent' => false,
            'saved' => true,
            'note' => 'Mensaje guardado. Configuración de email pendiente.'
        ]);
        exit;
    }
    
    $subject = 'Nuevo mensaje de contacto - MIVENTECH';
    
    // Guardar en archivo JSON SIEMPRE (respaldo principal)
    $contact_entry = [
        'id' => uniqid('contact_', true),
        'timestamp' => date('Y-m-d H:i:s'),
        'date_readable' => date('d/m/Y'),
        'time_readable' => date('H:i:s'),
        'ip' => $ip,
        'name' => $name,
        'email' => $email,
        'message' => $message,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
        'status' => 'nuevo'
    ];
    
    $contacts_file = 'data/contacts.json';
    $contacts = [];
    
    if (file_exists($contacts_file)) {
        $contacts = json_decode(file_get_contents($contacts_file), true) ?: [];
    }
    
    $contacts[] = $contact_entry;
    
    // Guardar con formato legible
    if (file_put_contents($contacts_file, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        // Contacto guardado exitosamente
        $saved = true;
    } else {
        // Error al guardar
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Error al guardar el mensaje. Por favor contactanos por WhatsApp.'
        ]);
        exit;
    }
    
    // Crear el cuerpo del email
    $email_body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
            .header { background: linear-gradient(135deg, #ff6b35, #ff8c42); color: white; padding: 20px; border-radius: 5px 5px 0 0; text-align: center; }
            .content { background: white; padding: 20px; border-radius: 0 0 5px 5px; }
            .field { margin-bottom: 20px; }
            .label { font-weight: bold; color: #ff6b35; display: block; margin-bottom: 5px; }
            .value { padding: 12px; background: #f4f4f4; border-left: 3px solid #ff6b35; border-radius: 3px; }
            .footer { text-align: center; margin-top: 20px; color: #878787; font-size: 12px; }
            .ip-info { background: #fff3cd; padding: 10px; border-radius: 3px; font-size: 12px; color: #856404; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2 style='margin: 0;'>✉️ Nuevo Mensaje de Contacto</h2>
                <p style='margin: 5px 0 0 0; opacity: 0.9;'>MivenTech</p>
            </div>
            <div class='content'>
                <div class='field'>
                    <span class='label'>👤 Nombre:</span>
                    <div class='value'>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</div>
                </div>
                <div class='field'>
                    <span class='label'>📧 Email:</span>
                    <div class='value'>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</div>
                </div>
                <div class='field'>
                    <span class='label'>💬 Mensaje:</span>
                    <div class='value'>" . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "</div>
                </div>
                <div class='ip-info'>
                    <strong>Información del envío:</strong><br>
                    IP: " . htmlspecialchars($ip, ENT_QUOTES, 'UTF-8') . "<br>
                    Fecha: " . date('d/m/Y H:i:s') . "<br>
                    User Agent: " . htmlspecialchars($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8') . "
                </div>
            </div>
            <div class='footer'>
                Este mensaje fue enviado desde el formulario de contacto de MivenTech
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Headers del email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: MivenTech Web <noreply@miventech.com>" . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // ============================================ 
    // ENVIAR EMAIL CON PHPMAILER
    // ============================================ 
    $mail_sent = false;
    $mail_error = '';
    
    try {
        $mail = new PHPMailer(true);
        
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host       = $smtp_config['smtp_host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_config['smtp_username'];
        $mail->Password   = $smtp_config['smtp_password'];
        $mail->SMTPSecure = $smtp_config['smtp_secure'];
        $mail->Port       = $smtp_config['smtp_port'];
        $mail->CharSet    = $smtp_config['charset'];
        
        // Configuración de debug (solo para desarrollo)
        // $mail->SMTPDebug = 2; // Descomentar para ver errores SMTP
        
        // Remitente
        $mail->setFrom($smtp_config['from_email'], $smtp_config['from_name']);
        $mail->addReplyTo($email, $name);
        
        // Destinatario
        $mail->addAddress($smtp_config['to_email'], $smtp_config['to_name']);
        
        // Contenido del email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $email_body;
        $mail->AltBody = strip_tags($email_body); // Versión texto plano
        
        // Enviar
        $mail->send();
        $mail_sent = true;
        
    } catch (Exception $e) {
        $mail_sent = false;
        $mail_error = $mail->ErrorInfo;
        
        // Log del error (opcional)
        error_log("PHPMailer Error: " . $mail_error);
    }
    
    // Siempre responder éxito porque el mensaje YA está guardado
    echo json_encode([
        'success' => true,
        'message' => '¡Gracias por tu mensaje! Te contactaremos pronto.',
        'email_sent' => $mail_sent,
        'email_error' => $mail_error
    ]);
    exit;
}

// Si no es POST, redirigir al inicio
header('Location: index.html');
exit;
?>
