// MVC SubMenu - Evaluación Docente | Periodos de "Mejores Evaluados"
// Reemplaza a js/moduls/MejoresEvaluados/evaluados.js (sin clonar templates ni duplicar IDs).
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var displayArea = document.getElementById('content-display-area');
    var links = document.querySelectorAll('[data-content-id]');
    if (!displayArea || links.length === 0) return;

    var periodos = Array.prototype.slice.call(displayArea.querySelectorAll('.mejores-evaluados-periodo'));

    var initialized = {};

    function initProfileHandlers(periodo) {
      var perfiles = periodo.querySelectorAll('.clickable-item');
      var contenedorFotoGrande = periodo.querySelector('.contenedor-foto-grande');
      var fotoPrincipal = periodo.querySelector('.foto-profesor-principal');
      var nombreProfesor = periodo.querySelector('.foto-profesor-nombre');

      if (!contenedorFotoGrande || !fotoPrincipal || !nombreProfesor) return;

      // Selecciona el primer perfil por defecto
      if (perfiles.length > 0) {
        selectProfile(perfiles[0]);
      }

      perfiles.forEach(function (perfil) {
        perfil.addEventListener('click', function () {
          selectProfile(perfil);
          perfiles.forEach(function (p) { p.classList.remove('selected'); });
          perfil.classList.add('selected');
        });
      });

      function selectProfile(perfil) {
        fotoPrincipal.src = perfil.getAttribute('data-large-src');
        nombreProfesor.textContent = perfil.getAttribute('data-name');
        contenedorFotoGrande.classList.remove('d-none');
      }
    }

    function activate(contentId) {
      periodos.forEach(function (periodo) {
        var visible = periodo.id === contentId;
        periodo.classList.toggle('d-none', !visible);

        if (visible && !initialized[contentId]) {
          initProfileHandlers(periodo);
          initialized[contentId] = true;
        }
      });

      links.forEach(function (link) {
        var isActive = link.getAttribute('data-content-id') === contentId;
        link.classList.toggle('active', isActive);
      });
    }

    links.forEach(function (link) {
      link.addEventListener('click', function (event) {
        event.preventDefault();
        activate(link.getAttribute('data-content-id'));
      });
    });

    // Carga el periodo por defecto
    var firstLink = document.querySelector('[data-content-id]');
    if (firstLink) {
      activate(firstLink.getAttribute('data-content-id'));
    }
  });
})();