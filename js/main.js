(function ($) {
  "use strict";
  $(document).ready(function () {
    function toggleNavbarMethod() {
      if ($(window).width() > 992) {
        // MANEJO DE MENÚS PRINCIPALES: Se abren al pasar el mouse
        $(".navbar .dropdown")
          .off("mouseover")
          .off("mouseout")
          .on("mouseover", function () {
            $(this)
              .addClass("show")
              .find(".dropdown-menu")
              .first()
              .addClass("show");
            $(this)
              .find(".dropdown-toggle")
              .first()
              .attr("aria-expanded", "true");
          })
          .on("mouseout", function () {
            var $this = $(this);
            // Retraso para evitar cierres accidentales al mover el mouse
            setTimeout(function () {
              // Solo cierra el menú principal si el mouse no está sobre él Y no hay submenús abiertos
              // Esto es crucial para que los submenús no se cierren inesperadamente.
              if (
                !$this.is(":hover") &&
                $this.find(".dropdown-menu .dropdown-menu.show").length === 0
              ) {
                $this
                  .removeClass("show")
                  .find(".dropdown-menu")
                  .first()
                  .removeClass("show");
                $this
                  .find(".dropdown-toggle")
                  .first()
                  .attr("aria-expanded", "false")
                  .blur();
              }
            }, 150); // Un pequeño retraso para suavizar el efecto
          });

        // MANEJO DE SUBMENÚS ANIDADOS (como 'Marco Legal'): Se abren SOLO al hacer clic
        // *** CRUCIAL: Desactivar explícitamente cualquier evento de mouseover/mouseout anterior ***
        $(".dropdown-menu .dropdown-item.dropdown-toggle")
          .off("mouseover")
          .off("mouseout");

        // Añadimos el evento de clic para los submenús anidados
        $(".dropdown-menu .dropdown-item.dropdown-toggle").on(
          "click",
          function (e) {
            var $el = $(this);
            var $subMenu = $el.next(".dropdown-menu");

            // Cierra cualquier otro submenú abierto en el mismo nivel (entre los anidados)
            $el
              .parents(".dropdown-menu")
              .first()
              .find(".dropdown-menu.show")
              .removeClass("show");

            // Alterna la visibilidad del submenú actual
            $subMenu.toggleClass("show");

            // Actualiza atributos de accesibilidad
            $el.toggleClass("active-submenu-parent"); // Para estilos si usas esta clase
            $el.attr("aria-expanded", $subMenu.hasClass("show"));

            // Detiene la propagación del evento para evitar que el menú principal se cierre
            e.stopPropagation();
            // Previene el comportamiento por defecto del enlace (href="#")
            e.preventDefault();
          }
        );

        // Cierra submenús anidados cuando el dropdown principal se cierra (por cualquier motivo)
        $(".navbar .dropdown").on("hidden.bs.dropdown", function () {
          $(this)
            .find(".dropdown-menu .dropdown-menu.show")
            .removeClass("show");
          $(this)
            .find(".dropdown-menu .dropdown-item.dropdown-toggle")
            .removeClass("active-submenu-parent");
          $(this)
            .find(".dropdown-menu .dropdown-item.dropdown-toggle")
            .attr("aria-expanded", "false");
        });
      } else {
        // EN PANTALLAS PEQUEÑAS (MÓVILES): Todo funciona con clic por defecto de Bootstrap
        // Aseguramos que no haya eventos de hover activos si se redimensiona
        $(".navbar .dropdown").off("mouseover").off("mouseout");
        $(".dropdown-menu .dropdown-item.dropdown-toggle")
          .off("mouseover")
          .off("mouseout");

        // Aseguramos que los submenús anidados sigan funcionando con clic en móviles
        $(".dropdown-menu .dropdown-item.dropdown-toggle").on(
          "click",
          function (e) {
            var $el = $(this);
            var $subMenu = $el.next(".dropdown-menu");

            $el
              .parents(".dropdown-menu")
              .first()
              .find(".show")
              .removeClass("show");
            $subMenu.toggleClass("show");
            $el.attr("aria-expanded", $subMenu.hasClass("show"));
            e.stopPropagation();
            e.preventDefault();
          }
        );
        // NOTA: Para los dropdowns principales en móviles, Bootstrap debería manejar el clic por defecto.
        // Si no funcionan, podrías necesitar un .on('click') específico para ellos también.
      }
    }

    // Inicializa la función y la vuelve a llamar al redimensionar la ventana
    toggleNavbarMethod();
    $(window).resize(toggleNavbarMethod);
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  // Portfolio isotope and filter
  var portfolioIsotope = $(".portfolio-container").isotope({
    itemSelector: ".portfolio-item",
    layoutMode: "fitRows",
  });

  $("#portfolio-flters li").on("click", function () {
    $("#portfolio-flters li").removeClass("active");
    $(this).addClass("active");

    portfolioIsotope.isotope({ filter: $(this).data("filter") });
  });

  // Post carousel
  $(".post-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    dots: false,
    loop: true,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
    },
  });

  $(".postA-carousel").owlCarousel({
    autoplay: true,
    smartSpeed: 1500,
    dots: false,
    loop: true,
    nav: true,
    navText: [
      '<i class="fa fa-angle-left" aria-hidden="true"></i>',
      '<i class="fa fa-angle-right" aria-hidden="true"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 1,
      },
      768: {
        items: 2,
      },
      992: {
        items: 2,
      },
    },
  });

})(jQuery);

function generarHeader() {
  const headerContainer = document.querySelector(
    "body > .container-fluid.bg-light"
  );
  if (!headerContainer) {
    console.error("No se encontró el contenedor principal del header.");
    return;
  }

  const resolvePath = typeof window.resolveSuperarsePath === "function"
    ? window.resolveSuperarsePath
    : (path) => path;

  // Función auxiliar para generar submenús de forma recursiva
  const generarDropdownMenu = (items) => {
    let menuHtml = "";
    items.forEach((item) => {
      if (item.items) {
        // Si el ítem tiene sub-ítems, genera otro dropdown (dropright)
        menuHtml += `
                    <div class="dropdown dropright">
                        <a class="dropdown-item dropdown-toggle" href="${resolvePath(item.enlace || "#")
          }" id="${item.id
          }" aria-haspopup="true" aria-expanded="false">
                            ${item.texto}
                        </a>
                        <div class="dropdown-menu rounded-0 m-0" aria-labelledby="${item.id
          }">
                            ${generarDropdownMenu(item.items)}
                        </div>
                    </div>
                `;
      } else {
        // Si es un ítem simple, genera un enlace
        menuHtml += `<a href="${resolvePath(item.enlace)}" class="dropdown-item" ${item.target ? `target="${item.target}"` : ""
          }>${item.texto}</a>`;
      }
    });
    return menuHtml;
  };

  // Construye la barra superior
  let topbarHtml = `
        <nav class="navbar navbar-expand-lg py-1 px-0 px-lg-1 fixed-top bg-dark navbar-dark" style="font-size: 0.9rem; z-index: 1030">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex justify-content-start w-100">
    `;
  headerData.topbar.slice(0, 2).forEach((item) => {
    topbarHtml += `<a href="${resolvePath(item.enlace)}" class="navbar-link ${item.clases}"><i class="${item.icono}"></i>${item.texto}</a>`;
  });
  topbarHtml += `</div><div class="navbar-nav ml-auto" style="margin-right: 10%">`;
  headerData.topbar.slice(2).forEach((item) => {
    if (item.items) {
      topbarHtml += `
                <div class="nav-item dropdown">
                    <a href="#" class="${item.clases}" data-toggle="dropdown">${item.texto
        }</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        ${generarDropdownMenu(item.items)}
                    </div>
                </div>
            `;
    } else {
      topbarHtml += `<a href="${resolvePath(item.enlace)}" class="${item.clases}" ${item.target ? `target="${item.target}"` : ""
        }>${item.texto}</a>`;
    }
  });
  topbarHtml += `</div></nav>`;

  // Construye la barra de navegación principal
  let mainNavHtml = `
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-1 fixed-top" style="margin-top: 28px; z-index: 1020">
            <a href="${resolvePath('/index.html')}" class="navbar-brand" style="width: min-content; height: min-content">
              <img src="${resolvePath('/assets/img/content/logo/superarse_gris.png')}" alt="logo" width="140rem" />
            </a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
    `;
  headerData.mainNav.forEach((item) => {
    if (item.items) {
      mainNavHtml += `
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">${item.texto
        }</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        ${generarDropdownMenu(item.items)}
                    </div>
                </div>
            `;
    } else {
      mainNavHtml += `<a href="${resolvePath(item.enlace)}" class="nav-item nav-link">${item.texto}</a>`;
    }
  });
  // Añade el enlace final de "Plataformas"
  mainNavHtml += `
                </div>
                <a href="${resolvePath(headerData.finalLink.enlace)}" class="${headerData.finalLink.clases
    }" ${headerData.finalLink.target ? `target="${headerData.finalLink.target}"` : ""
    }>
                    ${headerData.finalLink.texto}
                </a>
            </div>
        </nav>
    `;

  // Inserta el HTML completo en el contenedor del header
  headerContainer.innerHTML = topbarHtml + mainNavHtml;
}

