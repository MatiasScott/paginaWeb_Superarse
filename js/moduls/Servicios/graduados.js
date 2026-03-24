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
    correo: "jenny.siza@superarse.edu.ec",
    telefono: "(02) 393-0980",
    horario: "Lunes a viernes de 08:00 a 17:00",
  },

  estadisticasCarreras: [
    {
      carrera: "Asistencia Pedagógica",
      anios: {
        2020: 0,
        2021: 20,
        2022: 38,
        2023: 12,
        2024: 8,
        2025: 2,
      },
    },
    {
      carrera: "Educación Básica",
      anios: {
        2020: 0,
        2021: 0,
        2022: 0,
        2023: 0,
        2024: 0,
        2025: 85,
      },
    },
    {
      carrera: "Administración",
      anios: {
        2020: 55,
        2021: 22,
        2022: 50,
        2023: 45,
        2024: 68,
        2025: 24,
      },
    },
    {
      carrera: "Marketing Digital",
      anios: {
        2020: 0,
        2021: 1,
        2022: 27,
        2023: 22,
        2024: 36,
        2025: 79,
      },
    },
    {
      carrera: "Cuidado Canino",
      anios: {
        2020: 0,
        2021: 0,
        2022: 32,
        2023: 29,
        2024: 33,
        2025: 33,
      },
    },
    {
      carrera: "Producción Animal",
      anios: {
        2020: 0,
        2021: 0,
        2022: 49,
        2023: 24,
        2024: 18,
        2025: 11,
      },
    },
    {
      carrera: "Topografía",
      anios: {
        2020: 0,
        2021: 0,
        2022: 0,
        2023: 70,
        2024: 82,
        2025: 55,
      },
    },
    {
      carrera: "Seguridad y Prevención de Riesgos Laborales",
      anios: {
        2020: 0,
        2021: 0,
        2022: 0,
        2023: 0,
        2024: 0,
        2025: 4,
      },
    },
    {
      carrera: "Minería",
      anios: {
        2020: 0,
        2021: 0,
        2022: 0,
        2023: 0,
        2024: 0,
        2025: 33,
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
  const formBtn = document.getElementById("graduados-form-boton");
  const formLink = document.getElementById("graduados-form-link");

  if (titulo) titulo.textContent = graduadosData.titulo;
  if (subtitulo) subtitulo.textContent = graduadosData.subtitulo;
  if (descripcion) descripcion.textContent = graduadosData.descripcion;
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

  if (kpiTotal) kpiTotal.textContent = totalGeneral.toLocaleString("es-EC");
}

(function initGraduados() {
  renderizarInformacionGraduados();
  renderizarTablaGraduados();
  renderizarBeneficiosGraduados();
  renderizarServiciosGraduados();
})();
