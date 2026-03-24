// Configurar worker de PDF.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

// Estado por visor/canvas
const pdfStates = {}; // { [canvasId]: { pdfDoc, pageNum } }
const renderTasks = {}; // --- NUEVO: Rastreador de tareas de renderizado para evitar colisiones ---

// -----------------------------------------------------------------------
// FUNCIONES DE RENDERIZADO Y PAGINACIÓN
// -----------------------------------------------------------------------

// Render de página
async function renderPage(canvasId, pageNum) {
    const state = pdfStates[canvasId];
    if (!state || pageNum < 1 || pageNum > state.pdfDoc.numPages) return;

    state.pageNum = pageNum;
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;

    const ctx = canvas.getContext('2d');

    // --- SOLUCIÓN AL ERROR: CANCELAR TAREA PREVIA SI EXISTE ---
    if (renderTasks[canvasId]) {
        try {
            await renderTasks[canvasId].cancel();
        } catch (e) {
            // Error esperado al cancelar tarea
        }
    }

    try {
        const page = await state.pdfDoc.getPage(pageNum);

        // Escala basada en ancho del contenedor del canvas
        const container = canvas.parentElement;
        const containerWidth = container.clientWidth || canvas.clientWidth || 800;
        const viewport = page.getViewport({ scale: 1 });
        const scale = containerWidth / viewport.width;
        const scaledViewport = page.getViewport({ scale });

        canvas.width = Math.floor(scaledViewport.width);
        canvas.height = Math.floor(scaledViewport.height);

        // --- INICIAR NUEVA TAREA DE RENDERIZADO ---
        const renderTask = page.render({ canvasContext: ctx, viewport: scaledViewport });
        renderTasks[canvasId] = renderTask;

        await renderTask.promise;
        renderTasks[canvasId] = null; // Limpiar al finalizar con éxito

        updatePaginator(canvasId);
    } catch (err) {
        // Si el error es por cancelación, no es un error real, solo retornamos
        if (err.name === 'RenderingCancelledException') return;

        console.error(`Error al renderizar página ${pageNum} (${canvasId}):`, err);
        ctx.font = '16px Arial';
        ctx.fillStyle = 'red';
        ctx.textAlign = 'center';
        ctx.fillText('Error al cargar la página', canvas.width / 2, canvas.height / 2);
    }
}

// Actualizar paginador del visor correspondiente
function updatePaginator(canvasId) {
    const state = pdfStates[canvasId];
    const paginator = document.querySelector(`.pdf-paginator[data-canvas-id*="${canvasId}"]`);
    if (!state || !paginator) return;

    const pageNumElem = paginator.querySelector('.page-num');
    const pageCountElem = paginator.querySelector('.page-count');
    const prevBtn = paginator.querySelector('[data-action="prev"]');
    const nextBtn = paginator.querySelector('[data-action="next"]');

    if (pageNumElem) pageNumElem.textContent = state.pageNum;
    if (pageCountElem) pageCountElem.textContent = state.pdfDoc.numPages;
    if (prevBtn) prevBtn.disabled = state.pageNum <= 1;
    if (nextBtn) nextBtn.disabled = state.pageNum >= state.pdfDoc.numPages;
}

// Cargar un PDF y dibujar primera página
async function loadPdfAndRender(pdfUrl, canvasId) {
    const canvas = document.getElementById(canvasId);
    if (!canvas) return;

    // Si había una tarea de renderizado en curso, la cancelamos antes de cargar el nuevo doc
    if (renderTasks[canvasId]) {
        renderTasks[canvasId].cancel();
    }

    const ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.font = '18px Arial';
    ctx.fillStyle = 'blue';
    ctx.textAlign = 'center';
    ctx.fillText('Cargando PDF...', canvas.width / 2 || 150, canvas.height / 2 || 20);

    try {
        const safeUrl = encodeURI(pdfUrl);
        const pdfDoc = await pdfjsLib.getDocument(safeUrl).promise;

        pdfStates[canvasId] = { pdfDoc, pageNum: 1 };
        await renderPage(canvasId, 1);
    } catch (err) {
        console.error('Error al cargar el PDF:', err);
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = 'red';
        ctx.fillText('Error al cargar el PDF', canvas.width / 2 || 150, canvas.height / 2 || 20);
    }
}

// -----------------------------------------------------------------------
// FUNCIONES DE SETUP Y MANEJO DE EVENTOS
// -----------------------------------------------------------------------