// Función para generar y renderizar las tarjetas de aranceles
function generarAranceles() {
  const contenedorAranceles = document.querySelector(".row.justify-content-center");

  // --- 1. VALIDACIÓN DEL CONTENEDOR ---
  if (!contenedorAranceles) {
    return;
  }

  // --- 2. VALIDACIÓN DE LOS DATOS (Soluciona el ReferenceError) ---
  // Si la variable 'aranceles' no existe, salimos silenciosamente
  if (typeof aranceles === 'undefined') {
    // Opcional: console.warn("La variable 'aranceles' no está definida.");
    return;
  }

  let htmlContent = "";

  aranceles.forEach((item) => {
    htmlContent += `
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between align-items-center text-center">
            <h4 class="mb-3">${item.titulo}</h4>
            <p class="text-muted mb-3">${item.descripcion}</p>
            <a href="${item.url}" target="_blank" class="btn btn-primary py-2 px-4 mt-auto">
              <i class="fa fa-file-pdf mr-2"></i> Descargar PDF
            </a>
          </div>
        </div>
      `;
  });

  contenedorAranceles.innerHTML = htmlContent;
}
// Función para generar las tarjetas y el carrusel
function generarOfertaAcademica() {
  const contenedorOferta = document.querySelector(
    ".owl-carousel.ofertaA-carousel"
  );
  let htmlContent = "";

  if (contenedorOferta) {
    carreras.forEach((carrera) => {
      // El HTML de cada tarjeta va dentro de la clase testimonial-item
      htmlContent += `
        <div class="testimonial-item px-3">
          <a href="#" class="d-block" data-toggle="modal" data-target="#${carrera.modalId}">
            <img src="${carrera.imagenSrc}" alt="Imagen de ${carrera.titulo}" class="img-fluid-ofertaA rounded-top" />
          </a>
          <p class="text-muted text-center mt-2">Haz clic en la imagen para ver más detalles de la carrera.</p>
          <div class="card-body text-center">
            <h4 class="card-title">${carrera.titulo}</h4>
          </div>
          <div class="card-footer bg-transparent py-4 px-5">
            <div class="row border-bottom">
              <div class="col-6 py-1 text-right border-right small"><strong>Resolución</strong></div>
              <div class="col-6 py-1">${carrera.resolucion}</div>
            </div>
            <div class="row border-bottom">
              <div class="col-6 py-1 text-right border-right small"><strong>Duración</strong></div>
              <div class="col-6 py-1">${carrera.duracion}</div>
            </div>
            <div class="row border-bottom">
              <div class="col-6 py-1 text-right border-right small"><strong>Modalidad</strong></div>
              <div class="col-6 py-1">${carrera.modalidad}</div>
            </div>
            <div class="row border-bottom">
              <div class="col-6 py-1 text-right border-right "><strong>Niveles</strong></div>
              <div class="col-6 py-1">${carrera.niveles}</div>
            </div>
            <div class="row">
              <div class="col-6 py-1 text-right border-right "><strong>Malla</strong></div>
              <div class="col-6 py-1"><a href="${carrera.mallaCurricular.url}">${carrera.mallaCurricular.texto}</a></div>
            </div>
          </div>
          <div class="card-body text-center mt-auto">
            <p class="card-title"><strong>¿Quieres comunicarte con un asesor?</strong></p>
            <a href="${carrera.waLink}" class="btn btn-primary px-4 mx-auto mb-4">Haz clic aquí</a>
          </div>
        </div>
      `;
    });
    contenedorOferta.innerHTML = htmlContent;

    // Aquí está la parte clave: inicializar el carrusel
    // Se inicializa después de que el HTML de las tarjetas se ha insertado
    $(contenedorOferta).owlCarousel({
      autoplay: true,
      smartSpeed: 1500,
      dots: false,
      loop: true,
      margin: 30,
      responsive: {
        0: { items: 1 },
        576: { items: 1 },
        768: { items: 2 },
        992: { items: 3 },
      },
    });
  }
}

// --- Función para generar dinámicamente los modales ---
function generarModalesOfertaAcademica() {
  const body = document.body;
  
  // --- VALIDACIÓN DE SEGURIDAD ---
  // Si la variable 'carreras' no existe, salimos silenciosamente
  if (typeof carreras === 'undefined' || !carreras) {
    return;
  }

  let modalsHtml = "";

  carreras.forEach((carrera) => {
    // Genera el HTML de la lista de perfil profesional
    const perfilHtml = carrera.perfilProfesional
      ? carrera.perfilProfesional.map((item) => `<li>${item}</li>`).join("")
      : "";

    // Genera el HTML de la lista de campo laboral
    const campoLaboralHtml = carrera.campoLaboral
      ? carrera.campoLaboral.map((item) => `<li>${item}</li>`).join("")
      : "";

    modalsHtml += `
      <div class="modal fade" id="${carrera.modalId}" tabindex="-1" role="dialog" aria-labelledby="${carrera.modalId}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${carrera.modalId}Label">${carrera.titulo}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${carrera.descripcionModal}</p>

              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${perfilHtml}</ul>

              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p>Los egresados pueden desempeñarse en:</p>
              <ul style="text-align: justify;">${campoLaboralHtml}</ul>

              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p>${carrera.duracionModal}</p>

              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p>${carrera.modalidadModal}</p>

              <hr />

              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <p style="text-align: justify;">Consulta el plan de estudios detallado para esta carrera.</p>
              <div class="text-center">
                <a href="${carrera.mallaCurricular ? carrera.mallaCurricular.url : '#'}" target="_blank" class="btn btn-info py-2 px-4">
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <hr />
              <p class="text-muted text-center">Para más detalles, contacta a la secretaría académica.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  body.insertAdjacentHTML("beforeend", modalsHtml);
}

function generarSelloUnico() {
  const contenedorSello = document.querySelector(
    ".owl-carousel.selloU-carousel"
  );
  let htmlContent = "";

  // Asegúrate de que el array de datos esté disponible
  if (contenedorSello && typeof clubsSelloUnico !== "undefined") {
    clubsSelloUnico.forEach((club) => {
      let redesHtml = "";
      // Construye el HTML de las redes sociales si existen
      if (club.redes.length > 0) {
        redesHtml = `<div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">`;
        club.redes.forEach((red) => {
          redesHtml += `
                        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="${red.enlace}" title="${red.titulo}">
                            <i class="${red.claseIcono}"></i>
                        </a>
                    `;
        });
        redesHtml += `</div>`;
      }

      // Genera el HTML de la tarjeta completa
      htmlContent += `
                <div class="text-center team mb-5">
                    <div class="position-relative overflow-hidden">
                        <img class="img-fluid-selloU" src="${club.imagenSrc}" alt="${club.alt}" />
                        ${redesHtml}
                    </div>
                    <h4>${club.titulo}</h4>
                    <ip>${club.subtitulo}</ip>
                </div>
            `;
    });

    // Inserta el HTML generado en el contenedor
    contenedorSello.innerHTML = htmlContent;

    // Finalmente, inicializa el carrusel con la librería OWL Carousel
    $(contenedorSello).owlCarousel({
      center: true,
      autoplay: true,
      smartSpeed: 2000,
      dots: true,
      loop: true,
      responsive: {
        0: { items: 1 },
        576: { items: 1 },
        768: { items: 2 },
        992: { items: 3 },
      },
    });
  }
}

function generarNoticias() {
  const contenedorNoticias = document.querySelector(".owl-carousel.noticias-carousel");
  let htmlContent = "";

  if (contenedorNoticias && typeof noticias !== "undefined") {

    noticias.forEach((noticia, index) => {

      let imagenesHtml = "";

      noticia.imagenes.forEach((img, i) => {
        imagenesHtml += `
          <a href="${img}" data-lightbox="noticia-${index}" data-title="${noticia.titulo}">
            <img class="img-fluid-selloU noticia-img" src="${img}" alt="${noticia.titulo}">
          </a>
        `;
      });

      htmlContent += `
        <div class="text-center team mb-5">
          <div class="noticia-galeria">
            ${imagenesHtml}
          </div>
          <h4>${noticia.titulo}</h4>
          <p>${noticia.subtitulo}</p>
        </div>
      `;
    });

    contenedorNoticias.innerHTML = htmlContent;

    $(contenedorNoticias).owlCarousel({
      center: true,
      autoplay: true,
      smartSpeed: 2000,
      dots: true,
      loop: true,
      responsive: {
        0: { items: 1 },
        768: { items: 2 },
        992: { items: 3 }
      }
    });
  }
}

function generarTestimonios() {
  const contenedorTestimonios = document.querySelector(
    ".owl-carousel.testimonial-carousel"
  );
  let htmlContent = "";

  // Verifica que el contenedor y el array de testimonios existan
  if (contenedorTestimonios && typeof testimonios !== "undefined") {
    testimonios.forEach((testimonio) => {
      htmlContent += `
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        ${testimonio.texto}
                    </div>
                    <div class="d-flex align-items-center">
                        <img
                            class="rounded-circle"
                            src="${testimonio.imagenSrc}"
                            style="width: 70px; height: 70px"
                            alt="Imagen de ${testimonio.nombre}"
                        />
                        <div class="pl-3">
                            <h5>${testimonio.nombre}</h5>
                            <ip>${testimonio.carrera}</ip>
                        </div>
                    </div>
                </div>
            `;
    });

    // Inserta el HTML generado en el contenedor del carrusel
    contenedorTestimonios.innerHTML = htmlContent;

    // Inicializa el carrusel con la configuración de OWL Carousel
    $(contenedorTestimonios).owlCarousel({
      autoplay: true,
      smartSpeed: 1500,
      dots: true,
      loop: true,
      responsive: {
        0: { items: 1 },
        576: { items: 1 },
        768: { items: 2 },
        992: { items: 3 },
      },
    });
  }
}

