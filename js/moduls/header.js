// headerData.js

const headerData = {
  // Topbar con enlaces de contacto y plataformas externas
  topbar: [
    {
      icono: "fa fa-envelope mr-2",
      enlace: "mailto:matriculas@superarse.edu.ec",
      texto: "matriculas@superarse.edu.ec",
      clases: "d-none d-lg-block mr-3 text-white",
    },
    {
      enlace: "https://sgpro.superarse.edu.ec",
      texto: "SGPRO ",
      clases: "navbar-brand d-none d-lg-block",
      target: "_blank",
    },
    {
      enlace: "https://conectados.superarse.edu.ec",
      texto: "Superarse Conectados ",
      clases: "navbar-brand d-none d-lg-block",
      target: "_blank",
    },
    {
      enlace: "https://becasuperarse.ec/",
      texto: "Because he is Nice ",
      clases: "navbar-brand d-none d-lg-block",
      target: "_blank",
    },
    {
      enlace: "https://superarse.q10.com",
      texto: "Q10",
      clases: "navbar-brand d-none d-lg-block",
      target: "_blank",
    },
    {
      enlace: "https://teams.microsoft.com/v2/",
      texto: "Teams",
      clases: "navbar-brand d-none d-lg-block",
      target: "_blank",
    },
    {
      texto: "Calendarios",
      clases: "nav-link dropdown-toggle text-white d-none d-lg-block",
      items: [
        {
          enlace: APP.url("CALENDARIO_ACADEMICO"),
          texto: "Calendario Académico",
          target: "_blank",
        },
        {
          enlace: APP.url("CALENDARIO_DE_TITULACION"),
          texto: "Calendario de Titulación",
          target: "_blank",
        },
        {
          enlace: APP.url("CALENDARIO_INVESTIGACION"),
          texto: "Calendario de Investigación",
          target: "_blank",
        },
        {
          enlace: APP.url("CALENDARIO_VINCULACION"),
          texto: "Calendario de Vinculación",
          target: "_blank",
        },
        {
          enlace: APP.url("CALENDARIO_PRACTICAS_PREPROFESIONALES"),
          texto: "Calendario de Prácticas <br>Preprofesionales",
          target: "_blank",
        },
      ],
    },
  ],

  // Barra de navegación principal con los menús institucionales
  mainNav: [
    {
      texto: "Institución",
      items: [
        { enlace: APP.url("MisionVision"), texto: "Misión y Visión" },
        { enlace: APP.url("MensajeRectora"), texto: "Mensaje de la Rectora" },
        {
          texto: "Estructura Organizacional",
          id: "dropdownMarcoLegal",
          items: [
            { enlace: APP.url("Organigrama"), texto: "Organigrama" },
            { enlace: APP.url("Autoridades"), texto: "Autoridades" },
          ],
        },
        { enlace: APP.url("Codigo-Etica"), texto: "Código de ética" },
        { enlace: APP.url("Modelos"), texto: "Modelo Educativo y Pedagógico" },
        {
          texto: "Aseguramiento de la calidad y planificación",
          id: "dropdownCalidadPlanificacion",
          items: [
            {
              enlace: APP.url("Calidad-Planificacion"),
              texto: "Calidad y Planificación",
            },
            { enlace: APP.url("Planificacion-Pedi"), texto: "PEDI 2024-2028" },
            {
              enlace: APP.url("POA"),
              texto: "Plan Operativo Anual (POA) 2025",
            },
          ],
        },

        {
          texto: "Transparencia",
          id: "dropdownMarcoLegal",
          items: [
            {
              enlace: APP.url("Estado-Financiero"),
              texto: "Estado Financiero",
            },
            {
              enlace: APP.url("Rendicion-Cuentas"),
              texto: "Rendición de Cuentas",
            },
            {
              enlace: APP.url("Remuneracion-Mensual"),
              texto: "Remuneración Mensual",
            },
            { enlace: APP.url("Aranceles"), texto: "Aranceles" },
            { enlace: APP.url("Balances-Generales"), texto: "Balance General" },
            {
              enlace: APP.url("Cumplimiento-Tributario"),
              texto: "Cumplimiento Tributario",
            },
            {
              enlace: APP.url("Balances-Auditados"),
              texto: "Balances Auditados",
            },
          ],
        },
        {
          texto: "Marco Legal",
          id: "dropdownMarcoLegal",
          items: [
            { enlace: APP.url("Reglamentos"), texto: "Reglamentos" },
            { enlace: APP.url("Normativa"), texto: "Normativa" },
            { enlace: APP.url("Protocolos"), texto: "Protocolos" },
            { enlace: APP.url("Estatuto"), texto: "Estatuto" },
          ],
        },
      ],
    },
    {
      texto: "Oferta Académica",
      items: [
        {
          enlace: APP.url("ECSOS"),
          texto: "ECSOS",
          descripcion:
            "• Topografía\n• Minería\n• Seguridad e Higiene del Trabajo\n• Prevención de Riesgos Laborales",
        },
        {
          enlace: APP.url("ECAVET"),
          texto: "ECAVET",
          descripcion: "• Enfermería Veterinaria\n• Producción Animal",
        },
        {
          enlace: APP.url("ECSET"),
          texto: "ECSET",
          descripcion:
            "• Administración\n• Marketing Digital\n• Diseño Multimedia\n• Ventas con IA\n• Instrumentación Quirúrgica\n• Educación Básica\n• Educación Bilingüe\n• Enfermería",
        },
      ],
    },
    {
      texto: "Servicios",
      items: [
        {
          enlace: APP.url("Biblioteca-Institucional"),
          texto: "Biblioteca Institucional",
        },
        { enlace: APP.url("Graduados"), texto: "Graduados" },
        {
          enlace: "https://eci.superarse.edu.ec/",
          texto: "Cursos Educación Continua e Inglés ",
          target: "_blank",
        },
        {
          enlace: APP.url("Bienestar-Institucional"),
          texto: "Bienestar Institucional ",
        },
        { enlace: APP.url("Equipo-Conectados"), texto: "Equipo Conectados" },
        { enlace: APP.url("Formatos"), texto: "Solicitudes " },
        { enlace: APP.url("Residencia"), texto: "Residencia Estudiantil " },
      ],
    },
    {
      texto: "Admisiones",
      items: [
        { enlace: APP.url("Por-Que-Elegirnos"), texto: "¿Por qué Elegirnos?" },
        { enlace: APP.url("Proceso-Admision"), texto: "Proceso de Admisión" },
      ],
    },
    {
      texto: "Vinculación con la sociedad ",
      items: [
        {
          enlace: APP.url("Vinculacion-con-la-Sociedad"),
          texto: "Programas y proyectos de vinculación con la sociedad",
        },
        {
          enlace: APP.url("Practicas-Preprofesionales"),
          texto: "Prácticas Pre-Profesionales",
        },
        {
          enlace: APP.url("Relaciones-InterInstitucionales"),
          texto: "Relaciones InterInstitucionales",
        },
        {
          enlace: APP.url("Presencia-en-la-Comunidad"),
          texto: "Presencia en la comunidad",
        },
      ],
    },
    {
      texto: "Investigación",
      enlace: APP.url("Investigacion"),
    },
    {
      texto: "Noticias ",
      enlace: APP.url("Noticias"),
      //target: '_blank',
    },
  ],
  // Enlace final de "Plataformas"
  finalLink: {
    enlace: APP.url("Plataformas"),
    texto: "Plataformas",
    clases: "btn btn-primary px-4",
    target: "_blank",
  },
};
