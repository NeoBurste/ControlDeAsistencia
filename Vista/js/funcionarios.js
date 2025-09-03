// funcionarios.js
document.addEventListener("DOMContentLoaded", () => {
  const RUT_REGEX = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;

  // --- Validador de RUT/RUN chileno ---
  function validarRutChileno(rutCompleto) {
    rutCompleto = rutCompleto.replace(/\./g, "").replace("-", "").toUpperCase();
    if (rutCompleto.length < 2) return false;

    const rut = rutCompleto.slice(0, -1);
    const dv = rutCompleto.slice(-1);

    let suma = 0;
    let multiplo = 2;
    for (let i = rut.length - 1; i >= 0; i--) {
      suma += parseInt(rut.charAt(i), 10) * multiplo;
      multiplo = multiplo < 7 ? multiplo + 1 : 2;
    }

    let dvEsperado = 11 - (suma % 11);
    dvEsperado =
      dvEsperado === 11 ? "0" : dvEsperado === 10 ? "K" : dvEsperado.toString();

    return dv === dvEsperado;
  }

  // --- Formateador reutilizable ---
  function formatRut(raw) {
    let valor = (raw || "").replace(/[^0-9kK]/g, "").toUpperCase();
    valor = valor.replace(/\./g, "").replace(/\-/g, "");
    if (valor.length > 9) valor = valor.slice(0, 9);

    if (valor.length > 1) {
      return (
        valor.slice(0, -1).replace(/\B(?=(\d{3})+(?!\d))/g, ".") +
        "-" +
        valor.slice(-1)
      );
    }
    return valor;
  }

  // --- Enlaza formateo + validación de un campo RUN ---
  function bindRutField(inputId, feedbackId) {
    const input = document.getElementById(inputId);
    if (!input) return; // evita romper el script si no existe en la página

    const feedback = feedbackId ? document.getElementById(feedbackId) : null;

    // Formateo en tiempo real
    input.addEventListener("input", (e) => {
      e.target.value = formatRut(e.target.value);
    });

    // Validación al perder foco
    input.addEventListener("blur", (e) => {
      const run = e.target.value;
      let mensaje = "";

      if (run.length === 0) {
        e.target.classList.remove("is-invalid");
        if (feedback) feedback.innerText = "";
        return;
      }

      if (!RUT_REGEX.test(run)) {
        mensaje = "El RUT debe tener el formato 12.345.678-9";
      } else if (!validarRutChileno(run)) {
        mensaje = "El RUN ingresado no es válido.";
      }

      if (mensaje) {
        e.target.classList.add("is-invalid");
        if (feedback) feedback.innerText = mensaje;
      } else {
        e.target.classList.remove("is-invalid");
        if (feedback) feedback.innerText = "";
      }
    });
  }

  // --- Aplica a ambos campos ---
  bindRutField("run", "runFeedback");
  bindRutField("edit_run", "editRunFeedback");

  // --- Submit Agregar Funcionario ---
  const formAgregar = document.getElementById("formAgregarFuncionario");
  if (formAgregar) {
    formAgregar.addEventListener("submit", (e) => {
      e.preventDefault();
      const runInput = document.getElementById("run");
      const feedback = document.getElementById("runFeedback");
      const run = runInput ? runInput.value : "";

      let mensaje = "";
      if (!RUT_REGEX.test(run)) {
        mensaje = "El RUT debe tener el formato 12.345.678-9";
      } else if (!validarRutChileno(run)) {
        mensaje = "El RUT ingresado no es válido";
      }

      if (mensaje) {
        runInput.classList.add("is-invalid");
        if (feedback) feedback.innerText = mensaje;
        return;
      } else {
        runInput.classList.remove("is-invalid");
        if (feedback) feedback.innerText = "";
      }

      const data = new FormData(formAgregar);

      fetch(formAgregar.action, { method: "POST", body: data })
        .then((res) => res.text())
        .then((msg) => {
          const cont = document.getElementById("respuestaFuncionario");
          cont.innerHTML = msg.includes("correctamente")
            ? `<div class="alert alert-success">${msg}</div>`
            : `<div class="alert alert-danger">${msg}</div>`;

          if (msg.includes("correctamente")) {
            formAgregar.reset();
            setTimeout(() => {
              const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("modalAgregarFuncionario")
              );
              modal.hide();
              cont.innerHTML = "";
              location.reload();
            }, 1500);
          }
        })
        .catch(() => {
          const cont = document.getElementById("respuestaFuncionario");
          cont.innerHTML =
            '<div class="alert alert-danger">Error al enviar datos.</div>';
        });
    });
  }

  // --- Abrir modal Editar y precargar datos ---
  document.querySelectorAll(".btn-modificar").forEach((btn) => {
    btn.addEventListener("click", function () {
      const modalEl = document.getElementById("modalEditarFuncionario");
      if (!modalEl) return;

      const run = this.getAttribute("data-run") || "";
      const nombre = this.getAttribute("data-nombre") || "";
      const cargo = this.getAttribute("data-cargo") || "";

      const runOriginal = document.getElementById("edit_run_original");
      const inputRun = document.getElementById("edit_run");
      const inputNombre = document.getElementById("edit_nombre");
      const inputCargo = document.getElementById("edit_cargo");

      if (runOriginal) runOriginal.value = run;
      if (inputRun) inputRun.value = formatRut(run);
      if (inputNombre) inputNombre.value = nombre;
      if (inputCargo) inputCargo.value = cargo;

      const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
      modal.show();
    });
  });

  // --- Submit Editar Funcionario ---
  const formEditar = document.getElementById("formEditarFuncionario");
  if (formEditar) {
    formEditar.addEventListener("submit", (e) => {
      e.preventDefault();

      const runInput = document.getElementById("edit_run");
      const feedback = document.getElementById("editRunFeedback");
      const run = runInput ? runInput.value : "";

      let mensaje = "";
      if (!RUT_REGEX.test(run)) {
        mensaje = "El RUN debe tener el formato 12.345.678-9";
      } else if (!validarRutChileno(run)) {
        mensaje = "El RUN ingresado no es válido";
      }

      if (mensaje) {
        runInput.classList.add("is-invalid");
        if (feedback) feedback.innerText = mensaje;
        return;
      } else {
        runInput.classList.remove("is-invalid");
        if (feedback) feedback.innerText = "";
      }

      const data = new FormData(formEditar);

      fetch(formEditar.action, { method: "POST", body: data })
        .then((res) => res.text())
        .then((msg) => {
          const cont = document.getElementById("respuestaEditarFuncionario");
          cont.innerHTML = msg.includes("correctamente")
            ? `<div class="alert alert-success">${msg}</div>`
            : `<div class="alert alert-danger">${msg}</div>`;

          if (msg.includes("correctamente")) {
            setTimeout(() => {
              const modal = bootstrap.Modal.getOrCreateInstance(
                document.getElementById("modalEditarFuncionario")
              );
              modal.hide();
              cont.innerHTML = "";
              location.reload();
            }, 1500);
          }
        })
        .catch(() => {
          const cont = document.getElementById("respuestaEditarFuncionario");
          cont.innerHTML =
            '<div class="alert alert-danger">Error al enviar datos.</div>';
        });
    });
  }

  // --- Eliminar Funcionario ---
  document.querySelectorAll(".btn-eliminar").forEach((btn) => {
    btn.addEventListener("click", function () {
      if (!confirm("¿Estás seguro de que deseas eliminar a este funcionario?"))
        return;

      const run = this.getAttribute("data-run");
      fetch("../../Controlador/Funcionarios/eliminarFuncionario.php", {
        method: "POST",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        body: "run=" + encodeURIComponent(run),
      })
        .then((res) => res.text())
        .then((msg) => {
          alert(msg);
          location.reload();
        })
        .catch(() => {
          alert("Error al intentar eliminar el funcionario.");
        });
    });
  });

  // Limpiar al cerrar modal de Agregar
  document
    .getElementById("modalAgregarFuncionario")
    .addEventListener("hidden.bs.modal", function () {
      const form = document.getElementById("formAgregarFuncionario");
      form.reset();
      document.getElementById("run").classList.remove("is-invalid");
      document.getElementById("runFeedback").innerText = "";
      document.getElementById("respuestaFuncionario").innerHTML = "";
    });

  // Limpiar al cerrar modal de Editar
  document
    .getElementById("modalEditarFuncionario")
    .addEventListener("hidden.bs.modal", function () {
      const form = document.getElementById("formEditarFuncionario");
      form.reset();
      document.getElementById("edit_run").classList.remove("is-invalid");
      document.getElementById("editRunFeedback").innerText = "";
      document.getElementById("respuestaEditarFuncionario").innerHTML = "";
    });
});
