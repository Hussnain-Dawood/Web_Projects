/* =========================================
   TECHHUB ELECTRONICS – MAIN JAVASCRIPT
   ========================================= */

document.addEventListener('DOMContentLoaded', () => {

  /* ---- NAVBAR SCROLL EFFECT ---- */
  const nav = document.getElementById('mainNav');
  if (nav) {
    window.addEventListener('scroll', () => {
      nav.classList.toggle('scrolled', window.scrollY > 50);
    });
  }

  /* ---- ACTIVE NAV LINKS ON SCROLL ---- */
  const sections = document.querySelectorAll('[id]');
  const filterLinks = document.querySelectorAll('.filter-item');
  if (filterLinks.length) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          filterLinks.forEach(l => l.classList.remove('active'));
          const link = document.querySelector(`.filter-item[href="#${e.target.id}"]`);
          if (link) link.classList.add('active');
        }
      });
    }, { threshold: 0.3, rootMargin: '-80px 0px -60% 0px' });
    sections.forEach(s => observer.observe(s));
  }

  /* ---- PRODUCT QTY ---- */
  const qtyMinus = document.getElementById('qtyMinus');
  const qtyPlus = document.getElementById('qtyPlus');
  const qtyInput = document.getElementById('qtyInput');

  if (qtyMinus && qtyPlus && qtyInput) {
    qtyMinus.addEventListener('click', () => {
      let v = parseInt(qtyInput.value);
      if (v > 1) qtyInput.value = v - 1;
    });
    qtyPlus.addEventListener('click', () => {
      qtyInput.value = parseInt(qtyInput.value) + 1;
    });
  }

  /* ---- PRODUCT THUMBNAILS ---- */
  document.querySelectorAll('.product-thumb').forEach(thumb => {
    thumb.addEventListener('click', () => {
      document.querySelectorAll('.product-thumb').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
    });
  });

  /* ---- VARIANT BUTTONS ---- */
  document.querySelectorAll('.variant-btns').forEach(group => {
    group.querySelectorAll('.variant-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        group.querySelectorAll('.variant-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });
  });

  /* ---- VIEW TOGGLE (grid/list) ---- */
  const gridBtn = document.getElementById('gridBtn');
  const listBtn = document.getElementById('listBtn');
  if (gridBtn && listBtn) {
    gridBtn.addEventListener('click', () => {
      gridBtn.classList.add('active');
      listBtn.classList.remove('active');
    });
    listBtn.addEventListener('click', () => {
      listBtn.classList.add('active');
      gridBtn.classList.remove('active');
    });
  }

  /* ---- FILTER ITEMS ---- */
  document.querySelectorAll('.filter-item').forEach(item => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      document.querySelectorAll('.filter-item').forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      const target = item.getAttribute('href');
      if (target && document.querySelector(target)) {
        const el = document.querySelector(target);
        window.scrollTo({ top: el.offsetTop - 100, behavior: 'smooth' });
      }
    });
  });

  /* ---- STORE FINDER ---- */
  const findStoreBtn = document.getElementById('findStoreBtn');
  const postcodeInput = document.getElementById('postcodeInput');
  if (findStoreBtn && postcodeInput) {
    findStoreBtn.addEventListener('click', () => {
      const val = postcodeInput.value.trim();
      if (!val) {
        postcodeInput.style.borderColor = '#ff4444';
        setTimeout(() => postcodeInput.style.borderColor = '', 1500);
        return;
      }
      findStoreBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Searching…';
      setTimeout(() => {
        findStoreBtn.innerHTML = 'Find Stores';
      }, 1200);
    });
  }

  /* ---- NEWSLETTER FORM ---- */
  const newsletterForms = document.querySelectorAll('.newsletter-form');
  newsletterForms.forEach(form => {
    const btn = form.querySelector('button');
    const input = form.querySelector('input');
    if (btn && input) {
      btn.addEventListener('click', () => {
        const email = input.value.trim();
        if (!email || !email.includes('@')) {
          input.style.borderColor = '#ff4444';
          setTimeout(() => input.style.borderColor = '', 1500);
          return;
        }
        btn.innerHTML = '<i class="bi bi-check-circle me-1"></i>Subscribed!';
        btn.style.background = '#00c864';
        input.value = '';
        setTimeout(() => {
          btn.innerHTML = 'Subscribe <i class="bi bi-send ms-1"></i>';
          btn.style.background = '';
        }, 3000);
      });
    }
  });

  /* ---- ADD TO CART ANIMATION ---- */
  document.querySelectorAll('.btn-primary-custom').forEach(btn => {
    if (btn.textContent.includes('Add to Cart')) {
      btn.addEventListener('click', () => {
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="bi bi-check-circle me-1"></i>Added!';
        btn.style.background = '#00c864';
        const badge = document.querySelector('.cart-badge');
        if (badge) {
          const num = parseInt(badge.textContent) + 1;
          badge.textContent = num;
          badge.style.transform = 'scale(1.4)';
          setTimeout(() => badge.style.transform = '', 300);
        }
        setTimeout(() => {
          btn.innerHTML = orig;
          btn.style.background = '';
        }, 2000);
      });
    }
  });

  /* ---- TOAST NOTIFICATION ---- */
  window.showToast = (msg, type = 'success') => {
    const colors = { success: '#00c864', error: '#ff4444', info: 'var(--th-accent)' };
    const toast = document.createElement('div');
    toast.style.cssText = `
      position:fixed; bottom:24px; right:24px; z-index:9999;
      background:${colors[type] || colors.success};
      color:#fff; border-radius:10px; padding:12px 20px;
      font-size:14px; font-weight:500; box-shadow:0 4px 20px rgba(0,0,0,.4);
      animation: slideInRight .3s ease;
    `;
    toast.innerHTML = `<i class="bi bi-check-circle me-2"></i>${msg}`;
    document.body.appendChild(toast);
    setTimeout(() => {
      toast.style.animation = 'fadeOut .3s ease forwards';
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  };

});

