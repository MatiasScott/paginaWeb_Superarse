// ===================================================
//  DATOS Y RENDERIZADO — Página de Biblioteca
// ===================================================

const bibliotecaData = {
  hero: {
    titulo: "Biblioteca Institucional",
    subtitulo: "Centro de Recursos para el Aprendizaje y la Investigación",
    descripcion:
      "Accede a miles de recursos académicos, bases de datos internacionales y un equipo comprometido con tu formación.",
    imagen: "/assets/img/content/biblioteca/hero-biblioteca.jpg",
  },

  servicios: [
    {
      icono: "fas fa-book",
      titulo: "Préstamo de Libros",
      descripcion:
        "Solicita libros en sala de lectura o en préstamo externo con tu carné institucional.",
      color: "#0B77BD",
    },
    {
      icono: "fas fa-undo-alt",
      titulo: "Devolución de Material",
      descripcion:
        "Devuelve los libros prestados a tiempo para evitar suspensiones y mantener tu cuenta activa.",
      color: "#8bdf31",
    },
    {
      icono: "fas fa-search",
      titulo: "Catálogo en Línea",
      descripcion:
        "Consulta el catálogo bibliográfico y reserva materiales desde cualquier dispositivo.",
      color: "#fabd2e",
    },
    {
      icono: "fas fa-database",
      titulo: "Bases de Datos",
      descripcion:
        "Accede a plataformas académicas con miles de artículos, revistas y libros electrónicos.",
      color: "#17a2b8",
    },
    {
      icono: "fas fa-laptop",
      titulo: "Sala de Lectura Virtual",
      descripcion:
        "Encuentra un espacio tranquilo y equipado para estudiar, ya sea presencial o a través de nuestros recursos digitales.",
      color: "#ef7a15",
    },
    {
      icono: "fas fa-graduation-cap",
      titulo: "Repositorio Institucional",
      descripcion:
        "Consulta tesis, proyectos de titulación e investigaciones de la comunidad académica.",
      color: "#00394f",
    },
    {
      icono: "fas fa-print",
      titulo: "Servicio de Impresión",
      descripcion:
        "Imprime y escanea documentos académicos necesarios para tus actividades con costos accesibles.",
      color: "#0B77BD",
    },
    {
      icono: "fas fa-chalkboard-teacher",
      titulo: "Orientación Bibliográfica",
      descripcion:
        "Nuestro personal especializado te orienta en la búsqueda de fuentes académicas y elaboración de citas.",
      color: "#8bdf31",
    },
  ],

  basesdedatos: [
    {
      nombre: "EBSCO",
      descripcion: "Revistas académicas y científicas a texto completo.",
      url: "https://www.ebsco.com/",
      icono: "fas fa-book-open",
      color: "#003087",
    },
    {
      nombre: "SciELO",
      descripcion: "Biblioteca científica de acceso abierto.",
      url: "https://scielo.org/",
      icono: "fas fa-flask",
      color: "#e30613",
    },
    {
      nombre: "Redalyc",
      descripcion: "Red de revistas científicas de América Latina.",
      url: "https://www.redalyc.org/",
      icono: "fas fa-globe-americas",
      color: "#0066cc",
    },
    {
      nombre: "SENESCYT",
      descripcion: "Repositorio de acceso abierto del Ecuador.",
      url: "https://repositorio.educacionsuperior.gob.ec/",
      icono: "fas fa-university",
      color: "#007a3d",
    },
    {
      nombre: "Google Scholar",
      descripcion: "Motor de búsqueda académica gratuito.",
      url: "https://scholar.google.com/",
      icono: "fab fa-google",
      color: "#4285F4",
    },
    {
      nombre: "Repositorio CRAI",
      descripcion: "Producción científica institucional interna.",
      url: "#",
      icono: "fas fa-archive",
      color: "#0B77BD",
    },
  ],

  catalogo: {
    titulo: "Buscar en el Catálogo",
    descripcion:
      "Explora nuestra colección física y digital. Usa palabras clave, autor, título o ISBN.",
    placeholder: "Ingresa título, autor, materia o ISBN...",
    urlBusqueda: "https://biblioteca.superarse.ec/",
    boton: "Buscar",
  },

  horarios: [
    { dia: "Lunes – Viernes", horario: "07:30 – 20:00" },
    { dia: "Sábado", horario: "08:00 – 13:00" },
    { dia: "Domingo", horario: "Cerrado" },
  ],

  contacto: {
    ubicacion: "Campus principal, edificio administrativo, planta baja",
    telefono: "(02) 393-0980 ext. 101",
    email: "biblioteca@superarse.edu.ec",
    responsable: "Lic. Carmen Torres",
  },

  reglamento: {
    titulo: "Reglamento de Uso",
    items: [
      "Presentar carné institucional vigente para el préstamo de libros.",
      "El préstamo externo es de 3 días hábiles renovable una sola vez.",
      "Prohibido ingresar con alimentos o bebidas al área de colección.",
      "Los equipos de cómputo son exclusivos para fines académicos.",
      "El usuario es responsable del material prestado hasta su devolución.",
      "Las multas por retraso son de $0.25 por día y por material.",
    ],
  },
};

