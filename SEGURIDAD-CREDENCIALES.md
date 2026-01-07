# 🔒 Guía de Seguridad - Configuración de Credenciales

## ⚠️ ACCIÓN URGENTE REQUERIDA

GitGuardian ha detectado que las credenciales SMTP fueron expuestas en el repositorio público. **Debes cambiar tu contraseña inmediatamente**.

## Pasos para asegurar tus credenciales:

### 1. ✅ Cambiar contraseña SMTP (URGENTE)

1. Accede a tu panel de Hostinger
2. Ve a la sección de **Email**
3. Cambia la contraseña de **soporte@miventech.com**
4. Actualiza el archivo `.env` con la nueva contraseña

### 2. ✅ Configuración completada

Ya se han implementado las siguientes protecciones:

- ✅ Archivo `.env` creado con las credenciales
- ✅ Archivo `.gitignore` actualizado para excluir `.env`
- ✅ `smtp_config.php` ahora lee desde variables de entorno
- ✅ `.env.example` creado como plantilla

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

- [ ] Cambiar contraseña SMTP en Hostinger
- [ ] Actualizar `.env` con nueva contraseña
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
