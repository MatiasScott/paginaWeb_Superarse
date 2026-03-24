// Funciones del home y componentes visuales generales

function generarAranceles() {
  const contenedorAranceles = document.querySelector("#aranceles-container");
  if (!contenedorAranceles) return;
  if (typeof arancelesData === "undefined") return;

  let htmlContent = "";

  arancelesData.forEach((item) => {
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
  if (!contenedorOferta) return;
  if (typeof carreras === "undefined") return;

  let htmlContent = "";

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

// --- Función para generar dinámicamente los modales ---

function generarModalesOfertaAcademica() {
  if (typeof carreras === "undefined") return;

  const body = document.body;
  let modalsHtml = "";

  carreras.forEach((carrera) => {
    // Genera el HTML de la lista de perfil profesional
    const perfilHtml = carrera.perfilProfesional
      .map((item) => `<li>${item}</li>`)
      .join("");

    // Genera el HTML de la lista de campo laboral
    const campoLaboralHtml = carrera.campoLaboral
      .map((item) => `<li>${item}</li>`)
      .join("");

    modalsHtml += `
            <div class="modal fade" id="${carrera.modalId}" tabindex="-1" role="dialog" aria-labelledby="${carrera.modalId}Label" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="${carrera.modalId}Label">${carrera.titulo}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4><i class="fas fa-file-alt"></i> Descripción de la Carrera</h4>
                            <p  style="text-align: justify;">${carrera.descripcionModal}</p>

                            <h4><i class="fas fa-user"></i> Perfil Profesional</h4>
                            <ul  style="text-align: justify;">${perfilHtml}</ul>

                            <h4><i class="fas fa-briefcase"></i> Campo Laboral</h4>
                            <p>Los egresados pueden desempeñarse en:</p>
                            <ul  style="text-align: justify;">${campoLaboralHtml}</ul>

                            <h4><i class="fas fa-clock"></i> Duración de la Carrera</h4>
                            <p>${carrera.duracionModal}</p>

                            <h4><i class="fas fa-laptop-code"></i> Modalidad</h4>
                            <p>${carrera.modalidadModal}</p>

                            <hr />

                            <h4><i class="fas fa-list-ol"></i> Malla Curricular</h4>
                            <p  style="text-align: justify;">Consulta el plan de estudios detallado para esta carrera. Aquí podrás ver la distribución de asignaturas por semestre, créditos y requisitos.</p>
                            <div class="text-center">
                                <a href="${carrera.mallaCurricular.url}" target="_blank" class="btn btn-info py-2 px-4">
                                    <i class="fa fa-file-pdf mr-2"></i> Ver Malla Curricular PDF
                                </a>
                            </div>

                            <hr />
                            <p class="text-muted text-center">Para más detalles sobre requisitos de admisión o si tienes alguna pregunta adicional, por favor contacta a la secretaría académica.</p>
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

function generarFacilities() {
  // Encuentra el contenedor principal donde se insertará el HTML
  const container = document.querySelector(".container-submenu .row");

  if (!container) {
    console.error("No se encontró el contenedor para las 'Facilities'.");
    return;
  }

  let htmlContent = "";

  // Itera sobre el array de datos y crea el HTML para cada tarjeta
  facilitiesData.forEach((facility, index) => {
    // Definimos el tamaño de las columnas.
    // Los primeros 4 elementos tienen 'col-lg-3', el resto 'col-lg-4'
    const colClass = index < 4 ? "col-lg-3" : "col-lg-3";

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
// Esta función puede ir en tu main.js o en un archivo aparte.

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

// Esta función puede ir en tu main.js o en un archivo aparte

