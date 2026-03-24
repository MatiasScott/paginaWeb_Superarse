document.addEventListener("DOMContentLoaded", function () {
    // Objeto para manejar múltiples visores de PDF
    const pdfViewers = {};

    // Configura la ruta del worker de PDF.js
    if (typeof pdfjsLib !== "undefined") {
        pdfjsLib.GlobalWorkerOptions.workerSrc =
            "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
    }

    // Función para manejar el visor de PDF con botones
    function setupPdfViewer(viewerIndex) {
        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;

        const pdfContainer = document.getElementById(`pdf-container-${viewerIndex}`);
        const prevPageButton = document.getElementById(`prev-page-${viewerIndex}`);
        const nextPageButton = document.getElementById(`next-page-${viewerIndex}`);
        const pageNumSpan = document.getElementById(`page-num-${viewerIndex}`);

        if (!pdfContainer || !prevPageButton || !nextPageButton || !pageNumSpan) {
            console.error(`Faltan elementos para el visor PDF #${viewerIndex}`);
            return null;
        }

        function renderPage(pageNum) {
            if (!pdfDoc) return;
            
            pdfDoc.getPage(pageNum).then(function (page) {
                const scale = 1.0;
                const viewport = page.getViewport({ scale: scale });
                const canvas = document.createElement("canvas");
                pdfContainer.innerHTML = "";
                pdfContainer.appendChild(canvas);
                const context = canvas.getContext("2d");
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                page.render({
                    canvasContext: context,
                    viewport: viewport,
                });
                pageNumSpan.textContent = `Página: ${pageNum} de ${totalPages}`;
            }).catch(function (error) {
                console.error("Error al renderizar la página del PDF:", error);
            });
        }

        function loadPDF(url) {
            pdfContainer.innerHTML = `<p class="text-center m-5">Cargando documento...</p>`;
            pdfjsLib.getDocument(url).promise.then(function (pdf) {
                pdfDoc = pdf;
                totalPages = pdf.numPages;
                currentPage = 1;
                renderPage(currentPage);
            }).catch(function (error) {
                console.error("Error al cargar el PDF:", error);
                pdfContainer.innerHTML = `<p class="text-center text-danger m-5">No se pudo cargar el documento PDF.</p>`;
            });
        }

        prevPageButton.addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
            }
        });
        nextPageButton.addEventListener("click", function () {
            if (currentPage < totalPages) {
                currentPage++;
                renderPage(currentPage);
            }
        });

        return { loadPDF };
    }

    // Inicializar los visores para cada tab con visor de PDF
    const viewer1 = setupPdfViewer(1);
    const viewer2 = setupPdfViewer(2);
    const viewer3 = setupPdfViewer(3);
    const viewer4 = setupPdfViewer(4);

    // Mapeo de los visores a los enlaces de PDF
    const links = document.querySelectorAll("a[data-pdf-src]");
    links.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const url = this.getAttribute("data-pdf-src");
            const parentTab = this.closest(".tab-pane");

            let viewer;
            if (parentTab.id === 'list-igualdad') {
                viewer = viewer1;
            } else if (parentTab.id === 'list-seguridad') {
                viewer = viewer2;
            } else if (parentTab.id === 'list-concurso') {
                viewer = viewer3;
            } else if (parentTab.id === 'list-proceso') {
                viewer = viewer4;
            }

            if (viewer) {
                viewer.loadPDF(url);
            }

            const allLinks = parentTab.querySelectorAll(".list-group-item-action");
            allLinks.forEach(item => item.classList.remove("active"));
            this.classList.add("active");
        });
    });

    // Lógica para el tab "Evaluación Docente" (que usa iframes)
    const evaluacionTabs = document.querySelectorAll('#list-evaluacion .pdf-link');
    evaluacionTabs.forEach(tab => {
        tab.addEventListener('shown.bs.tab', function (event) {
            const targetId = event.target.getAttribute('href');
            const pdfSrc = event.target.getAttribute('data-pdf-src');
            const targetPane = document.querySelector(targetId);
            const iframe = targetPane.querySelector('.pdf-viewer-evaluacion');
            if (iframe && pdfSrc) {
                iframe.src = pdfSrc;
            }
        });
    });

    // Lógica para la sección "Mejores Evaluados"
    const clickableItems = document.querySelectorAll(".clickable-item");
    const contenedorFotoGrande = document.getElementById("contenedor-foto-grande");
    const fotoPrincipal = document.getElementById("foto-principal");
    const nombreProfesor = document.getElementById("nombre-profesor");

    clickableItems.forEach(item => {
        item.addEventListener("click", function () {
            const largeSrc = this.getAttribute("data-large-src");
            const name = this.getAttribute("data-name");

            fotoPrincipal.src = largeSrc;
            nombreProfesor.textContent = name;
            contenedorFotoGrande.classList.remove("d-none");
        });
    });
});