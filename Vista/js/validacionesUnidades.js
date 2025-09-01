function validarRunChileno(runCompleto) {
  runCompleto = runCompleto.replace(/\./g, "").replace("-", "").toUpperCase();
  if (runCompleto.length < 2) return false;
  let run = runCompleto.slice(0, -1);
  let dv = runCompleto.slice(-1);

  let suma = 0;
  let multiplo = 2;
  for (let i = run.length - 1; i >= 0; i--) {
    suma += parseInt(run.charAt(i)) * multiplo;
    multiplo = multiplo < 7 ? multiplo + 1 : 2;
  }
  let dvEsperado = 11 - (suma % 11);
  dvEsperado =
    dvEsperado === 11 ? "0" : dvEsperado === 10 ? "K" : dvEsperado.toString();
  return dv === dvEsperado;
}

function formatearRunInput(input) {
  if (!input) return;
  input.addEventListener("input", function (e) {
    let valor = e.target.value.replace(/[^0-9kK]/g, "").toUpperCase();
    valor = valor.replace(/\./g, "").replace(/\-/g, "");
    if (valor.length > 9) valor = valor.slice(0, 9);
    let run = "";
    if (valor.length > 1) {
      run =
        valor.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
        "-" +
        valor.slice(-1);
    } else {
      run = valor;
    }
    e.target.value = run;
  });
}

function validarRunInput(input, feedbackId) {
  if (!input) return;
  input.addEventListener("blur", function (e) {
    const runInput = e.target;
    const run = runInput.value;
    const regex = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;
    let mensaje = "";

    if (run.length === 0) {
      runInput.classList.remove("is-invalid");
      if (document.getElementById(feedbackId)) {
        document.getElementById(feedbackId).remove();
      }
      return;
    }

    if (!regex.test(run)) {
      mensaje = "El RUN debe tener el formato 12.345.678-K";
    } else if (!validarRunChileno(run)) {
      mensaje = "El RUN ingresado no es válido.";
    }

    if (mensaje) {
      runInput.classList.add("is-invalid");
      if (!document.getElementById(feedbackId)) {
        const feedback = document.createElement("div");
        feedback.id = feedbackId;
        feedback.className = "invalid-feedback";
        feedback.innerText = mensaje;
        runInput.parentNode.appendChild(feedback);
      } else {
        document.getElementById(feedbackId).innerText = mensaje;
      }
    } else {
      runInput.classList.remove("is-invalid");
      if (document.getElementById(feedbackId)) {
        document.getElementById(feedbackId).remove();
      }
    }
  });
}

function validarEmailInput(input, feedbackId) {
  if (!input) return;
  input.addEventListener("blur", function (e) {
    const email = e.target.value;
    let mensaje = "";
    if (email.length > 0 && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      mensaje = "El correo electrónico no es válido.";
    }
    if (mensaje) {
      input.classList.add("is-invalid");
      if (!document.getElementById(feedbackId)) {
        const feedback = document.createElement("div");
        feedback.id = feedbackId;
        feedback.className = "invalid-feedback";
        feedback.innerText = mensaje;
        input.parentNode.appendChild(feedback);
      } else {
        document.getElementById(feedbackId).innerText = mensaje;
      }
    } else {
      input.classList.remove("is-invalid");
      if (document.getElementById(feedbackId)) {
        document.getElementById(feedbackId).remove();
      }
    }
  });
}

