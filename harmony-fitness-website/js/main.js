/* ===========================================
   Harmony Fitness & Wellness Studio
   Main JavaScript File (main.js)
   =========================================== */

// ---- Sticky Header ----
const header = document.querySelector('header');
window.addEventListener('scroll', () => {
  if (window.scrollY > 60) header.classList.add('scrolled');
  else header.classList.remove('scrolled');
});

// ---- Hamburger Menu ----
const hamburger = document.getElementById('hamburger');
const navMenu   = document.getElementById('nav-menu');
if (hamburger && navMenu) {
  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    navMenu.classList.toggle('open');
  });
  // Close on nav link click
  navMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      hamburger.classList.remove('open');
      navMenu.classList.remove('open');
    });
  });
}

// ---- Active Nav Link ----
(function setActiveLink () {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('nav ul li a').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });
})();

// ---- Back to Top ----
const btt = document.getElementById('back-to-top');
if (btt) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) btt.classList.add('visible');
    else btt.classList.remove('visible');
  });
  btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
}

// ---- Cookie Consent Popup (Popup Window #1) ----
(function initCookieBanner() {
  const banner = document.getElementById('cookie-banner');
  const acceptBtn = document.getElementById('cookie-accept');
  const declineBtn = document.getElementById('cookie-decline');
  if (!banner) return;

  if (!localStorage.getItem('hf_cookies')) {
    setTimeout(() => banner.classList.add('show'), 1500);
  }

  if (acceptBtn) {
    acceptBtn.addEventListener('click', () => {
      localStorage.setItem('hf_cookies', 'accepted');
      banner.classList.remove('show');
    });
  }
  if (declineBtn) {
    declineBtn.addEventListener('click', () => {
      localStorage.setItem('hf_cookies', 'declined');
      banner.classList.remove('show');
    });
  }
})();

// ---- Newsletter Modal (Popup Window #2) ----
(function initNewsletterModal() {
  const modal  = document.getElementById('newsletter-modal');
  const closeBtn = document.getElementById('modal-close');
  const openBtn  = document.getElementById('open-newsletter');
  if (!modal) return;

  if (openBtn) {
    openBtn.addEventListener('click', (e) => {
      e.preventDefault();
      modal.classList.add('active');
    });
  }

  // Auto-open on home page if not subscribed
  if (document.body.dataset.page === 'home' && !localStorage.getItem('hf_subscribed')) {
    setTimeout(() => modal.classList.add('active'), 5000);
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', () => modal.classList.remove('active'));
  }
  modal.addEventListener('click', (e) => {
    if (e.target === modal) modal.classList.remove('active');
  });

  const nlForm = document.getElementById('newsletter-form');
  if (nlForm) {
    nlForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const email = nlForm.querySelector('input[type="email"]').value;
      if (email) {
        localStorage.setItem('hf_subscribed', '1');
        // Alert Box (Requirement)
        alert('🎉 Welcome to Harmony Fitness!\n\nYou\'ve successfully subscribed to our newsletter.\nExpect weekly wellness tips, class updates, and exclusive offers!');
        modal.classList.remove('active');
      }
    });
  }
})();

// ---- Contact Form Validation ----
(function initContactForm() {
  const form = document.getElementById('contact-form');
  if (!form) return;

  function validateField(field, errorMsg) {
    const wrapper = field.closest('.form-group');
    const errEl   = wrapper ? wrapper.querySelector('.error-msg') : null;
    if (!field.value.trim()) {
      wrapper && wrapper.classList.add('field-error');
      if (errEl) errEl.textContent = errorMsg || 'This field is required.';
      return false;
    }
    wrapper && wrapper.classList.remove('field-error');
    return true;
  }

  function validateEmail(field) {
    const wrapper = field.closest('.form-group');
    const errEl   = wrapper ? wrapper.querySelector('.error-msg') : null;
    const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRx.test(field.value.trim())) {
      wrapper && wrapper.classList.add('field-error');
      if (errEl) errEl.textContent = 'Please enter a valid email address.';
      return false;
    }
    wrapper && wrapper.classList.remove('field-error');
    return true;
  }

  function validatePhone(field) {
    const wrapper = field.closest('.form-group');
    const errEl   = wrapper ? wrapper.querySelector('.error-msg') : null;
    const phoneRx = /^[+\d\s\-()]{7,15}$/;
    if (field.value.trim() && !phoneRx.test(field.value.trim())) {
      wrapper && wrapper.classList.add('field-error');
      if (errEl) errEl.textContent = 'Please enter a valid phone number.';
      return false;
    }
    wrapper && wrapper.classList.remove('field-error');
    return true;
  }

  // Live validation
  form.querySelectorAll('input, textarea, select').forEach(field => {
    field.addEventListener('blur', () => {
      const wrapper = field.closest('.form-group');
      if (field.type === 'email') validateEmail(field);
      else if (field.type === 'tel') validatePhone(field);
      else if (field.required) validateField(field, 'This field is required.');
      else field.closest('.form-group') && field.closest('.form-group').classList.remove('field-error');
    });
  });

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let valid = true;

    const nameField    = form.querySelector('#cf-name');
    const emailField   = form.querySelector('#cf-email');
    const phoneField   = form.querySelector('#cf-phone');
    const subjectField = form.querySelector('#cf-subject');
    const msgField     = form.querySelector('#cf-message');

    if (nameField    && !validateField(nameField, 'Please enter your full name.'))    valid = false;
    if (emailField   && !validateEmail(emailField))                                    valid = false;
    if (phoneField   && !validatePhone(phoneField))                                    valid = false;
    if (subjectField && !validateField(subjectField, 'Please select a subject.'))      valid = false;
    if (msgField     && !validateField(msgField, 'Please enter your message.'))        valid = false;

    if (valid) {
      // Success popup (JS Popup Window using confirm)
      const proceed = confirm(' Your message is ready to send!\n\nName: ' + (nameField ? nameField.value : '') + '\nEmail: ' + (emailField ? emailField.value : '') + '\n\nClick OK to confirm submission.');
      if (proceed) {
        document.getElementById('form-success') && (document.getElementById('form-success').style.display = 'block');
        form.reset();
        form.style.display = 'none';
      }
    }
  });
})();

