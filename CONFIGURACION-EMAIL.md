# 📧 Configuración de Email Completada

## ✅ Cambios Realizados

### 1. PHPMailer Instalado
- Librería PHPMailer v6.9.1 descargada y configurada
- Carpeta: `phpmailer/`

### 2. Archivos Creados

#### `config/smtp_config.php`
Configuración SMTP de Hostinger:
- **Host:** smtp.hostinger.com
- **Puerto:** 587 (TLS)
- **Usuario:** soporte@miventech.com
- **⚠️ ACCIÓN REQUERIDA:** Cambiar la contraseña en este archivo

#### `config/.htaccess`
Protección para el archivo de configuración

### 3. Modificaciones en contact.php
- ✅ Integración de PHPMailer
- ✅ Configuración SMTP profesional
- ✅ Manejo de errores mejorado
- ✅ Logs de errores para debugging

## 🔧 Configuración Necesaria

### PASO 1: Configurar tu Contraseña
Edita el archivo `config/smtp_config.php` y cambia:
```php
'smtp_password' => 'TU_CONTRASEÑA_AQUI',  // ⚠️ CAMBIAR
```
Por tu contraseña real del correo soporte@miventech.com

### PASO 2: Subir a Hostinger
Sube estos archivos a tu servidor:
- ✅ `phpmailer/` (carpeta completa)
- ✅ `config/smtp_config.php` (con contraseña)
- ✅ `config/.htaccess`
- ✅ `contact.php` (modificado)

### PASO 3: Verificar Permisos
Asegúrate que la carpeta `data/` tenga permisos 755 o 775

## 🧪 Prueba del Sistema

Después de subir los archivos:
1. Entra a tu web
2. Envía un mensaje de prueba desde el formulario
3. Revisa tu correo en Hotmail (soporte@miventech.com)

## 🔍 Debugging (si no funciona)

Si siguen sin llegar los emails, edita `contact.php` línea 193 y descomenta:
```php
$mail->SMTPDebug = 2; // Descomentar para ver errores SMTP
```

Esto mostrará información detallada del error.

## 📌 Notas Importantes

- **Seguridad:** El archivo smtp_config.php está protegido con .htaccess
- **Respaldo:** Los mensajes SIEMPRE se guardan en `data/contacts.json`
- **Puerto alternativo:** Si TLS (587) no funciona, prueba SSL (465) en config

## 🎯 Configuración Alternativa para Hostinger

Si el puerto 587 no funciona, edita `config/smtp_config.php`:
```php
'smtp_port' => 465,
'smtp_secure' => 'ssl',
```

---
**Fecha:** 07/01/2026
**Configuración:** Hostinger SMTP + PHPMailer