function validarTelefonoInput(input, feedbackId) {
  if (!input) return;
  input.addEventListener("blur", function (e) {
    const tel = e.target.value;
    let mensaje = "";
    if (tel.length > 0 && !/^\+?\d{6,15}$/.test(tel)) {
      mensaje = "El teléfono debe contener solo números y puede iniciar con +.";
    }
    if (mensaje) {
      input.classList.add("is-invalid");
      if (!document.getElementById(feedbackId)) {
        const feedback = document.createElement("div");
        feedback.id = feedbackId;
        feedback.className = "invalid-feedback";
        feedback.innerText = mensaje;
        input.parentNode.appendChild(feedback);
      } else {
        document.getElementById(feedbackId).innerText = mensaje;
      }
    } else {
      input.classList.remove("is-invalid");
      if (document.getElementById(feedbackId)) {
        document.getElementById(feedbackId).remove();
      }
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  // Validaciones de formulario
  const runInput = document.getElementById("run");
  const emailInput = document.getElementById("correo_electronico");
  const telInput = document.getElementById("telefono");
  const form = document.getElementById("formUnidad");

  if (runInput) {
    formatearRunInput(runInput);
    validarRunInput(runInput, "runFeedback");
  }
  if (emailInput) {
    validarEmailInput(emailInput, "emailFeedback");
  }
  if (telInput) {
    validarTelefonoInput(telInput, "telFeedback");
  }

  // Validar antes de enviar
  function validarUnidadAntesDeEnviar() {
    let valido = true;
    // RUN
    if (runInput) {
      const run = runInput.value;
      const regexRun = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;
      if (!regexRun.test(run) || !validarRunChileno(run)) {
        runInput.classList.add("is-invalid");
        valido = false;
      }
    }
    // Email
    if (
      emailInput &&
      emailInput.value.length > 0 &&
      !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)
    ) {
      emailInput.classList.add("is-invalid");
      valido = false;
    }
    // Teléfono
    if (
      telInput &&
      telInput.value.length > 0 &&
      !/^\+?\d{6,15}$/.test(telInput.value)
    ) {
      telInput.classList.add("is-invalid");
      valido = false;
    }
    return valido;
  }

  // Submit unidad
  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();
      if (!validarUnidadAntesDeEnviar()) return;

      const data = new FormData(form);

      fetch(form.action, {
        method: "POST",
        body: data,
      })
        .then((res) => res.text())
        .then((msg) => {
          document.getElementById("respuestaUnidad").innerHTML =
            '<div class="alert alert-success">' + msg + "</div>";
          if (msg.includes("correctamente")) {
            form.reset();
            setTimeout(() => {
              const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("unidadModal")
              );
              modal.hide();
              document.getElementById("respuestaUnidad").innerHTML = "";
              location.reload();
            }, 1000);
          } else {
            document.getElementById("respuestaUnidad").innerHTML =
              '<div class="alert alert-danger">' + msg + "</div>";
          }
        })
        .catch(() => {
          document.getElementById("respuestaUnidad").innerHTML =
            '<div class="alert alert-danger">Error al enviar datos.</div>';
        });
    });
  }

  // Botón eliminar unidad
  document.querySelectorAll(".btn-eliminar-unidad").forEach((btn) => {
    btn.addEventListener("click", function () {
      if (confirm("¿Estás seguro de que deseas eliminar esta unidad?")) {
        const idUnidad = this.getAttribute("data-id");
        fetch("../../Controlador/Unidades/eliminarUnidad.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: "idUnidad=" + encodeURIComponent(idUnidad),
        })
          .then((res) => res.text())
          .then((msg) => {
            alert(msg);
            location.reload();
          })
          .catch(() => {
            alert("Error al intentar eliminar la unidad.");
          });
      }
    });
  });

  

  // Rellenar el modal modificar con los datos a modificar
  document.querySelectorAll(".btn-modificar-unidad").forEach((btn) => {
    btn.addEventListener("click", function () {
      document.getElementById("mod_idUnidad").value = this.getAttribute("data-id");
      document.getElementById("mod_codigo").value = this.getAttribute("data-codigo");
      document.getElementById("mod_run").value = this.getAttribute("data-run");
      document.getElementById("mod_nombre").value = this.getAttribute("data-nombre");
      document.getElementById("mod_telefono").value = this.getAttribute("data-telefono");
      document.getElementById("mod_correo_electronico").value = this.getAttribute("data-correo");
      document.getElementById("respuestaModificarUnidad").innerHTML = "";
    });
  });

  // Enviar el formulario de modificación por AJAX
  const formModificarUnidad = document.getElementById('formModificarUnidad');
  if (formModificarUnidad) {
    formModificarUnidad.addEventListener('submit', function (e) {
      e.preventDefault();
      const data = new FormData(formModificarUnidad);
      fetch(formModificarUnidad.action, {
        method: 'POST',
        body: data
      })
      .then(res => res.text())
      .then(msg => {
        document.getElementById('respuestaModificarUnidad').innerHTML =
          '<div class="alert alert-success">' + msg + '</div>';
        if (msg.toLowerCase().includes('exitosamente')) {
          setTimeout(() => {
            const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('modalModificarUnidad'));
            modal.hide();
            document.getElementById('respuestaModificarUnidad').innerHTML = '';
            location.reload();
          }, 2000);
        }
      })
      .catch(() => {
        document.getElementById('respuestaModificarUnidad').innerHTML =
          '<div class="alert alert-danger">Error al enviar datos.</div>';
      });
    });
  }

  });
