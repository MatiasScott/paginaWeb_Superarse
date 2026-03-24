// La URL del documento PDF que se va a visualizar
const url =
  "/assets/docs/institucion/codigoEtica/codigoEtica_Superarse.pdf";

let pdfDoc = null;
let currentPage = 1;
let totalPages = 0;

// Configurar la ruta del worker de PDF.js
// Esta línea es crucial para que PDF.js funcione correctamente
if (typeof pdfjsLib !== "undefined") {
  pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
}

/**
 * Función para renderizar una página del PDF.
 * Este código se ha corregido para:
 * 1. Adaptar el tamaño al contenedor.
 * 2. Mejorar la calidad del renderizado en pantallas de alta resolución.
 * 3. Evitar que el PDF se salga del contenedor.
 */
function renderPage(pageNum) {
  if (!pdfDoc) return;

  pdfDoc.getPage(pageNum).then(function (page) {
    const pdfContainer = document.getElementById("pdf-container");

    if (pdfContainer) {
      // Obtener el ancho del contenedor para ajustar la escala
      const containerWidth = pdfContainer.clientWidth;
      const viewport = page.getViewport({ scale: 1.0 });

      // Obtener la relación de píxeles del dispositivo para una mejor calidad
      const outputScale = window.devicePixelRatio || 1;

      // Calcular la escala para que el PDF se adapte al ancho del contenedor
      const scale = containerWidth / viewport.width;
      const scaledViewport = page.getViewport({ scale: scale * outputScale });

      const canvas = document.createElement("canvas");
      
      pdfContainer.innerHTML = "";
      pdfContainer.appendChild(canvas);

      const context = canvas.getContext("2d");
      
      // 1. Establecer las dimensiones del canvas para el renderizado de alta calidad
      canvas.width = scaledViewport.width;
      canvas.height = scaledViewport.height;

      // 2. Establecer el tamaño visible del canvas para que se adapte al contenedor
      canvas.style.width = containerWidth + 'px';
      canvas.style.height = scaledViewport.height / outputScale + 'px';

      // Renderizar la página en el canvas
      page.render({
        canvasContext: context,
        viewport: scaledViewport,
      });

      const pageNumSpan = document.getElementById("page-num");
      if (pageNumSpan) {
        pageNumSpan.textContent = `Página: ${pageNum} de ${totalPages}`;
      }
    } else {
      console.error("PDF container element not found.");
    }
  }).catch(function(error) {
    console.error("Error al renderizar la página del PDF:", error);
  });
}

// Función para cargar el documento PDF
function loadPDF() {
  if (typeof pdfjsLib === 'undefined') {
    console.error("La librería PDF.js no está cargada.");
    return;
  }

  pdfjsLib.getDocument(url).promise.then(function (pdf) {
    pdfDoc = pdf;
    totalPages = pdfDoc.numPages;
    renderPage(currentPage);
  }).catch(function(error) {
    console.error("Error al cargar el PDF:", error);
    const pdfContainer = document.getElementById("pdf-container");
    if (pdfContainer) {
      pdfContainer.textContent = "No se pudo cargar el documento PDF. Por favor, asegúrate de que el archivo existe y la ruta es correcta.";
    }
  });
}

// Eventos para la navegación del PDF
document.addEventListener("DOMContentLoaded", function() {
  const prevPageButton = document.getElementById("prev-page");
  if (prevPageButton) {
    prevPageButton.addEventListener("click", function () {
      if (currentPage > 1) {
        currentPage--;
        renderPage(currentPage);
      }
    });
  }

  const nextPageButton = document.getElementById("next-page");
  if (nextPageButton) {
    nextPageButton.addEventListener("click", function () {
      if (currentPage < totalPages) {
        currentPage++;
        renderPage(currentPage);
      }
    });
  }

  loadPDF();
});