// La función puede ir en tu archivo global.js, main.js o en un nuevo archivo footer.js
function generarFooter() {
  const footerContainer = document.querySelector(".footer-container");
  if (!footerContainer) {
    console.error("No se encontró el contenedor del footer.");
    return;
  }

  let footerHtml = `
        <a href="${footerData.whatsapp.enlace
    }" target="_blank" class="whatsapp-float">
            <img src="${footerData.whatsapp.imagenSrc}" alt="${footerData.whatsapp.alt
    }" width="50" height="50" />
        </a>
        
<a href="javascript:void(0)"
   id="${footerData.buzon.id}"
   class="buzon-float">

  <i class="${footerData.buzon.icon}"></i>

  <span class="buzon-tooltip">
    ${footerData.buzon.tooltip}
  </span>
</a>
        <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px">
                        <img src="${footerData.info.logo}" height="90px" />
                    </a>
                    
                    <div class="d-flex justify-content-center mt-4 ">
                        ${footerData.info.redes
      .map(
        (red) => `
                            <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="${red.enlace}">
                                <i class="${red.icono}"></i>
                            </a>
                        `
      )
      .join("")}
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <h3 class="text-primary mb-4">${footerData.contacto.titulo
    }</h3>
                    ${footerData.contacto.elementos
      .map(
        (el) => `
                        <div class="d-flex">
                            <h4 class="fa ${el.icono} text-primary"></h4>
                            <div class="pl-3">
                                <h5 class="text-white">${el.titulo}</h5>
                                <p>${el.texto}</p>
                            </div>
                        </div>
                    `
      )
      .join("")}
                </div>

                <div class="col-lg-3 col-md-6 mb-5">
                    <h3 class="text-primary mb-4">${footerData.enlacesRapidos.titulo
    }</h3>
                    <div class="d-flex flex-column justify-content-start">
                        ${footerData.enlacesRapidos.items
      .map(
        (item) => `
                            <a class="text-white mb-2" href="${item.enlace}">
                                <i class="fa fa-angle-right mr-2"></i>${item.texto}
                            </a>
                        `
      )
      .join("")}
                    </div>
                </div>
            <div class="col-lg-3 col-md-6 mb-5">
    <h3 class="text-primary mb-4">${footerData.admisiones.titulo}</h3>

    <!-- iframe oculto -->
    <iframe name="iframeRespuesta" style="display:none;"></iframe>

    <form 
        action="../../../backend/enviar-correo.php" 
        method="POST"
        target="iframeRespuesta"
        onsubmit="limpiarMensaje()"
    >
        <div class="form-group">
            <input 
                type="text" 
                name="nombre" 
                class="form-control border-0 py-4" 
                placeholder="${footerData.admisiones.formulario.placeholderNombre}" 
                required
            />
        </div>

        <div class="form-group">
            <input 
                type="email"
                name="email"
                class="form-control border-0 py-4"
                placeholder="${footerData.admisiones.formulario.placeholderEmail}"
                required
            />
        </div>

        <div class="form-group">
            <input 
                type="tel"
                name="celular"
                class="form-control border-0 py-4"
                placeholder="${footerData.admisiones.formulario.placeholderWhatsapp}"
                required
            />
        </div>

        <div class="form-group">
            <textarea 
                name="description" 
                class="form-control textarea-as-input"
                placeholder="${footerData.admisiones.formulario.placeholderDescription}" 
                rows="3" 
                required></textarea>
        </div>

        <div>
            <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                ${footerData.admisiones.formulario.textoBoton}
            </button>
        </div>

        <!-- MENSAJE DE RESPUESTA -->
        <div id="mensaje-formulario" class="mensaje-formulario"></div>
    </form>
</div>
<style>
.mensaje-formulario {
    margin-top: 10px;
    font-size: 14px;
    font-weight: 600;
    color: #28a745; /* verde éxito */
}
</style>

            </div>
            

            <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2)">
                <p class="m-0 text-center text-white">
                    ${footerData.copyright.texto}
                </p>
            </div>
        </div>
<!-------------------------------- INICIO BUZÓN ------------------------------->
        <!-- Modal del Buzón -->
        <div id="buzonModal" class="buzon-modal">
          <div class="buzon-modal-content">
            <div class="buzon-modal-header">
              <button class="buzon-close">&times;</button>
              <h2><i class="fas fa-comments"></i> Buzón de cumplidos, sugerencias y quejas</h2>
            </div>
            <div class="buzon-modal-body">
              <div class="buzon-info-card">
                <p><i class="fas fa-user-secret"></i><strong>Tu mensaje es completamente anónimo.</strong></p>
                <p><i class="fas fa-heart"></i>Tus comentarios nos ayudan a mejorar continuamente.</p>
              </div>
              
              <div id="buzonAlert" style="display: none;"></div>
              
              <div class="buzon-form-card">
                <form id="buzonForm">
                  <div class="buzon-form-group">
                    <label for="buzonTipo">
                      <i class="fas fa-tag"></i>Tipo de mensaje:
                    </label>
                    <select id="buzonTipo" name="tipo" required>
                      <option value="">Seleccione una opción...</option>
                      <option value="cumplido">👏 Cumplido</option>
                      <option value="sugerencia">💡 Sugerencia</option>
                      <option value="queja">⚠️ Queja</option>
                    </select>
                  </div>
                  <div class="buzon-form-group">
                    <label for="buzonMensaje">
                      <i class="fas fa-pencil-alt"></i>Tu mensaje:
                    </label>
                    <textarea 
                      id="buzonMensaje" 
                      name="mensaje" 
                      placeholder="Escribe aquí tu mensaje de forma anónima. Sé claro y específico para que podamos entender mejor tu punto de vista..." 
                      required
                    ></textarea>
                  </div>
                  <button type="submit" class="buzon-submit-btn" id="buzonSubmitBtn">
                    <i class="fas fa-paper-plane"></i> Enviar mensaje
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
    `;

  footerContainer.innerHTML = footerHtml;
}

function limpiarMensaje() {
  const msg = document.getElementById("mensaje-formulario");
  if (msg) msg.textContent = "Enviando...";
}

window.addEventListener("load", function () {
  const iframe = document.getElementsByName("iframeRespuesta")[0];
  if (!iframe) return;

  iframe.onload = function () {
    try {
      const contenido = iframe.contentDocument.body.innerText;
      const msg = document.getElementById("mensaje-formulario");

      if (msg && contenido) {
        msg.textContent = contenido;
        msg.style.color = contenido.includes("Éxito") ? "#28a745" : "#dc3545";
      }
    } catch (e) {
      console.error("No se pudo leer la respuesta");
    }
  };
});
function inicializarBuzon() {
  const buzonBtn = document.getElementById('buzonBtn');
  const buzonModal = document.getElementById('buzonModal');
  const buzonClose = document.querySelector('.buzon-close');
  const buzonForm = document.getElementById('buzonForm');
  const buzonAlert = document.getElementById('buzonAlert');
  const buzonSubmitBtn = document.getElementById('buzonSubmitBtn');

  if (!buzonBtn || !buzonModal) return;

  // Abrir modal
  buzonBtn.addEventListener('click', () => {
    buzonModal.style.display = 'block';
    document.body.style.overflow = 'hidden';
  });

  // Cerrar modal
  if (buzonClose) {
    buzonClose.addEventListener('click', cerrarModal);
  }
  window.addEventListener('click', e => { if (e.target === buzonModal) cerrarModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape' && buzonModal.style.display === 'block') cerrarModal(); });

  function cerrarModal() {
    buzonModal.style.display = 'none';
    document.body.style.overflow = 'auto';
    resetBuzonForm();
  }

  // Envío del formulario
  if (buzonForm) {
    buzonForm.addEventListener('submit', function (e) {
      e.preventDefault();
      const tipo = document.getElementById('buzonTipo').value;
      const mensaje = document.getElementById('buzonMensaje').value.trim();
      if (!tipo || !mensaje) return showBuzonAlert('Por favor, completa todos los campos.', 'error');

      buzonSubmitBtn.disabled = true;
      buzonSubmitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';

      const formData = new FormData();
      formData.append('tipo', tipo);
      formData.append('mensaje', mensaje);

      fetch('/enviar-buzon.php', { method: 'POST', body: formData })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            showBuzonAlert(data.message, 'success');
            setTimeout(cerrarModal, 2000);
          } else showBuzonAlert(data.message || 'Error al enviar el mensaje.', 'error');
        })
        .catch(() => showBuzonAlert('Error al enviar el mensaje.', 'error'))
        .finally(() => {
          buzonSubmitBtn.disabled = false;
          buzonSubmitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Enviar mensaje';
        });
    });
  }

  function showBuzonAlert(message, type) {
    const icon = type === 'success' ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-exclamation-triangle"></i>';
    buzonAlert.className = `buzon-alert buzon-alert-${type}`;
    buzonAlert.innerHTML = icon + ' ' + message;
    buzonAlert.style.display = 'flex';
    const modalBody = document.querySelector('.buzon-modal-body');
    if (modalBody) modalBody.scrollTop = 0;
    if (type === 'success') setTimeout(() => buzonAlert.style.display = 'none', 5000);
  }

  function resetBuzonForm() {
    if (buzonForm) buzonForm.reset();
    if (buzonAlert) buzonAlert.style.display = 'none';
  }
}

// Inicializar buzón cuando carga la página
window.addEventListener('DOMContentLoaded', inicializarBuzon);



// Función para generar y renderizar las 'Facilities'
function generarFacilities() {
  // Encuentra el contenedor principal
  const container = document.querySelector(".container-submenu .row");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no se encuentra el contenedor en esta página, salimos sin mostrar error.
  if (!container) {
    return;
  }

  // Verificamos que los datos de facilities existan para evitar errores
  if (typeof facilitiesData === 'undefined' || !facilitiesData) {
    return;
  }

  let htmlContent = "";

  // Itera sobre el array de datos y crea el HTML para cada tarjeta
  facilitiesData.forEach((facility, index) => {
    // Definimos el tamaño de las columnas.
    const colClass = "col-lg-3"; 

    htmlContent += `
        <div class="${colClass} col-md-4 col-sm-6 pb-1">
            <a href="${facility.enlace}" class="btn btn-block p-0">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px">
                    <i class="${facility.icono} h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>${facility.titulo}</h4>
                    </div>
                </div>
            </a>
        </div>
    `;
  });

  // Inserta el HTML generado en el contenedor
  container.innerHTML = htmlContent;
}

// Menu de Institucional

