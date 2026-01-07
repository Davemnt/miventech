<?php
/**
 * Configuración SMTP para envío de emails
 * IMPORTANTE: Completa estos datos con tu información de Hostinger
 */

return [
    // ========================================
    // CONFIGURACIÓN SMTP DE HOSTINGER
    // ========================================
    
    'smtp_host' => 'smtp.hostinger.com',  // Servidor SMTP de Hostinger
    'smtp_port' => 587,                    // Puerto TLS (o 465 para SSL)
    'smtp_secure' => 'tls',                // 'tls' o 'ssl'
    
    // ========================================
    // TUS CREDENCIALES (COMPLETA ESTOS DATOS)
    // ========================================
    'smtp_username' => 'soporte@miventech.com',  // Tu email completo
    'smtp_password' => 'Miventech#2026!',     // ⚠️ CAMBIAR: Contraseña del correo
    
    // ========================================
    // CONFIGURACIÓN DEL REMITENTE
    // ========================================
    'from_email' => 'soporte@miventech.com',
    'from_name' => 'MivenTech - Formulario de Contacto',
    
    // ========================================
    // DESTINATARIO (dónde llegan los mensajes)
    // ========================================
    'to_email' => 'soporte@miventech.com',
    'to_name' => 'Soporte MivenTech',
    
    // ========================================
    // CONFIGURACIÓN ADICIONAL
    // ========================================
    'charset' => 'UTF-8',
    'debug' => 0, // 0 = sin debug, 2 = debug completo
];
