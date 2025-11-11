// Animaciones de scroll
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active');
    }
  });
}, observerOptions);

document.addEventListener('DOMContentLoaded', () => {
  // Inicializar animaciones
  const animatedElements = document.querySelectorAll('.fade-in, .fade-in-left, .fade-in-right, .scale-in');
  animatedElements.forEach(el => observer.observe(el));
  
  // Configurar WhatsApp
  const whatsappBtn = document.getElementById('whatsappButton');
  if (whatsappBtn) {
    // Número ofuscado - cambia estos valores por tu número real
    const country = '549'; // Código de país Argentina (SIN el +)
    const area = '11'; // Código de área
    const number = '22230869'; // Tu número sin el 15
    
    // Construir el enlace de forma dinámica
    const whatsappNumber = country + area + number;
    const whatsappUrl = 'https://wa.me/' + whatsappNumber;
    
    // Mensaje personalizado opcional
    const message = encodeURIComponent('Hola! Quiero consultar sobre sus servicios');
    whatsappBtn.href = whatsappUrl + '?text=' + message;
    
    console.log('WhatsApp configurado:', whatsappBtn.href); // Para verificar
  } else {
    console.error('Botón de WhatsApp no encontrado');
  }
});

// Menu responsive
const navbarToggle = document.getElementById('navbar-toggle');
const navbarLinks = document.getElementById('navbar-links');

navbarToggle.addEventListener('click', () => {
  navbarLinks.classList.toggle('hidden');
  navbarLinks.classList.toggle('flex');
  navbarLinks.classList.toggle('flex-col');
  navbarLinks.classList.toggle('absolute');
  navbarLinks.classList.toggle('top-full');
  navbarLinks.classList.toggle('left-0');
  navbarLinks.classList.toggle('w-full');
  navbarLinks.classList.toggle('bg-gray-900');
  navbarLinks.classList.toggle('p-6');
  navbarLinks.classList.toggle('space-y-4');
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      
      // Prevenir que la URL cambie (no agregar # en la URL)
      if (history.pushState) {
        history.pushState(null, null, ' ');
      }
      
      if (!navbarLinks.classList.contains('hidden')) {
        navbarLinks.classList.add('hidden');
      }
    }
  });
});

// Formulario de contacto
document.getElementById('contactForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  
  const submitBtn = document.getElementById('submitBtn');
  const formAlert = document.getElementById('formAlert');
  const formData = new FormData(e.target);
  
  submitBtn.disabled = true;
  submitBtn.innerHTML = 'Enviando...<span class="spinner"></span>';
  formAlert.style.display = 'none';
  
  try {
    const response = await fetch('contact.php', {
      method: 'POST',
      body: formData
    });
    
    const data = await response.json();
    
    formAlert.style.display = 'block';
    
    if (data.success) {
      formAlert.className = 'alert alert-success';
      formAlert.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <strong>¡Mensaje enviado con éxito!</strong> Nos pondremos en contacto contigo pronto.
      `;
      e.target.reset();
    } else {
      formAlert.className = 'alert alert-error';
      let errorMsg = data.message;
      if (data.errors && data.errors.length > 0) {
        errorMsg += '<ul style="margin-top: 0.5rem; margin-left: 1.5rem;">';
        data.errors.forEach(error => {
          errorMsg += `<li>${error}</li>`;
        });
        errorMsg += '</ul>';
      }
      formAlert.innerHTML = `
        <i class="fas fa-exclamation-circle"></i>
        <strong>Error:</strong> ${errorMsg}
      `;
    }
    
    formAlert.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    
  } catch (error) {
    formAlert.style.display = 'block';
    formAlert.className = 'alert alert-error';
    formAlert.innerHTML = `
      <i class="fas fa-exclamation-circle"></i>
      <strong>Error:</strong> Hubo un problema al enviar el mensaje. Por favor intentá de nuevo o contactanos por WhatsApp.
    `;
  } finally {
    submitBtn.disabled = false;
    submitBtn.textContent = 'Enviar Mensaje';
  }
});