// Esta función puede ir en tu main.js o en un archivo aparte
function generarValores() {
  const listGroupContainer = document.querySelector("#list-tab");
  const tabContentContainer = document.querySelector("#nav-tabContent");

  // 1. VALIDACIÓN SILENCIOSA
  // Si no existen los IDs en la página actual, salimos sin errores.
  if (!listGroupContainer || !tabContentContainer) {
    return; 
  }

  // 2. VERIFICACIÓN DE DATOS
  // Si la variable valoresData no existe, salimos para evitar que el código se rompa.
  if (typeof valoresData === 'undefined' || !valoresData) {
    return;
  }

  // 3. GENERACIÓN DE HTML (Usando map y join para mayor limpieza)
  const listGroupHTML = valoresData
    .map((valor, index) => {
      const isActive = index === 0 ? "active" : "";
      return `
      <a class="list-group-item list-group-item-action ${isActive}"
          id="${valor.id}-list"
          data-bs-toggle="list"
          href="#${valor.id}"
          role="tab"
          aria-controls="${valor.id}">
        ${valor.nombre}
      </a>
    `;
    })
    .join("");

  const tabContentHTML = valoresData
    .map((valor, index) => {
      const isActive = index === 0 ? "show active" : "";
      return `
      <div class="tab-pane fade ${isActive}"
           id="${valor.id}"
           role="tabpanel"
           aria-labelledby="${valor.id}-list">
        <h4>${valor.nombre}</h4>
        <p>${valor.texto}</p>
      </div>
    `;
    })
    .join("");

  // 4. INSERCIÓN FINAL
  listGroupContainer.innerHTML = listGroupHTML;
  tabContentContainer.innerHTML = tabContentHTML;
}
// Esta función puede ir en tu main.js o en un archivo aparte.
function generarPlanesAcademicos() {
  // Encuentra el contenedor principal donde se insertarán las tarjetas
  const container = document.querySelector("#academic-plans-container");

  if (!container) {
    console.error("No se encontró el contenedor para los planes académicos.");
    return;
  }

  // Genera el HTML de las tarjetas usando el array de datos
  const cardsHTML = academicPlansData
    .map(
      (item) => `
    <div class="col-md-6 mb-3">
      <div class="card p-3">
        <i class="${item.icon} mb-2 text-primary"></i>
        <h5 class="card-title">${item.title}</h5>
        <p class="card-text">
          ${item.description}
        </p>
      </div>
    </div>
  `
    )
    .join("");

  // Inserta el HTML completo en el contenedor
  container.innerHTML = cardsHTML;
}
// Esta función puede ir en tu main.js o en un archivo aparte.

// Función para generar las tarjetas del equipo directivo
function generarEquipoDirectivo() {
  const container = document.querySelector("#equipo-directivo-container");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no se encuentra el contenedor, salimos sin mostrar error en la consola.
  if (!container) {
    return;
  }

  // Verificamos que los datos de autoridades existan para evitar errores de .map
  if (typeof authoritiesData === 'undefined') {
    return;
  }

  // Genera el HTML de las tarjetas usando el array de datos
  const teamHTML = authoritiesData
    .map(
      (member) => `
    <div class="col-md-4 col-lg-3 mb-4 text-center">
      <img
        class="img-fluid-autoridades rounded-circle mb-3"
        src="${member.image}"
        alt="${member.altText}"
      />
      <h5 class="mb-1">${member.name}</h5>
      <p class="text-primary mb-1 font-weight-bold">${member.position}</p>
      <p class="text-muted small">
        <a href="mailto:${member.email}">
          ${member.email}
        </a>
      </p>
    </div>
  `
    )
    .join("");

  // Inserta el HTML completo en el contenedor
  container.innerHTML = teamHTML;
}
// Esta función puede ir en tu main.js o en un archivo aparte.

function generarModelosAcordeon() {

  // Encuentra el contenedor principal del acordeón por su ID
  const accordionContainer = document.querySelector("#modelsAccordion");
  if (!accordionContainer) {
    console.error("No se encontró el contenedor del acordeón. Revisa el ID.");
    return;
  }
  // Genera el HTML completo del acordeón usando el array de datos

  const accordionHTML = modelsData
    .map((model, index) => {
      // Determina si es el primer elemento para aplicar la clase 'active'
      const isActive = index === 0 ? "show" : "";
      const isCollapsed = index === 0 ? "" : "collapsed";
      return `
<div class="card">
<div class="card-header" id="heading${model.id}">
<h2 class="mb-0">
<button
 class="btn btn-block text-left d-flex justify-content-between align-items-center ${isCollapsed}"
type="button"
data-toggle="collapse"
data-target="#collapse${model.id}"
aria-expanded="${index === 0 ? "true" : "false"}"
aria-controls="collapse${model.id}">
<span>${model.title}</span>
<i class="fa fa-chevron-down"></i>
</button>
</h2>
</div>
<div
id="collapse${model.id}"
class="collapse ${isActive}"
aria-labelledby="heading${model.id}"
data-parent="#modelsAccordion"
>
<div class="card-body text-center">
<div
class="embed-responsive embed-responsive-4by3 w-100 mb-3"
style="height: 500px"
>
<iframe
class="embed-responsive-item"
src="${model.filePath}"
style="width: 100%; height: 100%; border: 0"
frameborder="0"
allowfullscreen
 ></iframe>
</div>
</div>
</div>
</div>
 `;
    })

  // Inserta el HTML completo en el contenedor del acordeón

  accordionContainer.innerHTML = accordionHTML;

}


// Función para generar el acordeón de reglamentos
function generarReglamentosAcordeon() {
  const accordionContainer = document.querySelector("#regulationsAccordion");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no se encuentra el contenedor, salimos sin mostrar error.
  if (!accordionContainer) {
    return;
  }

  // Verificamos que los datos de reglamentos existan
  if (typeof regulationsData === 'undefined') {
    return;
  }

  const accordionHTML = regulationsData
    .map((regulation, index) => {
      // Determina si es el primer elemento para que esté abierto por defecto
      const isFirst = index === 0;
      const isActive = isFirst ? "show" : "";
      const isCollapsed = isFirst ? "" : "collapsed";

      return `
      <div class="card">
        <div class="card-header" id="heading${regulation.id}">
          <h2 class="mb-0">
            <button
              class="btn btn-block text-left d-flex justify-content-between align-items-center ${isCollapsed}"
              type="button"
              data-toggle="collapse"
              data-target="#collapse${regulation.id}"
              aria-expanded="${isFirst ? "true" : "false"}"
              aria-controls="collapse${regulation.id}"
            >
              <span>${regulation.title}</span>
              <i class="fa fa-chevron-down"></i>
            </button>
          </h2>
        </div>
        <div
          id="collapse${regulation.id}"
          class="collapse ${isActive}"
          aria-labelledby="heading${regulation.id}"
          data-parent="#regulationsAccordion"
        >
          <div class="card-body text-center">
            <div class="embed-responsive embed-responsive-4by3 w-100 mb-3" style="height: 600px;">
              <iframe
                class="embed-responsive-item"
                src="${regulation.filePath}"
                style="width:100%; height:100%; border:0;"
                frameborder="0"
                allowfullscreen
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    `;
    })
    .join("");

  accordionContainer.innerHTML = accordionHTML;
}
// menu de gestion academica
// Esta función puede ir en tu main.js o en un archivo aparte
function generarEscuelaDeSalud() {
  const cardsContainer = document.querySelector("#schoolOfHealthCards");
  const modalsContainer = document.querySelector("#schoolOfHealthModals");

  // Si no se encuentran los contenedores, salimos de la función silenciosamente
  if (!cardsContainer || !modalsContainer) {
    return; 
  }

  let cardsHTML = "";
  let modalsHTML = "";

  // Asegúrate de que schoolOfHealthData también exista antes de recorrerlo
  if (typeof schoolOfHealthData !== 'undefined') {
    schoolOfHealthData.forEach((career) => {
      // Generar la tarjeta de la carrera
      cardsHTML += `
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
            <h3 class="mb-3">${career.title}</h3>
            <a
              href="#"
              class="d-block mb-3"
              data-toggle="modal"
              data-target="#${career.id}Modal"
            >
              <img
                src="${career.imagePath}"
                alt="Imagen de ${career.title}"
                class="img-fluid rounded"
              />
            </a>
            <p class="text-muted">
              Haz clic en la imagen para ver más detalles de la carrera.
            </p>
          </div>
        </div>
      `;

      // Generar el modal de la carrera
      const profileList = career.profile.map((item) => `<li>${item}</li>`).join("");
      const careerPathList = career.careerPath.map((item) => `<li>${item}</li>`).join("");

      modalsHTML += `
        <div class="modal fade" id="${career.id}Modal" tabindex="-1" role="dialog" aria-labelledby="${career.id}ModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="${career.id}ModalLabel">${career.title}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4><i class="fas fa-file-alt"></i> Resolución</h4>
                <strong><p>${career.resolucion}</p></strong>
                <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
                <p style="text-align: justify;">${career.description}</p>
                <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
                <ul style="text-align: justify;">${profileList}</ul>
                <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
                <p>Los ${career.title} pueden desempeñarse en:</p>
                <ul>${careerPathList}</ul>
                <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
                <p>La carrera tiene una duración de <strong>${career.duration}</strong>.</p>
                <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
                <p><strong>${career.modality}</strong></p>
                <hr />
                <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
                <p style="text-align: justify;">Consulta el plan de estudios detallado...</p>
                <div class="text-center">
                  <a href="${career.curriculumLink}" target="_blank" class="btn btn-info py-2 px-4">
                    <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                  </a>
                </div>
                <hr />
                <p class="text-muted text-center">Para más detalles... contacta a la secretaría académica.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      `;
    });

    cardsContainer.innerHTML = cardsHTML;
    modalsContainer.innerHTML = modalsHTML;
  }
}

