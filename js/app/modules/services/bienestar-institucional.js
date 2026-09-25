// ===================================================
//  COMPORTAMIENTO — Carruseles owl de Bienestar Institucional
//  (los datos se renderizan server-side desde la vista PHP)
// ===================================================

(function () {
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.jQuery || !jQuery.fn || !jQuery.fn.owlCarousel) {
            return;
        }

        document.querySelectorAll('.carrusel-limpio .owl-carousel').forEach(function (owlContainer) {
            var selector = '#' + owlContainer.parentElement.id + ' .owl-carousel';
            var $owl = jQuery(selector);

            if ($owl.length === 0) {
                return;
            }

            $owl.owlCarousel({
                items: 3,
                loop: true,
                autoplay: true,
                autoplayTimeout: 2500,
                dots: true,
                margin: 12,
                responsive: {
                    0: { items: 1 },
                    768: { items: 2 },
                    1200: { items: 3 }
                }
            });
        });
    });
})();

// ===================================================
//  TABS — 6 botones laterales + panel de contenido
// ===================================================

(function () {
    document.addEventListener('DOMContentLoaded', function () {
        var botones = document.querySelectorAll('button.bienestar-menu-btn');
        var paneles = document.querySelectorAll('.bienestar-panel');

        if (botones.length === 0 || paneles.length === 0) {
            return;
        }

        botones.forEach(function (boton) {
            boton.addEventListener('click', function () {
                var destino = boton.getAttribute('data-bienestar-target');

                botones.forEach(function (b) {
                    b.classList.toggle('is-active', b === boton);
                });

                paneles.forEach(function (panel) {
                    panel.classList.toggle('is-active', panel.id === destino);
                });

                var panelActivo = document.getElementById(destino);
                if (!panelActivo) {
                    return;
                }

                // Recalcula los carruseles owl que estaban ocultos
                if (window.jQuery && jQuery.fn && jQuery.fn.owlCarousel) {
                    jQuery(panelActivo).find('.owl-carousel').trigger('refresh.owl.carousel');
                }

                // Mantiene el panel visible en pantalla
                panelActivo.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            });
        });
    });
})();

// ===================================================
//  CLUBES — los botones muestran la info a la lado (sin modal)
// ===================================================

(function () {
    document.addEventListener('DOMContentLoaded', function () {
        var botones = document.querySelectorAll('.club-menu-btn');
        var cuerpos = document.querySelectorAll('.club-detalle-cuerpo');

        if (botones.length === 0 || cuerpos.length === 0) {
            return;
        }

        botones.forEach(function (boton) {
            boton.addEventListener('click', function () {
                var destino = boton.getAttribute('data-bienestar-club');

                botones.forEach(function (b) {
                    b.classList.toggle('is-active', b === boton);
                });

                cuerpos.forEach(function (cuerpo) {
                    cuerpo.classList.toggle('is-active', cuerpo.id === destino);
                });
            });
        });
    });
})();