/* =========================================
   TRY BEFORE YOU BUY – MULTI STEP FORM
   ========================================= */
function nextStep(step) {
  const steps = [1, 2, 3];
  steps.forEach(s => {
    const el = document.getElementById(`bookStep${s}`);
    if (el) el.style.display = 'none';
    const ind = document.getElementById(`step-ind-${s}`);
    if (ind) {
      ind.classList.remove('active', 'done');
      if (s < step) ind.classList.add('done');
    }
  });

  const current = document.getElementById(`bookStep${step}`);
  if (current) {
    current.style.display = 'block';
    current.style.animation = 'fadeUp .3s ease';
  }
  const ind = document.getElementById(`step-ind-${step}`);
  if (ind) ind.classList.add('active');
}

function selectDemoProduct(el) {
  document.querySelectorAll('.demo-product-select').forEach(d => d.classList.remove('active'));
  el.classList.add('active');
}

function selectTime(el) {
  document.querySelectorAll('.time-slot').forEach(t => {
    if (!t.disabled) t.classList.remove('active');
  });
  el.classList.add('active');
}

function confirmBooking() {
  const steps = [1, 2, 3];
  steps.forEach(s => {
    const el = document.getElementById(`bookStep${s}`);
    if (el) el.style.display = 'none';
    const ind = document.getElementById(`step-ind-${s}`);
    if (ind) ind.classList.add('done');
  });
  const confirm = document.getElementById('bookConfirm');
  if (confirm) {
    confirm.style.display = 'block';
    confirm.style.animation = 'fadeUp .4s ease';
  }
}

/* =========================================
   CHECKOUT – MULTI STEP
   ========================================= */
function nextCheckout(step) {
  const totalSteps = 4;
  for (let i = 1; i <= totalSteps; i++) {
    const el = document.getElementById(`checkoutStep${i}`);
    if (el) el.style.display = 'none';
    const cs = document.getElementById(`cs${i}`);
    if (cs) {
      cs.classList.remove('active', 'done');
      if (i < step) cs.classList.add('done');
    }
  }

  const current = document.getElementById(`checkoutStep${step}`);
  if (current) {
    current.style.display = 'block';
    current.style.animation = 'fadeUp .3s ease';
    window.scrollTo({ top: current.offsetTop - 120, behavior: 'smooth' });
  }
  const cs = document.getElementById(`cs${step}`);
  if (cs) cs.classList.add('active');
}

/* ---- DELIVERY TYPE TOGGLE ---- */
function selectDelivery(el, type) {
  document.querySelectorAll('.delivery-type-card').forEach(c => {
    c.classList.remove('active');
    c.querySelector('.dt-radio').innerHTML = '<i class="bi bi-circle"></i>';
  });
  el.classList.add('active');
  el.querySelector('.dt-radio').innerHTML = '<i class="bi bi-check-circle-fill"></i>';

  const homeForm = document.getElementById('homeDeliveryForm');
  const ccForm = document.getElementById('ccPickupForm');
  if (homeForm) homeForm.style.display = type === 'home' ? 'block' : 'none';
  if (ccForm) ccForm.style.display = type === 'cc' ? 'block' : 'none';
}