function generarEducacionYHumanidades() {
  const cardsContainer = document.querySelector("#educationAndHumanitiesCards");
  const modalsContainer = document.querySelector("#educationAndHumanitiesModals");

  // VALIDACIÓN SILENCIOSA: Si no existen los contenedores, salimos sin error.
  if (!cardsContainer || !modalsContainer) {
    return; 
  }

  // Verificamos también que los datos existan para evitar errores de undefined
  if (typeof educationAndHumanitiesData === 'undefined') {
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  educationAndHumanitiesData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile.map((item) => `<li>${item}</li>`).join("");
    const careerPathList = career.careerPath.map((item) => `<li>${item}</li>`).join("");

    modalsHTML += `
      <div class="modal fade" id="${career.id}Modal" tabindex="-1" role="dialog" aria-labelledby="${career.id}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">${career.title}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4><i class="fas fa-file-alt"></i> Resolución</h4>
              <strong><p>${career.resolucion}</p></strong>
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>
              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>
              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p>Los ${career.title} pueden desempeñarse en:</p>
              <ul style="text-align: justify;">${careerPathList}</ul>
              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p style="text-align: justify;">La carrera tiene una duración de <strong>${career.duration}</strong>.</p>
              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p><strong>${career.modality}</strong></p>
              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <div class="text-center">
                <a href="${career.curriculumLink}" target="_blank" class="btn btn-info py-2 px-4">
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}

function generarEscuelaDeVeterinaria() {
  const cardsContainer = document.querySelector("#veterinarySchoolCards");
  const modalsContainer = document.querySelector("#veterinarySchoolModals");

  if (!cardsContainer || !modalsContainer) {
    console.error("No se encontraron los contenedores para la Escuela de Veterinaria.");
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  veterinarySchoolData.forEach((career) => {
      cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="card h-100 border-0 shadow-lg" style="border-radius: 20px; transition: all 0.4s ease; overflow: hidden; background: #fff; cursor: pointer;" 
             onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" 
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';">
          
          <div style="position: relative; height: 500px; overflow: hidden;">
            <img src="${career.imagePath}" alt="${career.title}" style="width: 100%; height: 100%; object-fit: cover;">
            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.7) 100%);"></div>
            
            <span style="position: absolute; top: 15px; right: 15px; background: #28a745; color: white; padding: 5px 12px; border-radius: 50px; font-size: 0.7rem; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
              Cupos Disponibles
            </span>
          </div>

          <div class="card-body p-4 d-flex flex-column justify-content-between">
            <div>
              <h4 class="font-weight-bold mb-2" style="color: #2c3e50; font-size: 1.25rem; line-height: 1.2;">
                ${career.title}
              </h4>
              <p class="text-muted mb-4" style="font-size: 0.9rem;">
                Explora tu futuro profesional y conviértete en un experto en esta área de alta demanda.
              </p>
            </div>

            <button class="btn btn-block py-2" 
                    style="background: linear-gradient(90deg, #28a745, #20c997); color: white; border-radius: 12px; font-weight: bold; border: none; transition: 0.3s;"
                    data-toggle="modal" data-target="#${career.id}Modal">
              Más Información <i class="fas fa-arrow-right ml-2"></i>
            </button>
          </div>
        </div>
      </div>
    `;
    const profileList = career.profile.map((item) => `<li><i class="fas fa-check-circle text-success mr-2"></i>${item}</li>`).join("");
    const careerPathList = career.careerPath.map((item) => `<li><i class="fas fa-arrow-right text-primary mr-2"></i>${item}</li>`).join("");
    const perfilEgresado = career.perfilEgresado || "El profesional estará capacitado para liderar procesos de salud animal, bienestar y salud pública con excelencia técnica.";

    modalsHTML += `
      <div class="modal fade" id="${career.id}Modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div class="modal-content modal-glass-uniform" style="background-image: url('${career.imagePath}'); border-radius: 20px; overflow: hidden; border: none;">
            
            <style>
              .modal-glass-uniform { position: relative; background-size: cover; background-position: center; }
              .modal-glass-uniform::before {
                content: ""; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); z-index: 0;
              }
              .content-wrapper-vete { position: relative; z-index: 1; }
              .glass-section-vete {
                background: rgba(255, 255, 255, 0.6); border-radius: 15px; padding: 20px;
                margin-bottom: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.2);
              }
              .vete-label {
                background: linear-gradient(90deg, #28a745, #20c997);
                -webkit-background-clip: text; -webkit-text-fill-color: transparent;
                font-weight: bold; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; display: block; margin-bottom: 10px;
              }
            </style>

            <div class="modal-body content-wrapper-vete p-5">
              <button type="button" class="close" data-dismiss="modal" style="position: absolute; right: 25px; top: 20px; font-size: 30px;">&times;</button>

              <div class="text-center mb-5">
                <h1 class="display-4 font-weight-bold text-dark">${career.title}</h1>
                <div style="width: 60px; height: 4px; background: #28a745; margin: 10px auto; border-radius: 10px;"></div>
              </div>

              <div class="glass-section-vete text-center">
                <span class="vete-label">Resolución Oficial</span>
                <h5 class="mb-0 mt-2 font-weight-bold text-secondary">${career.resolucion}</h5>
              </div>

              <div class="glass-section-vete">
                <span class="vete-label"><i class="fas fa-info-circle mr-2"></i>Sobre la Carrera</span>
                <p class="lead mt-3 text-justify text-dark" style="font-size: 1.05rem;">${career.description}</p>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <div class="glass-section-vete h-100">
                    <span class="vete-label"><i class="fas fa-user-md mr-2"></i>Perfil Profesional</span>
                    <ul class="list-unstyled mt-3 text-dark" style="line-height: 1.8;">${profileList}</ul>
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <div class="glass-section-vete h-100">
                    <span class="vete-label"><i class="fas fa-graduation-cap mr-2"></i>Perfil de Egreso</span>
                    <p class="mt-3 text-dark text-justify">${perfilEgresado}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 mb-3">
                  <div class="glass-section-vete h-100 text-center">
                    <span class="vete-label text-center">Campo Laboral</span>
                    <ul class="list-unstyled mt-3 text-left small text-dark">${careerPathList}</ul>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="glass-section-vete h-100 text-center d-flex flex-column justify-content-center">
                    <span class="vete-label">Duración</span>
                    <h3 class="font-weight-bold mt-2 text-dark">${career.duration}</h3>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="glass-section-vete h-100 text-center d-flex flex-column justify-content-center">
                    <span class="vete-label font-weight-bold">Modalidad</span>
                    <h3 class="font-weight-bold mt-2 text-success">${career.modality}</h3>
                  </div>
                </div>
              </div>

              <div class="glass-section-vete text-center py-4" style="background: rgba(40, 167, 69, 0.08);">
                <h5 class="font-weight-bold mb-3 text-dark">Plan Académico</h5>
                <a href="${career.curriculumLink}" target="_blank" class="btn btn-success btn-lg px-5 shadow-sm" style="border-radius: 50px;">
                  <i class="fas fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>

              <div class="mt-4 text-center">
                <p class="text-muted mb-1">¿Deseas matricularte?</p>
                <div class="d-flex justify-content-center align-items-center flex-wrap">
                  <a href="#" class="mx-3 text-dark font-weight-bold" style="text-decoration: none;"><i class="fab fa-whatsapp text-success mr-1"></i> WhatsApp Admisiones</a>
                  <a href="#" class="mx-3 text-dark font-weight-bold" style="text-decoration: none;"><i class="fas fa-envelope text-danger mr-1"></i> Correo Electrónico</a>
                </div>
              </div>

            </div>
            
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar Ventana</button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}


// Esta función puede ir en tu main.js o en un archivo aparte
function generarAdministracionEIndustria() {
  const cardsContainer = document.querySelector("#administrationAndIndustryCards");
  const modalsContainer = document.querySelector("#administrationAndIndustryModals" );

  // VALIDACIÓN SILENCIOSA
  // Si no se encuentran los contenedores, salimos de la función sin reportar error.
  if (!cardsContainer || !modalsContainer) {
    return;
  }

  // Verificamos que los datos existan para evitar errores de referencia
  if (typeof administrationAndIndustryData === 'undefined') {
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  administrationAndIndustryData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile.map((item) => `<li>${item}</li>`).join("");
    const careerPathList = career.careerPath.map((item) => `<li>${item}</li>`).join("");

    modalsHTML += `
      <div class="modal fade" id="${career.id}Modal" tabindex="-1" role="dialog" aria-labelledby="${career.id}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">${career.title}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4><i class="fas fa-file-alt"></i> Resolución</h4>
              <strong><p>${career.resolucion}</p></strong>
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>
              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>
              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p style="text-align: justify;">Los tecnólogos en ${career.title} pueden desempeñarse en:</p>
              <ul style="text-align: justify;">${careerPathList}</ul>
              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p>La carrera tiene una duración de <strong>${career.duration}</strong>.</p>
              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p><strong>${career.modality}</strong></p>
              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <div class="text-center">
                <a href="${career.curriculumLink}" target="_blank" class="btn btn-info py-2 px-4">
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>
              <hr />
              <p class="text-muted text-center">Para más detalles... contacta a la secretaría académica.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}
//*************************************************************************************************************** */
// BALANCE GENERALL balancegeneral.js
/* /js/main.js */
document.addEventListener("DOMContentLoaded", function () {
  const balancesList = document.getElementById("balances-list");

  // Aseguramos que el contenedor existe y que el array de datos está disponible
  if (balancesList && typeof balancesData !== 'undefined') {
    // Sort data by year in descending order
    balancesData.sort((a, b) => b.year - a.year);

    balancesData.forEach((balance) => {
      const listItem = document.createElement("li");
      listItem.className = "list-group-item d-flex justify-content-between align-items-center";

      const yearSpan = document.createElement("span");
      yearSpan.textContent = `BALANCE GENERAL ${balance.year}`;

      const link = document.createElement("a");
      link.href = balance.file;
      link.target = "_blank";
      link.className = "btn btn-sm btn-primary";

      const icon = document.createElement("i");
      icon.className = "fa fa-file-pdf mr-2";

      link.appendChild(icon);
      link.appendChild(document.createTextNode(" Ver PDF"));
      listItem.appendChild(yearSpan);
      listItem.appendChild(link);
      balancesList.appendChild(listItem);
    });
  }
});
// ARANCELES . aranceles.js
/* arancelesLogic.js */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Selecciona el div donde se mostrará la información
  const contenedorAranceles = document.querySelector('.row.justify-content-center');

  // Asegúrate de que el contenedor y los datos existen
  if (contenedorAranceles && typeof arancelesData !== 'undefined') {
    // 2. Itera sobre el arreglo de arancelesData
    arancelesData.forEach(arancel => {
      // 3. Crea el HTML para cada elemento
      const htmlArancel = `
        <div class="col-lg-6 mb-4">
          <div class="d-flex align-items-center bg-light p-4 rounded">
            <div class="bg-primary text-white text-center rounded-circle p-3" style="width: 65px; height: 65px;">
              <i class="fa fa-file-pdf fa-2x"></i>
            </div>
            <div class="ml-4">
              <h4>${arancel.titulo}</h4>
              <p class="m-0">${arancel.descripcion}</p>
              <a href="${arancel.url}" class="btn btn-sm btn-outline-primary mt-2" download>
                Descargar
              </a>
            </div>
          </div>
        </div>
      `;
      // 4. Inserta el HTML en el contenedor
      contenedorAranceles.innerHTML += htmlArancel;
    });
  }
});
// BALANCE DE AUDITORIA balanceAuditoria.js
/* balancesAuditadosLogic.js */
document.addEventListener("DOMContentLoaded", function () {
  const balancesList = document.getElementById("balances-auditados-list");

  // Verificar si el contenedor y los datos existen antes de continuar
  if (balancesList && typeof balancesAuditadosData !== 'undefined') {
    // Ordenar los datos por año de forma descendente
    balancesAuditadosData.sort((a, b) => b.year - a.year);

    balancesAuditadosData.forEach((balance) => {
      const listItem = document.createElement("li");
      listItem.className = "list-group-item d-flex justify-content-between align-items-center";

      const yearSpan = document.createElement("span");
      yearSpan.textContent = `BALANCE AUDITADO ${balance.year}`;

      const link = document.createElement("a");
      link.href = balance.file;
      link.target = "_blank";
      link.className = "btn btn-sm btn-primary";

      const icon = document.createElement("i");
      icon.className = "fa fa-file-pdf mr-2";

      link.appendChild(icon);
      link.appendChild(document.createTextNode(" Ver PDF"));
      listItem.appendChild(yearSpan);
      listItem.appendChild(link);
      balancesList.appendChild(listItem);
    });
  }
});

