const graduadosData = {
  titulo: "Graduados",
  subtitulo: "Comunidad de exalumnos",
  descripcion:
    "Este espacio está orientado a mantener el vínculo con nuestros graduados, facilitar su actualización profesional y fortalecer la red de oportunidades académicas y laborales.",

  beneficios: [
    {
      icono: "fas fa-briefcase",
      titulo: "Bolsa de empleo",
      descripcion:
        "Acceso a convocatorias laborales y pasantías compartidas por aliados institucionales.",
    },
    {
      icono: "fas fa-chalkboard-teacher",
      titulo: "Capacitación continua",
      descripcion:
        "Difusión de cursos, talleres y eventos de actualización académica y profesional.",
    },
    {
      icono: "fas fa-network-wired",
      titulo: "Red de graduados",
      descripcion:
        "Conexión con exalumnos para colaboración profesional, mentoría y networking.",
    },
    {
      icono: "fas fa-user-check",
      titulo: "Seguimiento institucional",
      descripcion:
        "Registro y actualización de trayectoria laboral para fortalecer la calidad educativa.",
    },
  ],

  servicios: [
    "Actualización de datos de graduados",
    "Difusión de oportunidades laborales y académicas",
    "Participación en eventos y actividades institucionales",
    "Canal de comunicación para aportes y retroalimentación",
  ],

  formulario: {
    titulo: "Registro y actualización de graduados",
    descripcion:
      "Completa el formulario oficial para mantener actualizada tu información.",
    enlace:
      "https://forms.office.com/pages/responsepage.aspx?id=PXXLFwN_702XROHw7bSFdZeoiE5NT6BOo433qziuU4hUN085QjVYR0xCVklJNVkzMUU1NUdFTDJTWi4u&embed=true&route=shorturl",
    boton: "Abrir formulario",
  },

  contacto: {
    correo: "graduados@superarse.edu.ec",
    telefono: "(02) 393-0980",
    horario: "Lunes a viernes de 08:00 a 17:00",
  },

  estadisticasCarreras: [
    {
      carrera: "Escuela de Construcción y Extracción Sostenible ECSOS",
      empleabilidad: 88,
      anios: {
        2021: 38,
        2022: 42,
        2023: 47,
        2024: 51,
        2025: 55,
      },
    },
    {
      carrera: "Escuela de Ciencias Agropecuarias y Veterinarias ECAVET",
      empleabilidad: 84,
      anios: {
        2021: 31,
        2022: 36,
        2023: 40,
        2024: 44,
        2025: 49,
      },
    },
    {
      carrera: "Escuela de Ciencias Sociales, Empresariales y Tecnológicas ECSET",
      empleabilidad: 91,
      anios: {
        2021: 45,
        2022: 52,
        2023: 59,
        2024: 63,
        2025: 68,
      },
    },
  ],
};

function renderizarBeneficiosGraduados() {
  const contenedor = document.getElementById("graduados-beneficios");
  if (!contenedor) return;

  contenedor.innerHTML = graduadosData.beneficios
    .map(
      (item) => `
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="graduados-card h-100">
          <div class="graduados-icono"><i class="${item.icono}"></i></div>
          <h5>${item.titulo}</h5>
          <p>${item.descripcion}</p>
        </div>
      </div>
    `
    )
    .join("");
}

function renderizarServiciosGraduados() {
  const contenedor = document.getElementById("graduados-servicios");
  if (!contenedor) return;

  contenedor.innerHTML = graduadosData.servicios
    .map(
      (servicio) => `
      <li class="list-group-item">
        <i class="fas fa-check-circle text-primary mr-2"></i>${servicio}
      </li>
    `
    )
    .join("");
}

