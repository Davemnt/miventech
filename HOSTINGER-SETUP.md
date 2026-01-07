# 🚀 Configuración en Hostinger - Guía Paso a Paso

## 📋 Requisitos previos
- ✅ Ya cambiaste la contraseña SMTP de **soporte@miventech.com** en Hostinger
- ✅ Tienes acceso al File Manager de Hostinger
- ✅ Conoces la nueva contraseña SMTP

---

## 🔧 PASO 1: Subir archivos a Hostinger

### Opción A: Desde GitHub (Recomendado)

1. Accede a Hostinger **hPanel** → **Hosting** → **Sitio web**
2. Ve a **Git** (en el menú lateral)
3. Haz clic en **Deploy from GitHub**
4. Conecta tu repositorio: `Davemnt/miventech`
5. Rama: `main`
6. Directorio destino: `/public_html/` o `/domains/miventech.com/public_html/`
7. Haz clic en **Deploy**

### Opción B: Manual con File Manager

1. Sube todos los archivos EXCEPTO `.env` (porque tiene credenciales reales)
2. Archivos que SÍ debes subir:
   - ✅ `index.html`, `contact.php`
   - ✅ Carpeta `assets/`, `config/`, `phpmailer/`
   - ✅ `.env.example`, `.gitignore`
   - ❌ **NO subir** `.env` (lo crearás manualmente)

---

## 🔐 PASO 2: Crear archivo .env en Hostinger

**IMPORTANTE:** Este archivo contiene tus credenciales y debe crearse MANUALMENTE en el servidor.

1. Accede a Hostinger **hPanel** → **File Manager**
2. Navega a la carpeta raíz de tu sitio web (donde está `index.html`)
3. Haz clic en **Nuevo archivo**
4. Nombre del archivo: `.env` (con el punto al inicio)
5. Pega este contenido y **reemplaza con tu NUEVA contraseña:**

```env
# Configuración SMTP - HOSTINGER
SMTP_HOST=smtp.hostinger.com
SMTP_PORT=587
SMTP_SECURE=tls
SMTP_USERNAME=soporte@miventech.com
SMTP_PASSWORD=TU_NUEVA_CONTRASEÑA_AQUI

# Configuración de correo
FROM_EMAIL=soporte@miventech.com
FROM_NAME=MivenTech - Formulario de Contacto
TO_EMAIL=soporte@miventech.com
TO_NAME=Soporte MivenTech
```

6. **Guardar el archivo**
7. **Permisos:** Clic derecho → Permisos → `644` (rw-r--r--)

---

## 📁 PASO 3: Crear carpeta de datos

1. En **File Manager**, crea una carpeta llamada `data/`
2. Permisos: `755` (rwxr-xr-x)
3. Esta carpeta guardará los mensajes del formulario

---

## ✅ PASO 4: Probar la configuración

1. Accede a: `https://tudominio.com/test-config.php`
2. Deberías ver todos los checks en ✓ verde
3. Si hay errores:
   - Verifica que el archivo `.env` existe
   - Verifica que la contraseña sea correcta
   - Verifica permisos de archivos

4. **Probar formulario de contacto:**
   - Ve a: `https://tudominio.com/#contact`
   - Envía un mensaje de prueba
   - Revisa tu correo **soporte@miventech.com** (o el Hotmail vinculado)

---

## 🔒 PASO 5: Seguridad adicional

### Proteger archivos sensibles con .htaccess

Crea un archivo `.htaccess` en la raíz con este contenido:

```apache
# Proteger archivo .env
<Files ".env">
    Order allow,deny
    Deny from all
</Files>

# Proteger archivos de configuración
<FilesMatch "\.(env|log|md|example)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Permitir acceso a archivos necesarios
<Files "index.html">
    Allow from all
</Files>

<Files "contact.php">
    Allow from all
</Files>
```

---

## 🔄 Reenvío de correos (Hotmail)

Ya que tienes **soporte@miventech.com** vinculado con tu Hotmail:

### Verificar reenvío en Hostinger:

1. **hPanel** → **Emails** → **Reenvíos**
2. Verifica que `soporte@miventech.com` → `tu-hotmail@hotmail.com`
3. O configura en tu Hotmail:
   - **Configuración** → **Ver toda la configuración**
   - **Correo** → **Sincronizar correo**
   - Agregar cuenta POP3/SMTP de Hostinger

---

## 🐛 Solución de problemas

### El formulario no envía emails:

1. Verifica logs: `data/php_errors.log`
2. Verifica que `.env` exista: File Manager → buscar `.env`
3. Prueba credenciales manualmente en test-config.php
4. Verifica límites de envío de Hostinger (máx. emails por hora)

### Los emails no llegan:

1. Revisa la **carpeta de spam** en tu Hotmail
2. Verifica en Hostinger → **Emails** → **Registros de correo**
3. Verifica que el reenvío esté activo

### Error "archivo .env no encontrado":

- El archivo `.env` debe estar en la misma carpeta que `index.html`
- Verifica el nombre: `.env` (con punto al inicio, sin extensión)
- Verifica permisos: 644

---

## 📞 Contacto de soporte

- **Hostinger:** Chat en vivo 24/7 en hPanel
- **Email:** support@hostinger.com

---

## ✅ Checklist final

- [ ] Contraseña SMTP cambiada en Hostinger
- [ ] Archivos subidos a Hostinger
- [ ] Archivo `.env` creado manualmente en el servidor
- [ ] Carpeta `data/` creada con permisos correctos
- [ ] test-config.php muestra todo en verde
- [ ] Formulario probado y emails llegando
- [ ] Archivo .htaccess creado para proteger .env
- [ ] Reenvío de correo configurado (si aplica)
- [ ] Eliminar test-config.php después de probar (seguridad)
