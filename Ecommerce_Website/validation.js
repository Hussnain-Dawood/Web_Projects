// js/validation.js

document.addEventListener("DOMContentLoaded", () => {
  setupContactFormValidation();
  setupLoginFormValidation();
  setupSignupFormValidation();
});

/* ------------------------------
   Shared utilities
------------------------------ */

function setFieldError(input, message) {
  if (!input) return;
  const errorSpan = document.getElementById(input.id + "-error");

  // Add error class
  input.classList.remove("input-success");
  input.classList.add("input-error");

  if (errorSpan) {
    errorSpan.textContent = message || "";
  }
}

function clearFieldError(input) {
  if (!input) return;
  const errorSpan = document.getElementById(input.id + "-error");

  input.classList.remove("input-error");

  if (errorSpan) {
    errorSpan.textContent = "";
  }
}

function markFieldSuccess(input) {
  if (!input) return;
  input.classList.remove("input-error");
  input.classList.add("input-success");

  const errorSpan = document.getElementById(input.id + "-error");
  if (errorSpan) {
    errorSpan.textContent = "";
  }
}

function isValidEmail(email) {
  const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return pattern.test(String(email).toLowerCase());
}

/* ------------------------------
   1) Contact form validation
------------------------------ */

function setupContactFormValidation() {
  const form = document.getElementById("contact-form");
  if (!form) return;

  const nameInput = document.getElementById("contact-name");
  const emailInput = document.getElementById("contact-email");
  const subjectInput = document.getElementById("contact-subject");
  const messageInput = document.getElementById("contact-message");

  // Live clear on input
  [nameInput, emailInput, subjectInput, messageInput].forEach((input) => {
    if (!input) return;
    input.addEventListener("input", () => clearFieldError(input));
  });

  form.addEventListener("submit", (event) => {
    let isValid = true;

    // Name required
    if (!nameInput || nameInput.value.trim() === "") {
      setFieldError(nameInput, "Please enter your name.");
      isValid = false;
    } else {
      markFieldSuccess(nameInput);
    }

    // Email required + format
    if (!emailInput || emailInput.value.trim() === "") {
      setFieldError(emailInput, "Please enter your email.");
      isValid = false;
    } else if (!isValidEmail(emailInput.value)) {
      setFieldError(emailInput, "Please enter a valid email address.");
      isValid = false;
    } else {
      markFieldSuccess(emailInput);
    }

    // Subject required
    if (!subjectInput || subjectInput.value.trim() === "") {
      setFieldError(subjectInput, "Please enter a subject.");
      isValid = false;
    } else {
      markFieldSuccess(subjectInput);
    }

    // Message required + minimum length
    if (!messageInput || messageInput.value.trim() === "") {
      setFieldError(messageInput, "Please enter your message.");
      isValid = false;
    } else if (messageInput.value.trim().length < 10) {
      setFieldError(
        messageInput,
        "Please provide a little more detail (at least 10 characters)."
      );
      isValid = false;
    } else {
      markFieldSuccess(messageInput);
    }

    if (!isValid) {
      event.preventDefault();
      return;
    }

    // Optional: show confirmation alert (AT3 requirement: 1 alert)
    alert("Thank you for contacting Vogue Vista! We’ll get back to you shortly.");
  });
}

/* ------------------------------
   2) Login form validation
------------------------------ */

function setupLoginFormValidation() {
  const form = document.getElementById("login-form");
  if (!form) return;

  const emailInput = document.getElementById("login-email");
  const passwordInput = document.getElementById("login-password");

  [emailInput, passwordInput].forEach((input) => {
    if (!input) return;
    input.addEventListener("input", () => clearFieldError(input));
  });

  form.addEventListener("submit", (event) => {
    let isValid = true;

    // Email required
    if (!emailInput || emailInput.value.trim() === "") {
      setFieldError(emailInput, "Please enter your email.");
      isValid = false;
    } else if (!isValidEmail(emailInput.value)) {
      setFieldError(emailInput, "Please enter a valid email address.");
      isValid = false;
    } else {
      markFieldSuccess(emailInput);
    }

    // Password required
    if (!passwordInput || passwordInput.value.trim() === "") {
      setFieldError(passwordInput, "Please enter your password.");
      isValid = false;
    } else if (passwordInput.value.length < 6) {
      setFieldError(
        passwordInput,
        "Password must be at least 6 characters long."
      );
      isValid = false;
    } else {
      markFieldSuccess(passwordInput);
    }

    if (!isValid) {
      event.preventDefault();
    }
  });
}

/* ------------------------------
   3) Signup form validation
------------------------------ */

function setupSignupFormValidation() {
  const form = document.getElementById("signup-form");
  if (!form) return;

  const nameInput = document.getElementById("signup-name");
  const emailInput = document.getElementById("signup-email");
  const passwordInput = document.getElementById("signup-password");
  const confirmInput = document.getElementById("signup-confirm");
  const termsCheckbox = document.getElementById("signup-terms");

  [nameInput, emailInput, passwordInput, confirmInput].forEach((input) => {
    if (!input) return;
    input.addEventListener("input", () => clearFieldError(input));
  });

  if (termsCheckbox) {
    termsCheckbox.addEventListener("change", () =>
      clearFieldError(termsCheckbox)
    );
  }

  form.addEventListener("submit", (event) => {
    let isValid = true;

    // Name required
    if (!nameInput || nameInput.value.trim() === "") {
      setFieldError(nameInput, "Please enter your full name.");
      isValid = false;
    } else {
      markFieldSuccess(nameInput);
    }

    // Email required + format
    if (!emailInput || emailInput.value.trim() === "") {
      setFieldError(emailInput, "Please enter your email.");
      isValid = false;
    } else if (!isValidEmail(emailInput.value)) {
      setFieldError(emailInput, "Please enter a valid email address.");
      isValid = false;
    } else {
      markFieldSuccess(emailInput);
    }

    // Password rules
    if (!passwordInput || passwordInput.value.trim() === "") {
      setFieldError(passwordInput, "Please create a password.");
      isValid = false;
    } else if (passwordInput.value.length < 6) {
      setFieldError(
        passwordInput,
        "Password must be at least 6 characters long."
      );
      isValid = false;
    } else {
      markFieldSuccess(passwordInput);
    }

    // Confirm password
    if (!confirmInput || confirmInput.value.trim() === "") {
      setFieldError(confirmInput, "Please confirm your password.");
      isValid = false;
    } else if (passwordInput && confirmInput.value !== passwordInput.value) {
      setFieldError(confirmInput, "Passwords do not match.");
      isValid = false;
    } else {
      markFieldSuccess(confirmInput);
    }

    // Terms checkbox
    if (termsCheckbox && !termsCheckbox.checked) {
      setFieldError(termsCheckbox, "You must agree to the terms to continue.");
      isValid = false;
    }

    if (!isValid) {
      event.preventDefault();
      return;
    }

    // Optional: simple success alert (you can replace with redirect)
    alert("Your Vogue Vista account has been created successfully!");
  });
}
