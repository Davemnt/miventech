// MIVENTECH · v2.0

// ---- Configuración WhatsApp ----
const WA_NUMBER = '549' + '11' + '56296198'; // país + área + número (sin el 15)
const WA_TEXT = 'Hola! Quiero consultar sobre sus servicios';
const waUrl = `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(WA_TEXT)}`;
['waFloat', 'waCard'].forEach(id => {
  const el = document.getElementById(id);
  if (el) el.href = waUrl;
});
// Botones con mensaje propio: <a data-wa="texto">
document.querySelectorAll('[data-wa]').forEach(el => {
  el.href = `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(el.dataset.wa)}`;
});

// ---- Año en el footer ----
const yearEl = document.getElementById('year');
if (yearEl) yearEl.textContent = new Date().getFullYear();

// ---- Header: borde al hacer scroll ----
const header = document.querySelector('.site-header');
const onScroll = () => header && header.classList.toggle('scrolled', window.scrollY > 8);
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// ---- Menú móvil ----
const navToggle = document.getElementById('navToggle');
const nav = document.getElementById('nav');
if (navToggle && nav) {
  const setOpen = open => {
    nav.classList.toggle('open', open);
    navToggle.setAttribute('aria-expanded', String(open));
    navToggle.setAttribute('aria-label', open ? 'Cerrar menú' : 'Abrir menú');
  };
  navToggle.addEventListener('click', () => setOpen(!nav.classList.contains('open')));
  nav.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setOpen(false)));
  document.addEventListener('keydown', e => { if (e.key === 'Escape') setOpen(false); });
}

// ---- Animaciones de entrada ----
const revealEls = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
  const io = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
  revealEls.forEach((el, i) => {
    el.style.transitionDelay = `${Math.min(i % 5, 4) * 70}ms`;
    io.observe(el);
  });
} else {
  revealEls.forEach(el => el.classList.add('in'));
}

// ---- Orden de trabajo animada (hero) ----
(function ticket() {
  const steps = document.querySelectorAll('#ticketSteps li');
  const bar = document.getElementById('ticketBar');
  const status = document.getElementById('ticketStatus');
  if (!steps.length) return;

  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let i = 0;

  const render = () => {
    steps.forEach((li, idx) => {
      li.classList.toggle('done', idx < i);
      li.classList.toggle('current', idx === i);
    });
    const pct = Math.round((i / steps.length) * 100);
    if (bar) bar.style.width = pct + '%';
    if (status) {
      const ready = i >= steps.length;
      status.textContent = ready ? 'Listo para retirar' : 'En proceso';
      status.classList.toggle('ready', ready);
    }
  };

  if (reduce) { i = steps.length; render(); return; }

  render();
  setInterval(() => {
    i = i >= steps.length ? 0 : i + 1;
    render();
  }, 1400);
})();

// ---- Slider del home ----
(function heroSlider() {
  const hero = document.querySelector('.hero');
  const slides = document.querySelectorAll('#heroSlides .slide');
  const tabs = document.querySelectorAll('.slider-tab');
  if (!hero || slides.length < 2) return;

  const DURATION = 8000; // ms por slide
  hero.style.setProperty('--slide-ms', DURATION + 'ms');
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  let current = 0;
  let timer = null;
  let remaining = DURATION;
  let startedAt = 0;

  const show = idx => {
    current = (idx + slides.length) % slides.length;
    slides.forEach((s, i) => {
      const on = i === current;
      s.classList.toggle('is-active', on);
      s.setAttribute('aria-hidden', String(!on));
      s.querySelectorAll('a, button').forEach(el => el.tabIndex = on ? 0 : -1);
    });
    tabs.forEach((t, i) => {
      const on = i === current;
      // reinicia la animación de progreso
      t.classList.remove('is-active');
      void t.offsetWidth;
      t.classList.toggle('is-active', on);
      t.setAttribute('aria-selected', String(on));
    });
  };

  const schedule = ms => {
    clearTimeout(timer);
    if (reduce) return;
    startedAt = Date.now();
    remaining = ms;
    timer = setTimeout(() => { show(current + 1); schedule(DURATION); }, ms);
  };

  const pause = () => {
    if (hero.classList.contains('paused')) return;
    hero.classList.add('paused');
    clearTimeout(timer);
    remaining = Math.max(0, remaining - (Date.now() - startedAt));
  };
  const resume = () => {
    if (!hero.classList.contains('paused')) return;
    hero.classList.remove('paused');
    schedule(remaining);
  };

  tabs.forEach(t => t.addEventListener('click', () => {
    show(Number(t.dataset.slide));
    hero.classList.remove('paused');
    schedule(DURATION);
  }));

  // Pausa al pasar el mouse o al enfocar con teclado
  hero.addEventListener('mouseenter', pause);
  hero.addEventListener('mouseleave', resume);
  hero.addEventListener('focusin', pause);
  hero.addEventListener('focusout', e => { if (!hero.contains(e.relatedTarget)) resume(); });
  document.addEventListener('visibilitychange', () => document.hidden ? pause() : resume());

  // Deslizar en el celular
  let x0 = null;
  hero.addEventListener('touchstart', e => { x0 = e.touches[0].clientX; }, { passive: true });
  hero.addEventListener('touchend', e => {
    if (x0 === null) return;
    const dx = e.changedTouches[0].clientX - x0;
    if (Math.abs(dx) > 50) { show(current + (dx < 0 ? 1 : -1)); hero.classList.remove('paused'); schedule(DURATION); }
    x0 = null;
  });

  show(0);
  schedule(DURATION);
})();

// ---- Formulario de contacto (envía a contact.php) ----
const form = document.getElementById('contactForm');
if (form) {
  const btn = document.getElementById('submitBtn');
  const alertBox = document.getElementById('formAlert');

  const showAlert = (type, html) => {
    alertBox.className = `alert alert-${type}`;
    alertBox.innerHTML = html;
    alertBox.hidden = false;
    alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
  };

  const escapeHtml = s => String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));

  form.addEventListener('submit', async e => {
    e.preventDefault();
    alertBox.hidden = true;

    if (!form.checkValidity()) {
      showAlert('error', '<strong>Revisá los datos:</strong> completá nombre, un email válido y tu mensaje.');
      return;
    }

    btn.disabled = true;
    btn.textContent = 'Enviando…';

    try {
      const res = await fetch('contact.php', { method: 'POST', body: new FormData(form) });
      const data = await res.json();

      if (data.success) {
        showAlert('success', '<strong>¡Mensaje enviado!</strong> Te vamos a responder a la brevedad.');
        form.reset();
      } else {
        let msg = escapeHtml(data.message || 'No se pudo enviar el mensaje.');
        if (Array.isArray(data.errors) && data.errors.length) {
          msg += '<ul>' + data.errors.map(err => `<li>${escapeHtml(err)}</li>`).join('') + '</ul>';
        }
        showAlert('error', `<strong>Error:</strong> ${msg}`);
      }
    } catch (err) {
      showAlert('error', '<strong>Error:</strong> hubo un problema al enviar el mensaje. Probá de nuevo o escribinos por WhatsApp.');
    } finally {
      btn.disabled = false;
      btn.textContent = 'Enviar mensaje';
    }
  });
}
