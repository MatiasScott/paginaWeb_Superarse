/**
 * normativa.js - Unificado
 * 1. Inclusión dinámica de HTML (Header/Footer)
 * 2. Visor de PDF de alta resolución ajustado al contenedor
 */

// --- CONFIGURACIÓN DEL PDF ---
const url = "/assets/docs/institucion/normativa/NORMATIVA DE SELECCION DEL PERSONAL ACADEMICO_Superarse.pdf";
let pdfDoc = null;
let currentPage = 1;
let totalPages = 0;

if (typeof pdfjsLib !== "undefined") {
  pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
}

/**
 * Función para incluir archivos HTML dinámicamente (Header, Footer, etc.)
 */
function includeHTML() {
  const elements = document.querySelectorAll("[data-include]");
  elements.forEach((el) => {
    const file = el.getAttribute("data-include");
    fetch(file)
      .then((response) => {
        if (response.ok) return response.text();
        else throw new Error("Archivo no encontrado");
      })
      .then((data) => {
        el.innerHTML = data;
      })
      .catch((error) => {
        console.error("Error al cargar el archivo:", error);
      });
  });
}

/**
 * Función para renderizar el PDF
 */
function renderPage(pageNum) {
  if (!pdfDoc) return;

  pdfDoc.getPage(pageNum).then(function (page) {
    const pdfContainer = document.getElementById("pdf-container");

    if (pdfContainer) {
      // Ajuste de escala: Usamos el 100% del ancho del contenedor
      const containerWidth = pdfContainer.clientWidth;
      const viewport = page.getViewport({ scale: 1.0 });

      // Calidad de resolución (Device Pixel Ratio)
      const outputScale = window.devicePixelRatio || 1;

      // Calculamos la escala necesaria para que el PDF se vea GRANDE (ajustado al ancho)
      const scale = containerWidth / viewport.width;
      const scaledViewport = page.getViewport({ scale: scale * outputScale });

      const canvas = document.createElement("canvas");
      pdfContainer.innerHTML = ""; 
      pdfContainer.appendChild(canvas);

      const context = canvas.getContext("2d");
      
      // Dimensiones internas (Alta resolución)
      canvas.width = scaledViewport.width;
      canvas.height = scaledViewport.height;

      // Dimensiones visuales (CSS) para que no se vea borroso y ocupe el ancho
      canvas.style.width = "100%";
      canvas.style.height = "auto";

      page.render({
        canvasContext: context,
        viewport: scaledViewport,
      });

      const pageNumSpan = document.getElementById("page-num");
      if (pageNumSpan) {
        pageNumSpan.textContent = `Página: ${pageNum} de ${totalPages}`;
      }
    }
  });
}

function loadPDF() {
  if (typeof pdfjsLib === 'undefined') return;

  pdfjsLib.getDocument(url).promise.then(function (pdf) {
    pdfDoc = pdf;
    totalPages = pdfDoc.numPages;
    renderPage(currentPage);
  }).catch(function (error) {
    console.error("Error al cargar el PDF:", error);
    const container = document.getElementById('pdf-container');
    if (container) container.innerHTML = "<p class='p-4'>Error al cargar el documento.</p>";
  });
}

// --- INICIALIZACIÓN ÚNICA ---
document.addEventListener("DOMContentLoaded", function () {
  // 1. Cargar componentes HTML
  includeHTML();

  // 2. Configurar botones de navegación del PDF
  const prevBtn = document.getElementById("prev-page");
  const nextBtn = document.getElementById("next-page");

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      if (currentPage > 1) {
        currentPage--;
        renderPage(currentPage);
      }
    });
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      if (currentPage < totalPages) {
        currentPage++;
        renderPage(currentPage);
      }
    });
  }

  // 3. Cargar el PDF
  loadPDF();
});