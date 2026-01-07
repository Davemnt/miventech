# 🔒 Guía de Seguridad - Configuración de Credenciales

## ⚠️ ACCIÓN URGENTE REQUERIDA

GitGuardian ha detectado que las credenciales SMTP fueron expuestas en el repositorio público. **Debes cambiar tu contraseña inmediatamente**.

## 🚨 PASOS CRÍTICOS - HACER AHORA:

### 1. ⚠️ Cambiar contraseña SMTP (URGENTE - HACER PRIMERO)

**Por qué es urgente:** Tu contraseña `Miventech#2026!` está expuesta públicamente en GitHub y cualquiera puede verla.

**Cómo cambiarla en Hostinger:**
1. Accede a [hpanel.hostinger.com](https://hpanel.hostinger.com)
2. Ve a **Emails** → **Cuentas de correo**
3. Encuentra **soporte@miventech.com**
4. Haz clic en **Gestionar** → **Cambiar contraseña**
5. Crea una contraseña fuerte (ejemplo: `Mvt2026!Sx#kP9@Qr`)
6. **Guarda esta nueva contraseña** - la necesitarás en el siguiente paso

### 2. 🔐 Configurar en Hostinger (Servidor)

**Lee la guía completa:** [HOSTINGER-SETUP.md](HOSTINGER-SETUP.md)

Resumen rápido:
1. **Sube archivos** a Hostinger (vía Git o File Manager)
2. **Crea archivo `.env`** manualmente en el servidor con tu NUEVA contraseña
3. **Crea carpeta `data/`** para almacenar mensajes
4. **Prueba con** `test-config.php`
5. **Protege con** `.htaccess`

### 3. ✅ Protecciones implementadas

- ✅ Archivo `.env` creado localmente (NO se sube a Git)
- ✅ `.gitignore` excluye `.env` del repositorio
- ✅ `smtp_config.php` lee desde variables de entorno
- ✅ `.env.example` como plantilla (sin credenciales)
- ✅ `.htaccess` protege archivos sensibles
- ✅ Logs de errores para debugging
- ✅ Manejo de errores mejorado

### 3. 🔄 Eliminar credenciales del historial de Git

Las credenciales antiguas siguen en el historial de Git. Ejecuta estos comandos:

```bash
# Eliminar el archivo comprometido del historial
git filter-branch --force --index-filter \
  "git rm --cached --ignore-unmatch config/smtp_config.php" \
  --prune-empty --tag-name-filter cat -- --all

# Forzar el push (CUIDADO: esto reescribe el historial)
git push origin --force --all
```

**Alternativa más segura**: Usa BFG Repo-Cleaner o git-filter-repo

### 4. 📝 Para nuevas instalaciones

1. Copia `.env.example` a `.env`
2. Edita `.env` con tus credenciales reales
3. **Nunca** subas `.env` al repositorio

## ✅ Checklist de Seguridad

**Local (tu computadora):**
- [ ] Cambiar contraseña SMTP en Hostinger
- [ ] Actualizar `.env` LOCAL con nueva contraseña (para pruebas)
- [ ] Hacer commit de los cambios (sin `.env`)
- [ ] Push a GitHub

**Servidor Hostinger:**
- [ ] Subir archivos actualizados
- [ ] Crear `.env` en el servidor con NUEVA contraseña
- [ ] Subir `.htaccess` para protección
- [ ] Crear carpeta `data/`
- [ ] Probar con test-config.php
- [ ] Probar formulario de contacto
- [ ] Verificar que emails lleguen
- [ ] Eliminar test-config.php (después de probar)

**GitHub:**
- [ ] Marcar alerta de GitGuardian como resuelta
- [ ] (Opcional) Limpiar historial con git-filter-repo
- [ ] Verificar que `.env` no se suba a Git (`git status`)
- [ ] Limpiar historial de Git (opcional pero recomendado)
- [ ] Revisar el panel de GitGuardian y marcar como resuelto

## 🛡️ Buenas prácticas implementadas

- Variables de entorno para credenciales sensibles
- `.gitignore` configurado correctamente
- Archivo de ejemplo para documentación
- Rate limiting en el formulario de contacto

## 📞 Soporte

Si necesitas ayuda con estos pasos, contacta al equipo de desarrollo.
