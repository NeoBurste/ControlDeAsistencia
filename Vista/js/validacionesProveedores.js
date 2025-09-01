function validarRutChileno(rutCompleto) {
  rutCompleto = rutCompleto.replace(/\./g, "").replace("-", "").toUpperCase();
  if (rutCompleto.length < 2) return false;
  let rut = rutCompleto.slice(0, -1);
  let dv = rutCompleto.slice(-1);

  let suma = 0;
  let multiplo = 2;
  for (let i = rut.length - 1; i >= 0; i--) {
    suma += parseInt(rut.charAt(i)) * multiplo;
    multiplo = multiplo < 7 ? multiplo + 1 : 2;
  }
  let dvEsperado = 11 - (suma % 11);
  dvEsperado =
    dvEsperado === 11 ? "0" : dvEsperado === 10 ? "K" : dvEsperado.toString();
  return dv === dvEsperado;
}

// Función para formatear el RUT en cualquier input
function formatearRutInput(input) {
  if (!input) return;
  input.addEventListener("input", function (e) {
    let valor = e.target.value.replace(/[^0-9kK]/g, "").toUpperCase();
    valor = valor.replace(/\./g, "").replace(/\-/g, "");
    if (valor.length > 9) valor = valor.slice(0, 9);
    let rut = "";
    if (valor.length > 1) {
      rut =
        valor.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
        "-" +
        valor.slice(-1);
    } else {
      rut = valor;
    }
    e.target.value = rut;
  });
}

// Función para validar el RUT en cualquier input
function validarRutInput(input, feedbackId) {
  if (!input) return;
  input.addEventListener("blur", function (e) {
    const rutInput = e.target;
    const rut = rutInput.value;
    const regex = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;
    let mensaje = "";

    if (rut.length === 0) {
      rutInput.classList.remove("is-invalid");
      if (document.getElementById(feedbackId)) {
        document.getElementById(feedbackId).remove();
      }
      return;
    }

    if (!regex.test(rut)) {
      mensaje = "El RUT debe tener el formato 12.345.678-K";
    } else if (!validarRutChileno(rut)) {
      mensaje = "El RUT ingresado no es válido.";
    }

    if (mensaje) {
      rutInput.classList.add("is-invalid");
      if (!document.getElementById(feedbackId)) {
        const feedback = document.createElement("div");
        feedback.id = feedbackId;
        feedback.className = "invalid-feedback";
        feedback.innerText = mensaje;
        rutInput.parentNode.appendChild(feedback);
      } else {
        document.getElementById(feedbackId).innerText = mensaje;
      }
    } else {
      rutInput.classList.remove("is-invalid");
      if (document.getElementById(feedbackId)) {
        document.getElementById(feedbackId).remove();
      }
    }
  });
}

// Función para validar antes de enviar
function validarRutAntesDeEnviar(input, feedbackId) {
  const rut = input.value;
  const regex = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;
  let mensaje = "";

  if (!regex.test(rut)) {
    mensaje = "El RUT debe tener el formato 12.345.678-K";
  } else if (!validarRutChileno(rut)) {
    mensaje = "El RUT ingresado no es válido.";
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
    return false;
  } else {
    input.classList.remove("is-invalid");
    if (document.getElementById(feedbackId)) {
      document.getElementById(feedbackId).remove();
    }
    return true;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  // Asignar a ambos modales
  formatearRutInput(document.getElementById("rut"));
  formatearRutInput(document.getElementById("mod_rut"));
  validarRutInput(document.getElementById("rut"), "rutFeedback");
  validarRutInput(document.getElementById("mod_rut"), "modRutFeedback");

  // Submit agregar proveedor
  const formProveedor = document.getElementById("formProveedor");
  if (formProveedor) {
    formProveedor.addEventListener("submit", function (e) {
      e.preventDefault();
      const rutInput = document.getElementById("rut");
      if (!validarRutAntesDeEnviar(rutInput, "rutFeedback")) return;

      const form = e.target;
      const data = new FormData(form);

      fetch(form.action, {
        method: "POST",
        body: data,
      })
        .then((res) => res.text())
        .then((msg) => {
          const respuestaDiv = document.getElementById("respuesta");
          if (msg.includes("correctamente")) {
            respuestaDiv.innerHTML =
              '<div class="alert alert-success">' + msg + "</div>";
            form.reset();
            setTimeout(() => {
              const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("proveedorModal")
              );
              modal.hide();
              respuestaDiv.innerHTML = "";
              location.reload();
            }, 1000);
          } else {
            respuestaDiv.innerHTML =
              '<div class="alert alert-danger">' + msg + "</div>";
          }
        })
        .catch(() => {
          document.getElementById("respuesta").innerHTML =
            '<div class="alert alert-danger">Error al enviar datos.</div>';
        });
    });
  }

  // Submit modificar proveedor
  const formModificarProveedor = document.getElementById(
    "formModificarProveedor"
  );
  if (formModificarProveedor) {
    formModificarProveedor.addEventListener("submit", function (e) {
      e.preventDefault();
      const rutInput = document.getElementById("mod_rut");
      if (!validarRutAntesDeEnviar(rutInput, "modRutFeedback")) return;

      const form = e.target;
      const data = new FormData(form);

      fetch(form.action, {
        method: "POST",
        body: data,
      })
        .then((res) => res.text())
        .then((msg) => {
          const respuestaDiv = document.getElementById("respuestaModificar");
          if (msg.includes("correctamente")) {
            respuestaDiv.innerHTML =
              '<div class="alert alert-success">' + msg + "</div>";
            setTimeout(() => {
              const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("modalModificarProveedor")
              );
              modal.hide();
              respuestaDiv.innerHTML = "";
              location.reload();
            }, 2000);
          } else {
            respuestaDiv.innerHTML =
              '<div class="alert alert-danger">' + msg + "</div>";
          }
        })
        .catch(() => {
          document.getElementById("respuestaModificar").innerHTML =
            '<div class="alert alert-danger">Error al enviar datos.</div>';
        });
    });
  }

  // Script para eliminar proveedores
  document.querySelectorAll(".btn-eliminar").forEach((btn) => {
    btn.addEventListener("click", function () {
      if (confirm("¿Estás seguro de que deseas eliminar este proveedor?")) {
        const rut = this.getAttribute("data-rut");
        fetch("/ControlDeAsistencia/Controlador/Proveedor/eliminarProveedor.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: "rut=" + encodeURIComponent(rut),
        })
          .then((res) => res.text())
          .then((msg) => {
            alert(msg);
            location.reload();
          })
          .catch(() => {
            alert("Error al intentar eliminar el proveedor.");
          });
      }
    });
  });

  // Modal Modificar: rellenar campos al abrir
  document.querySelectorAll(".btn-modificar").forEach((btn) => {
    btn.addEventListener("click", function () {
      document.getElementById("mod_rut_original").value =
        this.getAttribute("data-rut");
      document.getElementById("mod_rut").value = this.getAttribute("data-rut");
      document.getElementById("mod_nombre").value =
        this.getAttribute("data-nombre");
      document.getElementById("mod_razon_social").value =
        this.getAttribute("data-razon");
      document.getElementById("respuestaModificar").innerHTML = "";
      // Limpiar feedback de validación
      document.getElementById("mod_rut").classList.remove("is-invalid");
      if (document.getElementById("modRutFeedback")) {
        document.getElementById("modRutFeedback").remove();
      }
    });
  });
});