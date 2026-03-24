/**
 * generateRegulation.js - VERSIÓN FINAL UNIFICADA
 * Este archivo maneja los datos, el renderizado y la creación del acordeón.
 */

const pdfState = {}; // Estado de los PDFs

// Configuración de Worker
if (typeof pdfjsLib !== "undefined") {
    pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
}

/**
 * RENDERIZADO DE PDF
 */
async function renderPDF(pdfUrl, container) {
    if (!container || !container.length) return;
    
    container.html(`
        <div class="text-center p-4">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2 text-muted">Cargando documento...</p>
        </div>
    `);

    try {
        let pdfDoc = pdfState[pdfUrl] ? pdfState[pdfUrl].doc : null;
        if (!pdfDoc) {
            pdfDoc = await pdfjsLib.getDocument(pdfUrl).promise;
            pdfState[pdfUrl] = { doc: pdfDoc, currentPage: 1, totalPages: pdfDoc.numPages };
        }
        renderPage(pdfDoc, pdfState[pdfUrl].currentPage, container, pdfUrl);
    } catch (error) {
        console.error("Error PDF:", error);
        container.html(`<p class="text-danger p-3 text-center">Error al cargar el archivo.</p>`);
    }
}

function renderPage(pdfDoc, pageNum, container, url) {
    pdfDoc.getPage(pageNum).then(function (page) {
        const pdfContainer = container[0];
        const containerWidth = pdfContainer.clientWidth || 500;
        const viewport = page.getViewport({ scale: 1.0 });
        const outputScale = window.devicePixelRatio || 1;
        const scale = containerWidth / viewport.width;
        const scaledViewport = page.getViewport({ scale: scale * outputScale });

        const canvas = document.createElement("canvas");
        container.html("").append(canvas);
        const context = canvas.getContext("2d");

        canvas.width = scaledViewport.width;
        canvas.height = scaledViewport.height;
        canvas.style.width = '100%';
        canvas.style.height = 'auto';

        page.render({ canvasContext: context, viewport: scaledViewport });
        updatePageLabel(url, container.closest('.collapse'));
    });
}

/**
 * CONSTRUCCIÓN DEL ACORDEÓN
 */
function createRegulationsAccordion() {
    const accordionContainer = $('#regulationsAccordion');
    
    // CRÍTICO: Limpia el contenedor para evitar duplicados
    accordionContainer.empty(); 

    if (typeof regulationsData === 'undefined') {
        console.error("No se encontraron los datos en regulationsData.js");
        return;
    }

    regulationsData.forEach((reg, index) => {
        const collapseId = `collapse-reg-${index}`;
        const viewerId = `pdf-viewer-reg-${index}`;
        const url = reg.filePath;

        const accordionItem = $(`
            <div class="card mb-3 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                <div class="card-header bg-white p-0 border-0">
                    <button class="btn-link-accordion collapsed" 
                            data-toggle="collapse" 
                            data-target="#${collapseId}" 
                            aria-expanded="false">
                        <span>
                            <i class="fas fa-file-pdf mr-3 text-danger"></i> 
                            <span class="text-dark font-weight-bold">${reg.title}</span>
                        </span>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                </div>
                <div id="${collapseId}" class="collapse" data-parent="#regulationsAccordion">
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-between align-items-center mb-3 bg-white p-2 rounded-pill shadow-sm">
                            <button class="btn btn-sm btn-info rounded-pill prev-page-reg px-3" data-url="${url}" data-viewer="${viewerId}">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                            <span class="page-info font-weight-bold text-primary" data-url="${url}">Página: 1 de ...</span>
                            <button class="btn btn-sm btn-info rounded-pill next-page-reg px-3" data-url="${url}" data-viewer="${viewerId}">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        <div id="${viewerId}" class="pdf-render-container shadow-sm border rounded bg-white" style="overflow: hidden; min-height: 400px;"></div>
                        <div class="text-center mt-3">
                             <a href="${url}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-4">
                                <i class="fas fa-external-link-alt mr-2"></i> Pantalla Completa
                             </a>
                        </div>
                    </div>
                </div>
            </div>
        `);
        accordionContainer.append(accordionItem);

        $(`#${collapseId}`).on('show.bs.collapse', function () {
            renderPDF(url, $(`#${viewerId}`));
        });
    });
}

/**
 * NAVEGACIÓN
 */
$(document).off('click', '.prev-page-reg').on('click', '.prev-page-reg', function() {
    const url = $(this).data('url');
    const state = pdfState[url];
    if (state && state.currentPage > 1) {
        state.currentPage--;
        renderPage(state.doc, state.currentPage, $(`#${$(this).data('viewer')}`), url);
    }
});

$(document).off('click', '.next-page-reg').on('click', '.next-page-reg', function() {
    const url = $(this).data('url');
    const state = pdfState[url];
    if (state && state.currentPage < state.totalPages) {
        state.currentPage++;
        renderPage(state.doc, state.currentPage, $(`#${$(this).data('viewer')}`), url);
    }
});

function updatePageLabel(url, parentElement) {
    if (pdfState[url]) {
        parentElement.find('.page-info').text(`Página: ${pdfState[url].currentPage} de ${pdfState[url].totalPages}`);
    }
}

// SOLO UNA EJECUCIÓN
$(document).ready(function () {
    createRegulationsAccordion();
});