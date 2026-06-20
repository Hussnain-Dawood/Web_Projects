// js/main.js

document.addEventListener("DOMContentLoaded", () => {
  setupGlobalModalHandlers();
  setupNewsletterPopup();   // Home page popup (#1)
  setupSalePopup();         // Sale page popup (#2)
  setupAddToCartAlerts();   // Simple cart interactivity
});

/* ------------------------------
   Generic modal helpers
------------------------------ */

function openModal(id) {
  const modal = document.getElementById(id);
  if (!modal) return;
  modal.classList.add("modal--open");
  modal.setAttribute("aria-hidden", "false");
}

function closeModalElement(modal) {
  if (!modal) return;
  modal.classList.remove("modal--open");
  modal.setAttribute("aria-hidden", "true");

  // special flag for newsletter popup
  if (modal.id === "newsletter-modal") {
    try {
      localStorage.setItem("vvNewsletterShown", "yes");
    } catch (e) {
      // ignore storage errors
    }
  }
}

function setupGlobalModalHandlers() {
  // Close buttons & backdrop clicks
  document.addEventListener("click", (event) => {
    const closeTrigger = event.target.closest("[data-close-modal]");
    if (!closeTrigger) return;

    const modal = closeTrigger.closest(".modal");
    if (modal) {
      closeModalElement(modal);
    }
  });

  // ESC key se close
  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") return;

    const openModalEl = document.querySelector(".modal.modal--open");
    if (openModalEl) {
      closeModalElement(openModalEl);
    }
  });
}

/* ------------------------------
   Newsletter popup (Home page)
------------------------------ */

function setupNewsletterPopup() {
  const modal = document.getElementById("newsletter-modal");
  if (!modal) return; // not on this page

  let alreadyShown = false;
  try {
    alreadyShown = localStorage.getItem("vvNewsletterShown") === "yes";
  } catch (e) {
    alreadyShown = false;
  }

  if (!alreadyShown) {
    // 2.5 seconds baad show
    setTimeout(() => {
      openModal("newsletter-modal");
    }, 2500);
  }

  const ctaButton = document.getElementById("newsletter-modal-cta");
  if (ctaButton) {
    ctaButton.addEventListener("click", () => {
      alert("Thanks for joining the Vogue Vista style circle!");
      closeModalElement(modal);
    });
  }
}

/* ------------------------------
   Sale popup (Sale page)
------------------------------ */

function setupSalePopup() {
  const modal = document.getElementById("sale-modal");
  const detailsBtn = document.getElementById("view-sale-details");
  if (!modal || !detailsBtn) return; // only on sale page

  // Button click → open popup
  detailsBtn.addEventListener("click", () => {
    openModal("sale-modal");
  });

  // "Shop Sale Now" inside modal
  const shopBtn = document.getElementById("sale-modal-shop");
  if (shopBtn) {
    shopBtn.addEventListener("click", () => {
      alert("Sale details applied – browse the marked items below.");
      closeModalElement(modal);
      const productsSection = document.getElementById("sale-products");
      if (productsSection && productsSection.scrollIntoView) {
        productsSection.scrollIntoView({ behavior: "smooth" });
      }
    });
  }
}

/* ------------------------------
   Simple Add-to-Cart alerts
------------------------------ */

function setupAddToCartAlerts() {
  // global delegation: sale page + any other page with .btn-add-cart
  document.addEventListener("click", (event) => {
    const cartBtn = event.target.closest(".btn-add-cart");
    if (!cartBtn) return;

    alert("Item added to your bag (demo only – no real cart yet).");
  });
}