//BIENESTAR ESTUDIANTIL bienestarEstudiantil.js
/* bienestarCarruselLogic.js */

// Función para generar un carrusel
function generarCarrusel(idContenedor, idCarrusel, fotos) {
  const contenedor = document.getElementById(idContenedor);
  if (!contenedor) return;

  const slides = [];
  const fotosPorSlide = 4;

  for (let i = 0; i < fotos.length; i += fotosPorSlide) {
    const fotosDelSlide = fotos.slice(i, i + fotosPorSlide);
    const fotosHtml = fotosDelSlide.map(fotoUrl => `
      <div class="col-md-3">
        <div class="card">
          <img src="${fotoUrl}" class="card-img-top" alt="...">
        </div>
      </div>
    `).join('');

    slides.push(`
      <div class="carousel-item ${i === 0 ? 'active' : ''}">
        <div class="row">
          ${fotosHtml}
        </div>
      </div>
    `);
  }

  const carruselHtml = `
    <div id="${idCarrusel}" class="carousel slide mb-5" data-ride="carousel">
      <div class="carousel-inner">
        ${slides.join('')}
      </div>
      <a class="carousel-control-prev" href="#${idCarrusel}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#${idCarrusel}" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Siguiente</span>
      </a>
    </div>
  `;

  contenedor.innerHTML = carruselHtml;
}

// Llamar a la función para cada carrusel
document.addEventListener('DOMContentLoaded', () => {
  if (typeof carruselData !== 'undefined') {
    generarCarrusel('carrusel-lengua-senas-container', 'carruselLenguaSenas', carruselData.lenguaSenas);
    generarCarrusel('carrusel-protocolo-container', 'carruselProtocolo', carruselData.protocolo);
    generarCarrusel('carrusel-sensibilizacion-container', 'carruselSensibilizacion', carruselData.sensibilizacion);
    generarCarrusel('carrusel-espacios-container', 'carruselEspacios', carruselData.espacios);
    generarCarrusel('carrusel-senaletica-container', 'carruselSenaletica', carruselData.senaletica);
    generarCarrusel('carrusel-IntiRaymi-container', 'carruselIntiRaymi', carruselData.IntiRaymi);
  }
});

//BIENESTAR ESTUDIANTIL PARTE DE SERVICIOS

function generarPlanesAcademicos() {
  // Encuentra el contenedor principal
  const container = document.querySelector("#academic-plans-container");

  // --- VALIDACIÓN SILENCIOSA ---
  if (!container) {
    return; // Salimos sin error si no estamos en la página de Bienestar/Académica
  }

  // Verificamos que los datos existan
  if (typeof academicBienestarData === 'undefined') {
    return;
  }

  // Genera el HTML de las tarjetas
  const cardsHTML = academicBienestarData
    .map(
      (item) => `
    <div class="col-md-6 mb-3">
      <div class="card p-3">
        <a href="${item.url}" class="card-link text-decoration-none text-dark">
          <h5 class="card-title">${item.title}</h5>
        </a>
      </div>
    </div>
  `
    )
    .join("");

  container.innerHTML = cardsHTML;
}

// CUMPLIMIENTO TRIBUTARIO cumplimientoTributario.js 
/* documentosLogic.js */
document.addEventListener("DOMContentLoaded", function () {
  const documentosList = document.getElementById("documentos-list");

  // Verificar si el contenedor y los datos existen antes de continuar
  if (documentosList && typeof documentosData !== 'undefined') {
    documentosData.forEach((documento) => {
      const listItem = document.createElement("li");
      listItem.className = "list-group-item d-flex justify-content-between align-items-center";

      const titleSpan = document.createElement("span");
      titleSpan.textContent = documento.title;

      const link = document.createElement("a");
      link.href = documento.file;
      link.target = "_blank";
      link.className = "btn btn-sm btn-primary";

      const icon = document.createElement("i");
      icon.className = "fa fa-file-pdf mr-2";

      link.appendChild(icon);
      link.appendChild(document.createTextNode(" Ver PDF"));
      listItem.appendChild(titleSpan);
      listItem.appendChild(link);
      documentosList.appendChild(listItem);
    });
  }
});
//POR QUE ELEGIRNOS porQueElegirnos.js 
/* ventajasLogic.js */
document.addEventListener("DOMContentLoaded", function () {
  const lista = document.getElementById("ventajas-lista");

  if (lista && typeof ventajasData !== 'undefined') {
    ventajasData.forEach((ventaja) => {
      const li = document.createElement("li");
      li.className = "py-2 border-bottom tooltip-container";

      const icono = document.createElement("i");
      icono.className = "fa fa-check text-primary mr-3";

      const texto = document.createTextNode(ventaja.titulo);

      const span = document.createElement("span");
      span.className = "tooltiptext";
      span.textContent = ventaja.descripcion;

      li.appendChild(icono);
      li.appendChild(texto);
      li.appendChild(span);

      lista.appendChild(li);
    });
  }
});
//PROCESO DE ADMISIONES procesoDeAdmisiones.js
/* requisitosLogic.js */
document.addEventListener("DOMContentLoaded", function () {
  const listaRequisitos = document.getElementById("lista-requisitos");

  if (listaRequisitos && typeof requisitosData !== 'undefined') {
    requisitosData.forEach((requisito) => {
      const li = document.createElement("li");
      li.className = "list-group-item";
      li.textContent = requisito;
      listaRequisitos.appendChild(li);
    });
  }
});
//

