document.addEventListener("DOMContentLoaded", function(){
    function paginarTabla(tablaId, filasPorPagina = 5, contenedorId = null){
        const tabla = document.getElementById(tablaId);
        if (!tabla) return;

        const filasOriginales = Array.from(tabla.querySelectorAll("tbody tr"));
        let paginaActual = 1;

        let contenedorPaginacion = contenedorId
            ? document.getElementById(contenedorId)
            : null;

        if (!contenedorPaginacion) {
            contenedorPaginacion = document.createElement("div");
            contenedorPaginacion.classList.add("paginacion-funcionarios", "mt-3");
            tabla.parentNode.insertBefore(contenedorPaginacion, tabla.nextSibling);
        }

        function mostrarPagina (pagina) {
            const totalPaginas = Math.ceil(filasOriginales.length / filasPorPagina);
            if (pagina < 1) pagina = 1;
            if (pagina > totalPaginas) pagina = totalPaginas;
            paginaActual = pagina;

            filasOriginales.forEach(fila => fila.style.display = "none");

            const inicio = (pagina - 1) * filasPorPagina;
            const fin = inicio + filasPorPagina;
            filasOriginales.slice(inicio, fin).forEach(fila => fila.style.display = "");

            renderBotones(totalPaginas);
        }

        function renderBotones (totalPaginas) {
            contenedorPaginacion.innerHTML = "";
            if (totalPaginas <= 1) return;

            const btnAnterior = document.createElement("button");
            btnAnterior.textContent = "Anterior";
            btnAnterior.classList.add("btn", "btn-outline-secondary", "me-2");
            btnAnterior.disabled = paginaActual === 1;
            btnAnterior.addEventListener("click", () => mostrarPagina(paginaActual - 1));


            const btnSiguiente = document.createElement("button");
            btnSiguiente.textContent = "Siguiente";
            btnSiguiente.classList.add("btn", "btn-outline-secondary", "ms-2");
            btnSiguiente.disabled = paginaActual === totalPaginas;
            btnSiguiente.addEventListener("click", () => mostrarPagina(paginaActual + 1));

            contenedorPaginacion.appendChild(btnAnterior);
            contenedorPaginacion.appendChild(btnSiguiente);
        }
        mostrarPagina(1);
    }
    paginarTabla("tablaFuncionarios", 5, "paginacionTabla");
});