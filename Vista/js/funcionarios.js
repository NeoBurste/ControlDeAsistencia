//Validacion de RUN/RUT chileno
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

//formatea el run mientras se escribe
document.getElementById("run").addEventListener("input", function (e) {
  let valor = e.target.value.replace(/[^0-9kK]/g, "").toUpperCase();
  valor = valor.replace(/\./g, "").replace(/\-/g, "");

  //Limitar a 9 caracteres sin formato
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

//Valadicaion al salir del campo rut
document.getElementById("run").addEventListener("blur", function (e) {
  const runInput = e.target;
  const run = runInput.value;
  const regex = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;
  let mensaje = "";

  if (run.length === 0) {
    runInput.classList.remove("is-invalid");
    document.getElementById("runFeedback").innerText = "";
    return;
  }

  if (!regex.test(run)) {
    mensaje = "El RUT debe tener el formato 12.345.678-9";
  } else if (!validarRutChileno(run)) {
    mensaje = "El run ingresado no es valido.";
  }

  if (mensaje) {
    runInput.classList.add("is-invalid");
    document.getElementById("runFeedback").innerText = mensaje;
  } else {
    runInput.classList.remove("is-invalid");
    document.getElementById("runFeedback").innerText = "";
  }
});

//Envio ajax del formulario
document
  .getElementById("formAgregarFuncionario")
  .addEventListener("submit", function (e) {
    e.preventDefault();
    const runInput = document.getElementById("run");
    const run = runInput.value;
    const regex = /^(\d{1,3}(?:\.\d{3})*)\-([\dkK])$/;
    let mensaje = "";

    if (!regex.test(run)) {
      mensaje = "El RUT debe tener el formato 12.345.678-9";
    } else if (!validarRutChileno(run)) {
      mensaje = "El RUT ingresado no es valido";
    }

    if (mensaje) {
      runInput.classList.add("is-invalid");
      document.getElementById("runFeedBack").innerText = mensaje;
      return;
    } else {
      runInput.classList.remove("is-invalid");
      document.getElementById("runFeedback").innerText = "";
    }

    const form = e.target;
    const data = new FormData(form);

    fetch(form.action, {
      method: "POST",
      body: data,
    })
      .then((res) => res.text())
      .then((msg) => {
        document.getElementById("respuestaFuncionario").innerHTML =
          msg.includes("correctamente")
            ? `<div class="alert alert-success">${msg}</div>`
            : `<div class="alert alert-danger">${msg}</div>`;
        if (msg.includes("correctamente")) {
          form.reset();
          setTimeout(() => {
            const modal = bootstrap.Modal.getOrCreateInstance(
              document.getElementById("modalAgregarFuncionario")
            );
            modal.hide();
            document.getElementById("respuestaFuncionario").innerHTML = "";
            location.reload();
          }, 1500);
        }
      })
      .catch(() => {
        document.getElementById("respuestaFuncionario").innerHTML =
          '<div class="alert alert-danger">Error al enviar datos.</div>';
      });
  });