function setupPaginators() {
    document.querySelectorAll('.pdf-paginator').forEach(paginator => {
        paginator.addEventListener('click', (e) => {
            const button = e.target.closest('[data-action]');
            if (!button) return;

            const action = button.getAttribute('data-action');
            const ids = (paginator.getAttribute('data-canvas-id') || '').split(',').map(s => s.trim()).filter(Boolean);
            if (ids.length === 0) return;

            let canvasId = ids.find(id => {
                const c = document.getElementById(id);
                return c && c.offsetParent !== null; // Buscar el que esté visible
            }) || ids[0];

            const state = pdfStates[canvasId];
            if (!state) return;

            if (action === 'prev' && state.pageNum > 1) {
                renderPage(canvasId, state.pageNum - 1);
            } else if (action === 'next' && state.pageNum < state.pdfDoc.numPages) {
                renderPage(canvasId, state.pageNum + 1);
            }
        });
    });
}

function setupPdfMenuClicks() {
    document.querySelectorAll('.pdf-submenu .list-group-item').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const pdfSrc = link.getAttribute('data-pdf-src');
            const canvasId = link.getAttribute('data-canvas-id');

            if (link.getAttribute('data-bs-toggle') === 'list') {
                if (typeof bootstrap !== 'undefined' && bootstrap.Tab) {
                    const tab = new bootstrap.Tab(link);
                    tab.show();
                }
            }

            if (pdfSrc && canvasId) {
                loadPdfAndRender(pdfSrc, canvasId);
            }
        });
    });
}

function setupResponsiveRedraw() {
    window.addEventListener('resize', () => {
        Object.keys(pdfStates).forEach(canvasId => {
            const canvas = document.getElementById(canvasId);
            if (canvas && canvas.offsetParent !== null) {
                renderPage(canvasId, pdfStates[canvasId].pageNum);
            }
        });
    });

    document.querySelectorAll('[data-bs-toggle="list"]').forEach(el => {
        el.addEventListener('shown.bs.tab', () => {
            Object.keys(pdfStates).forEach(canvasId => {
                const canvas = document.getElementById(canvasId);
                if (canvas && canvas.offsetParent !== null) {
                    renderPage(canvasId, pdfStates[canvasId].pageNum);
                }
            });
        });
    });
}

function setupBestTeachers() {
    const perfiles = document.querySelectorAll('.clickable-item');
    const fotoPrincipal = document.getElementById('foto-principal');
    const nombreProfesor = document.getElementById('nombre-profesor');
    const contenedorFotoGrande = document.getElementById('contenedor-foto-grande');

    if (perfiles.length > 0 && fotoPrincipal && nombreProfesor && contenedorFotoGrande) {
        const primerPerfil = perfiles[0];
        const imagenSrc = primerPerfil.getAttribute('data-large-src');
        const nombre = primerPerfil.getAttribute('data-name');
        
        fotoPrincipal.src = imagenSrc;
        nombreProfesor.textContent = nombre;
        contenedorFotoGrande.classList.remove('d-none');
        primerPerfil.classList.add('selected');
    }

    perfiles.forEach(perfil => {
        perfil.addEventListener('click', () => {
            const imagenSrc = perfil.getAttribute('data-large-src');
            const nombre = perfil.getAttribute('data-name');

            if (fotoPrincipal && nombreProfesor && contenedorFotoGrande) {
                fotoPrincipal.src = imagenSrc;
                nombreProfesor.textContent = nombre;
                contenedorFotoGrande.classList.remove('d-none');
            }
            perfiles.forEach(p => p.classList.remove('selected'));
            perfil.classList.add('selected');
        });
    });
}

function autoloadFirstPdf() {
    const pdfSubmenus = document.querySelectorAll('.pdf-submenu');
    pdfSubmenus.forEach(menu => {
        const firstPdfLink = menu.querySelector('.list-group-item[data-pdf-src][data-canvas-id]');
        if (firstPdfLink) {
            // Usamos un pequeño delay opcional si hay muchos menús, 
            // aunque con la cancelación de tareas ya no es estrictamente necesario.
            firstPdfLink.click();
        }
    });
}

// -----------------------------------------------------------------------
// INICIALIZACIÓN GLOBAL
// -----------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    setupPaginators();
    setupPdfMenuClicks();
    setupResponsiveRedraw();
    setupBestTeachers();
    autoloadFirstPdf(); 

    // Manejo de Hash para tabs específicos
    if (window.location.hash === "#list-evaluacion") {
        const tabTrigger = document.querySelector('#list-evaluacion-list');
        if (tabTrigger && typeof bootstrap !== 'undefined' && bootstrap.Tab) {
            const tab = new bootstrap.Tab(tabTrigger);
            tab.show();
            
            const target = document.getElementById('list-evaluacion');
            if (target) target.scrollIntoView({ behavior: 'smooth' });
        }
    }
});
