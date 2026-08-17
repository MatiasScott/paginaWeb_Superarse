// js/ofertaAcademica.js

const carreras = [
  {
    titulo: 'Educación Básica',
    modalId: 'educacionBasicaModal',
    degree:'Tecnólogo/a Superior en Educación Básica',
    imagenSrc: '/assets/img/gestionAcademica/escuelaEducacionHumanidades/educacionBasica.png',
    resolucion: 'RPC-SO-03-No.039-2023',
    duracion: '2 Años',
    modalidad: 'En línea',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/EDUCACION_BASICA', // Actualiza con la URL de la malla
      texto: 'Clic aquí!'
    },
     waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Educación%20básica',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar tecnólogos capaces de diseñar, aplicar e innovar el currículo de Educación Básica en el ámbito profesional e investigativo, en el que se inserten temas de interculturalidad, inclusión e igualdad de oportunidades, en distintas áreas y campos del saber",
    perfilProfesional: [
         "Comprende los procesos históricos y sociales de la historia del Ecuador desde una perspectiva en sus dimensiones antropológicas, económicas, políticas, sociológicas y geográficas.  ",
      "Determina el nivel de aprendizaje de los estudiantes en un proceso educativo específico, utilizando estrategias y herramientas sistemáticas y secuenciales, que le permitan demostrar su grado de comprensión, profundidad y la habilidad para declarar que sabe algo, lo puede nombrar, narrar y evidenciar. ",
      "Reconoce el currículo, planes y programas oficiales aplicados en las instituciones educativas, en diversos escenarios de aprendizaje en función de los distintos niveles de educación general básica. ",
      "Modera situaciones de la educación, comunicación, creatividad e innovación, que propicien la construcción de conocimiento colectivo con base en la información de origen multidisciplinario. ",
      "Explica el desarrollo cognitivo, comunicativo, emocional y afectivo que se produce en las etapas tempranas de desarrollo, con el fin de ejecutar un apoyo en los procesos de enseñanza – aprendizaje y el desarrollo integral de niños y adolescentes.",
      "Estructura los procesos de enseñanza - aprendizaje, en correlación entre la práctica pedagógica y las disciplinas considerando las diversas dimensiones de la pedagogía.",
      "Aplica los diferentes elementos del proceso didáctico en el aula en correlación con una práctica educativa innovadora.",
    ],
    campoLaboral: [
           "Instituciones educativas públicas y privadas.",
      "Centros de educación inicial y básica.",
      "Programas de apoyo y nivelación educativa.",
      "Fundaciones y organizaciones educativas.",
      "Proyectos de educación comunitaria e inclusión.",
      "Emprendimientos en apoyo pedagógico, tutorías y recursos educativos.",
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong> Híbrida</strong>"  
},
{
    titulo: 'Educación  Bilingüe ',
    modalId: 'educacionBilingueModal',
    degree:'Tecnólogo/a	Superior	en Educación Bilingüe',
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
      "Desarrolla estimulación temprana en los niños para un buen desarrollo cognitivo, motora, social y lingüística; tanto en español como en el idioma inglés.",
      "Ejecuta didácticas innovadoras para contribuir a una gestión educativa eficiente de acuerdo a las necesidades e intereses de los estudiantes.",
      "Ejecuta los procesos de desarrollo de planes y programas curriculares en ingles – español.",
      "Enseña a los niños a clasificar de forma correcta los residuos cumpliendo con el cuidado del medioambiente en la lengua materna como lengua extranjera. ",
      "Colabora en el desarrollo integral de los niños, potenciando sus habilidades lingüísticas, cognitivas y socioemocionales, lo que tendrá un impacto positivo en su bienestar y desarrollo personal.",
     
    ],
    campoLaboral: [
        "Centros de Desarrollo Infantil (CDI).",
      "Instituciones de Educación Inicial públicas y privadas.",
      "Centros de estimulación temprana.",
      "Fundaciones y organizaciones de atención a la primera infancia.",
      "Programas de desarrollo infantil y comunitario.",
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong> Híbrida</strong>"  
},

  {
    titulo: 'Enfermería Veterinaria',
    modalId: 'enfermeriaVeterinariaModal',
    degree: "Tecnólogo/a Superior en Enfermería Veterinaria",
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
          
  "Preparar al paciente con técnicas apropiadas, aplicación de medicamentos, curaciones, vendajes y férulas, según la prescripción e indicación del médico veterinario.",
  "Asistir al médico veterinario en procedimientos quirúrgicos, técnicas de diagnóstico de laboratorio y por imágenes.",
  "Apoyar al médico veterinario en la preparación y aplicación de técnicas de preanestesia, anestesia y monitoreo de parámetros clínicos preoperatorio y posoperatorio.",
  "Proporcionar servicios en la atención, cuidado y seguimiento de los animales para preservar por la salud y bienestar.",
  "Aplicar en la práctica los principios de seguridad e higiene en el cuidado de enfermería veterinaria.",
  "Participar en campañas sanitarias locales, nacionales y regionales, para el control y erradicación de enfermedades zoonóticas.",
  "Aplicar los protocolos, procesos y procedimientos de enfermería veterinaria para las patologías generales diagnosticadas por el médico veterinario."
    ],
    campoLaboral: [
          "Clínicas y hospitales veterinarios.",
      "Zoológicos.",
      "Centros de rescate animal.",
      "Granjas y empresas pecuarias.",
      "Organizaciones gubernamentales.",
      "Otros relacionados con el campo veterinario.",
      
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>Híbrida</strong>"  
},

  {
    titulo: 'Producción Animal',
    modalId: 'produccionAnimalModal',
    degree: 'Tecnólogo/a	Superior	en Producción Animal',
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
    descripcionModal: "Formar tecnólogos en Producción Animal con competencias en la ejecución de planes y programas de reproducción animal, mejoramiento genético, nutrición y sanidad, así como, en la aplicación de herramientas y equipos para la industrialización de productos pecuarios que garantice la oferta de profesionales altamente cualificados y comprometidos en el ámbito de la producción animal.",
    perfilProfesional: [
         "Ejecutar programas de reproducción animal, mejoramiento genético, nutrición, sanidad y buenas prácticas pecuarias, con el fin de abordar de manera efectiva los desafíos relacionados con el manejo técnico de los animales.",
      "AProporciona asistencia técnica especializada en el manejo nutricional, sanitario y reproductivo de los animales.",
      "Aplica técnicas e instrumentos para el desarrollo de estrategias en el sector pecuario, abordando aspectos tanto productivos como reproductivos en diversas especies animales.",
      "Emplea procesos de comercialización para la producción pecuaria, garantizando la calidad en el procesamiento, distribución y entrega de productos, en línea con los objetivos administrativos y comerciales definidos en la unidad productiva.",
      "Ejecuta estrategias de nutrición animal, maximizando la utilización de recursos locales disponibles y aumentando la eficiencia productiva, siguiendo estándares de calidad y requisitos técnicos establecidos en manuales especializados de nutrición.",
     
    ],
    campoLaboral: [
         "Granjas, fincas, haciendas, pecuarias.",
     "Empresas agropecuarias.",
     "Asociaciones y cooperativas pecuarias.",
     "Organizaciones gubernamentales.",
     "Otras del sector pecuario.",
      
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>Híbrida</strong>" 
},
<!----------------------------------------------------------------------------->
  {
    titulo: 'Instrumentación Quirúrgica',
    modalId: 'instrumentacionQuirurgicaModal',
    degree: 'Tecnólogo/a Superior en Instrumentación Quirúrgica',
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
    descripcionModal: "La Carrera de Instrumentación Quirúrgica tiene como objetivo formar tecnólogos con competencias en el uso, mantenimiento y selección de instrumentos quirúrgicos, así como en la asistencia eficaz y segura al equipo de médicos en los diversos entornos operatorios mediante una educación integral que garantice la oferta de profesionales altamente cualificados y comprometidos en el ámbito de la salud.",
    perfilProfesional: [
        "Aplicar técnicas de limpieza, desinfección y esterilización de instrumental y equipos de acuerdo con protocolos y normas de bioseguridad establecidos.",
        "Apoyar al equipo de salud durante los procedimientos quirúrgicos mediante el manejo adecuado y oportuno del instrumental especializado.",
        "Colaborar en el control, registro y gestión de insumos, equipos y desechos quirúrgicos conforme a la normativa sanitaria vigente.",
        "Participar en la preparación y mantenimiento de ambientes quirúrgicos seguros, garantizando la calidad y seguridad del paciente.",
        "Promover una práctica profesional basada en la ética, el respeto a los derechos humanos, la interculturalidad y el compromiso con la excelencia en la atención sanitaria.", 
        ],
    perfilEgresado: [
        "Brinda apoyo en la preparación, organización y verificación de instrumentos, equipos y materiales requeridos para los procedimientos quirúrgicos.",
        "Colabora en la aplicación de técnicas de asepsia, antisepsia y bioseguridad para garantizar condiciones óptimas en el entorno quirúrgico.",
        "Colabora en el control, registro y mantenimiento de equipos e insumos quirúrgicos utilizando procedimientos y herramientas establecidas.",
        "Apoya al equipo médico durante las intervenciones mediante el manejo preciso y oportuno del instrumental quirúrgico especializado.",
        
        ],
      
 
    campoLaboral: [
        "Clínicas públicas y privadas",
        "Casas de salud públicas",
        "Hospitales del día",
        "Casas comerciales de venta de productos e instrumentación quirúrgica, e insumos médicos",
        "Asistencia a cirujanos de consulta privada."
    ],
    duracionModal: "2 años",
    modalidadModal: "<strong>Presencial</strong>" 
},
<!----------------------------------------------------------------------------->

  {
    titulo: 'Enfermería',
    modalId: 'enfermeriaModal',
    degree: 'Técnico/a Superior en Enfermería',
    imagenSrc: '/assets/img/gestionAcademica/escuelaSalud/instrumentacionQuirurgica/enfermeria.png',
    resolucion: 'RPC-SO-21-NO.386-2026',
    duracion: '2 Años',
    modalidad: 'Presencial',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/ENFERMERIA',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Enfermería%20Veterinária',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar Técnicos en Enfermería con competencias para colaborar en la atención integral del individuo, familia y comunidad en los diferentes niveles del sistema de salud, aplicando procedimientos de enfermería de manera ética, responsable e intercultural, bajo la supervisión profesional correspondiente y en cumplimiento de las políticas nacionales de salud.",
    
    perfilProfesional: [
        "Aplicar procedimientos básicos de enfermería de acuerdo con protocolos, normas y estándares de calidad establecidos.",
        "Apoyar la ejecución de planes de cuidado, tratamientos y programas de promoción y prevención de la salud bajo supervisión profesional.",
        "Colaborar en el registro, control y seguimiento de la atención sanitaria mediante herramientas tecnológicas básicas.",
        "Participar en el cuidado integral del recién nacido, niños, adolescentes y otros grupos de atención prioritaria.",
        "Promover prácticas de autocuidado, bioseguridad, salud comunitaria e interculturalidad, brindando una atención basada en el respeto, la empatía y el compromiso social.",
    ],
    perfilEgresados:[
         "Aplicar procedimientos de enfermería básica de acuerdo con protocolos, guías y normas establecidas por la Autoridad Sanitaria Nacional.",
      "Colaborar con el profesional de enfermería o médico en la ejecución de planes de cuidado, tratamientos y programas de promoción y prevención en salud.",
      "Colaborar en la identificación de signos de alarma en el estado de salud del paciente y comunicar oportunamente al personal responsable. ",
      "Apoyar en el uso de herramientas tecnológicas básicas para el registro, control y seguimiento de la atención en salud.",
      "Brindar apoyo en cuidados básicos y adaptados a las necesidades del recién nacido, niños y adolescentes, bajo la supervisión del profesional responsable, aplicando técnicas pediátricas preestablecidas por el establecimiento de salud en procedimientos como higiene, alimentación, control de signos vitales, vacunación, acompañamiento emocional y promoción de la salud infantil. ",
      "Ayudar en la promoción de prácticas de crianza segura, lactancia materna, prevención de accidentes infantiles y medidas de salud comunitaria dirigidas a familias y cuidadores.",
      "Colaborar en el registro clínico y observación sistemática aplicando metodologías establecidas por el establecimiento de salud que contribuyan a la evaluación del estado de salud del paciente.",
      ],
        
    campoLaboral: [
         "Hospitales, clínicas y centros de salud públicos y privados.",
      "Áreas de pediatría, salud materno-infantil y atención del adulto.",
      "Consultorios médicos y centros especializados.",
      "Servicios de salud ocupacional y comunitaria. Programas de promoción, prevención y asistencia sanitaria.",
      "Residencias y centros de cuidado integral.",
      
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>Híbrida</strong>"  
},

<!----------------------------------------------------------------------------->
  {
    titulo: 'Marketing Digital',
    modalId: 'marketingDigitalModal',
    degree:'Técnico/a Superior en Marketing Digital',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/marketing.png',
    resolucion: 'RPC-SO-47-No.721-2025',
    duracion: '1 Año',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/MARKETING_DIGITAL',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Marketing%20Digital',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar técnicos en Marketing Digital con competencias para aplicar técnicas de comunicación en entornos digitales, integrando herramientas tecnológicas y plataformas de comercio electrónico",
    perfilProfesional: [
             "Colaborar en las tareas diarias de comunicación en redes sociales (community management) y publicidad en línea, siguiendo los protocolos de omnicanalidad.",
      "Colaborar en la elaboración de contenidos digitales sencillos (texto, imagen estática) utilizando software básico de diseño para apoyar la comunicación de marca en plataformas digitales. ",
      "Actualizar la información de productos y servicios en catálogos digitales y plataformas de comercio electrónico (e-commerce).",
      "Seguir los procedimientos de logística, atención al cliente y facturación de ventas generadas en plataformas de e-commerce y marketplaces. ",
      "Identificar los patrones básicos de comportamiento del consumidor a partir de la información generada por herramientas de IA y plataformas digitales.",
      "Colaborar en la difusión de productos y servicios de emprendimientos locales en el ecosistema digital, siguiendo procedimientos que promuevan la sostenibilidad.",

    ],
    campoLaboral: [
       
      "Agencias de marketing y publicidad.",
      "Empresas de comercio electrónico (e-commerce).",
      "Medios de comunicación y agencias de comunicación.",
      "Startups y emprendimientos.",
      "Consultoras de marketing y comunicación.",
      "Empresas con áreas de marketing, ventas o comunicación digital.",
      "Emprendimientos propios dedicados al marketing digital y gestión de redes sociales.",
    
    ],
    duracionModal: "<strong>1 año</strong>",
    modalidadModal: "<strong>En línea</strong>"  
},
 {
    titulo: 'Marketing Digital y Diseño Multimedia',
    modalId: 'marketingDigitalMultimediaModal',
    degree: 'Tecnólogo/a Superior en Marketing Digital y Diseño Multimedia',
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
        "Comprender los principios básicos del marketing digital y su aplicación en entornos virtuales. ",
      "Aplicar los principios del diseño gráfico para transmitir mensajes visuales claros y efectivos bajo la orientación y supervisión del profesional responsable.",
      "Aplicar las bases del comercio electrónico y su gestión en plataformas digitales bajo la dirección de su jefe inmediato.",
      "Aplicar técnicas de posicionamiento digital (SEO y SEM) en el desarrollo de estrategias orientadas a mejorar la visibilidad en entornos digitales bajo la dirección de su jefe inmediato. ",
      "Colaborar desarrollo de proyectos de diseño en 2D y 3D aplicando principios de composición, color y modelado.",
      "Colaborar en la gestión de campañas digitales y de redes sociales orientadas a objetivos estratégicos.",
      "Brindar apoyo en el diseño y producción de contenidos multimedia adaptados a diferentes medios y públicos.",
      "Colaborar en el desarrollo de identidades visuales de marca con coherencia conceptual y estética. ",
      "Integrar efectos visuales, animaciones y composiciones digitales en proyectos audiovisuales.",
 
    ],
    campoLaboral: [
       
      "Empresas con áreas de marketing, comunicación e imagen corporativa.",
      "Agencias de publicidad, marketing y diseño.",
      "Empresas de comercio electrónico y negocios digitales.",
      "Medios de comunicación y productoras de contenido multimedia.",
      "Agencias de desarrollo web y comunicación digital.",
      "Emprendimientos y consultoras especializadas en marketing y diseño multimedia.",
    
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>En línea</strong>"  
},
{
    titulo: 'Administración',
    modalId: 'administracionModal',
    degree:'Técnico/a Superior en Administración',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/ADMINISTRACION.png',
    resolucion: 'RPC-SO-45-No.727-2024',
    duracion: '1 Año',
    modalidad: 'Línea',
    niveles: '2 Niveles',
    mallaCurricular: {
      url: '/ADMINISTRACION',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Administración',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar técnicos en Administración capacitados para gestionar eficazmente los recursos organizacionales, abordando áreas como tributación, importación, exportación, contabilidad, gestión del talento humano, control de inventarios y logística; promoviendo prácticas éticas y sostenibles mediante el desarrollo de habilidades de liderazgo, trabajo en equipo, innovación y adaptación en los procesos administrativos, que contribuyan al crecimiento y la competitividad de las organizaciones.",
    perfilProfesional: [
         "Colaborar en la organización de actividades administrativas para garantizar el flujo eficiente de información en la empresa.",
     "Colaborar en la planificación y ejecución de proyectos administrativos.",
     "Apoyar en la optimización del uso de los recursos financieros, materiales y humanos para alcanzar los objetivos empresariales.",
     "Colaborar en la gestión de inventarios y logística, garantizando un flujo continuo de materiales y reduciendo costos operativos.",
     "Aplicar los procesos contables asegurando la precisión en el registro de transacciones y la generación de informes financieros que faciliten la toma de decisiones.",
     "Apoyar en el cumplimiento de las obligaciones tributarias de la empresa, asegurando el registro y pago adecuado de impuestos.",
     "Participar en la gestión de nómina y del talento humano, fomentando un ambiente de trabajo positivo y promoviendo el desarrollo y bienestar del personal.",
     "Aplicar herramientas tecnológicas en los procesos administrativos para aumentar la productividad.",
     "Colaborar en la elaboración de informes financieros y administrativos siguiendo protocolos y normativas vigentes.",
     "Implementar prácticas empresariales que promuevan el uso eficiente de recursos y la reducción de desechos.",
      
    ],
    campoLaboral: [
           "Empresas públicas y privadas de todos los sectores económicos.",
      "Pequeñas, medianas y grandes empresas. Instituciones financieras, comerciales e industriales.",
      "Emprendimientos y negocios propios. Organizaciones no gubernamentales y entidades sin fines de lucro.",
      "Áreas de administración, comercio exterior, talento humano, contabilidad, compras, ventas, atención al cliente, manejo de bodegas y logística.",
        
    ],
    duracionModal: "<strong>1 año</strong>",
    modalidadModal: "<strong>En línea</strong>"  
},

<!-------------------------------------------------------------------------->

 {
    titulo: 'Ventas estratégicas con inteligencia artificial ',
    modalId: 'ventasModal',
    degree:'Técnico/a Superior en Ventas Estratégicas con Inteligencia Artificial',
    imagenSrc: '/assets/img/gestionAcademica/escuelaAdministracionIndustria/Venta_estratégicas_IA.png',
    resolucion: 'RPC-SO-50-No.756-2025',
    duracion: '1 Año',
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
    duracionModal: "<strong>1 año</strong>",
    modalidadModal: "<strong>Línea</strong>"  
},

<!---------------------------------------------------------------------------->

  {
    titulo: 'Seguridad e Higiene del Trabajo',
    modalId: 'seguridadHigieneModal',
    degree: 'Tecnólogo/a Superior en Seguridad e Higiene del Trabajo',
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/Higiene del trabajo.png',
    resolucion: 'RPC-SO-01-No.001-2025',
    duracion: '2 Años',
    modalidad: 'Línea',
    niveles: '4 Niveles',
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
      "Aplicar técnicas y medidas de prevención de riesgos en el entorno laboral para minimizar accidentes y enfermedades profesionales.",
      "Aplicar protocolos establecidos para el manejo seguro de productos peligrosos. ",
      "Colaborar en el desarrollo de procedimientos para la prevención de riesgos en trabajos de alto riesgo. ",
      "Aplicar metodologías y modelos para la identificación y análisis de riesgos en el lugar de trabajo. ",
      "Colaborar en la implementación y ejecución de protocolos de emergencia y planes de evacuación. ",
      "Demostrar comportamientos éticos y responsables en el ámbito de la seguridad en el trabajo.",
    ],
    campoLaboral: [
         "Empresas de los sectores industrial, comercial, construcción, minería, salud y servicios.",
      "Organismos públicos y privados.Consultoras especializadas en seguridad y salud en el trabajo.",
      "Áreas de prevención de riesgos y gestión de seguridad ocupacional.",
      "Empresas de identificación y control de riesgos, implementación de medidas preventivas, capacitación del personal y cumplimiento de la normativa de seguridad y salud laboral.",
       
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>En línea</strong>" 
},
  {
    titulo: 'Seguridad y Prevención de Riesgos Laborales',
    modalId: 'prevencionRiesgosModal',
    degree: 'Técnico/a Superior en	Seguridad y Prevención de	Riesgos Laborales',
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/Riesgos Laborales.png',
    resolucion: 'RPC-SO-42-No.685-2024',
    duracion: '1 Año',
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
          "Aplicar las normativas de salud, seguridad y prevención de riesgos laborales, así como la legislación aplicable en el ámbito laboral.",
      "Colaborar en la identificación, evaluación y reportes de riesgos laborales de manera efectiva. ",
      "Aplicar técnicas y medidas de prevención de riesgos en el entorno laboral para minimizar accidentes y enfermedades profesionales.",
      "Comunicar de manera clara y efectiva los procedimientos y normativas con el equipo de trabajo y con otros profesionales involucrados en seguridad ocupacional. ",
      "Colaborar a los equipos multidisciplinarios para implementar estrategias de seguridad y prevención de riesgos ocupacionales. ",
      "Colaborar en la realización de plan de emergencia y conformación de brigadas.",
      "Aplicar metodologías y modelos para la identificación y análisis de riesgos en el lugar de trabajo. ",
      "Colaborar en la implementación y ejecución de protocolos de emergencia y planes de evacuación. ",
      "Aplicar procesos de mejora continua en la gestión de seguridad y salud, basados en el análisis de datos y retroalimentación constante. ",
      "Participar en programas que promuevan la seguridad y el bienestar de los trabajadores, previniendo enfermedades profesionales y mejorando la calidad de vida. ",
      "Contribuir en la mejora de condiciones de trabajo y la calidad de vida de los trabajadores.",
    ],
    campoLaboral: [
        "Empresas industriales, comerciales y de servicios.",
      "Empresas de construcción, manufactura, minería y logística.",
      "Instituciones públicas y privadas.",
      "Consultoras en seguridad y salud ocupacional.",
      "Aseguradoras y organismos de prevención de riesgos laborales.",
      "Áreas de seguridad y salud en el trabajo de cualquier organización.",
      "Emprendimientos dedicados a la asesoría y capacitación en prevención de riesgos laborales.",
      
    ],
    duracionModal: "<strong>1 año</strong>",
    modalidadModal: "<strong>En línea</strong>" 
},
  
  {
    titulo: 'Topografía',
    modalId: 'topografiaModal',
    degree: 'Topógrafo/a con nivel equivalente a Tecnólogo Superior',
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
    descripcionModal: "Formar profesionales con  conocimientos topográficos y geodésicos teóricos, científicos, prácticos y técnicos, capaces de manejar instrumentos especializados y atender las necesidades de todos los  servicios en el área de la construcción y sus diferentes niveles de complejidad, en el levantamiento topográfico y la representación gráfica de la superficie terrestre con sus detalles y relieves previo al diseño de obras civiles, controlando las  diferentes etapas de los proyectos de obras, con responsabilidad ética y profesionalismo.",
    perfilProfesional: [
         "Ejercer y controlar todo el proceso constructivo de una vía, desde el levantamiento topográfico hasta el replanteo de cada una de sus etapas.",
      "Representar la superficie terrestre y la posición de los detalles o accidentes que se suscitan.",
      "Elaborar proyectos de obras mediante el uso de instrumentos topográficos, aplicando métodos de levantamiento y replanteo.",
      "Apoyar en actividades relativas a la cartografía y la geodesia en las áreas productivas y de desarrollo del país.",
      "Apoyar  proyectos de ordenamiento territorial, proyectos ambientales y gestión de riesgo, de infraestructura y de catastro",
      "Aplicar competencias técnicas propias del área topográfica y aquéllas competencias que se relacionan con la comunicación, el trabajo en equipo, el manejo de recursos digitales y el compromiso ético y profesional.",
      "Manejar, calcular y supervisar las etapas que implica el control de obras y proyectos civiles.",
      "Interpretar mediante métodos y metodologías técnicas, fotografías a áreas a cualquier escala.",
    "Asistir técnicamente a los inspectores de obras y supervisar los planos topográficos.",
       
    ],
    campoLaboral: [
        "Empresas Constructoras, Mineras, Agrícolas, Forestales, Sanitarias, Eléctricas, Telecomunicación y Comerciales.",
        "Instituto Geográfico Nacional (IGN).",
        "Gobiernos Regionales.",
        "Ministerios.",
        "Prestación de servicios profesionales como: topógrafo, asesor, consultor y fiscalizador y técnico de obra."
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>Híbrida</strong>"  
},
  {
    titulo: 'Minería',
    modalId: 'mineriaModal',
    degree: "Tecnólogo/a Superior en Minería",
    imagenSrc: '/assets/img/gestionAcademica/escuelaConstruccionExtraccion/MINERIA.png',
    resolucion: 'RPC-SO-50-No.796-2022',
    duracion: '2 Años',
    modalidad: 'Híbrida',
    niveles: '4 Niveles',
    mallaCurricular: {
      url: '/MINERIA',
      texto: 'Clic aquí!'
    },
    waLink: 'https://wa.me/593995901732?text=Saludos%20Instituto%20Superarse,%20deseo%20tener%20mas%20información%20sobre%20la%20carrera%20de%20Minería',
// --- Contenido específico para el modal ---
    descripcionModal: "Formar profesionales en el campo de la minería con sólidos conocimientos teóricos y prácticos en los procesos de prospección, exploración y explotación, así como estrategias técnicas para el aprovechamiento de minerales con sostenibilidad ambiental, que contribuya al desarrollo socioeconómico del país y a la generación de soluciones desde distintas perspectivas, para garantizar los derechos de la naturaleza e incentivar una sociedad participativa mediante estrategias y técnicas innovadoras, con sentido crítico y de responsabilidad social y ética.",
    perfilProfesional: [
    " Controlar las operaciones mineras, así como también las operaciones de fortificación, ventilación en minas subterráneas. ",
      " Preparar muestras para análisis granulométricos y químicos de muestras de rocas, minerales, para realizar levantamiento topográficos y replanteos según requerimientos de la mina, mediante el uso de la tecnología y de sistemas de información.",
      " Aplicar herramienta de planificación y control de operaciones mineras en el ámbito inherente a su profesión, con la normativa vigente de seguridad industrial y protección al medio ambiente, con competencias técnicas propias del área y las relacionadas con la adaptación, comunicación y trabajo en equipo, con dominio de conocimientos sobre cómo se desarrollan los procesos geológicos en la corteza terrestre, demostrando flexibilidad y adaptabilidad en diferentes entornos laborales.",
      "Gestionar procesos mediante la prospección de los yacimientos mineros, funciones de índole operacional, involucradas en el trabajo de desarrollo y producción minera, operaciones de muestreo, con base a las normas de seguridad y medio ambiente.",
    ],
    campoLaboral: [
          "Empresas de exploración y explotación minera.",
      "Canteras y empresas de extracción de materiales pétreos y no metálicos.",
      "Consultoras de minería y medio ambiente.Instituciones públicas relacionadas con el sector minero.",
      "Laboratorios de análisis y control de calidad de minerales.",
      "Empresas con actividades relacionadas con el ciclo operativo minero a cielo abierto, subterránea y plantas de beneficio.",
    
    ],
    duracionModal: "<strong>2 años</strong>",
    modalidadModal: "<strong>Híbrida</strong>"  
}
];