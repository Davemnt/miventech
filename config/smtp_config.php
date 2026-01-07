<?php
/**
 * Configuración SMTP para envío de emails
 * Las credenciales se cargan desde el archivo .env
 */

// Función simple para cargar variables de entorno
function loadEnv($path) {
    if (!file_exists($path)) {
        throw new Exception('Archivo .env no encontrado');
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            if (!array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
                putenv("$name=$value");
            }
        }
    }
}

// Cargar variables de entorno
loadEnv(__DIR__ . '/../.env');

return [
    // ========================================
    // CONFIGURACIÓN SMTP DE HOSTINGER
    // ========================================
    
    'smtp_host' => getenv('SMTP_HOST'),
    'smtp_port' => (int)getenv('SMTP_PORT'),
    'smtp_secure' => getenv('SMTP_SECURE'),
    
    // ========================================
    // CREDENCIALES (desde .env)
    // ========================================
    'smtp_username' => getenv('SMTP_USERNAME'),
    'smtp_password' => getenv('SMTP_PASSWORD'),
    
    // ========================================
    // CONFIGURACIÓN DEL REMITENTE
    // ========================================
    'from_email' => getenv('FROM_EMAIL'),
    'from_name' => getenv('FROM_NAME'),
    
    // ========================================
    // DESTINATARIO (dónde llegan los mensajes)
    // ========================================
    'to_email' => getenv('TO_EMAIL'),
    'to_name' => getenv('TO_NAME'),
    
    // ========================================
    // CONFIGURACIÓN ADICIONAL
    // ========================================
    'charset' => 'UTF-8',
    'debug' => 0, // 0 = sin debug, 2 = debug completo
];