function selectSpeed(el) {
  document.querySelectorAll('.delivery-speed-card').forEach(c => {
    c.classList.remove('active');
    c.querySelector('.ds-check').innerHTML = '<i class="bi bi-circle"></i>';
  });
  el.classList.add('active');
  el.querySelector('.ds-check').innerHTML = '<i class="bi bi-check-circle-fill"></i>';
}

function selectPayment(el, type) {
  document.querySelectorAll('.payment-method-tab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
}

/* ---- CART FUNCTIONS ---- */
function updateQty(btn, delta) {
  const input = btn.parentElement.querySelector('.qty-input');
  const newVal = Math.max(1, parseInt(input.value) + delta);
  input.value = newVal;
}

function removeCartItem(btn) {
  const item = btn.closest('.cart-item');
  item.style.animation = 'fadeOut .3s ease forwards';
  setTimeout(() => item.remove(), 300);
}

function applyPromo() {
  const input = document.getElementById('promoInput');
  const msg = document.getElementById('promoMsg');
  if (!input || !msg) return;
  const code = input.value.trim().toUpperCase();
  if (code === 'TECHHUB10') {
    msg.innerHTML = '<span style="color:#00c864"><i class="bi bi-check-circle me-1"></i>Promo applied! 10% discount added.</span>';
    const discount = document.getElementById('promoDiscount');
    if (discount) discount.textContent = '-$314.60';
  } else if (code === '') {
    msg.innerHTML = '<span style="color:#ff4444">Please enter a promo code.</span>';
  } else {
    msg.innerHTML = '<span style="color:#ff4444"><i class="bi bi-x-circle me-1"></i>Invalid promo code. Try TECHHUB10.</span>';
  }
}

/* ---- STORE SELECTOR (click-collect page) ---- */
function selectStore(el) {
  document.querySelectorAll('.store-item').forEach(s => s.classList.remove('active'));
  el.classList.add('active');
  const name = el.querySelector('strong').textContent;
  const card = document.getElementById('selectedStoreCard');
  if (card) {
    card.querySelector('h5').textContent = name;
  }
}

/* ---- CSS ANIMATIONS (inject) ---- */
const style = document.createElement('style');
style.textContent = `
  @keyframes fadeOut { to { opacity:0; transform:translateY(10px); } }
  @keyframes slideInRight { from { transform:translateX(100%); opacity:0; } to { transform:none; opacity:1; } }
`;
document.head.appendChild(style);

/* =========================================
   COOKIE CONSENT BANNER
   ========================================= */
(function initCookieBanner() {
  const banner = document.getElementById('cookieBanner');
  if (!banner) return;

  // Hide immediately if consent already given
  const consent = localStorage.getItem('th_cookie_consent');
  if (consent) {
    banner.style.display = 'none';
    return;
  }

  // Adjust toast bottom position so they don't overlap the banner
  const bannerH = banner.offsetHeight || 60;
  document.documentElement.style.setProperty('--toast-bottom', (bannerH + 16) + 'px');
})();

function cookieAccept() {
  localStorage.setItem('th_cookie_consent', 'accepted');
  _hideCookieBanner();
  // Lightweight toast confirmation
  if (window.showToast) showToast('Cookie preferences saved. Thank you!', 'success');
}

function cookieDecline() {
  localStorage.setItem('th_cookie_consent', 'essential_only');
  _hideCookieBanner();
}

function _hideCookieBanner() {
  const banner = document.getElementById('cookieBanner');
  if (!banner) return;
  banner.style.transition = 'transform .35s ease, opacity .35s ease';
  banner.style.opacity = '0';
  banner.style.transform = 'translateY(100%)';
  setTimeout(() => banner.style.display = 'none', 380);
}


/* =========================================
   STORYBOOK PAGINATION LOGIC
========================================= */
let currentStoryPage = 0;
const totalStoryPages = 5;

function showStoryPage(index) {
  if (index < 0 || index >= totalStoryPages) return;
  currentStoryPage = index;

  // Update Pages
  document.querySelectorAll('.sb-story-page').forEach((page, i) => {
    page.classList.toggle('active', i === index);
  });

  // Update Tabs
  document.querySelectorAll('.sb-page-btn').forEach((btn, i) => {
    btn.classList.toggle('active', i === index);
  });

  // Update Indicator and Buttons
  const currentIndicator = document.getElementById('sbCurrentPage');
  if (currentIndicator) currentIndicator.textContent = index + 1;

  const backBtn = document.getElementById('sbBackBtn');
  const nextBtn = document.getElementById('sbNextBtn');

  if (backBtn) backBtn.disabled = (index === 0);
  if (nextBtn) nextBtn.disabled = (index === totalStoryPages - 1);

  // Scroll viewport to top if needed
  const viewport = document.querySelector('.sb-book-container');
  if (viewport && window.innerWidth < 992) {
    viewport.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
}

function nextStoryPage() {
  if (currentStoryPage < totalStoryPages - 1) {
    showStoryPage(currentStoryPage + 1);
  }
}

function prevStoryPage() {
  if (currentStoryPage > 0) {
    showStoryPage(currentStoryPage - 1);
  }
}

// Ensure the first page is active on load
document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('storyBook')) {
        showStoryPage(0);
    }
});

