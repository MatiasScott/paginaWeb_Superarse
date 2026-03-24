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
            icono: 'fa fa-phone-alt mr-2',
            enlace: 'tel:023930980',
            texto: '(02) 393 0980',
            clases: 'd-none d-lg-block mr-3 text-white'
        },
         {
           
            enlace: 'https://sgpro.superarse.ec/',
            texto: 'SGPRO ',
            clases :"navbar-brand d-none d-lg-block",
            target: '_blank'
        },
        {
           
            enlace: 'https://superarse.ec/',
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
                    texto: 'Estructura',
                    id: 'dropdownMarcoLegal',
                    items: [
                { enlace: '/Organigrama', texto: 'Organigrama' },
                { enlace: '/Autoridades', texto: 'Autoridades' },
                { enlace: '/Estatuto', texto: 'Estatuto' },
                    ]
                },
               { enlace: '/Modelo-Pedagogico', texto: 'Modelo Pedagógico' },
                { enlace: '/Codigo-Etica', texto: 'Código de ética' },
                { enlace: '/Modelos', texto: 'Modelos' },
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
                        { enlace: '/Protocolos', texto: 'Protocolos' }
                    ]
                },
                
            ]
        },
        {
            texto: 'Oferta Académica',
            items: [
                { enlace: '/ECSOS', texto: 'Escuela de Construcción y Extracción Sostenible ECSOS' },
                { enlace: 'ECAVET', texto: 'Escuela de Ciencias Agropecuarias y Veterinarias ECAVET' },
                { enlace: '/ECSET', texto: 'Escuela de Ciencias Sociales, Empresariales y Tecnológicas ECSET' },
            ]
        },
        {
            texto: 'Servicios',
            items: [
                { enlace: '/moduls/Servicios/biblioteca.html', texto: 'Biblioteca Institucional' },
                { enlace: '/moduls/Servicios/graduados.html', texto: 'Graduados' },
                { enlace: 'https://eci.superarse.ec/', texto: 'Cursos Educación Continua e Inglés ', target: '_blank' },
                { enlace: '/moduls/subMenu/Bienestar-Institucional/bienestarInstitucional.html', texto: 'Bienestar Institucional ' },
                //{ enlace: '/moduls/subMenu/talentoHumano/TalentoHumano2.html#list-infraestructura', texto: 'Infraestructura ' },
                { enlace: '/Equipo-Conectados', texto: 'Equipo Conectados' },
                { enlace: '/Formatos', texto: 'Solicitudes ' },
                
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