function generarConstruccionYExtraccion() {
  const cardsContainer = document.querySelector("#constructionAndExtractionCards");
  const modalsContainer = document.querySelector("#constructionAndExtractionModals");

  // VALIDACIÓN SILENCIOSA
  // Si no se encuentran los contenedores, salimos de la función sin reportar error.
  if (!cardsContainer || !modalsContainer) {
    return;
  }

  // Verificamos que los datos existan para evitar errores de referencia
  if (typeof constructionAndExtractionData === 'undefined') {
    return;
  }

  let cardsHTML = "";
  let modalsHTML = "";

  constructionAndExtractionData.forEach((career) => {
    // Generar la tarjeta de la carrera
    cardsHTML += `
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="career-card text-center p-4 border rounded shadow-sm h-100 d-flex flex-column justify-content-between">
          <h3 class="mb-3">${career.title}</h3>
          <a
            href="#"
            class="d-block mb-3"
            data-toggle="modal"
            data-target="#${career.id}Modal"
          >
            <img
              src="${career.imagePath}"
              alt="Imagen de ${career.title}"
              class="img-fluid rounded"
            />
          </a>
          <p class="text-muted">
            Haz clic en la imagen para ver más detalles de la carrera.
          </p>
        </div>
      </div>
    `;

    // Generar el modal de la carrera
    const profileList = career.profile.map(item => `<li>${item}</li>`).join("");
    const careerPathList = career.careerPath.map(item => `<li>${item}</li>`).join("");

    modalsHTML += `
      <div class="modal fade" id="${career.id}Modal" tabindex="-1" role="dialog" aria-labelledby="${career.id}ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${career.id}ModalLabel">${career.title}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h4><i class="fas fa-file-alt"></i> Resolución</h4>
              <strong><p>${career.resolucion}</p></strong>
              <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
              <p style="text-align: justify;">${career.description}</p>
              <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
              <ul style="text-align: justify;">${profileList}</ul>
              <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
              <p>Los tecnólogos en ${career.title} pueden desempeñarse en:</p>
              <ul>${careerPathList}</ul>
              <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
              <p style="text-align: justify;">La carrera tiene una duración de <strong>${career.duration}</strong>, incluyendo prácticas preprofesionales supervisadas.</p>
              <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
              <p><strong>${career.modality}</strong></p>
              <hr />
              <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
              <div class="text-center">
                <a href="${career.curriculumLink}" target="_blank" class="btn btn-info py-2 px-4">
                  <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                </a>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  cardsContainer.innerHTML = cardsHTML;
  modalsContainer.innerHTML = modalsHTML;
}

// Modulo de Vinculacion

function generarAreasDeVinculacion() {
  const listContainer = document.querySelector("#vinculacionList");
  const modalsContainer = document.querySelector("#vinculacionModals");

  // VALIDACIÓN SILENCIOSA
  // Si no se encuentran los contenedores, detenemos la función sin mostrar error.
  if (!listContainer || !modalsContainer) {
    return;
  }

  // Verificamos que los datos de vinculación existan
  if (typeof areasDeVinculacionData === 'undefined') {
    return;
  }

  let listHTML = "";
  let modalsHTML = "";

  areasDeVinculacionData.forEach((area) => {
    // Generar el ítem de la lista
    listHTML += `
      <a
        href="#"
        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
        data-toggle="modal"
        data-target="#${area.id}Modal"
      >
        <span>${area.title}</span>
        <i class="fa fa-arrow-right"></i>
      </a>
    `;

    // Generar el modal
    modalsHTML += `
      <div
        class="modal fade"
        id="${area.id}Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="${area.id}ModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="${area.id}ModalLabel">
                ${area.title}
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ${area.content}
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Cerrar
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  });

  listContainer.innerHTML = listHTML;
  modalsContainer.innerHTML = modalsHTML;
}
// Esta función puede ir en tu main.js o en un archivo aparte
function generarInvestigacionIDi() {
  const listContainer = document.querySelector("#investigacionList");
  const modalsContainer = document.querySelector("#investigacionModals");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no existen los contenedores en esta página, salimos sin mostrar error.
  if (!listContainer || !modalsContainer) {
    return;
  }

  // Verificamos que los datos de investigación existan
  if (typeof investigacionData === 'undefined') {
    return;
  }

  let linearHTML = "";
  const resumenIds = [
    "modeloInvestigacionVinculacion",
    "normativaInvestigacion",
    "dominiosLineasInvestigacion",
  ];
  const resumenSet = new Set(resumenIds);
  const eventosIds = [
    "congresoTopografia2025",
    "congresoTopografia2023",
    "seminarioEquino",
    "congresoAgrovet2026",
  ];
  const eventosSet = new Set(eventosIds);
  const resumenMap = Object.fromEntries(
    investigacionData
      .filter((entry) => !entry.isSection && resumenSet.has(entry.id))
      .map((entry) => [entry.id, entry])
  );
  const eventosMap = Object.fromEntries(
    investigacionData
      .filter((entry) => !entry.isSection && eventosSet.has(entry.id))
      .map((entry) => [entry.id, entry])
  );
  const publicacionesIds = [
    "publicacionesMayoOctubre2025",
    "publicacionesNoviembreAbril2025",
    "publicacionesMayoOctubre2024",
    "publicacionesNoviembre2023Abril2024",
    "publicacionesMayoOctubre2023",
    "publicacionesMayoOctubre202",
  ];
  const publicacionesSet = new Set(publicacionesIds);
  const publicacionesMap = Object.fromEntries(
    investigacionData
      .filter((entry) => !entry.isSection && publicacionesSet.has(entry.id))
      .map((entry) => [entry.id, entry])
  );
  let resumenRenderizado = false;
  let eventosRenderizados = false;
  let publicacionesRenderizadas = false;

  const quitarPrimerH4 = (html) =>
    html.replace(/^\s*<h4[^>]*>[\s\S]*?<\/h4>\s*/i, "");
  const limpiarTexto = (texto) =>
    texto.replace(/<[^>]+>/g, " ").replace(/\s+/g, " ").trim();
  const obtenerTitulosPublicaciones = (html) => {
    const coincidencias = [...html.matchAll(/<h4[^>]*>([\s\S]*?)<\/h4>/gi)];
    return coincidencias
      .map((match) => limpiarTexto(match[1]))
      .filter((titulo) => titulo.length > 0);
  };

  investigacionData.forEach((item) => {
    if (item.isSection) {
      linearHTML += `
        <h4 class="mt-5 mb-3 text-primary">${item.title}</h4>
      `;
      return;
    }

    if (resumenSet.has(item.id)) {
      if (resumenRenderizado) {
        return;
      }

      const celdasResumen = resumenIds
        .map((id) => {
          const resumen = resumenMap[id];
          if (!resumen) {
            return "";
          }

          return `
            <td style="vertical-align: top; width: 33.33%; min-width: 280px;">
              <h5 class="mb-3">${resumen.title}</h5>
              ${quitarPrimerH4(resumen.content)}
            </td>
          `;
        })
        .join("");

      linearHTML += `
        <div class="table-responsive mb-4">
          <table class="table table-bordered bg-white mb-0">
            <tbody>
              <tr>
                ${celdasResumen}
              </tr>
            </tbody>
          </table>
        </div>
      `;

      resumenRenderizado = true;
      return;
    }

    if (eventosSet.has(item.id)) {
      if (eventosRenderizados) {
        return;
      }

      const eventosDisponibles = eventosIds
        .map((id) => {
          const evento = eventosMap[id];
          if (!evento) {
            return null;
          }

          return `
            <td style="vertical-align: top; width: 50%; min-width: 320px;">
              <h5 class="mb-3">${evento.title}</h5>
              ${quitarPrimerH4(evento.content)}
            </td>
          `;
        })
        .filter(Boolean);

      const fila1 = `${eventosDisponibles[0] || "<td></td>"}${eventosDisponibles[1] || "<td></td>"}`;
      const fila2 = `${eventosDisponibles[2] || "<td></td>"}${eventosDisponibles[3] || "<td></td>"}`;

      linearHTML += `
        <div class="table-responsive mb-4">
          <table class="table table-bordered bg-white mb-0">
            <tbody>
              <tr>
                ${fila1}
              </tr>
              <tr>
                ${fila2}
              </tr>
            </tbody>
          </table>
        </div>
      `;

      eventosRenderizados = true;
      return;
    }

    if (item.id === "simposioAdministracion") {
      return;
    }

    if (publicacionesSet.has(item.id)) {
      if (publicacionesRenderizadas) {
        return;
      }

      const periodosPublicaciones = publicacionesIds
        .map((id) => publicacionesMap[id])
        .filter(Boolean)
        .map((periodo) => {
          const publicaciones = obtenerTitulosPublicaciones(periodo.content).map((titulo, indice) => ({
            titulo,
            llave: `${periodo.id}-${indice}`,
          }));
          return {
            id: periodo.id,
            periodo: periodo.title,
            publicaciones: publicaciones.length
              ? publicaciones
              : [{ titulo: "Sin publicaciones registradas", llave: `${periodo.id}-0` }],
          };
        });

      const totalPublicaciones = periodosPublicaciones.reduce(
        (acumulado, periodo) => acumulado + periodo.publicaciones.length,
        0
      );
      const maximoPublicaciones = Math.max(
        ...periodosPublicaciones.map((periodo) => periodo.publicaciones.length),
        1
      );

      const graficoBarras = periodosPublicaciones
        .map((periodo) => {
          const valor = periodo.publicaciones.length;
          const porcentaje = (valor / maximoPublicaciones) * 100;

          return `
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <small class="font-weight-bold">${periodo.periodo}</small>
                <small>${valor}</small>
              </div>
              <div class="progress" style="height: 10px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: ${porcentaje}%" aria-valuenow="${valor}" aria-valuemin="0" aria-valuemax="${maximoPublicaciones}"></div>
              </div>
            </div>
          `;
        })
        .join("");

      const filasTablaPublicaciones = periodosPublicaciones
        .map((periodo) => {
          return periodo.publicaciones
            .map((publicacion, indice) => {
              const celdaPeriodo =
                indice === 0
                  ? `<td rowspan="${periodo.publicaciones.length}" style="vertical-align: middle; width: 35%;"><strong>${periodo.periodo}</strong></td>`
                  : "";

              return `
                <tr>
                  ${celdaPeriodo}
                  <td>
                    <button
                      type="button"
                      class="btn btn-link p-0 text-left"
                      onclick="mostrarPublicacionInvestigacion('${periodo.id}')"
                    >
                      ${publicacion.titulo}
                    </button>
                  </td>
                </tr>
              `;
            })
            .join("");
        })
        .join("");

      const detallePublicacionesHTML = publicacionesIds
        .map((id) => publicacionesMap[id])
        .filter(Boolean)
        .map(
          (periodo) => `
            <article class="card border-0 shadow-sm mb-4 d-none" data-publicacion-periodo="${periodo.id}">
              <div class="card-body">
                <h5 class="mb-3">${periodo.title}</h5>
                ${periodo.content}
              </div>
            </article>
          `
        )
        .join("");

      if (typeof window.mostrarPublicacionInvestigacion !== "function") {
        window.mostrarPublicacionInvestigacion = function (periodoId) {
          const contenedor = document.getElementById("publicacionesDetalleDinamico");
          if (!contenedor) {
            return;
          }

          const tarjetas = contenedor.querySelectorAll("[data-publicacion-periodo]");
          tarjetas.forEach((tarjeta) => tarjeta.classList.add("d-none"));

          const tarjetaObjetivo = contenedor.querySelector(`[data-publicacion-periodo="${periodoId}"]`);
          if (tarjetaObjetivo) {
            tarjetaObjetivo.classList.remove("d-none");
            tarjetaObjetivo.scrollIntoView({ behavior: "smooth", block: "start" });
          }
        };
      }

      linearHTML += `
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <h5 class="mb-3">Gráfico de Publicaciones por Período</h5>
            <p class="mb-3 text-muted">Total de publicaciones registradas: <strong>${totalPublicaciones}</strong></p>
            ${graficoBarras}
          </div>
        </div>

        <div class="table-responsive mb-4">
          <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-light">
              <tr>
                <th>Período académico</th>
                <th>Publicación</th>
              </tr>
            </thead>
            <tbody>
              ${filasTablaPublicaciones}
            </tbody>
          </table>
        </div>

        <div id="publicacionesDetalleDinamico">
          <div class="alert alert-light border mb-4" role="alert">
            Selecciona una publicación de la tabla para visualizar su contenido.
          </div>
          ${detallePublicacionesHTML}
        </div>
      `;

      publicacionesRenderizadas = true;
      return;
    }

    linearHTML += `
      <article id="${item.id}" class="card border-0 shadow-sm mb-4">
        <div class="card-body">
          <h5 class="mb-3">${item.title}</h5>
          ${item.content}
        </div>
      </article>
    `;
  });

  listContainer.classList.remove("list-group", "list-group-flush");
  listContainer.innerHTML = linearHTML;

  if (modalsContainer) {
    modalsContainer.innerHTML = "";
  }
}
// En tu archivo main.js o practicas.js
function generarPracticasData() {
  const container = document.getElementById("practicasContainer");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no se encuentra el contenedor en esta página, salimos sin mostrar error.
  if (!container) {
    return;
  }

  // Verificamos que los datos de prácticas existan para evitar fallos de referencia
  if (typeof practicasData === 'undefined') {
    return;
  }

  let htmlContent = "";

  practicasData.forEach((item) => {
    if (item.type === "section") {
      htmlContent += `
        <div class="mb-5">
          <h4 class="mb-3">${item.title}</h4>
          <p class="text-muted">${item.description.trim()}</p>
          <div class="text-center">
            <a
              href="${item.link}"
              target="_blank"
              class="btn btn-primary py-2 px-4"
            >
              <i class="fa fa-file-pdf mr-2"></i> ${item.buttonText}
            </a>
          </div>
        </div>
      `;
    } else if (item.type === "list") {
      let listItems = "";
      item.items.forEach((listItem) => {
        listItems += `
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>${listItem.text}</span>
            <a
              href="${listItem.link}"
              target="_blank"
              class="btn btn-sm btn-primary"
            >
              <i class="fa fa-file-pdf mr-2"></i> Descargar PDF
            </a>
          </li>
        `;
      });

      htmlContent += `
        <div class="mb-5">
          <h4 class="mb-3">${item.title}</h4>
          <p class="text-muted">${item.description.trim()}</p>
          <ul class="list-group list-group-flush">
            ${listItems}
          </ul>
        </div>
      `;
    }
  });

  // Ajuste para el margen del último elemento
  if (htmlContent.includes('<div class="mb-5"')) {
    htmlContent = htmlContent.replace(/<div class="mb-5"(?![\s\S]*<div class="mb-5")/, '<div class="mb-0"');
  }

  container.innerHTML = htmlContent;
}
// Esta función puede ir en tu main.js o en un archivo separado
function generarTitulacionData() {
  const container = document.getElementById("titulacionContainer");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no se encuentra el contenedor, salimos sin mostrar error en la consola.
  if (!container) {
    return;
  }

  // Verificamos que los datos de titulación existan para evitar fallos
  if (typeof titulacionData === 'undefined') {
    return;
  }

  let htmlContent = "";

  titulacionData.forEach((item, index) => {
    // Determinar la clase para el margin-bottom (el último no lleva margen)
    const marginBottomClass = index === titulacionData.length - 1 ? "mb-0" : "mb-5";

    htmlContent += `<div class="${marginBottomClass}">`;
    htmlContent += `<h4 class="mb-3">${item.title}</h4>`;
    htmlContent += `<p class="text-muted">${item.description.trim()}</p>`;
    htmlContent += `<div class="text-center mt-4">`;

    // --- Lógica condicional para manejar botones individuales o múltiples ---
    if (item.buttons) {
      // Caso 1: El objeto tiene un array de botones
      item.buttons.forEach(button => {
        htmlContent += `
          <a
            href="${button.link}"
            target="_blank"
            class="btn btn-primary py-2 px-4 m-2"
            rel="noopener noreferrer"
          >
            <i class="${button.buttonIcon}"></i> ${button.buttonText}
          </a>
        `;
      });
    } else {
      // Caso 2: El objeto tiene un solo botón
      htmlContent += `
        <a
          href="${item.link}"
          target="_blank"
          class="btn btn-primary py-2 px-4"
          rel="noopener noreferrer"
        >
          <i class="${item.buttonIcon}"></i> ${item.buttonText}
        </a>
      `;
    }

    htmlContent += `</div></div>`;
  });

  container.innerHTML = htmlContent;
}