/* =========================================
   PERSONAL TECH ADVISOR – INTEREST BANNER
   ========================================= */
(function initInterestBanner() {
  var banner = document.getElementById('interestBanner');
  if (!banner) return;

  var shouldShow = localStorage.getItem('th_show_interest_banner') === 'true';
  var hasInterests = localStorage.getItem('th_interests');

  if (shouldShow && !hasInterests) {
    banner.style.display = 'block';
    setTimeout(function() {
      document.body.style.paddingTop = banner.offsetHeight + 'px';
    }, 50);
    // Personalise greeting with user name
    var nameEl = document.getElementById('interestBannerTitle');
    var name = localStorage.getItem('th_user_name');
    if (nameEl && name) {
      nameEl.textContent = 'Welcome, ' + name.split(' ')[0] + '! Set Up Your Personal Tech Advisor';
    }
  } else {
    banner.style.display = 'none';
  }

  // If interests already saved, show personalised pill in AI recs
  var pill = document.getElementById('aiRecsPersonalizedPill');
  var subtitle = document.getElementById('aiRecsSubtitle');
  var interests = JSON.parse(localStorage.getItem('th_interests') || '[]');
  if (pill && interests.length > 0) {
    pill.style.display = 'inline-flex';
    if (subtitle) subtitle.textContent = 'Personalised picks based on your tech interests: ' + interests.slice(0,3).join(', ') + (interests.length > 3 ? ' & more.' : '.');
  }

  // Update nav profile icon accent if logged in
  var navProfileBtn = document.getElementById('navProfileBtn');
  if (navProfileBtn && localStorage.getItem('th_logged_in') === 'true') {
    navProfileBtn.querySelector('i').classList.add('text-accent');
    navProfileBtn.setAttribute('href', 'profile.html');
  }
})();

function toggleBannerChip(el) {
  el.classList.toggle('selected');
}

function saveInterestBanner() {
  var selected = [];
  document.querySelectorAll('#bannerInterestChips .interest-chip.selected').forEach(function(c) {
    selected.push(c.dataset.id);
  });
  if (selected.length === 0) {
    var chips = document.getElementById('bannerInterestChips');
    chips.style.animation = 'none';
    chips.offsetHeight;
    chips.style.animation = 'shake 0.4s ease';
    setTimeout(function() { chips.style.animation = ''; }, 400);
    if (window.showToast) showToast('Please select at least one interest!', 'error');
    return;
  }
  localStorage.setItem('th_interests', JSON.stringify(selected));
  localStorage.removeItem('th_show_interest_banner');
  _hideInterestBanner();
  if (window.showToast) showToast('Interests saved! Your recommendations are now personalised.', 'success');
  // Reveal personalised pill
  var pill = document.getElementById('aiRecsPersonalizedPill');
  if (pill) pill.style.display = 'inline-flex';
  var subtitle = document.getElementById('aiRecsSubtitle');
  if (subtitle) subtitle.textContent = 'Personalised picks based on your tech interests: ' + selected.slice(0,3).join(', ') + (selected.length > 3 ? ' & more.' : '.');
}

function dismissInterestBanner() {
  localStorage.removeItem('th_show_interest_banner');
  _hideInterestBanner();
}

function _hideInterestBanner() {
  var banner = document.getElementById('interestBanner');
  if (!banner) return;
  banner.style.transition = 'transform .35s ease, opacity .35s ease';
  banner.style.opacity = '0';
  banner.style.transform = 'translateY(-100%)';
  document.body.style.paddingTop = '0';
  setTimeout(function() { banner.style.display = 'none'; }, 380);
}
