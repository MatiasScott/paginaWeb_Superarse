// headerData.js

const headerData = {
    // Topbar con enlaces de contacto y plataformas externas
    topbar: [
        {
            icono: 'fa fa-envelope mr-2',
            enlace: 'mailto:matriculas@superarse.edu.ec',
            texto: 'matriculas@superarse.edu.ec',
            clases: 'd-none d-lg-block mr-3 text-white'
        },
         {
           
            enlace: 'https://sgpro.superarse.edu.ec',
            texto: 'SGPRO ',
            clases :"navbar-brand d-none d-lg-block",
            target: '_blank'
        },
        {
           
            enlace: 'https://conectados.superarse.edu.ec',
            texto: 'Superarse Conectados ',
            clases :"navbar-brand d-none d-lg-block",
            target: '_blank'
        },
        {
        
            enlace: 'https://becasuperarse.ec/',
            texto: 'Because he is Nice ',
            clases :"navbar-brand d-none d-lg-block",
            target: '_blank'
        },
        {
            enlace: 'https://superarse.q10.com',
            texto: 'Q10',
            clases: 'navbar-brand d-none d-lg-block',
            target: '_blank'
        },
        {
            enlace: 'https://teams.microsoft.com/v2/',
            texto: 'Teams',
            clases: 'navbar-brand d-none d-lg-block',
            target: '_blank'
        },
        {
            texto: 'Calendarios',
            clases: 'nav-link dropdown-toggle text-white d-none d-lg-block',
            items: [
                { enlace: '/CALENDARIO_ACADEMICO', texto: 'Calendario Académico'  ,target: '_blank'},
                { enlace: '/CALENDARIO_DE_TITULACION', texto: 'Calendario de Titulación',target: '_blank' },
                { enlace: '/CALENDARIO_INVESTIGACION', texto: 'Calendario de Investigación',target: '_blank' },
                { enlace: '/CALENDARIO_VINCULACION', texto: 'Calendario de Vinculación',target: '_blank' },
                { enlace: '/CALENDARIO_PRACTICAS_PREPROFESIONALES', texto: 'Calendario de Prácticas <br>Preprofesionales',target: '_blank' }
            ]
            
        }
        
    ],
    
    
    // Barra de navegación principal con los menús institucionales
    mainNav: [
        {
            texto: 'Institución',
            items: [
               { enlace: '/MisionVision', texto: 'Misión y Visión' },
               { enlace: '/MensajeRectora', texto: 'Mensaje de la Rectora' },
               {
                    texto: 'Estructura Organizacional',
                    id: 'dropdownMarcoLegal',
                    items: [
                { enlace: '/Organigrama', texto: 'Organigrama' },
                { enlace: '/Autoridades', texto: 'Autoridades' },
               
                    ]
                },
                { enlace: '/Codigo-Etica', texto: 'Código de ética' },
                { enlace: '/Modelos', texto: 'Modelo Educativo y Pedagógico' },
                 {
                    texto: 'Aseguramiento de la calidad y planificación',
                    id: 'dropdownCalidadPlanificacion',
                    items: [
                        { enlace: '/Calidad-Planificacion', texto: 'Calidad y Planificación' },
                        { enlace: '/Planificacion-Pedi', texto: 'PEDI 2024-2028' },
                         { enlace: '/POA', texto: 'Plan Operativo Anual (POA) 2025' },
                        
                    ]
                },
                
        
                {
                    texto: 'Transparencia',
                    id: 'dropdownMarcoLegal',
                    items: [
                { enlace: '/Estado-Financiero', texto: 'Estado Financiero' },
                { enlace: '/Rendicion-Cuentas', texto: 'Rendición de Cuentas' },
                { enlace: '/Remuneracion-Mensual', texto: 'Remuneración Mensual' },
                { enlace: '/Aranceles', texto: 'Aranceles' },
                { enlace: '/Balances-Generales', texto: 'Balance General' },
                { enlace: '/Cumplimiento-Tributario', texto: 'Cumplimiento Tributario' },
                { enlace: '/Balances-Auditados', texto: 'Balances Auditados' },
                    ]
                },
                {
                    texto: 'Marco Legal',
                    id: 'dropdownMarcoLegal',
                    items: [
                        { enlace: '/Reglamentos', texto: 'Reglamentos' },
                        { enlace: '/Normativa', texto: 'Normativa' },
                        { enlace: '/Protocolos', texto: 'Protocolos' },
                        { enlace: '/Estatuto', texto: 'Estatuto' },
                    ]
                },
                
            ]
        },
        {
    texto: 'Oferta Académica',
    items: [
        { 
            enlace: '/ECSOS', 
            texto: 'ECSOS', 
            descripcion: '• Topografía\n• Minería\n• Seguridad e Higiene del Trabajo\n• Prevención de Riesgos Laborales' 
        },
        { 
            enlace: 'ECAVET', 
            texto: 'ECAVET', 
            descripcion: '• Enfermería Veterinaria\n• Producción Animal' 
        },
        { 
            enlace: '/ECSET', 
            texto: 'ECSET', 
            descripcion: '• Administración\n• Marketing Digital\n• Diseño Multimedia\n• Ventas con IA\n• Instrumentación Quirúrgica\n• Educación Básica\n• Educación Bilingüe\n• Enfermería' 
        },
    ]
},
        {
            texto: 'Servicios',
            items: [
                { enlace: '/Biblioteca-Institucional', texto: 'Biblioteca Institucional' },
                { enlace: '/Graduados', texto: 'Graduados' },
                { enlace: 'https://eci.superarse.ec/', texto: 'Cursos Educación Continua e Inglés ', target: '_blank' },
                { enlace: '/Bienestar-Institucional', texto: 'Bienestar Institucional ' },
                { enlace: '/Equipo-Conectados', texto: 'Equipo Conectados' },
                { enlace: '/Formatos', texto: 'Solicitudes ' },
                { enlace: '/Residencia', texto: 'Residencia Estudiantil ' },
                
            ]
        },
        {
            texto: 'Admisiones',
            items: [
                { enlace: '/Por-Que-Elegirnos', texto: '¿Por qué Elegirnos?' },
                { enlace: '/Proceso-Admision', texto: 'Proceso de Admisión' }
            
            ]
        },
        {
            texto: 'Vinculación con la sociedad ',
            items: [
                { enlace: '/Vinculacion-con-la-Sociedad', texto: 'Programas y proyectos de vinculación con la sociedad' },
                { enlace: '/Practicas-Preprofesionales', texto: 'Prácticas Pre-Profesionales' },
                { enlace: '/Relaciones-InterInstitucionales', texto: 'Relaciones InterInstitucionales' },
                { enlace: '/Presencia-en-la-Comunidad', texto: 'Presencia en la comunidad' }
            ]
        }, 
        {
            texto: 'Investigación',
            enlace: '/Investigacion'
        },
        {
            texto: 'Noticias ',
            enlace: '/Noticias',
            //target: '_blank',
        }
    ],
    // Enlace final de "Plataformas"
    finalLink: {
        enlace: '/Plataformas',
        texto: 'Plataformas',
        clases: 'btn btn-primary px-4',
        target: '_blank'
    }
};
