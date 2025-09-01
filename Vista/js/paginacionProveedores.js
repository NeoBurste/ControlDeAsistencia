document.addEventListener("DOMContentLoaded", function () {
    function paginarTabla(tablaId, filasPorPagina = 5) {
        const tabla = document.getElementById(tablaId);
        const filasOriginales = Array.from(tabla.querySelectorAll("tbody tr"));
        let paginaActual = 1;

        // Crear contenedor de paginación DENTRO del table-responsive
        const contenedorPaginacion = document.createElement("div");
        contenedorPaginacion.classList.add("paginacion-proveedores");
        tabla.parentNode.insertBefore(contenedorPaginacion, tabla.nextSibling);

        function mostrarPagina(pagina) {
            const totalPaginas = Math.ceil(filasOriginales.length / filasPorPagina);
            if (pagina < 1) pagina = 1;
            if (pagina > totalPaginas) pagina = totalPaginas;
            paginaActual = pagina;

            // Ocultar todas las filas
            filasOriginales.forEach(fila => fila.style.display = "none");

            // Mostrar las filas de la página actual
            const inicio = (pagina - 1) * filasPorPagina;
            const fin = inicio + filasPorPagina;
            filasOriginales.slice(inicio, fin).forEach(fila => fila.style.display = "");

            renderBotones(totalPaginas);
        }

        function renderBotones(totalPaginas) {
            contenedorPaginacion.innerHTML = "";
            if (totalPaginas <= 1) return;

            const btnAnterior = document.createElement("button");
            btnAnterior.textContent = "Anterior";
            btnAnterior.classList.add("btn", "btn-outline-secondary", "px-3");
            btnAnterior.disabled = paginaActual === 1;
            btnAnterior.addEventListener("click", () => mostrarPagina(paginaActual - 1));

            const btnSiguiente = document.createElement("button");
            btnSiguiente.textContent = "Siguiente";
            btnSiguiente.classList.add("btn", "btn-outline-secondary", "px-3");
            btnSiguiente.disabled = paginaActual === totalPaginas;
            btnSiguiente.addEventListener("click", () => mostrarPagina(paginaActual + 1));

            contenedorPaginacion.appendChild(btnAnterior);
            contenedorPaginacion.appendChild(btnSiguiente);
        }

        mostrarPagina(1);
    }

    paginarTabla("tablaProveedores", 5);
});
