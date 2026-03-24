// js/ofertaAcademica.js

const carreras = [
  {
    titulo: 'Educación Básica',
    modalId: 'educacionBasicaModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaEducacionHumanidades/educacionBasica.png',
    resolucion: 'RPC-SO-03-No.039-2023',
    duracion: '2 Años',
    modalidad: 'Híbrida',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/EDUCACION_BASICA', // Actualiza con la URL de la malla
      texto: 'Clic aquí!'
    },
     waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Educación%20básica',
// --- Contenido específico para el modal ---
    descripcionModal: "El Tecnólogo en Educación General Básica es un profesional íntegro, centrado en el ser humano, con principios éticos y pensamiento crítico constructivista, que contribuye al desarrollo y bienestar de la población. Estos profesionales son capaces de diseñar, aplicar e innovar el currículo de Educación Básica en el ámbito profesional e investigativo, integrando temas de interculturalidad, inclusión e igualdad de oportunidades en diversas áreas y campos del saber. Además, tienen la capacidad de formar equipos técnicos de profesionales con habilidades para manejar estrategias y herramientas innovadoras en el ámbito educativo.",
    perfilProfesional: [
        "Analiza los fundamentos metodológicos de la investigación científica y las peculiaridades de su aplicación en el ámbito educativo, identificando diferentes fuentes de la investigación a partir de las cuales se desarrollará el proceso investigativo.",
        "Determina el nivel de aprendizaje de los estudiantes en un proceso educativo específico, utilizando estrategias y herramientas sistemáticas y secuenciales, que le permitan demostrar su grado de comprensión, profundidad y la habilidad para en el aula.",
        "Centrado en el desarrollo humano, social y comunitario, desde una perspectiva ética, crítica e interdisciplinaria, con aptitudes hacia la investigación y la comprensión de los procesos cognoscitivos, afectivos y de comportamiento humano; los aprendizajes y competencias adquiridas con el sustento científico y profesional de la carrera, le permitirán intervenir con solvencia ética y profesional en diversos procesos educativos en diferentes entornos de aprendizaje en el campo de la educación básica.",
     
    ],
    campoLaboral: [
        "El Tecnólogo en Educación Básica estará capacitado para desarrollar en sus estudiantes, los mismos planteamientos de la UNESCO, a partir de su constitución, tales como: el principio de la no discriminación, la igualdad de oportunidades y de trato, el acceso universal a la educación y el principio de solidaridad; también estará preparado para asumir los cuatro pilares de la educación: aprender a conocer, aprender a hacer, aprender a vivir juntos, aprender a ser y aprender a transformarse, en total correspondencia con el precepto de que la educación es un derecho para todos, a lo largo de toda la vida y, que el acceso a la educación debe ir acompañado de la calidad.",
      
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong> Híbrida</strong>"  
},
{
    titulo: 'Educación  Bilingüe ',
    modalId: 'educacionBilingueModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaEducacionHumanidades/educacionBilingue.png',
    resolucion: ' RPC-SO-36-No.594-2024',
    duracion: '2 Años',
    modalidad: 'Híbrida',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/EDUCACION_BILINGUE', // Actualiza con la URL de la malla
      texto: 'Clic aquí!'
    },
     waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Educación%20básica',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar tecnólogos en Educación Bilingüe con competencias que les permitan apoyar a los Licenciados en Educación Inicial y afines, ampliamente en las necesidades educativas de los niños en etapa escolar inicial, tanto en español como en inglés, apoyando en el diseño, implementación y evaluación de programas educativos bilingües, metodologías pedagógicas e innovadoras que promuevan el desarrollo cognitivo, lingüístico y socioemocional de los estudiantes en ambos idiomas. Además, de apoyar en la creación de entornos de aprendizaje inclusivos y multiculturales, facilitando la integración de diversas culturas y lenguas dentro del aula.",
    perfilProfesional: [
        "Colabora en el diseño de actividades que promuevan la creatividad en diferentes etapas del desarrollo infantil tanto en español como en inglés.",
        "Apoya al equipo de trabajo docente colaborando en el diseño, planificación, ejecución, evaluación, organización y estructuración de los ambientes adecuados (aulas) para las experiencias de aprendizaje bilingüe de niños y niñas de educación inicial.",
        "Apoya al docente parvulario en la aplicación de pedagogías alternativas mediante la selección de ambientes de aprendizajes y de materiales educativos para la ejecución del proceso de enseñanza aprendizaje bilingüe en niños de educación inicial.",
     
    ],
    campoLaboral: [
      "Apoyar a los docentes licenciados de Educación Inicial y primaria en la planificación, ejecución y evaluación de actividades de aprendizaje en aulas bilingües (español e inglés).",
      "Trabajar en guarderías, centros preescolares, y jardines de infantes, colaborando en el diseño y aplicación de metodologías pedagógicas innovadoras que fomenten el desarrollo cognitivo y lingüístico en ambos idiomas.",
      "Participar activamente en la selección, adaptación y creación de recursos y ambientes de aprendizaje (aulas) inclusivos, multiculturales y bilingües.",
      "Colaborar en la implementación de programas educativos bilingües fuera del horario escolar, facilitando la integración de diversas culturas y lenguas.",
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong> Híbrida</strong>"  
},

  {
    titulo: 'Enfermería Veterinaria',
    modalId: 'enfermeriaVeterinariaModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaVeterinaria/enfermeriaVeterinaria.png',
    resolucion: 'RPC-SO-26-No.429-2024',
    duracion: '2 Años',
    modalidad: 'Híbrida',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/ENFERMERIA_VETERINARIA',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Enfermería%20Veterinária',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar Tecnólogos en Enfermería Veterinaria con competencias que les permita atender ampliamente las necesidades de los animales brindando asistencia al médico veterinario en la atención al paciente en actividades como hospitalización, manejo de muestras de laboratorio, estética, cirugía, manejo y cuidado de animales de compañía, de granja y silvestres dentro de clínicas y hospitales veterinarios.",
    perfilProfesional: [
        "Analiza los fundamentos metodológicos de la investigación científica y las peculiaridades de su aplicación en el ámbito educativo, identificando diferentes fuentes de la investigación a partir de las cuales se desarrollará el proceso investigativo.",
        "Determina el nivel de aprendizaje de los estudiantes en un proceso educativo específico, utilizando estrategias y herramientas sistemáticas y secuenciales, que le permitan demostrar su grado de comprensión, profundidad y la habilidad para en el aula.",
        "Centrado en el desarrollo humano, social y comunitario, desde una perspectiva ética, crítica e interdisciplinaria, con aptitudes hacia la investigación y la comprensión de los procesos cognoscitivos, afectivos y de comportamiento humano; los aprendizajes y competencias adquiridas con el sustento científico y profesional de la carrera, le permitirán intervenir con solvencia ética y profesional en diversos procesos educativos en diferentes entornos de aprendizaje en el campo de la educación básica.",
    ],
    campoLaboral: [
        "La formación en enfermería veterinaria capacita a los profesionales para desempeñarse efectivamente en una variedad de entornos, como clínicas y hospitales veterinarios, zoológicos y centros de rescate animal, granjas, empresas agropecuarias y organizaciones gubernamentales, entre otros sectores relacionados con la carrera.",
      
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>Híbrida</strong>"  
},
  {
    titulo: 'Producción Animal',
    modalId: 'produccionAnimalModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaVeterinaria/produccionAnimal.png',
    resolucion: 'RPC-SO-28- No.469 -2024',
    duracion: '2 Años',
    modalidad: 'Híbrida',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/PRODUCCION_ANIMAL',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Producción%20Animal',
// --- Contenido específico para el modal ---
    descripcionModal: "El Tecnólogo en Producción Animal es un profesional capacitado para criar y cuidar especies de producción como ganado bovino, porcino y avícola de manera preventiva. Gestiona adecuadamente la nutrición animal, garantizando una provisión dietética adecuada y cuidado continuo. Además, promueve el respeto a los principios de interculturalidad, justicia social, equidad democrática y cuidado del medio ambiente en los diferentes espacios de producción pecuaria.",
    perfilProfesional: [
        "Aplicará en el sector pecuario empresarial privado o público los conocimientos adquiridos y generar nuevos modelos y propuestas de producciones pecuarias adecuadas y eficaces, así como generar y desarrollar nuevos proyectos y emprendimientos.",
        "Alcanzará habilidades y conocimientos que le permitirán aplicar técnicas e instrumentos para el desarrollo de estrategias en el sector pecuario, tanto productivo como reproductivo en las diferentes especies.",
        "Desarrollará habilidades para la gestión a nivel gerencial en áreas específicas de administración de producciones pecuarias, actividades de mejoramiento genético animal, nutrición animal de producción animal.",
        "Conocimientos técnicos en el cuidado preventivo de las especies animales de producción pecuaria, como bovinos, porcinos y especies avícolas, incluyendo una correcta provisión dietética y cuidado permanente; es capaz de manejar un programa preventivo de cuidado animal incluyendo sanidad e higiene.",
     
    ],
    campoLaboral: [
        "El Tecnólogo en Producción Animal puede administrar centros de producción animal, liderando la optimización y la mejora de la productividad a través de la transferencia de tecnologías en el manejo y nutrición animal.",
      
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>Híbrida</strong>" 
},
  {
    titulo: 'Instrumentación Quirúrgica',
    modalId: 'instrumentacionQuirurgicaModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaSalud/instrumentacionQuirurgica/InstrumentacionQuirurgica.png',
    resolucion: 'RPC-SE-11-No.039-2024',
    duracion: '2 Años',
    modalidad: 'Presencial',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/INSTRUMENTACION_QUIRURGICA', // Actualiza con la URL de la malla
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Instrumentación%20Quirúrgica',
// --- Contenido específico para el modal ---
    descripcionModal: "El Tecnólogo en Instrumentación Quirúrgica es un profesional altamente capacitado en el uso, mantenimiento y selección de instrumentos quirúrgicos. Además, está preparado para proporcionar asistencia eficaz y segura al equipo médico en diversos entornos operatorios. Esta competencia se logra a través de una educación integral que forma profesionales comprometidos y altamente cualificados, garantizando así una atención óptima y segura en el ámbito de la salud.",
    perfilProfesional: [
        "La carrera de Instrumentación Quirúrgica es crucial en el ámbito de la salud, ya que los profesionales en esta área deben dominar conocimientos técnicos y científicos avanzados, habilidades de comunicación efectiva, y competencias en gestión y liderazgo. Estos especialistas son responsables de preparar y manejar los instrumentos quirúrgicos, asistir al equipo médico durante las operaciones, y garantizar la seguridad y precisión en el quirófano. Su formación rigurosa y su capacidad para trabajar bajo presión son esenciales para el éxito de las intervenciones quirúrgicas y la atención óptima a los pacientes.",
      
    ],
    campoLaboral: [
        "Clínicas públicas y privadas",
        "Casas de salud públicas",
        "Hospitales del día",
        "Casas comerciales de venta de productos e instrumentación quirúrgica, e insumos médicos",
        "Asistencia a cirujanos de consulta privada."
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>Presencial</strong>" 
},
  {
    titulo: 'Marketing Digital',
    modalId: 'marketingDigitalModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/marketing.png',
    resolucion: 'RPC-SO-19-No.129-2020',
    duracion: '1 Años',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/MARKETING_DIGITAL',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Marketing%20Digital',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar profesionales en Marketing Digital con competencias y habilidades que les permitan desenvolverse en el ámbito de la comunicación y la publicidad, creando, gestionando y optimizando estrategias digitales mediante el uso de herramientas tecnológicas, plataformas digitales y análisis de datos para fortalecer la presencia de marcas y mejorar su impacto en el público objetivo.",
    perfilProfesional: [
        "Colaborar en las tareas diarias de comunicación en redes sociales (community management) y publicidad en línea, siguiendo los protocolos de omnicanalidad.",
        "Colaborar en la elaboración de contenidos digitales sencillos (texto, imagen estática) utilizando software básico de diseño para apoyar la comunicación de marca en plataformas digitales.",
        "Promover una comunicación digital responsable, inclusiva y orientada al posicionamiento de marca.",
        "Apoyar la planificación, ejecución y evaluación de campañas publicitarias y planes de marketing digital en redes sociales.",
        "Actualizar la información de productos y servicios en catálogos digitales y plataformas de comercio electrónico (e-commerce)las áreas de marketing, comunicación y publicidad en redes",
 
    ],
    campoLaboral: [
       
        "Empresas de distintos sectores, desarrollando estrategias publicitarias y de comunicación digital",
        "Emprendimientos, creando y gestionando campañas de marketing digital de forma integral.",
        "Agencias de publicidad y agencias de relaciones públicas, participando en el diseño, planificación y ejecución de campañas publicitarias",
        "Departamentos de marketing, desempeñándose como planner en medios digitales, investigación de mercados, análisis y apoyo en ventas.",
    
    ],
    duracionModal: "La carrera tiene una duración de <strong>1 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>En línea</strong>"  
},
 {
    titulo: 'Marketing Digital y Diseño Multimedia',
    modalId: 'marketingDigitalMultimediaModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/IMAGEN CARRERA MKTD - DM.jpg',
    resolucion: 'RPC-SO-07-No.109-2026',
    duracion: '2 Años',
    modalidad: 'Línea',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/MARKETING_DISEÑO_MULTIMEDIA',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Marketing%20Digital',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar tecnólogos en Marketing Digital y Diseño Multimedia capaces de colaborar en el diseño de contenidos visuales y multimedia para diversos medios, así como ayudar en la promoción de marcas o productos en los diversos entornos digitales.",
    perfilProfesional: [
        "Colaborar en la gestión de campañas digitales y proyectos de comunicación visual aplicando principios técnicos y creativos bajo supervisión profesional.",
        "Participar en procesos de comercio electrónico y posicionamiento digital siguiendo lineamientos estratégicos establecidos por la organización.",
        "Apoyar en la creación y difusión de contenidos multimedia respetando la diversidad cultural, la inclusión y los valores humanos y ambientales.",
        "Integrar metodologías ágiles, pensamiento crítico e innovación en el desarrollo de soluciones creativas orientadas a objetivos organizacionales.",
        "Promover prácticas comerciales responsables, éticas y orientadas al desarrollo sostenible",
        "Trabajar en equipos multidisciplinarios demostrando liderazgo positivo, comunicación efectiva y gestión responsable de la información digital.",
 
    ],
    campoLaboral: [
       
        "Agencias de marketing digital y comunicación visual, colaborando en la gestión de campañas y producción de contenidos multimedia.",
        "Empresas públicas y privadas que requieran apoyo en diseño gráfico, comercio electrónico y posicionamiento digital.",
        "Departamentos de marketing y comunicación, participando en proyectos de branding, identidad visual y gestión de redes sociales",
        "Emprendimientos y PYMES que desarrollen estrategias de promoción y comercialización en entornos digitales",
    
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 años</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>En línea</strong>"  
},
{
    titulo: 'Administración',
    modalId: 'administracionModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/ADMINSTRACION.png',
    resolucion: 'RPC-SO-45-No.727-2024',
    duracion: '1 Años',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/ADMINISTRACION',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Administración',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar profesionales en Administración que desarrollen competencias y habilidades en el ámbito de la contabilidad con conocimientos técnicos en la contabilidad computarizada a través de los sistemas tecnológicos; en la legislación laboral y tributaria para asegurar el cumplimiento de todas las normas legales de la empresa donde labore; en la gestión del talento humano para asegurar el correcto control del personal y el justo pago de salarios y beneficios; en la gestión de la calidad, logística y costos para mejorar la productividad de la empresa donde se desempeña; y en la administración de empresas de tamaño pequeño y micro para garantizar que dichas empresas cumplan su planificación, sus objetivos y metas.",
    perfilProfesional: [
        "Un profesional con conocimientos técnicos en contabilidad computarizada, legislación laboral y tributaria, gestión del talento humano, de la calidad y de la logística, conocimientos sobre análisis de costos y desarrollo de propuestas económicas y cotizaciones y planificación administrativa a través del análisis del mercado y el establecimiento de metas y objetivos. El Técnico puede desempeñarse profesionalmente como responsable de las áreas de administración o contabilidad de empresas de tamaño pequeño o micro empresas, cajero, asistente administrativo, auxiliar contable y secretario/a en las áreas administrativas de empresas de los sectores de manufactura, comercio, construcción y transporte.",
      
    ],
    campoLaboral: [
        "El Técnico(a) en Administración podrá administrar la oficina de profesionales, como es el caso de médicos, dentistas, abogados, arquitectos, ingenieros y en general oficinas de profesionales que requieren de un profesional con conocimientos en áreas de contabilidad, contratación de personal, tributación, y demás requerimientos administrativos.",
        
    ],
    duracionModal: "La carrera tiene una duración de <strong>1 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>En línea</strong>"  
},

<!-------------------------------------------------------------------------->

 {
    titulo: 'Ventas estratégicas con inteligencia artificial ',
    modalId: 'ventasModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/Venta_estratégicas_IA.png',
    resolucion: 'RPC-SO-50-No.756-2025',
    duracion: '1 Años',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/VENTAS_CON_IA',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Topografía',
// --- Contenido específico para el modal ---
    descripcionModal: " Formar técnicos en Ventas Estratégicas con Inteligencia Artificial con competencias que les permitan colaborar con los profesionales del área comercial, brindando apoyo en los procesos de ventas mediante el uso de herramientas digitales y la inteligencia artificial para anticipar tendencias y ajustar estrategias comerciales.",
    perfilProfesional: [
        "Colaborar al profesional del área comercial en el uso de sistemas CRM y herramientas de IA para el registro de interacciones comerciales.",
        "Brindar apoyo en actividades básicas de negociación B2B y B2C y en procedimientos de ventas omnicanal en entornos digitales.",
        "Brinda apoyo en el área de atención al cliente para la venta,manteniendo el orden y la asistencia en tareas del equipo comercial. ",
        "Colaborar al profesional del área comercial en el registro básico de datos de ventas para informes operativos.",
        "Brinda apoyo en los procesos de ventas digitales usando herramientas de Inteligencia artificial.",
       
    ],
    campoLaboral: [
        "Empresas comerciales de distintos sectores, gestionando procesos de venta, y estrategias.",
        "Departamentos de ventas, participando en la planificación, negociación y cierre de negocios. ",
        "Negociaciones digitales y plataformas de comercio electrónico, gestionando ventas online, y procesos de comercialización en entornos digitales. ",
        "Formar parte de emprendimientos, y PYMES."
    ],
    duracionModal: "La carrera tiene una duración de <strong>1 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>Línea</strong>"  
},

<!---------------------------------------------------------------------------->

  {
    titulo: 'Seguridad e Higiene del Trabajo',
    modalId: 'seguridadHigieneModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/Higiene del trabajo.png',
    resolucion: 'RPC-SO-01-No.001-2025',
    duracion: '1 Años',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/SEGURIDAD_E_HIGIENE_DEL_TRABAJO',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Seguridad%20e%20Higiene%20del%20Trabajo',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar Técnicos en Seguridad e Higiene del Trabajo con competencias técnicas y éticas para identificar y gestionar riesgos laborales, promoviendo prácticas preventivas y correctivas que garanticen la seguridad de los trabajadores en diversos sectores productivos; donde están capacitados para implementar sistemas de higiene laboral que minimicen los riesgos asociados a las condiciones de trabajo, contribuyendo a la mejora de la calidad de vida de los trabajadores, el respeto a la diversidad, la igualdad de oportunidades y los derechos humanos, impulsando una cultura de prevención y mejora continua en los entornos laborales.",
    perfilProfesional: [
        "Identificar los riesgos laborales en diferentes entornos de trabajo.",
        "Colaborar en la elaboración de planes de emergencia y conformación brigadas.",
        "Aplicar la normativa vigente en seguridad e higiene del trabajo, así como la legislación aplicable en el ámbito laboral.",
        "Reconocer las necesidades de salud ocupacional en distintos sectores laborales.",
        "Colaborar en la implementación de acciones de primeros auxilios en situaciones de emergencia laboral.",
        "Aplicar técnicas y medidas de prevención de riesgos en el entorno laboral para minimizar accidentes y enfermedades profesionales."
    ],
    campoLaboral: [
        "Todo tipo de empresa Jurídicas ya sean públicas, privadas o mixtas",
        "Emprendimientos (negocios) registrados legalmente en el Servicio de Rentas Internas.",
       
    ],
    duracionModal: "La carrera tiene una duración de <strong>1 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>En línea</strong>" 
},
  {
    titulo: 'Seguridad y Prevención de Riesgos Laborales',
    modalId: 'prevencionRiesgosModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/Riesgos Laborales.png',
    resolucion: 'RPC-SO-42-No.685-2024',
    duracion: '1 Años',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/SEGURIDAD_PREVENCION_RIESGOS_LABORALES',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Seguridad%20y%20Prevención%20de%20Riesgos%20Laborales',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar Tecnólogos en Seguridad y Prevención de Riesgos Laborales con competencias que les permitan colaborar en la identificación, evaluación y prevención de riesgos en el entorno laboral, promoviendo un ambiente de trabajo seguro y saludable. Así como también, contribuir al bienestar social, la protección del medio ambiente y el desarrollo sostenible, en un marco de respeto a la diversidad, igualdad y derechos humanos, asegurando la mejora continua de las condiciones laborales y la calidad de vida de los trabajadores.",
    perfilProfesional: [
        "Aplica normativas de salud, seguridad y prevención de riesgos laborales en distintos entornos de trabajo.",
        "Colabora en la identificación, evaluación y reporte de riesgos laborales de manera efectiva.",
        "Participa en programas que promuevan la seguridad y el bienestar de los trabajadores.",
        "Emplea metodologías y modelos para la identificación, análisis y evaluación de riesgos laborales.",
        "Apoya a equipos multidisciplinarios en la implementación de estrategias de seguridad y prevención ocupacional.",
        "Promueve la creación de una cultura de prevención y seguridad dentro de las organizaciones y comunidades.",
       "Aplica procesos de mejora continua en la gestión de seguridad y salud, basados en el análisis de datos."
    ],
    campoLaboral: [
        "Un profesional en Seguridad y Prevención de Riesgos Laborales puede trabajar en empresas públicas, privadas y emprendimientos, identificando y mitigando riesgos para crear entornos laborales seguros. Sus oportunidades incluyen liderar proyectos en industrias como la construcción, diseñar programas de prevención personalizados, ofrecer consultoría y capacitar a otros en normativas y planes de emergencia. Además, puede colaborar con ONGs y proyectos comunitarios, contribuyendo al desarrollo sostenible, la protección ambiental y el bienestar general.",
      
    ],
    duracionModal: "La carrera tiene una duración de <strong>1 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>En línea</strong>" 
},
  
  {
    titulo: 'Topografía',
    modalId: 'topografiaModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/TOPOGRAFIA.png',
    resolucion: 'RPC-SO-12-No.320-2021',
    duracion: '2 Años',
    modalidad: 'Híbrida',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/TOPO',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Topografía',
// --- Contenido específico para el modal ---
    descripcionModal: "El Tecnólogo en Topografía es un profesional con sólidos conocimientos teóricos, científicos, prácticos y técnicos en topografía y geodesia. Está capacitado para manejar instrumentos especializados y satisfacer las necesidades de diversos servicios en el área de la construcción, adaptándose a diferentes niveles de complejidad. Su labor incluye el levantamiento topográfico y la representación gráfica detallada de la superficie terrestre, aspectos fundamentales para el diseño y planificación de obras civiles.",
    perfilProfesional: [
        "El Tecnólogo en Topografía es un profesional con sólidos conocimientos teóricos, científicos, prácticos y técnicos en topografía y geodesia. Está capacitado para manejar instrumentos especializados y satisfacer las necesidades de diversos servicios en el área de la construcción, adaptándose a diferentes niveles de complejidad. Su labor incluye el levantamiento topográfico y la representación gráfica detallada de la superficie terrestre, aspectos fundamentales para el diseño y planificación de obras civiles.",
       
    ],
    campoLaboral: [
        "Empresas Constructoras, Mineras, Agrícolas, Forestales, Sanitarias, Eléctricas, Telecomunicación y Comerciales.",
        "IGN.",
        "Gobiernos Regionales.",
        "Ministerios.",
        "Prestación de servicios profesionales como: topógrafo, asesor, consultor y fiscalizador y técnico de obra."
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>Híbrida</strong>"  
},
  {
    titulo: 'Minería',
    modalId: 'mineriaModal',
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/MINERIA.png',
    resolucion: 'RPC-SO-50-No.796-2022',
    duracion: '2 Años',
    modalidad: 'Línea',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/MINERIA',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Minería',
// --- Contenido específico para el modal ---
    descripcionModal: "El Tecnólogo en Minería es un profesional con sólidos conocimientos teóricos y prácticos en los procesos de prospección, exploración y explotación minera. Además, posee estrategias técnicas para el aprovechamiento sostenible de minerales, contribuyendo al desarrollo socioeconómico del país. Su enfoque incluye la implementación de soluciones desde diversas perspectivas para garantizar los derechos ambientales y fomentar una sociedad participativa mediante innovadoras estrategias y técnicas.",
    perfilProfesional: [
        "Controlar las operaciones mineras, así como también las operaciones de fortificación, ventilación en minas subterráneas.",
        "Sera capaz de preparar muestras para análisis granulométricos y químicos de muestras de rocas y minerales y realizar levantamiento topográficos y replanteos según requerimientos de la mina, mediante el uso de la tecnología y de sistemas de información.",
        "Además, aplicará herramienta de planificación y control de operaciones mineras en el ámbito inherente a su profesión, la normativa vigente de seguridad industrial y protección al medio ambiente, con competencias técnicas propias del área y las relacionadas con la adaptación, comunicación y trabajo en equipo, con dominio de conocimientos sobre cómo se desarrollan los procesos geológicos en la corteza terrestre, demostrando flexibilidad y adaptabilidad en diferentes entornos laborales.",
      
    ],
    campoLaboral: [
        "El Tecnólogo en Minería podrá laborar en el sector público y privado, apoyando en actividades relativas al campo de la Minería, en áreas productivas y de desarrollo del país, además tendrá la capacidad de analizar la realidad política, económica, social y cultural, con el apoyo de recursos tecnológicos innovadores.",
    
    ],
    duracionModal: "La carrera tiene una duración de <strong>2 año</strong>, incluyendo prácticas preprofesionales supervisadas.",
    modalidadModal: "<strong>Híbrida</strong>"  
}
];