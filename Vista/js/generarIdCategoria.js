document.addEventListener("DOMContentLoaded", function () {
  var modal = document.getElementById("modalAgregarCategoria");
  if (modal) {
    modal.addEventListener("shown.bs.modal", function () {
      const nombreCategoria = document.getElementById("nombreCategoria");
      const idCategoria = document.getElementById("idCategoria");
      if (
        nombreCategoria &&
        idCategoria &&
        !nombreCategoria.dataset.listenerAdded
      ) {
        nombreCategoria.addEventListener("input", function () {
          let nombre = this.value.replace(/\s+/g, "").toUpperCase();
          let letras = nombre.split("");
          let id = "";
          if (letras.length >= 3) {
            let usadas = [];
            while (id.length < 3) {
              let idx = Math.floor(Math.random() * letras.length);
              if (!usadas.includes(idx)) {
                id += letras[idx];
                usadas.push(idx);
              }
            }
          } else if (letras.length > 0) {
            id = letras.join("");
          } else {
            id = "";
          }
          idCategoria.value = id;
        });
        nombreCategoria.dataset.listenerAdded = "true";
      }
    });
  }
});
