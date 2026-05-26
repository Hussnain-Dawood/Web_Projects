/* =====================================================
   NextGen Robotics - Main JavaScript File
   Description: Navigation, scroll animations,
                form validation, counters, and
                interactive features
   ===================================================== */

/* ---------- Navigation Toggle (Mobile) ---------- */
const navToggle = document.querySelector('.nav-toggle');
const navLinks  = document.querySelector('.nav-links');

if (navToggle) {
  navToggle.addEventListener('click', function () {
    navLinks.classList.toggle('open');
  });
}

/* Close nav when a link is clicked on mobile */
document.querySelectorAll('.nav-links a').forEach(function (link) {
  link.addEventListener('click', function () {
    navLinks.classList.remove('open');
  });
});

/* ---------- Active Nav Link Highlight ---------- */
(function setActiveLink() {
  var currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-links a').forEach(function (a) {
    if (a.getAttribute('href') === currentPage) {
      a.classList.add('active');
    }
  });
})();

/* ---------- Scroll-Triggered Fade Animations ---------- */
function handleScrollAnimations() {
  var elements = document.querySelectorAll('.fade-up');
  elements.forEach(function (el) {
    var rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 80) {
      el.classList.add('visible');
    }
  });
}

window.addEventListener('scroll', handleScrollAnimations);
window.addEventListener('load', handleScrollAnimations);

/* ---------- Animated Counter (Stats Section) ---------- */
function animateCounter(el, target, duration) {
  var start = 0;
  var step  = target / (duration / 16);
  var timer = setInterval(function () {
    start += step;
    if (start >= target) {
      start = target;
      clearInterval(timer);
    }
    el.textContent = Math.floor(start).toLocaleString() + (el.dataset.suffix || '');
  }, 16);
}

/* Trigger counters when stats section enters viewport */
var statsTriggered = false;
function checkStats() {
  if (statsTriggered) return;
  var statsBar = document.querySelector('.stats-bar');
  if (!statsBar) return;
  var rect = statsBar.getBoundingClientRect();
  if (rect.top < window.innerHeight - 60) {
    statsTriggered = true;
    document.querySelectorAll('.stat-count').forEach(function (el) {
      var target = parseInt(el.dataset.target, 10);
      animateCounter(el, target, 1800);
    });
  }
}
window.addEventListener('scroll', checkStats);
window.addEventListener('load', checkStats);

/* ---------- Contact Form Validation ---------- */
var contactForm = document.getElementById('contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', function (e) {
    e.preventDefault();
    var valid = true;

    /* Clear previous errors */
    document.querySelectorAll('.form-error').forEach(function (err) {
      err.style.display = 'none';
    });

    /* Name validation */
    var nameField = document.getElementById('name');
    if (nameField && nameField.value.trim().length < 2) {
      document.getElementById('nameError').style.display = 'block';
      valid = false;
    }

    /* Email validation */
    var emailField = document.getElementById('email');
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailField && !emailPattern.test(emailField.value.trim())) {
      document.getElementById('emailError').style.display = 'block';
      valid = false;
    }

    /* Message validation */
    var msgField = document.getElementById('message');
    if (msgField && msgField.value.trim().length < 10) {
      document.getElementById('messageError').style.display = 'block';
      valid = false;
    }

    if (valid) {
      var successEl = document.getElementById('formSuccess');
      if (successEl) {
        successEl.style.display = 'block';
        contactForm.reset();
      }
    }
  });
}

/* ---------- Login Form Validation ---------- */
var loginForm = document.getElementById('loginForm');
if (loginForm) {
  loginForm.addEventListener('submit', function (e) {
    e.preventDefault();
    var valid = true;

    document.querySelectorAll('.form-error').forEach(function (err) {
      err.style.display = 'none';
    });

    var userField = document.getElementById('username');
    if (userField && userField.value.trim().length < 3) {
      document.getElementById('usernameError').style.display = 'block';
      valid = false;
    }

    var passField = document.getElementById('password');
    if (passField && passField.value.length < 6) {
      document.getElementById('passwordError').style.display = 'block';
      valid = false;
    }

    if (valid) {
      var loginSuccess = document.getElementById('loginSuccess');
      if (loginSuccess) { loginSuccess.style.display = 'block'; }
    }
  });
}

/* ---------- Tab Switcher (Industries Page) ---------- */
var tabBtns = document.querySelectorAll('.tab-btn');
var tabPanels = document.querySelectorAll('.tab-panel');

tabBtns.forEach(function (btn) {
  btn.addEventListener('click', function () {
    var target = btn.dataset.tab;

    tabBtns.forEach(function (b) { b.classList.remove('active'); });
    tabPanels.forEach(function (p) { p.classList.remove('active'); });

    btn.classList.add('active');
    var panel = document.getElementById(target);
    if (panel) { panel.classList.add('active'); }
  });
});

/* ---------- Newsletter Form (Footer / Contact) ---------- */
var newsletterForm = document.getElementById('newsletterForm');
if (newsletterForm) {
  newsletterForm.addEventListener('submit', function (e) {
    e.preventDefault();
    var emailInput = newsletterForm.querySelector('input[type="email"]');
    var successMsg = document.getElementById('newsletterSuccess');
    var pattern    = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput && pattern.test(emailInput.value.trim())) {
      if (successMsg) { successMsg.style.display = 'block'; }
      newsletterForm.reset();
    }
  });
}