function renderizarInformacionGraduados() {
  const titulo = document.getElementById("graduados-titulo");
  const subtitulo = document.getElementById("graduados-subtitulo");
  const descripcion = document.getElementById("graduados-descripcion");
  const formTitulo = document.getElementById("graduados-form-titulo");
  const formDescripcion = document.getElementById("graduados-form-descripcion");
  const formBtn = document.getElementById("graduados-form-boton");
  const formLink = document.getElementById("graduados-form-link");

  if (titulo) titulo.textContent = graduadosData.titulo;
  if (subtitulo) subtitulo.textContent = graduadosData.subtitulo;
  if (descripcion) descripcion.textContent = graduadosData.descripcion;
  if (formTitulo) formTitulo.textContent = graduadosData.formulario.titulo;
  if (formDescripcion) formDescripcion.textContent = graduadosData.formulario.descripcion;
  if (formBtn) formBtn.textContent = graduadosData.formulario.boton;
  if (formLink) formLink.href = graduadosData.formulario.enlace;

  const contacto = document.getElementById("graduados-contacto");
  if (contacto) {
    contacto.innerHTML = `
      <p class="mb-2"><i class="fas fa-envelope text-primary mr-2"></i>${graduadosData.contacto.correo}</p>
      <p class="mb-2"><i class="fas fa-phone-alt text-primary mr-2"></i>${graduadosData.contacto.telefono}</p>
      <p class="mb-0"><i class="fas fa-clock text-primary mr-2"></i>${graduadosData.contacto.horario}</p>
    `;
  }

  const iframe = document.getElementById("graduados-form-embed");
  if (iframe) {
    iframe.src = graduadosData.formulario.enlace;
  }
}

function obtenerAniosGraduados() {
  const conjunto = new Set();
  graduadosData.estadisticasCarreras.forEach((item) => {
    Object.keys(item.anios).forEach((anio) => conjunto.add(anio));
  });

  return Array.from(conjunto)
    .map((anio) => Number(anio))
    .sort((a, b) => a - b);
}

function renderizarTablaGraduados() {
  const tabla = document.getElementById("graduados-tabla");
  if (!tabla) return;

  const thead = tabla.querySelector("thead");
  const tbody = tabla.querySelector("tbody");
  const tfoot = tabla.querySelector("tfoot");

  if (!thead || !tbody || !tfoot) return;

  const anios = obtenerAniosGraduados();

  thead.innerHTML = `
    <tr>
      <th>Carrera</th>
      ${anios.map((anio) => `<th class="text-center">${anio}</th>`).join("")}
      <th class="text-center">Total</th>
    </tr>
  `;

  const totalesPorAnio = anios.reduce((acc, anio) => {
    acc[anio] = 0;
    return acc;
  }, {});

  let totalGeneral = 0;

  tbody.innerHTML = graduadosData.estadisticasCarreras
    .map((item) => {
      let totalCarrera = 0;

      const celdasAnios = anios
        .map((anio) => {
          const valor = Number(item.anios[anio] || 0);
          totalCarrera += valor;
          totalesPorAnio[anio] += valor;
          return `<td class="text-center">${valor}</td>`;
        })
        .join("");

      totalGeneral += totalCarrera;

      return `
        <tr>
          <th>${item.carrera}</th>
          ${celdasAnios}
          <td class="text-center font-weight-bold">${totalCarrera}</td>
        </tr>
      `;
    })
    .join("");

  tfoot.innerHTML = `
    <tr>
      <th>Total por año</th>
      ${anios
        .map((anio) => `<td class="text-center">${totalesPorAnio[anio]}</td>`)
        .join("")}
      <td class="text-center">${totalGeneral}</td>
    </tr>
  `;

  const kpiTotal = document.getElementById("kpi-graduados-totales");
  const kpiCarreras = document.getElementById("kpi-carreras");

  if (kpiTotal) kpiTotal.textContent = totalGeneral.toLocaleString("es-EC");
  if (kpiCarreras) {
    kpiCarreras.textContent = String(graduadosData.estadisticasCarreras.length);
  }
}

function renderizarEmpleabilidad() {
  const contenedor = document.getElementById("graduados-empleabilidad");
  const kpiPromedio = document.getElementById("kpi-empleabilidad-promedio");
  if (!contenedor) return;

  const total = graduadosData.estadisticasCarreras.reduce(
    (acumulado, item) => acumulado + item.empleabilidad,
    0
  );

  const promedio =
    graduadosData.estadisticasCarreras.length > 0
      ? Math.round(total / graduadosData.estadisticasCarreras.length)
      : 0;

  if (kpiPromedio) kpiPromedio.textContent = `${promedio}%`;

  contenedor.innerHTML = graduadosData.estadisticasCarreras
    .map(
      (item) => `
      <div class="empleabilidad-item">
        <div class="empleabilidad-head">
          <span>${item.carrera}</span>
          <span>${item.empleabilidad}%</span>
        </div>
        <div class="empleabilidad-bar">
          <div class="empleabilidad-fill" style="width:${item.empleabilidad}%"></div>
        </div>
      </div>
    `
    )
    .join("");
}

(function initGraduados() {
  renderizarInformacionGraduados();
  renderizarTablaGraduados();
  renderizarEmpleabilidad();
  renderizarBeneficiosGraduados();
  renderizarServiciosGraduados();
})();
