// Espera a que el documento esté completamente cargado
$(document).ready(function() {

    // Lógica para el carrusel de convenios
    const $conveniosCarousel = $(".convenios-carousel");
    
    // Genera el HTML de los ítems para el carrusel de convenios
    if (typeof conveniosImages !== 'undefined') {
        conveniosImages.forEach(function(image) {
            const itemHtml = `
                <div class="team-item p-3">
                    <div class="position-relative overflow-hidden hover-zoom">
                        <a href="${image.url}" data-lightbox="convenios">
                            <img class="img-fluid w-100 small-convenio" src="${image.url}" alt="${image.alt}" />
                        </a>
                    </div>
                </div>
            `;
            $conveniosCarousel.append(itemHtml);
        });
    }

    // Inicializa el carrusel de convenios
    $conveniosCarousel.owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 6
            }
        }
    });

    // Lógica para el segundo carrusel
    const $otrasFotosCarousel = $(".otras-fotos-carousel");
    
    // Genera el HTML de los ítems para el segundo carrusel
    if (typeof otrasFotos !== 'undefined') {
        otrasFotos.forEach(function(image) {
            const itemHtml = `
                <div class="team-item p-3">
                    <div class="position-relative overflow-hidden hover-zoom">
                        <a href="${image.url}" data-lightbox="otras-fotos">
                            <img class="img-fluid w-100 small-convenio" src="${image.url}" alt="${image.alt}" />
                        </a>
                    </div>
                </div>
            `;
            $otrasFotosCarousel.append(itemHtml);
        });
    }

    // Inicializa el segundo carrusel
    $otrasFotosCarousel.owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 6
            }
        }
    });

    
    // Lógica para el tercer carrusel
    // **CORRECCIÓN:** Se usa un selector de clase único para el tercer carrusel
    const $otrasFotosCarousel2 = $(".otras-fotos-carousel2");
    
    // Genera el HTML de los ítems para el tercer carrusel usando la constante otrasFotos2
    if (typeof otrasFotos2 !== 'undefined') {
        otrasFotos2.forEach(function(image) {
            const itemHtml = `
                <div class="team-item p-3">
                    <div class="position-relative overflow-hidden hover-zoom">
                        <a href="${image.url}" data-lightbox="otras-fotos-2">
                            <img class="img-fluid w-100 small-convenio" src="${image.url}" alt="${image.alt}" />
                        </a>
                    </div>
                </div>
            `;
            // **CORRECCIÓN:** Se añade el HTML al carrusel con la clase ".otras-fotos-carousel2"
            $otrasFotosCarousel2.append(itemHtml);
        });
    }

    // Inicializa el tercer carrusel
    $otrasFotosCarousel2.owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });
});