// ===================================================
//  FUNCIONES DE RENDERIZADO
// ===================================================

function renderizarServiciosBiblioteca() {
  const contenedor = document.getElementById("biblioteca-servicios");
  if (!contenedor) return;

  contenedor.innerHTML = bibliotecaData.servicios
    .map(
      (s) => `
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="bib-servicio-card h-100">
        <div class="bib-servicio-icono" style="background:${s.color}15; color:${s.color}">
          <i class="${s.icono}"></i>
        </div>
        <h5>${s.titulo}</h5>
        <p>${s.descripcion}</p>
      </div>
    </div>`
    )
    .join("");
}

function renderizarBasesDeDatos() {
  const contenedor = document.getElementById("biblioteca-bases");
  if (!contenedor) return;

  contenedor.innerHTML = bibliotecaData.basesdedatos
    .map(
      (b) => `
    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
      <a href="${b.url}" target="_blank" class="bib-base-card text-decoration-none" title="${b.descripcion}">
        <div class="bib-base-icono" style="color:${b.color}">
          <i class="${b.icono} fa-2x"></i>
        </div>
        <span class="bib-base-nombre">${b.nombre}</span>
        <small class="bib-base-desc">${b.descripcion}</small>
      </a>
    </div>`
    )
    .join("");
}

function renderizarHorariosBiblioteca() {
  const contenedor = document.getElementById("biblioteca-horarios");
  if (!contenedor) return;

  contenedor.innerHTML = bibliotecaData.horarios
    .map(
      (h) => `
    <tr class="${h.horario === "Cerrado" ? "bib-cerrado" : ""}">
      <td><i class="fas fa-calendar-day mr-2 text-primary"></i>${h.dia}</td>
      <td class="font-weight-bold">${h.horario}</td>
    </tr>`
    )
    .join("");
}

function renderizarContactoBiblioteca() {
  const c = bibliotecaData.contacto;
  const contenedor = document.getElementById("biblioteca-contacto");
  if (!contenedor) return;

  contenedor.innerHTML = `
    <div class="bib-contacto-item">
      <i class="fas fa-map-marker-alt text-primary"></i>
      <span>${c.ubicacion}</span>
    </div>
    <div class="bib-contacto-item">
      <i class="fas fa-phone-alt text-primary"></i>
      <span>${c.telefono}</span>
    </div>
    <div class="bib-contacto-item">
      <i class="fas fa-envelope text-primary"></i>
      <a href="mailto:${c.email}">${c.email}</a>
    </div>
    <div class="bib-contacto-item">
      <i class="fas fa-user-tie text-primary"></i>
      <span>${c.responsable}</span>
    </div>
  `;
}

function renderizarReglamentoBiblioteca() {
  const contenedor = document.getElementById("biblioteca-reglamento");
  if (!contenedor) return;

  contenedor.innerHTML = `
    <h5 class="bib-reglamento-titulo"><i class="fas fa-gavel mr-2"></i>${bibliotecaData.reglamento.titulo}</h5>
    <ul class="bib-reglamento-lista">
      ${bibliotecaData.reglamento.items
        .map((item) => `<li><i class="fas fa-check-circle text-primary mr-2"></i>${item}</li>`)
        .join("")}
    </ul>
  `;
}

function inicializarCatalogoBiblioteca() {
  const form = document.getElementById("bib-catalogo-form");
  const input = document.getElementById("bib-catalogo-input");
  const tituloCatalogo = document.getElementById("bib-catalogo-titulo");
  const descripcionCatalogo = document.getElementById("bib-catalogo-descripcion");
  const textoBotonCatalogo = document.getElementById("bib-catalogo-boton");
  if (!form) return;

  if (input) {
    input.placeholder = bibliotecaData.catalogo.placeholder;
  }

  if (tituloCatalogo) {
    tituloCatalogo.textContent = bibliotecaData.catalogo.titulo;
  }

  if (descripcionCatalogo) {
    descripcionCatalogo.textContent = bibliotecaData.catalogo.descripcion;
  }

  if (textoBotonCatalogo) {
    textoBotonCatalogo.textContent = bibliotecaData.catalogo.boton;
  }

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    const termino = input ? input.value.trim() : "";
    if (!termino) return;
    const url = bibliotecaData.catalogo.urlBusqueda + "?q=" + encodeURIComponent(termino);
    window.open(url, "_blank");
  });
}

// ===================================================
//  INICIALIZACIÓN AL CARGAR
// ===================================================
(function inicializarBiblioteca() {
  renderizarServiciosBiblioteca();
  renderizarBasesDeDatos();
  renderizarHorariosBiblioteca();
  renderizarContactoBiblioteca();
  renderizarReglamentoBiblioteca();
  inicializarCatalogoBiblioteca();
})();
