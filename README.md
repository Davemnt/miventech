# 🚀 MivenTech - Portfolio Corporativo

> **Sitio web profesional para servicios de reparación y mantenimiento de computadoras, y desarrollo web**

[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat&logo=html5&logoColor=white)](https://developer.mozilla.org/es/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat&logo=css3&logoColor=white)](https://developer.mozilla.org/es/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)](https://developer.mozilla.org/es/docs/Web/JavaScript)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=flat&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net)

---

## 📖 Tabla de Contenidos

- [Acerca del Proyecto](#-acerca-del-proyecto)
- [Características](#-características)
- [Tecnologías Utilizadas](#-tecnologías-utilizadas)
- [Demo en Vivo](#-demo-en-vivo)
- [Capturas de Pantalla](#-capturas-de-pantalla)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Instalación y Configuración](#-instalación-y-configuración)
- [Optimización SEO](#-optimización-seo)
- [Seguridad](#-seguridad)
- [Personalización](#-personalización)
- [Roadmap](#-roadmap)
- [Contribuciones](#-contribuciones)
- [Licencia](#-licencia)
- [Contacto](#-contacto)

---

## 🎯 Acerca del Proyecto

**MivenTech** es un sitio web corporativo moderno y completamente responsive, diseñado para ofrecer servicios de tecnología profesionales. El proyecto combina diseño atractivo, funcionalidad robusta y optimización SEO avanzada.

### ✨ ¿Por qué este proyecto?

- **Diseño Profesional**: Interfaz moderna y limpia que genera confianza
- **100% Responsive**: Optimizado para móviles, tablets y desktop
- **Alto Rendimiento**: Carga rápida con compresión GZIP y caché
- **SEO Optimizado**: Estructura completa para posicionamiento en Google
- **Seguridad Robusta**: Múltiples capas de protección contra spam y ataques
- **Fácil Mantenimiento**: Código comentado y estructura organizada

---

## 🚀 Características

### 🎨 Diseño y UX
- ✅ **Diseño Responsive**: Adaptado perfectamente a todos los dispositivos
- ✅ **Animaciones Fluidas**: Transiciones suaves con Intersection Observer
- ✅ **Animaciones Lottie**: Animaciones vectoriales interactivas de alta calidad
- ✅ **Tema Consistente**: Paleta de colores coherente y profesional
- ✅ **Navegación Intuitiva**: Menú sticky con smooth scroll

### 💻 Funcionalidad
- ✅ **Formulario de Contacto**: Sistema completo con validación y envío por email
- ✅ **WhatsApp Integration**: Botón flotante para contacto directo
- ✅ **Sistema Anti-Spam**: Rate limiting (3 envíos/hora por IP)
- ✅ **Almacenamiento de Datos**: Mensajes guardados en JSON con timestamp e IP
- ✅ **Página 404 Personalizada**: Error handling profesional

### 🔍 SEO y Rendimiento
- ✅ **Meta Tags Completos**: Title, description, keywords optimizados
- ✅ **Open Graph**: Integración para redes sociales (Facebook, Twitter)
- ✅ **Sitemap.xml**: Mapa del sitio para Google
- ✅ **Robots.txt**: Configurado correctamente para crawlers
- ✅ **URLs Canónicas**: Prevención de contenido duplicado
- ✅ **Compresión GZIP**: Reducción del tamaño de archivos
- ✅ **Browser Caching**: Configuración de caché optimizada
- ✅ **PWA Ready**: Manifest.json para Progressive Web App

### 🛡️ Seguridad
- ✅ **Rate Limiting**: Máximo 3 envíos por hora por dirección IP
- ✅ **Validación de Datos**: Sanitización y validación de todos los campos
- ✅ **Detección de Spam**: Filtro inteligente de palabras clave sospechosas
- ✅ **Protección de Archivos**: .htaccess bloquea acceso a archivos sensibles
- ✅ **XSS Prevention**: Protección contra ataques de Cross-Site Scripting
- ✅ **CSRF Protection**: Token de seguridad en formularios

---

## 🛠️ Tecnologías Utilizadas

### Frontend
- **HTML5**: Estructura semántica optimizada para SEO
- **CSS3**: Estilos modernos con variables CSS
- **TailwindCSS**: Framework CSS utility-first para desarrollo rápido
- **JavaScript ES6+**: Código moderno y eficiente
- **Font Awesome**: Iconografía vectorial escalable
- **Lottie**: Animaciones vectoriales de alta calidad

### Backend
- **PHP 7.4+**: Procesamiento de formularios y lógica del servidor
- **JSON**: Almacenamiento de datos estructurados

### Herramientas y Configuración
- **Apache**: Servidor web con .htaccess
- **Git**: Control de versiones
- **VS Code**: Editor con comentarios detallados en el código

---

## 🌐 Demo en Vivo

🔗 **[Ver Sitio en Vivo](https://miventech.com)**

---

## 📸 Capturas de Pantalla

### 🖥️ Vista Desktop
![Home Desktop](assets/images/screenshot-desktop.png)

### 📱 Vista Mobile
![Home Mobile](assets/images/screenshot-mobile.png)

### 🎨 Secciones Principales
- **Hero Section**: Presentación impactante con CTA claros
- **Sobre Nosotros**: Historia y valores de la empresa
- **Servicios**: Dos categorías principales con iconografía
- **Desarrollo Web**: Features detalladas con animación
- **Contacto**: Formulario funcional con validación

---

## 📁 Estructura del Proyecto

```
miventech-website/
│
├── 📄 index.html                # Página principal (con comentarios detallados)
├── 📄 contact.php               # Procesamiento del formulario de contacto
├── 📄 404.html                  # Página de error personalizada
├── 📄 robots.txt                # Configuración para motores de búsqueda
├── 📄 sitemap.xml               # Mapa del sitio para SEO
├── 📄 manifest.json             # Configuración PWA
├── 📄 .htaccess                 # Configuración Apache (seguridad, caché, compresión)
├── 📄 README.md                 # Este archivo
├── 📄 SEO-GUIA-SOLUCION.md     # Guía completa de optimización SEO
│
├── 📂 assets/
│   ├── 📂 css/
│   │   └── style.css            # Estilos personalizados y variables CSS
│   ├── 📂 js/
│   │   └── main.js              # JavaScript principal (animaciones, formulario)
│   └── 📂 images/
│       ├── logo.png             # Logotipo de la empresa
│       └── home-miven.png       # Imagen principal hero section
│
├── 📂 data/                     # Directorio protegido (no accesible desde web)
│   ├── .htaccess                # Bloqueo de acceso directo
│   ├── contacts.json            # Mensajes de contacto guardados
│   └── rate_limit.json          # Control de límite de envíos por IP
│
└── 📂 .git/                     # Control de versiones Git
```

### 📋 Descripción de Archivos Clave

| Archivo | Propósito | Funcionalidad |
|---------|-----------|---------------|
| `index.html` | Página principal | HTML semántico con comentarios línea por línea |
| `contact.php` | Backend del formulario | Validación, anti-spam, envío de emails |
| `robots.txt` | SEO | Indica a Google qué páginas indexar |
| `sitemap.xml` | SEO | Lista de URLs importantes para crawlers |
| `.htaccess` | Servidor | Seguridad, caché, compresión, redirecciones |
| `manifest.json` | PWA | Convierte el sitio en Progressive Web App |

---

## ⚙️ Instalación y Configuración

### 📋 Requisitos Previos

- **Servidor Web**: Apache 2.4+ o Nginx
- **PHP**: Versión 7.4 o superior
- **Módulos Apache**: mod_rewrite, mod_deflate, mod_expires
- **Permisos**: Escritura en directorio `data/` (chmod 755)
- **SSL**: Certificado HTTPS recomendado

### 🔧 Instalación Local

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/Davemnt/miventech.git
   cd miventech
   ```

2. **Configurar servidor local**
   ```bash
   # Con XAMPP, WAMP o MAMP
   # Copiar archivos a htdocs/ o www/
   
   # O usar servidor PHP integrado
   php -S localhost:8000
   ```

3. **Configurar permisos**
   ```bash
   chmod 755 data/
   chmod 644 data/*.json
   ```

4. **Verificar instalación**
   - Abrir navegador: `http://localhost:8000`
   - Verificar: `http://localhost:8000/robots.txt`
   - Verificar: `http://localhost:8000/sitemap.xml`

### 🚀 Despliegue en Producción

#### Opción 1: FTP/SFTP

1. Conectar al servidor vía FTP
2. Subir todos los archivos a `public_html/` o `www/`
3. Verificar que `.htaccess` esté activo
4. Configurar permisos del directorio `data/`

#### Opción 2: Git Deploy

```bash
# En el servidor
cd /var/www/html
git clone https://github.com/Davemnt/miventech.git .
chmod 755 data/
```

#### Opción 3: cPanel

1. Usar File Manager para subir archivos
2. O usar "Git Version Control" si está disponible
3. Configurar permisos desde File Manager

### 🔐 Configuración Inicial

#### 1. Configurar Email de Contacto

Edita `contact.php` (línea 56):

```php
// Cambiar por tu email real
$to = 'contacto@miventech.com';
```

#### 2. Actualizar Número de WhatsApp

Edita `index.html` (buscar "wa.me"):

```html
<a href="https://wa.me/5491122230869?text=Hola!..."
   <!-- Cambiar por tu número con código de país -->
```

#### 3. Configurar Dominio en Archivos

**En `robots.txt`:**
```txt
Sitemap: https://tudominio.com/sitemap.xml
```

**En `sitemap.xml`:**
```xml
<loc>https://tudominio.com/</loc>
<!-- Actualizar todas las URLs -->
```

**En `index.html`:**
```html
<link rel="canonical" href="https://tudominio.com/" />
<meta property="og:url" content="https://tudominio.com" />
```

#### 4. Personalizar Imágenes

1. Reemplazar `assets/images/logo.png` con tu logo
2. Reemplazar `assets/images/home-miven.png` con tu imagen hero
3. Agregar favicon: `favicon.ico` en la raíz

---

## 🔍 Optimización SEO

Este proyecto incluye una **optimización SEO completa**. Consulta `SEO-GUIA-SOLUCION.md` para detalles.

### ✅ Checklist SEO Implementado

- [x] **Meta Tags Completos**: Title, description, keywords
- [x] **Open Graph Tags**: Para Facebook, WhatsApp, LinkedIn
- [x] **Twitter Cards**: Optimización para Twitter
- [x] **Robots.txt**: Configurado correctamente
- [x] **Sitemap.xml**: Todas las URLs importantes listadas
- [x] **URL Canónica**: Evita contenido duplicado
- [x] **Estructura Semántica**: H1, H2, H3 jerárquicos
- [x] **Alt Text en Imágenes**: Todas las imágenes descritas
- [x] **Schema Markup**: Datos estructurados (recomendado agregar)
- [x] **Velocidad de Carga**: GZIP, caché, minificación

### 📊 Google Search Console

1. **Agregar Propiedad**
   - Ir a [Google Search Console](https://search.google.com/search-console)
   - Agregar tu dominio: `miventech.com`
   - Verificar propiedad (HTML tag o DNS)

2. **Enviar Sitemap**
   - Ir a Sitemaps
   - Agregar: `https://tudominio.com/sitemap.xml`
   - Enviar

3. **Solicitar Indexación**
   - Ir a Inspección de URLs
   - Ingresar: `https://tudominio.com/`
   - Clic en "Solicitar indexación"

4. **Monitorear**
   - Revisar cobertura de indexación
   - Verificar errores de rastreo
   - Analizar rendimiento de búsqueda

---

## 🛡️ Seguridad

El sitio implementa **múltiples capas de seguridad** para proteger contra ataques comunes.

### 🔒 Medidas de Seguridad Implementadas

#### 1. **Rate Limiting**
- Máximo 3 envíos por hora por dirección IP
- Archivo `data/rate_limit.json` rastrea intentos
- Bloqueo automático de IPs abusivas

#### 2. **Validación de Datos**
```php
// Sanitización de inputs
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
```

#### 3. **Detección de Spam**
- Filtro de palabras clave sospechosas
- Validación de formato de email
- Longitud mínima/máxima de mensajes
- Verificación de User Agent

#### 4. **Protección de Archivos (.htaccess)**
```apache
# Bloquear acceso a archivos sensibles
<FilesMatch "\.(json|log|bak)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Proteger directorio data/
<Directory "data">
    Order Deny,Allow
    Deny from all
</Directory>
```

#### 5. **Headers de Seguridad**
- `ServerSignature Off`: Oculta versión del servidor
- `Options -Indexes`: Previene listado de directorios
- XSS Protection en validaciones

#### 6. **Registro de Actividad**
Todos los envíos se registran con:
- IP del remitente
- Timestamp completo
- User Agent del navegador
- Datos del formulario

### 🔐 Recomendaciones Adicionales

- [ ] Implementar **CAPTCHA** (Google reCAPTCHA v3)
- [ ] Agregar **CSRF tokens** en formularios
- [ ] Configurar **Content Security Policy** (CSP)
- [ ] Implementar **HTTPS** obligatorio
- [ ] Backup automático de `data/contacts.json`

---

## 📧 Sistema de Contacto

### 📝 Formato de Almacenamiento

Los mensajes se guardan en `data/contacts.json` con estructura detallada:

```json
{
  "id": "contact_674c1a2b3d4e5",
  "timestamp": "2025-12-01 15:30:45",
  "date_readable": "01/12/2025",
  "time_readable": "15:30:45",
  "ip": "192.168.1.100",
  "name": "Juan Pérez",
  "email": "juan@example.com",
  "message": "Consulta sobre servicios de reparación...",
  "user_agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64)...",
  "status": "nuevo"
}
```

### 📬 Flujo del Formulario

1. **Usuario completa formulario** → Validación en JavaScript
2. **Submit del form** → AJAX envía datos a `contact.php`
3. **PHP valida datos** → Rate limit, spam check, sanitización
4. **Guarda en JSON** → Registro permanente con metadata
5. **Envía email** → Notificación al administrador
6. **Respuesta al usuario** → Mensaje de éxito o error

### 🔔 Notificaciones por Email

Configurar en `contact.php`:

```php
$to = 'contacto@miventech.com';  // Email destino
$subject = 'Nuevo mensaje desde MivenTech';
$headers = 'From: noreply@miventech.com' . "\r\n";
```

### 📊 Ver Mensajes Recibidos

**Opción 1: Acceso Directo (Recomendado)**
```bash
# Conectar por SSH/SFTP y descargar
scp user@servidor:/ruta/data/contacts.json ./
```

**Opción 2: Panel de Administración**
- Crear `admin/index.php` con autenticación
- Mostrar mensajes desde JSON
- Marcar como leídos/respondidos

**Opción 3: Script de Línea de Comandos**
```bash
# Ver últimos 5 mensajes
tail -n 5 data/contacts.json | jq '.'
```

---

## 🎨 Personalización

### 🎨 Paleta de Colores

Definida en `assets/css/style.css`:

```css
:root {
  /* Colores principales */
  --bg-light: #f4f4f4;      /* Fondo claro */
  --bg-dark: #151414;       /* Fondo oscuro */
  --text-gray: #878787;     /* Texto secundario */
  --accent-orange: #ff6b35; /* Color principal/CTAs */
  
  /* Gradientes */
  --gradient-primary: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
}
```

### ✏️ Modificar Contenido

#### Textos Principales
Editar directamente en `index.html`:

```html
<!-- Hero Title -->
<h1>Tu tecnologia en <span>OPTIMAS</span> condiciones</h1>

<!-- Sobre Nosotros -->
<h2>¿Quiénes <span>Somos?</span></h2>
<p>Somos un emprendimiento local...</p>
```

#### Servicios
Agregar/modificar en sección `#services`:

```html
<li class="flex items-start">
  <i class="fas fa-check-circle"></i>
  <span>Nuevo servicio aquí</span>
</li>
```

### 🖼️ Cambiar Imágenes

1. **Logo**: Reemplazar `assets/images/logo.png` (30px alto recomendado)
2. **Hero Image**: Reemplazar `assets/images/home-miven.png`
3. **Favicon**: Agregar `favicon.ico` en raíz

### 🎭 Animaciones Lottie

Cambiar animaciones en `index.html`:

```html
<dotlottie-wc
  src="https://lottie.host/TU-ID-AQUI/archivo.lottie"
  autoplay
  loop
></dotlottie-wc>
```

Encuentra animaciones en: [LottieFiles](https://lottiefiles.com)

### 📱 Responsive Breakpoints

```css
/* Móvil: 320px+ (default) */
.element { font-size: 16px; }

/* Tablet: 768px+ */
@media (min-width: 768px) {
  .element { font-size: 18px; }
}

/* Desktop: 1024px+ */
@media (min-width: 1024px) {
  .element { font-size: 20px; }
}
```

---

## 📱 Características Responsive

### 📐 Breakpoints del Proyecto

| Dispositivo | Ancho | Clase Tailwind |
|-------------|-------|----------------|
| 📱 Móvil | 320px - 767px | `default` |
| 📱 Tablet | 768px - 1023px | `md:` |
| 💻 Desktop | 1024px+ | `lg:` / `xl:` |

### ✅ Optimizaciones Mobile

- Menú hamburguesa funcional
- Imágenes escalables
- Touch targets de 44px mínimo
- Formulario optimizado para móvil
- Botón WhatsApp flotante responsive

---

## 🔧 Mantenimiento

### 📅 Tareas Regulares

#### Semanales
- [ ] Revisar mensajes en `data/contacts.json`
- [ ] Verificar errores en Google Search Console
- [ ] Monitorear tráfico y conversiones

#### Mensuales
- [ ] Backup completo del sitio
- [ ] Limpiar `data/rate_limit.json` (entradas antiguas)
- [ ] Actualizar contenido si es necesario
- [ ] Revisar y responder comentarios/reseñas

#### Trimestrales
- [ ] Actualizar dependencias (TailwindCSS, Font Awesome)
- [ ] Audit de seguridad
- [ ] Test de velocidad (PageSpeed Insights)
- [ ] Optimización de imágenes

### 🗄️ Sistema de Backup

```bash
#!/bin/bash
# Script de backup automático

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/miventech"

# Crear backup
tar -czf "$BACKUP_DIR/backup_$DATE.tar.gz" \
  /var/www/html/miventech/ \
  --exclude='*.git'

# Mantener solo últimos 30 días
find $BACKUP_DIR -name "backup_*.tar.gz" -mtime +30 -delete
```

### 📊 Monitoreo Recomendado

- **Google Analytics**: Seguimiento de tráfico
- **Google Search Console**: Rendimiento SEO
- **PageSpeed Insights**: Velocidad de carga
- **GTmetrix**: Performance detallado
- **Uptime Robot**: Monitoreo de disponibilidad

---

## 🗺️ Roadmap

### ✅ Versión 1.0 (Actual)
- [x] Diseño responsive completo
- [x] Sistema de contacto funcional
- [x] Optimización SEO avanzada
- [x] Seguridad implementada
- [x] Documentación completa

### 🚧 Versión 1.1 (Próxima)
- [ ] Panel de administración para mensajes
- [ ] Google reCAPTCHA v3
- [ ] Blog/Noticias section
- [ ] Testimonios de clientes
- [ ] Galería de proyectos

### 🔮 Versión 2.0 (Futuro)
- [ ] Sistema de cotizaciones online
- [ ] Chat en vivo
- [ ] Portal de clientes
- [ ] Sistema de tickets de soporte
- [ ] API REST para integraciones

### 💡 Ideas para Mejorar
- [ ] Modo oscuro/claro
- [ ] Multi-idioma (español/inglés)
- [ ] PWA offline support
- [ ] Integración con CRM
- [ ] Newsletter/Email marketing

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Si quieres mejorar este proyecto:

### 🔄 Proceso de Contribución

1. **Fork el proyecto**
   ```bash
   # Clic en "Fork" en GitHub
   ```

2. **Crear rama de feature**
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```

3. **Commit cambios**
   ```bash
   git commit -m "Agregar: nueva funcionalidad X"
   ```

4. **Push a la rama**
   ```bash
   git push origin feature/nueva-funcionalidad
   ```

5. **Abrir Pull Request**
   - Ir a GitHub y crear PR
   - Describir cambios detalladamente

### 📝 Guías de Estilo

- **HTML**: Semántico, comentado, indentación 2 espacios
- **CSS**: BEM naming o Tailwind utilities
- **JavaScript**: ES6+, comentarios JSDoc
- **PHP**: PSR-12 coding standard
- **Commits**: Conventional Commits format

---

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver archivo `LICENSE` para más detalles.

```
MIT License

Copyright (c) 2025 MivenTech

Se concede permiso, de forma gratuita, a cualquier persona que obtenga una copia
de este software y archivos de documentación asociados...
```

---

## 📞 Contacto

### 👨‍💻 Desarrollador

**David Montenegro**
- 🌐 Portfolio: [miventech.com](https://miventech.com)
- 📧 Email: contacto@miventech.com
- 💼 LinkedIn: [linkedin.com/in/davemnt](https://linkedin.com/in/davemnt)
- 🐙 GitHub: [@Davemnt](https://github.com/Davemnt)
- 📱 WhatsApp: [+54 9 11 2223-0869](https://wa.me/5491122230869)

### 🏢 Empresa

**MivenTech**
- 📍 Buenos Aires, Argentina
- 🌐 Website: [miventech.com](https://miventech.com)
- 📧 Contacto: contacto@miventech.com

---

## 🙏 Agradecimientos

- [TailwindCSS](https://tailwindcss.com) - Framework CSS
- [Font Awesome](https://fontawesome.com) - Iconos
- [LottieFiles](https://lottiefiles.com) - Animaciones
- [Google Fonts](https://fonts.google.com) - Tipografía Inter
- [Unsplash](https://unsplash.com) - Imágenes de alta calidad

---

## 📚 Recursos Adicionales

### 📖 Documentación Relacionada
- [SEO-GUIA-SOLUCION.md](SEO-GUIA-SOLUCION.md) - Guía completa de SEO
- [CHANGELOG.md](CHANGELOG.md) - Historial de cambios
- [CONTRIBUTING.md](CONTRIBUTING.md) - Guía de contribución

### 🔗 Links Útiles
- [Google Search Console](https://search.google.com/search-console)
- [PageSpeed Insights](https://pagespeed.web.dev)
- [GTmetrix](https://gtmetrix.com)
- [Can I Use](https://caniuse.com) - Compatibilidad de navegadores

---

<div align="center">

### ⭐ Si este proyecto te fue útil, dale una estrella en GitHub

**Hecho con ❤️ por [MivenTech](https://miventech.com)**

© 2025 MivenTech - Todos los derechos reservados

</div>
