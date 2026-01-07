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
  
  // Configurar Widget de WhatsApp
  const whatsappToggle = document.getElementById('whatsappToggle');
  const whatsappChatBox = document.getElementById('whatsappChatBox');
  const closeChat = document.getElementById('closeChat');
  const sendWhatsappBtn = document.getElementById('sendWhatsappBtn');
  const whatsappMessage = document.getElementById('whatsappMessage');
  const contactSection = document.getElementById('contact');

  // Número de WhatsApp (configura tu número aquí)
  const country = '549'; // Código de país Argentina (SIN el +)
  const area = '11'; // Código de área
  const number = '22230869'; // Tu número sin el 15
  const whatsappNumber = country + area + number;

  // Variable para controlar apertura manual vs automática
  let manuallyClosedInContact = false;

  // Observer para detectar cuando se entra/sale de la sección de contacto
  if (contactSection && whatsappChatBox) {
    const contactObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Entrando a la sección de contacto - abrir automáticamente
          if (!manuallyClosedInContact) {
            setTimeout(() => {
              whatsappChatBox.classList.add('active');
            }, 500); // Pequeño delay para suavizar la transición
          }
        } else {
          // Saliendo de la sección de contacto - cerrar automáticamente
          whatsappChatBox.classList.remove('active');
          manuallyClosedInContact = false; // Reset cuando sale de la sección
        }
      });
    }, {
      threshold: 0.2, // Se activa cuando el 20% de la sección es visible
      rootMargin: '-50px'
    });

    contactObserver.observe(contactSection);
  }

  // Abrir/cerrar el chat manualmente
  if (whatsappToggle) {
    whatsappToggle.addEventListener('click', () => {
      whatsappChatBox.classList.toggle('active');
    });
  }

  // Cerrar el chat manualmente
  if (closeChat) {
    closeChat.addEventListener('click', () => {
      whatsappChatBox.classList.remove('active');
      // Marcar que se cerró manualmente en la sección de contacto
      if (contactSection) {
        const rect = contactSection.getBoundingClientRect();
        const isInContact = rect.top < window.innerHeight && rect.bottom > 0;
        if (isInContact) {
          manuallyClosedInContact = true;
        }
      }
    });
  }

  // Enviar mensaje por WhatsApp
  if (sendWhatsappBtn) {
    sendWhatsappBtn.addEventListener('click', () => {
      const message = whatsappMessage.value.trim();
      const defaultMessage = 'Hola! Quiero consultar sobre sus servicios';
      const finalMessage = message || defaultMessage;
      
      const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(finalMessage)}`;
      window.open(whatsappUrl, '_blank');
      
      // Limpiar el textarea después de enviar
      whatsappMessage.value = '';
      whatsappChatBox.classList.remove('active');
    });
  }

  // Permitir envío con Enter (opcional)
  if (whatsappMessage) {
    whatsappMessage.addEventListener('keypress', (e) => {
      if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendWhatsappBtn.click();
      }
    });
  }

  // Cerrar el chat al hacer clic fuera de él (solo si no está en modo automático)
  document.addEventListener('click', (e) => {
    const whatsappWidget = document.getElementById('whatsappWidget');
    if (whatsappWidget && !whatsappWidget.contains(e.target)) {
      const isContactVisible = contactSection && 
        contactSection.getBoundingClientRect().top < window.innerHeight && 
        contactSection.getBoundingClientRect().bottom > 0;
      
      if (!isContactVisible) {
        whatsappChatBox.classList.remove('active');
      }
    }
  });
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