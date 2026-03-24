// 1. Datos de los Modelos
const modelsData = [
    {
        title: "Modelo Aseguramiento de Calidad y Planificación",
        id: "modelOne",
        filePath: "/assets/docs/institucion/modelos/MODELO_ASEGURAMIENTO_CALIDAD_Y_PLANIFICACION_2024.pdf",
    },
    {
        title: "Módulo Educativo 2024 Tecnológico Superarse",
        id: "modelTwo",
        filePath: "/assets/docs/institucion/modelos/MODELO_EDUCATIVO_2024_ISTS.pdf",
    },
    {
        title: "Modelo Tecnológico Superarse 2024",
        id: "modelThree",
        filePath: "/assets/docs/institucion/modelos/MODELO_TECNOLOGICO_SUPERARSE_2024.pdf",
    },
];

// 2. Configuración de PDF.js
if (typeof pdfjsLib !== "undefined") {
    pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
}

const pdfData = {}; // Estado de los PDFs

/**
 * RENDERIZADO DE PDF
 */
async function renderPDF(pdfUrl, container) {
    if (!container || !container.length) return;
    
    container.html(`<div class="text-center p-4"><div class="spinner-border text-primary" role="status"></div><p class="mt-2">Cargando documento...</p></div>`);

    try {
        let pdfDoc = pdfData[pdfUrl] ? pdfData[pdfUrl].doc : null;
        if (!pdfDoc) {
            pdfDoc = await pdfjsLib.getDocument(pdfUrl).promise;
            pdfData[pdfUrl] = { doc: pdfDoc, currentPage: 1, totalPages: pdfDoc.numPages };
        }
        renderPage(pdfDoc, pdfData[pdfUrl].currentPage, container);
    } catch (error) {
        console.error("Error PDF:", error);
        container.html(`<p class="text-danger p-3 text-center">Error al cargar el archivo. Verifique la ruta.</p>`);
    }
}

function renderPage(pdfDoc, pageNum, container) {
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
    });
}

/**
 * CONSTRUCCIÓN DEL ACORDEÓN (Diseño Unificado)
 */
function createAccordion() {
    const accordionContainer = $('#modelsAccordion');
    if (typeof modelsData === 'undefined') return;

    modelsData.forEach((model, index) => {
        const collapseId = `collapse-${index}`;
        const viewerId = `pdf-viewer-${index}`;
        const url = model.filePath;

        const accordionItem = $(`
            <div class="card mb-3">
                <div class="card-header">
                    <button class="btn-link-accordion collapsed" 
                            data-toggle="collapse" 
                            data-target="#${collapseId}" 
                            aria-expanded="false">
                        <span><i class="fas fa-file-pdf mr-3 text-danger"></i> ${model.title}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
                <div id="${collapseId}" class="collapse" data-parent="#modelsAccordion">
                    <div class="card-body bg-light">
                        <div class="d-flex justify-content-between align-items-center mb-3 bg-white p-2 rounded-pill shadow-sm">
                            <button class="btn btn-sm btn-info rounded-pill prev-page px-3" data-url="${url}" data-viewer="${viewerId}" data-collapse="${collapseId}">
                                <i class="fas fa-arrow-left"></i>
                            </button>
                            <span class="page-info font-weight-bold text-primary" data-url="${url}">Página: 1 de ...</span>
                            <button class="btn btn-sm btn-info rounded-pill next-page px-3" data-url="${url}" data-viewer="${viewerId}" data-collapse="${collapseId}">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        <div id="${viewerId}" class="pdf-render-container shadow-sm border rounded bg-white" style="overflow: hidden;">
                        </div>
                        <div class="text-center mt-3">
                             <a href="${url}" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill">
                                <i class="fas fa-external-link-alt mr-1"></i> Abrir en pantalla completa
                             </a>
                        </div>
                    </div>
                </div>
            </div>
        `);

        accordionContainer.append(accordionItem);

        // Evento al abrir
        $(`#${collapseId}`).on('show.bs.collapse', function () {
            renderPDF(url, $(`#${viewerId}`));
            updatePageInfo(url, $(this));
        });
    });
}

/**
 * EVENTOS DE NAVEGACIÓN
 */
$(document).on('click', '.prev-page', function() {
    const url = $(this).data('url');
    const viewer = $(this).data('viewer');
    const parent = $(this).closest('.collapse');
    if (pdfData[url] && pdfData[url].currentPage > 1) {
        pdfData[url].currentPage--;
        renderPage(pdfData[url].doc, pdfData[url].currentPage, $(`#${viewer}`));
        updatePageInfo(url, parent);
    }
});

$(document).on('click', '.next-page', function() {
    const url = $(this).data('url');
    const viewer = $(this).data('viewer');
    const parent = $(this).closest('.collapse');
    if (pdfData[url] && pdfData[url].currentPage < pdfData[url].totalPages) {
        pdfData[url].currentPage++;
        renderPage(pdfData[url].doc, pdfData[url].currentPage, $(`#${viewer}`));
        updatePageInfo(url, parent);
    }
});

function updatePageInfo(url, parentElement) {
    if (pdfData[url]) {
        const current = pdfData[url].currentPage;
        const total = pdfData[url].totalPages;
        parentElement.find('.page-info').text(`Página: ${current} de ${total}`);
    }
}

// Inicialización
$(document).ready(function () {
    createAccordion();
});