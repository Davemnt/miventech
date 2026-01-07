<?php
/**
 * Script de prueba para verificar la configuración SMTP
 */

echo "<h2>Test de Configuración SMTP</h2>";
echo "<pre>";

// Verificar que el archivo .env existe
$envPath = __DIR__ . '/.env';
echo "1. Verificando archivo .env...\n";
if (file_exists($envPath)) {
    echo "   ✓ Archivo .env encontrado en: $envPath\n\n";
} else {
    echo "   ✗ ERROR: Archivo .env NO encontrado\n\n";
    exit;
}

// Intentar cargar la configuración
echo "2. Cargando configuración SMTP...\n";
try {
    $smtp_config = require 'config/smtp_config.php';
    echo "   ✓ Configuración cargada exitosamente\n\n";
} catch (Exception $e) {
    echo "   ✗ ERROR: " . $e->getMessage() . "\n\n";
    exit;
}

// Mostrar configuración (sin mostrar la contraseña completa)
echo "3. Valores de configuración:\n";
echo "   - SMTP Host: " . ($smtp_config['smtp_host'] ?? 'NO DEFINIDO') . "\n";
echo "   - SMTP Port: " . ($smtp_config['smtp_port'] ?? 'NO DEFINIDO') . "\n";
echo "   - SMTP Secure: " . ($smtp_config['smtp_secure'] ?? 'NO DEFINIDO') . "\n";
echo "   - SMTP Username: " . ($smtp_config['smtp_username'] ?? 'NO DEFINIDO') . "\n";
echo "   - SMTP Password: " . (isset($smtp_config['smtp_password']) && !empty($smtp_config['smtp_password']) ? '********' . substr($smtp_config['smtp_password'], -3) : 'NO DEFINIDO') . "\n";
echo "   - From Email: " . ($smtp_config['from_email'] ?? 'NO DEFINIDO') . "\n";
echo "   - To Email: " . ($smtp_config['to_email'] ?? 'NO DEFINIDO') . "\n\n";

// Verificar que todos los valores necesarios estén presentes
echo "4. Validación de campos requeridos:\n";
$required_fields = ['smtp_host', 'smtp_port', 'smtp_username', 'smtp_password', 'from_email', 'to_email'];
$missing_fields = [];

foreach ($required_fields as $field) {
    if (empty($smtp_config[$field])) {
        $missing_fields[] = $field;
        echo "   ✗ Campo faltante: $field\n";
    } else {
        echo "   ✓ Campo OK: $field\n";
    }
}

if (empty($missing_fields)) {
    echo "\n✓ Todas las verificaciones pasaron correctamente!\n";
    echo "El formulario de contacto debería funcionar ahora.\n";
} else {
    echo "\n✗ Hay " . count($missing_fields) . " campo(s) faltante(s)\n";
}

echo "</pre>";
?>
