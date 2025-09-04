document.addEventListener("DOMContentLoaded", function () {

    function paginarTabla(tablaId, filasPorPagina = 10, filtroId = null) {
        const tabla = document.getElementById(tablaId);
        const filasOriginales = Array.from(tabla.querySelectorAll("tbody tr"));
        let filasFiltradas = [...filasOriginales];
        let paginaActual = 1;

        const contenedorPaginacion = document.createElement("div");
        contenedorPaginacion.classList.add("mt-3", "d-flex", "justify-content-center", "gap-2");
        tabla.insertAdjacentElement("afterend", contenedorPaginacion);

        function limpiarTexto(texto) {
            return texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "").trim().toLowerCase();
        }

        function mostrarPagina(pagina) {
            const totalPaginas = Math.ceil(filasFiltradas.length / filasPorPagina);
            if (pagina < 1) pagina = 1;
            if (pagina > totalPaginas) pagina = totalPaginas;
            paginaActual = pagina;

            filasOriginales.forEach(fila => fila.style.display = "none");

            const inicio = (pagina - 1) * filasPorPagina;
            const fin = inicio + filasPorPagina;
            filasFiltradas.slice(inicio, fin).forEach(fila => fila.style.display = "");

            renderBotones();
        }

        function renderBotones() {
            const totalPaginas = Math.ceil(filasFiltradas.length / filasPorPagina);
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

        if (filtroId) {
            const filtro = document.getElementById(filtroId);
            filtro.addEventListener("change", function () {
                const valorFiltro = limpiarTexto(this.value);
                filasFiltradas = filasOriginales.filter(fila => {
                    const categoriaColumna = fila.querySelector(".categoria-columna");
                    if (!categoriaColumna) return true;
                    const categoria = limpiarTexto(categoriaColumna.textContent);
                    return valorFiltro === "" || categoria === valorFiltro;
                });
                mostrarPagina(1);
            });
        }

        mostrarPagina(1);
    }

    // Productos con filtro
    paginarTabla("tablaProductos", 10, "filtroCategoria");
    // Categorías sin filtro
    paginarTabla("tablaCategorias", 8);
});