// ---- Membership Plan Popup ----
document.querySelectorAll('.plan-btn').forEach(btn => {
  btn.addEventListener('click', function () {
    const plan = this.dataset.plan || 'our plan';
    const price = this.dataset.price || '';
    const msg = confirm(` Join Harmony Fitness – ${plan} ${price ? '($' + price + '/mo)' : ''}\n\nYou're about to start your fitness journey!\n\nClick OK to proceed to registration, or Cancel to go back.`);
    if (msg) {
      window.location.href = 'membership.html#register';
    }
  });
});

// ---- Gallery Lightbox ----
(function initGallery() {
  const overlay  = document.getElementById('lightbox-overlay');
  const lbImg    = document.getElementById('lightbox-img');
  const lbClose  = document.getElementById('lightbox-close');
  if (!overlay) return;

  document.querySelectorAll('.gallery-item img').forEach(img => {
    img.parentElement.addEventListener('click', () => {
      lbImg.src = img.src;
      lbImg.alt = img.alt;
      overlay.classList.add('active');
    });
  });

  if (lbClose) lbClose.addEventListener('click', () => overlay.classList.remove('active'));
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) overlay.classList.remove('active');
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') overlay.classList.remove('active');
  });
})();

// ---- Scroll Fade-In Animation ----
(function initScrollReveal() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
})();

// ---- Counter Animation ----
(function initCounters() {
  const counters = document.querySelectorAll('.counter');
  if (!counters.length) return;
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const el     = entry.target;
      const target = parseInt(el.dataset.target, 10);
      const dur    = 1600;
      const step   = Math.ceil(target / (dur / 16));
      let current  = 0;
      const timer  = setInterval(() => {
        current += step;
        if (current >= target) { current = target; clearInterval(timer); }
        el.textContent = current.toLocaleString();
      }, 16);
      observer.unobserve(el);
    });
  }, { threshold: 0.4 });
  counters.forEach(c => observer.observe(c));
})();

// ---- Schedule Filter ----
(function initScheduleFilter() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  filterBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');
      const filter = this.dataset.filter;
      document.querySelectorAll('.schedule-row').forEach(row => {
        if (filter === 'all' || row.dataset.category === filter) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  });
})();

// ---- Accordion / FAQ ----
(function initAccordion() {
  document.querySelectorAll('.accordion-item').forEach(item => {
    const btn   = item.querySelector('.accordion-btn');
    const panel = item.querySelector('.accordion-panel');
    if (!btn || !panel) return;
    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.accordion-item').forEach(i => {
        i.classList.remove('open');
        const p = i.querySelector('.accordion-panel');
        if (p) p.style.maxHeight = '0';
      });
      if (!isOpen) {
        item.classList.add('open');
        panel.style.maxHeight = panel.scrollHeight + 'px';
      }
    });
  });
})();

// ---- Extra Nav / Auth Logic ----
(function initAuthLogic() {
  const extraNavs = document.querySelectorAll('.nav-extra-menu');
  extraNavs.forEach(menu => {
    const btn = menu.querySelector('.extra-hamburger');
    if(btn) {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        menu.classList.toggle('open');
      });
    }
  });
  document.addEventListener('click', () => {
    extraNavs.forEach(menu => menu.classList.remove('open'));
  });

  const isSignedIn = localStorage.getItem('hf_user_signed_in') === 'true';
  const authOuts = document.querySelectorAll('.auth-out');
  const authIns = document.querySelectorAll('.auth-in');

  if (isSignedIn) {
    authOuts.forEach(el => el.style.display = 'none');
    authIns.forEach(el => el.style.display = 'block');
  } else {
    authOuts.forEach(el => el.style.display = 'block');
    authIns.forEach(el => el.style.display = 'none');
  }

  const logoutBtns = document.querySelectorAll('.logout-btn');
  logoutBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      localStorage.setItem('hf_user_signed_in', 'false');
      alert('You have successfully logged out.');
      window.location.reload();
    });
  });
})();
