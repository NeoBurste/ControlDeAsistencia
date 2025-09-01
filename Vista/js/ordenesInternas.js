document.getElementById("exportarPDF").addEventListener("click", function () {
  const element = document.getElementById("ordenForm");
  const opt = {
    margin: 0.5,
    filename: "orden_interna.pdf",
    image: { type: "jpeg", quality: 0.98 },
    html2canvas: { scale: 1, useCORS: true },
    jsPDF: { unit: "in", format: "a4", orientation: "portrait" },
    pagebreak: { mode: ["avoid-all", "css", "legacy"] },
  };
  html2pdf().set(opt).from(element).save();
});

document.getElementById("agregarFila").addEventListener("click", function () {
  const tbody = document.getElementById("tablaItemsBody");
  const nuevaFila = document.createElement("tr");
  nuevaFila.innerHTML = `
        <td><input type="number" class="form-control"></td>
        <td><input type="text" class="form-control"></td>
        <td><textarea class="form-control"></textarea></td>
        <td><input type="text" class="form-control"></td>
        <td><input type="text" class="form-control" value="$"></td>
        <td><input type="text" class="form-control" value="$"></td>
    `;
  tbody.appendChild(nuevaFila);
});
