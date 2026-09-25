// Comportamiento del acordeón de modelos institucionales.
// El acuerdo (HTML) viene renderizado desde la vista MVC; aquí solo
// se encarga del renderizado del PDF y la navegación de páginas.

if (typeof pdfjsLib !== "undefined") {
    pdfjsLib.GlobalWorkerOptions.workerSrc = "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js";
}

const pdfData = {};

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

$(document).on('show.bs.collapse', '[id^="collapse-"]', function () {
    const index = $(this).attr('id').replace('collapse-', '');
    const item = $('[data-collapse="' + $(this).attr('id') + '"]').first();
    const url = item.data('url');
    if (url) {
        renderPDF(url, $(`#pdf-viewer-${index}`));
        updatePageInfo(url, $(this));
    }
});