// MVC SubMenu - Talento Humano | Modales legacy (BS4 + jQuery) y carruseles de imágenes
// Reemplaza a js/moduls/TalentoHumano/{trabajaScrip,ImagenesTalento,VideosTalento}.js
// (los modales genéricos/video sin disparadores en la página fueron eliminados).
(function () {
  'use strict';

  // ---- Modales de la pestaña "Trabaja con nosotros" (Bootstrap 4 + jQuery) ----
  if (window.jQuery) {
    var $ = window.jQuery;
    var $document = $(document);

    $document.on('shown.bs.modal', '#vacantesModal', function () {
      $('#vacantesCarousel').carousel();
    });

    $document.on('show.bs.modal', '#pdfModal', function (event) {
      var trigger = $(event.relatedTarget);
      var pdfSrc = trigger.data('pdf-src');
      if (pdfSrc) {
        $(this).find('#pdfFrame').attr('src', pdfSrc);
      }
    });

    $document.on('shown.bs.modal', '#entornoLaboralModal', function () {
      $('#entornoCarousel').carousel();
    });
  }

  // ---- Carruseles de imágenes (infraestructura y S.S.O) ----
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.image-carousel-container').forEach(function (container) {
      var wrapper = container.querySelector('.image-carousel-wrapper');
      var track = container.querySelector('.image-carousel-track');
      if (!wrapper || !track) return;

      var items = Array.from(track.querySelectorAll('.image-carousel-item'));
      if (items.length === 0) return;

      var currentIndex = 0;

      var moveCarousel = function () {
        var itemWidth = wrapper.offsetWidth;
        track.style.transform = 'translateX(' + (-currentIndex * itemWidth) + 'px)';
      };

      var autoplayId = setInterval(function () {
        currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
        moveCarousel();
      }, 5000);

      moveCarousel();
      window.addEventListener('resize', moveCarousel);
      window.addEventListener('beforeunload', function () { clearInterval(autoplayId); });
    });

    setupBestTeachers();
  });

  // ---- Mejores evaluados: foto grande del docente seleccionado ----
  function setupBestTeachers() {
    var perfiles = document.querySelectorAll('.clickable-item');
    var fotoPrincipal = document.getElementById('foto-principal');
    var nombreProfesor = document.getElementById('nombre-profesor');
    var contenedorFotoGrande = document.getElementById('contenedor-foto-grande');

    if (perfiles.length === 0 || !fotoPrincipal || !nombreProfesor || !contenedorFotoGrande) return;

    function select(index) {
      var imagenSrc = perfiles[index].getAttribute('data-large-src');
      var nombre = perfiles[index].getAttribute('data-name');

      fotoPrincipal.src = imagenSrc;
      nombreProfesor.textContent = nombre;
      contenedorFotoGrande.classList.remove('d-none');

      perfiles.forEach(function (p) { p.classList.remove('selected'); });
      perfiles[index].classList.add('selected');
    }

    select(0);

    perfiles.forEach(function (perfil, index) {
      perfil.addEventListener('click', function () { select(index); });
    });
  }
})();