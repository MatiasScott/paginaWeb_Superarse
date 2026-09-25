// MVC SubMenu - Talento Humano | Visor de PDF (pdf.js)
// Reemplaza a js/moduls/TalentoHumano/TalentoHumano.js (rendered por el layout ya incluye pdf.js 2.10.105).
(function () {
  'use strict';

  var pdfjs = window.pdfjsLib;
  if (!pdfjs) return;

  pdfjs.GlobalWorkerOptions.workerSrc =
    'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.105/pdf.worker.min.js';

  // Estado por visor/canvas
  var pdfStates = {};   // { [canvasId]: { pdfDoc, pageNum } }
  var renderTasks = {}; // Rastreador de tareas de renderizado para evitar colisiones

  function getCanvasContainerWidth(canvas) {
    if (canvas.parentElement && canvas.parentElement.clientWidth) {
      return canvas.parentElement.clientWidth;
    }
    return canvas.clientWidth || 800;
  }

  async function renderPage(canvasId, pageNum) {
    var state = pdfStates[canvasId];
    if (!state || pageNum < 1 || pageNum > state.pdfDoc.numPages) return;

    state.pageNum = pageNum;
    var canvas = document.getElementById(canvasId);
    if (!canvas) return;

    var ctx = canvas.getContext('2d');

    if (renderTasks[canvasId]) {
      try {
        await renderTasks[canvasId].cancel();
      } catch (e) {
        // Error esperado al cancelar tarea
      }
    }

    try {
      var page = await state.pdfDoc.getPage(pageNum);
      var viewport = page.getViewport({ scale: 1 });
      var scale = getCanvasContainerWidth(canvas) / viewport.width;
      var scaledViewport = page.getViewport({ scale: scale });

      canvas.width = Math.floor(scaledViewport.width);
      canvas.height = Math.floor(scaledViewport.height);

      var renderTask = page.render({ canvasContext: ctx, viewport: scaledViewport });
      renderTasks[canvasId] = renderTask;

      await renderTask.promise;
      renderTasks[canvasId] = null;

      updatePaginator(canvasId);
    } catch (err) {
      if (err.name === 'RenderingCancelledException') return;

      console.error('Error al renderizar página ' + pageNum + ' (' + canvasId + '):', err);
      ctx.font = '16px Arial';
      ctx.fillStyle = 'red';
      ctx.textAlign = 'center';
      ctx.fillText('Error al cargar la página', canvas.width / 2, canvas.height / 2);
    }
  }

  function updatePaginator(canvasId) {
    var state = pdfStates[canvasId];
    var paginator = document.querySelector('.pdf-paginator[data-canvas-id*="' + canvasId + '"]');
    if (!state || !paginator) return;

    var pageNumElem = paginator.querySelector('.page-num');
    var pageCountElem = paginator.querySelector('.page-count');
    var prevBtn = paginator.querySelector('[data-action="prev"]');
    var nextBtn = paginator.querySelector('[data-action="next"]');

    if (pageNumElem) pageNumElem.textContent = state.pageNum;
    if (pageCountElem) pageCountElem.textContent = state.pdfDoc.numPages;
    if (prevBtn) prevBtn.disabled = state.pageNum <= 1;
    if (nextBtn) nextBtn.disabled = state.pageNum >= state.pdfDoc.numPages;
  }

  async function loadPdfAndRender(pdfUrl, canvasId) {
    var canvas = document.getElementById(canvasId);
    if (!canvas) return;

    if (renderTasks[canvasId]) {
      renderTasks[canvasId].cancel();
    }

    var ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.font = '18px Arial';
    ctx.fillStyle = 'blue';
    ctx.textAlign = 'center';
    ctx.fillText('Cargando PDF...', canvas.width / 2 || 150, canvas.height / 2 || 20);

    try {
      var safeUrl = encodeURI(pdfUrl);
      var pdfDoc = await pdfjs.getDocument(safeUrl).promise;

      pdfStates[canvasId] = { pdfDoc: pdfDoc, pageNum: 1 };
      await renderPage(canvasId, 1);
    } catch (err) {
      console.error('Error al cargar el PDF:', err);
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.fillStyle = 'red';
      ctx.fillText('Error al cargar el PDF', canvas.width / 2 || 150, canvas.height / 2 || 20);
    }
  }

  function setupPaginators() {
    document.querySelectorAll('.pdf-paginator').forEach(function (paginator) {
      paginator.addEventListener('click', function (e) {
        var button = e.target.closest('[data-action]');
        if (!button) return;

        var action = button.getAttribute('data-action');
        var ids = (paginator.getAttribute('data-canvas-id') || '')
          .split(',').map(function (s) { return s.trim(); }).filter(Boolean);
        if (ids.length === 0) return;

        var canvasId = ids.find(function (id) {
          var c = document.getElementById(id);
          return c && c.offsetParent !== null;
        }) || ids[0];

        var state = pdfStates[canvasId];
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
    document.querySelectorAll('.pdf-submenu .list-group-item').forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        var pdfSrc = link.getAttribute('data-pdf-src');
        var canvasId = link.getAttribute('data-canvas-id');

        if (pdfSrc && canvasId) {
          loadPdfAndRender(pdfSrc, canvasId);
        }
      });
    });
  }

  function setupResponsiveRedraw() {
    function redrawVisible() {
      Object.keys(pdfStates).forEach(function (canvasId) {
        var canvas = document.getElementById(canvasId);
        if (canvas && canvas.offsetParent !== null) {
          renderPage(canvasId, pdfStates[canvasId].pageNum);
        }
      });
    }

    window.addEventListener('resize', redrawVisible);

    document.querySelectorAll('[data-bs-toggle="list"]').forEach(function (el) {
      el.addEventListener('shown.bs.tab', redrawVisible);
    });
  }

  function autoloadFirstPdf() {
    document.querySelectorAll('.pdf-submenu').forEach(function (menu) {
      var firstPdfLink = menu.querySelector('.list-group-item[data-pdf-src][data-canvas-id]');
      if (firstPdfLink) {
        firstPdfLink.click();
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    setupPaginators();
    setupPdfMenuClicks();
    setupResponsiveRedraw();
    autoloadFirstPdf();

    // URL fragment a una pestaña concreta
    if (window.location.hash === '#list-evaluacion') {
      var tabTrigger = document.querySelector('#list-evaluacion-list');
      if (tabTrigger && window.bootstrap && window.bootstrap.Tab) {
        var tab = new window.bootstrap.Tab(tabTrigger);
        tab.show();
        var target = document.getElementById('list-evaluacion');
        if (target) target.scrollIntoView({ behavior: 'smooth' });
      }
    }
  });
})();