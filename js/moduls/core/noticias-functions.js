// Funciones y estado del modulo de noticias

const noticiasPorPagina = 6;
let paginaActual = 1;
let noticiasFiltradas = [];

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

