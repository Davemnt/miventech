<?php
/**
 * Configuración SMTP para envío de emails
 * Las credenciales se cargan desde el archivo .env
 */

// Función simple para cargar variables de entorno
function loadEnv($path) {
    if (!file_exists($path)) {
        return false; // No lanzar excepción, solo retornar false
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        $line = trim($line);
        
        // Saltar comentarios y líneas vacías
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }
        
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);
            
            // Guardar en $_ENV y putenv
            $_ENV[$name] = $value;
            putenv("$name=$value");
        }
    }
    return true;
}

// Cargar variables de entorno
$envPath = __DIR__ . '/../.env';
$envLoaded = loadEnv($envPath);

// Si no se cargó el .env, loguear advertencia
if (!$envLoaded) {
    error_log('⚠️ ADVERTENCIA: Archivo .env no encontrado. Usando configuración por defecto (NO SEGURO)');
}

// Función helper para obtener valor de entorno con fallback
function getEnvValue($key, $default = '') {
    $value = getenv($key);
    if ($value === false || $value === '') {
        return $default;
    }
    return $value;
}

return [
    // ========================================
    // CONFIGURACIÓN SMTP DE HOSTINGER
    // ========================================
    
    'smtp_host' => getEnvValue('SMTP_HOST', 'smtp.hostinger.com'),
    'smtp_port' => (int)getEnvValue('SMTP_PORT', '587'),
    'smtp_secure' => getEnvValue('SMTP_SECURE', 'tls'),
    
    // ========================================
    // CREDENCIALES (desde .env)
    // ⚠️ IMPORTANTE: Debes crear el archivo .env en el servidor
    // ========================================
    'smtp_username' => getEnvValue('SMTP_USERNAME', ''),
    'smtp_password' => getEnvValue('SMTP_PASSWORD', ''),
    
    // ========================================
    // CONFIGURACIÓN DEL REMITENTE
    // ========================================
    'from_email' => getEnvValue('FROM_EMAIL', 'noreply@miventech.com'),
    'from_name' => getEnvValue('FROM_NAME', 'MivenTech - Formulario de Contacto'),
    
    // ========================================
    // DESTINATARIO (dónde llegan los mensajes)
    // ========================================
    'to_email' => getEnvValue('TO_EMAIL', 'soporte@miventech.com'),
    'to_name' => getEnvValue('TO_NAME', 'Soporte MivenTech'),
    
    // ========================================
    // CONFIGURACIÓN ADICIONAL
    // ========================================
    'charset' => 'UTF-8',
    'debug' => 0, // 0 = sin debug, 2 = debug completo
    'env_loaded' => $envLoaded, // Indica si el .env se cargó correctamente
];