// La función que genera y agrega el HTML de Modalidades
function generarModalidades() {
  const listGroupContainer = document.querySelector("#list-tab");
  const tabContentContainer = document.querySelector("#nav-tabContent");

  // --- VALIDACIÓN SILENCIOSA ---
  // Si no se encuentran los contenedores, salimos sin mostrar error en consola.
  if (!listGroupContainer || !tabContentContainer) {
    return;
  }

  // Verificamos que los datos existan antes de usar .map
  if (typeof modalidadesData === 'undefined') {
    return;
  }

  // Mapea y crea el HTML para los botones de la lista
  const listGroupHTML = modalidadesData
    .map((modalidad, index) => {
      const isActive = index === 0 ? "active" : "";
      return `
      <a class="list-group-item list-group-item-action ${isActive}"
          id="${modalidad.id}-list"
          data-bs-toggle="list"
          href="#${modalidad.id}"
          role="tab"
          aria-controls="${modalidad.id}">
        ${modalidad.nombre}
      </a>
    `;
    })
    .join("");

  // Mapea y crea el HTML para el contenido de las pestañas
  const tabContentHTML = modalidadesData
    .map((modalidad, index) => {
      const isActive = index === 0 ? "show active" : "";
      return `
      <div class="tab-pane fade ${isActive}"
           id="${modalidad.id}"
           role="tabpanel"
           aria-labelledby="${modalidad.id}-list">
        <h5>${modalidad.nombre}</h5>
        <p class="texto-justificado">${modalidad.texto}</p>
      </div>
    `;
    })
    .join("");

  // Inserta el HTML generado en los contenedores respectivos
  listGroupContainer.innerHTML = listGroupHTML;
  tabContentContainer.innerHTML = tabContentHTML;
}

function generarModuloNoticias() {

  const contenedor = document.getElementById("noticias-grid");

  if (!contenedor || typeof noticiasView === "undefined") return;

  const noticiasOrdenadas = [...noticiasView].sort(
    (a, b) => new Date(b.fecha) - new Date(a.fecha)
  );

  let html = "";

  noticiasOrdenadas.forEach(noticia => {

    const fecha = new Date(noticia.fecha).toLocaleDateString("es-EC", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });

    html += `
      <div class="noticia-card">

        <div class="noticia-img-container">
          <img src="${noticia.imagen}" alt="${noticia.titulo}">
        </div>

        <div class="noticia-content">

          <span class="noticia-fecha">
            <i class="far fa-calendar-alt"></i> ${fecha}
          </span>

          <h3 class="noticia-titulo">
            ${noticia.titulo}
          </h3>

          <p class="noticia-resumen">
            ${noticia.resumen}
          </p>

          <a class="noticia-btn" href="${noticia.enlace}">
            Leer más
          </a>

        </div>

      </div>
    `;

  });

  contenedor.innerHTML = html;
}

function iniciarNoticias() {

  if (typeof noticiasView === "undefined") return;

  noticiasFiltradas = [...noticiasView].sort(
    (a, b) => new Date(b.fecha) - new Date(a.fecha)
  );

  renderNoticias();
  renderPaginacion();

  const buscador = document.getElementById("buscadorNoticias");

  if (buscador) {
    buscador.addEventListener("input", function () {

      const texto = this.value.toLowerCase();

      noticiasFiltradas = noticiasView.filter(n =>
        n.titulo.toLowerCase().includes(texto) ||
        n.resumen.toLowerCase().includes(texto)
      );

      paginaActual = 1;
      renderNoticias();
      renderPaginacion();
    });
  }
}

function renderNoticias() {

  const contenedor = document.getElementById("noticias-grid");
  if (!contenedor) return;

  const inicio = (paginaActual - 1) * noticiasPorPagina;
  const fin = inicio + noticiasPorPagina;

  const noticiasPagina = noticiasFiltradas.slice(inicio, fin);

  let html = "";

  noticiasPagina.forEach((noticia, index) => {

    const fecha = new Date(noticia.fecha).toLocaleDateString("es-EC", {
      year: "numeric",
      month: "long",
      day: "numeric"
    });

    html += `
      <div class="noticia-card">

        <div class="noticia-img-container">

          <a href="${noticia.imagen}" data-lightbox="noticia-${index}">
            <img src="${noticia.imagen}" alt="${noticia.titulo}">
          </a>

        </div>

        <div class="noticia-content">

          <span class="noticia-fecha">
            <i class="far fa-calendar-alt"></i> ${fecha}
          </span>

          <h3 class="noticia-titulo">
            ${noticia.titulo}
          </h3>

          <p class="noticia-resumen">
            ${noticia.resumen}
          </p>

          <a class="noticia-btn" href="${noticia.enlace}">
            Leer más
          </a>

        </div>

      </div>
    `;
  });

  contenedor.innerHTML = html;
}

function renderPaginacion() {

  const contenedor = document.getElementById("paginacionNoticias");
  if (!contenedor) return;

  const totalPaginas = Math.ceil(noticiasFiltradas.length / noticiasPorPagina);

  let html = "";

  for (let i = 1; i <= totalPaginas; i++) {

    html += `
      <button 
        class="pagina-btn ${i === paginaActual ? "activa" : ""}"
        onclick="cambiarPagina(${i})"
      >
        ${i}
      </button>
    `;
  }

  contenedor.innerHTML = html;
}

function cambiarPagina(pagina) {

  paginaActual = pagina;

  renderNoticias();
  renderPaginacion();
}

document.addEventListener("DOMContentLoaded", iniciarNoticias);

document.addEventListener("DOMContentLoaded", () => {
  generarHeader();
  generarFooter();
  generarEscuelaDeSalud();
  generarEducacionYHumanidades();
  generarEscuelaDeVeterinaria();
  generarAdministracionEIndustria();
  generarConstruccionYExtraccion();
  generarAreasDeVinculacion();
  generarInvestigacionIDi();
  generarPracticasData();
  generarTitulacionData();
  generarValores();
  generarModalidades();
  generarReglamentosAcordeon();
  generarEquipoDirectivo();
  generarPlanesAcademicos();
  generarFacilities();
  generarOfertaAcademica();
  generarModalesOfertaAcademica();
  generarSelloUnico();
  generarNoticias();
  generarTestimonios();
  generarAranceles();
  generarModuloNoticias();
});
