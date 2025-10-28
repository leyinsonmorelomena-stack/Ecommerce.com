/*-------------------------------------------------
    SCRIPT PARA VALIDACIÓN DE BOOTSTRAP (4-5)
-------------------------------------------------*/

// Deshabilitar envío si hay campos inválidos
(function() {
  'use strict';
  window.addEventListener('load', function() {
    const forms = document.getElementsByClassName('needs-validation');
    Array.prototype.forEach.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

/*------------------------------------------------------
                Validar campos en tiempo real
------------------------------------------------------*/
function validarJs(campo, tipoValidacion) {
  const input = campo.target;
  const valor = input.value.trim();
  const contenedor = $(input).closest('.form-group, .mb-3');
  const feedback = contenedor.find('.invalid-feedback');
  contenedor.addClass("was-validated");

  // ------------------------------------
  // VALIDAR EMAIL
  // ------------------------------------
  if (tipoValidacion === "email") {
    const patron = /^(?=.{1,254}$)(?=.{1,64}@)[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+[A-Za-z]{2,}$/;
    const mensaje = "El correo electrónico está mal escrito.";

    if (!patron.test(valor)) {
      input.setCustomValidity("no valido");
      feedback.text(mensaje);
    } else {
      input.setCustomValidity("");
      feedback.text("");
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

    // Condiciones
    const condiciones = [
      { id: "length", cumple: valor.length >= 8, texto: "Mínimo 8 caracteres" },
      { id: "mayus", cumple: /[A-Z]/.test(valor), texto: "Mínimo 1 mayúscula" },
      { id: "minus", cumple: /[a-z]/.test(valor), texto: "Mínimo 1 minúscula" },
      { id: "num", cumple: /\d/.test(valor), texto: "Mínimo 1 número" },
      { id: "especial", cumple: /[@#!\-*]/.test(valor), texto: "Mínimo 1 carácter especial (@#!-*)" },
    ];

    // Contar cuántas cumple
    const cumplidas = condiciones.filter(c => c.cumple).length;

    // Actualizar lista de requisitos (borrar los cumplidos)
    requisitos.innerHTML = condiciones
      .filter(c => !c.cumple)
      .map(c => `<li>❌ ${c.texto}</li>`)
      .join("");

    // Actualizar barra y texto
    const porcentaje = (cumplidas / condiciones.length) * 100;
    progressBar.style.width = porcentaje + "%";
    progressBar.style.transition = "width 0.3s ease";

    if (cumplidas <= 2) {
      progressBar.className = "progress-bar bg-danger";
      progressText.textContent = "Débil";
      progressText.style.color = "red";
    } else if (cumplidas === 3 || cumplidas === 4) {
      progressBar.className = "progress-bar bg-warning";
      progressText.textContent = "Media";
      progressText.style.color = "#d39e00";
    } else if (cumplidas === 5) {
      progressBar.className = "progress-bar bg-success";
      progressText.textContent = "Fuerte";
      progressText.style.color = "green";
    }

    // Validación final
    if (cumplidas === 5) {
      input.setCustomValidity("");
      input.classList.add("is-valid");
      input.classList.remove("is-invalid");
      feedback.text("");
      requisitos.style.display = "none"; // Oculta todo cuando ya se cumple
    } else {
      input.setCustomValidity("no valido");
      input.classList.add("is-invalid");
      input.classList.remove("is-valid");
      feedback.text("La contraseña no cumple con los requisitos.");
      requisitos.style.display = "block"; // Muestra mientras escribe
    }
  }
}

/*------------------------------------------------------
              Recordar email en el login
------------------------------------------------------*/
function recordarEmail(event) {
  const emailInput = document.querySelector('[name=emailAdmin]');
  const rememberCheckbox = event.target;

  if (rememberCheckbox.checked) {
    localStorage.setItem("emailAdmin", emailInput.value.trim());
    localStorage.setItem("checked", "true");
  } else {
    localStorage.removeItem("emailAdmin");
    localStorage.removeItem("checked");
  }
}

/*------------------------------------------------------
              Recuperar email en el login
------------------------------------------------------*/
function getEmail() {
  const emailStored = localStorage.getItem("emailAdmin");
  const rememberState = localStorage.getItem("checked");

  if (emailStored) {
    document.querySelector('[name=emailAdmin]').value = emailStored;
  }

  if (rememberState) {
    document.querySelector('#remember').checked = true;
  }
}
getEmail();
