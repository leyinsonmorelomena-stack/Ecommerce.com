"use strict";

/* ==========================================================
  Deshabilitar envío si hay campos inválidos (Bootstrap)
========================================================== */
(function () {
  window.addEventListener("load", function () {
    const forms = document.getElementsByClassName("needs-validation");
    Array.prototype.forEach.call(forms, function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add("was-validated");
        },
        false
      );
    });
  });
})();

/* ==========================================================
  Expresiones Regulares
========================================================== */
const EMAIL_REGEX =
  /^(?=.{1,254}$)(?=.{1,64}@)[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,63}$/;
const TEXTO_REGEX = /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$/;
const PASSWORD_REGEX = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

/* ==========================================================
  🔥 Validar campos en tiempo real (versión avanzada)
========================================================== */
function validarJs(event, tipoValidacion) {
  const input = event.target;
  const valor = (input.value || "").trim();
  const contenedor =
    input.closest(".form-group, .mb-3, .form-floating, div") ||
    input.parentElement;
  const feedback = contenedor
    ? contenedor.querySelector(".invalid-feedback")
    : null;

  contenedor.classList.add("was-validated");

  // ------------------------------------
  // VALIDAR EMAIL
  // ------------------------------------
  if (tipoValidacion === "email") {
    const patron = EMAIL_REGEX;
    const mensaje = "El correo electrónico está mal escrito.";

    if (!patron.test(valor)) {
      input.setCustomValidity("no valido");
      if (feedback) feedback.textContent = mensaje;
    } else {
      input.setCustomValidity("");
      if (feedback) feedback.textContent = "";
    }
    input.reportValidity();
  }

  // ------------------------------------
  // VALIDAR CONTRASEÑA DINÁMICAMENTE
  // ------------------------------------
  if (tipoValidacion === "password") {
    const requisitos = document.getElementById("password-requisitos");
    const progressBar = document.getElementById("password-strength-bar");
    const progressText = document.getElementById("password-strength-text");

    const condiciones = [
      { cumple: valor.length >= 8, texto: "Mínimo 8 caracteres" },
      { cumple: /[A-Z]/.test(valor), texto: "Mínimo 1 mayúscula" },
      { cumple: /[a-z]/.test(valor), texto: "Mínimo 1 minúscula" },
      { cumple: /\d/.test(valor), texto: "Mínimo 1 número" },
      { cumple: /[@#!\-*]/.test(valor), texto: "Mínimo 1 carácter especial (@#!-*)" },
    ];

    const cumplidas = condiciones.filter(c => c.cumple).length;

    // Mostrar solo las que faltan (❌)
    requisitos.innerHTML = condiciones
      .filter(c => !c.cumple)
      .map(c => `<li>❌ ${c.texto}</li>`)
      .join("");

    // Progreso
    const porcentaje = (cumplidas / condiciones.length) * 100;
    progressBar.style.width = porcentaje + "%";
    progressBar.style.transition = "width 0.3s ease";

    if (cumplidas <= 2) {
      progressBar.className = "progress-bar bg-danger";
      progressText.textContent = "Débil";
      progressText.style.color = "red";
    } else if (cumplidas <= 4) {
      progressBar.className = "progress-bar bg-warning";
      progressText.textContent = "Media";
      progressText.style.color = "#d39e00";
    } else {
      progressBar.className = "progress-bar bg-success";
      progressText.textContent = "Fuerte";
      progressText.style.color = "green";
    }

    // Resultado final
    if (cumplidas === 5) {
      input.setCustomValidity("");
      input.classList.add("is-valid");
      input.classList.remove("is-invalid");
      if (feedback) feedback.textContent = "";
      requisitos.style.display = "none";
    } else {
      input.setCustomValidity("no valido");
      input.classList.add("is-invalid");
      input.classList.remove("is-valid");
      if (feedback)
        feedback.textContent = "La contraseña no cumple con los requisitos.";
      requisitos.style.display = "block";
    }
  }
}

/* ==========================================================
  Recordar email en el login
========================================================== */
function recordarEmail(event) {
  const emailInput = document.querySelector('[name="emailAdmin"]');
  const rememberCheckbox = event?.target;
  if (!emailInput || !rememberCheckbox) return;

  const email = (emailInput.value || "").trim();

  if (rememberCheckbox.checked) {
    if (EMAIL_REGEX.test(email)) {
      localStorage.setItem("emailAdmin", email);
      localStorage.setItem("checked", "true");
    } else {
      rememberCheckbox.checked = false;
      localStorage.removeItem("emailAdmin");
      localStorage.removeItem("checked");
      emailInput.setCustomValidity("Correo inválido");
      if (emailInput.form) emailInput.form.classList.add("was-validated");
    }
  } else {
    localStorage.removeItem("emailAdmin");
    localStorage.removeItem("checked");
  }
}

/* ==========================================================
  Recuperar email en el login
========================================================== */
function getEmail() {
  const emailInput = document.querySelector('[name="emailAdmin"]');
  const rememberCheckbox = document.querySelector("#remember");
  if (!emailInput || !rememberCheckbox) return;

  const emailStored = localStorage.getItem("emailAdmin");
  const rememberState = localStorage.getItem("checked") === "true";

  if (emailStored) emailInput.value = emailStored;
  rememberCheckbox.checked = rememberState;

  emailInput.addEventListener("input", (e) => validarJs(e, "email"));
  emailInput.addEventListener("blur", (e) => validarJs(e, "email"));

  emailInput.addEventListener("input", () => {
    const v = (emailInput.value || "").trim();
    if (rememberCheckbox.checked && EMAIL_REGEX.test(v)) {
      localStorage.setItem("emailAdmin", v);
    }
  });

  rememberCheckbox.addEventListener("change", recordarEmail);
}

/* ==========================================================
  Ejecutar al cargar DOM
========================================================== */
document.addEventListener("DOMContentLoaded", getEmail);
