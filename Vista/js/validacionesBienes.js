document.addEventListener("DOMContentLoaded", function () {
  // Generar ID para Producto (3 letras aleatorias)
  const nombreProducto = document.getElementById("nombreProducto");
  const idProducto = document.getElementById("idProducto");
  if (nombreProducto && idProducto) {
    nombreProducto.addEventListener("input", function () {
      let nombre = this.value.replace(/\s+/g, "").toUpperCase();
      let letras = nombre.split("");
      let id = "";
      if (letras.length >= 3) {
        // Elegir 3 letras aleatorias sin repetir
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
      idProducto.value = id;
    });
  }


  // Modal Editar Producto
  var modalEditarProducto = document.getElementById("modalEditarProducto");
  if (modalEditarProducto) {
    modalEditarProducto.addEventListener("show.bs.modal", function (event) {
      var button = event.relatedTarget;
      var idProducto = button.getAttribute("data-id");
      var nombreProducto = button.getAttribute("data-nombre");
      var descripcion = button.getAttribute("data-descripcion");
      var idCategoria = button.getAttribute("data-categoria");
      document.getElementById("editIdProducto").value = idProducto;
      document.getElementById("editNombreProducto").value = nombreProducto;
      document.getElementById("editDescripcion").value = descripcion;
      document.getElementById("editIdCategoria").value = idCategoria;
    });
  }
});
