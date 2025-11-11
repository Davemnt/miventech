# MivenTech - Sitio Web Corporativo

Sitio web para servicios de reparación y mantenimiento de computadoras, y desarrollo web.

## 🚀 Características

- Diseño responsive con Tailwind CSS
- Animaciones suaves con Intersection Observer
- Formulario de contacto funcional con PHP
- Validaciones de seguridad y anti-spam
- Almacenamiento de mensajes en JSON
- Protección de archivos sensibles con .htaccess

## 📁 Estructura del Proyecto

```
trium technologies/
├── index.html              # Página principal
├── contact.php             # Procesamiento del formulario
├── .htaccess              # Configuración de seguridad Apache
├── README.md              # Este archivo
├── assets/
│   ├── css/
│   │   └── style.css      # Estilos personalizados
│   ├── js/
│   │   └── main.js        # JavaScript principal
│   └── images/
│       └── home-miven.png # Imagen principal
└── data/                  # Directorio protegido
    ├── .htaccess          # Protección del directorio
    ├── contacts.json      # Mensajes de contacto guardados
    └── rate_limit.json    # Control de límite de envíos
```

## ⚙️ Configuración

### 1. Configurar Email

Edita `contact.php` y cambia el email de destino:

```php
$to = 'tu-email@miventech.com'; // Línea 56
```

### 2. Configurar WhatsApp

Edita `index.html` y actualiza el número de WhatsApp:

```html
<a href="https://wa.me/5491112345678"  <!-- Línea 268 -->
```

### 3. Actualizar Email Visible

Edita `assets/js/main.js` y actualiza el email que se muestra:

```javascript
const email = 'contacto@miventech.com'; // Línea 48
```

## 🛡️ Seguridad

El sitio incluye múltiples capas de seguridad:

1. **Rate Limiting**: Máximo 3 envíos por hora por IP
2. **Validación de Datos**: Sanitización y validación de todos los campos
3. **Detección de Spam**: Filtro de palabras clave sospechosas
4. **Protección de Archivos**: .htaccess impide acceso a archivos JSON
5. **Registro de Actividad**: Todos los envíos se registran con IP y timestamp

## 📧 Sistema de Contacto

Los mensajes se guardan en `data/contacts.json` con el siguiente formato:

```json
{
  "id": "contact_unique_id",
  "timestamp": "2025-11-11 15:30:45",
  "date_readable": "11/11/2025",
  "time_readable": "15:30:45",
  "ip": "192.168.1.1",
  "name": "Juan Pérez",
  "email": "juan@email.com",
  "message": "Mensaje del cliente...",
  "user_agent": "Mozilla/5.0...",
  "status": "nuevo"
}
```

## 🌐 Despliegue

### Requisitos del Servidor

- PHP 7.0 o superior
- Apache con mod_rewrite habilitado
- Permisos de escritura en el directorio `data/`

### Pasos para Desplegar

1. Sube todos los archivos al servidor
2. Asegúrate que el directorio `data/` tenga permisos 755
3. Verifica que `.htaccess` esté activo
4. Prueba el formulario de contacto

## 🎨 Personalización

### Colores

Los colores principales están definidos en `assets/css/style.css`:

```css
:root {
  --bg-light: #f4f4f4;
  --bg-dark: #151414;
  --text-gray: #878787;
  --accent-orange: #ff6b35;
}
```

### Contenido

- Textos: Edita directamente en `index.html`
- Imágenes: Reemplaza en `assets/images/`
- Animaciones Lottie: Actualiza los URLs en `index.html`

## 📱 Características Responsive

El sitio está optimizado para:
- 📱 Móviles (320px+)
- 📱 Tablets (768px+)
- 💻 Desktop (1024px+)

## 🔧 Mantenimiento

### Ver Mensajes de Contacto

Los mensajes se guardan en `data/contacts.json`. Para visualizarlos de forma segura, accede al archivo directamente por SFTP/FTP o crea un panel de administración con autenticación.

### Limpieza de Logs

Periódicamente revisa y limpia:
- `data/contacts.json` (mensajes antiguos)
- `data/rate_limit.json` (límites expirados)

## 📞 Soporte

Para consultas o soporte, contacta a través del formulario del sitio o por WhatsApp.

---

**© 2025 MivenTech - Todos los derechos reservados**
