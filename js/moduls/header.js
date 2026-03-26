// headerData.js

const currentHeaderScript = document.currentScript;
const superarseBasePath = (() => {
    if (!currentHeaderScript || !currentHeaderScript.src) {
        return '';
    }

    const scriptUrl = new URL(currentHeaderScript.src, window.location.href);
    const marker = '/js/moduls/header.js';
    const markerIndex = scriptUrl.pathname.indexOf(marker);

    if (markerIndex === -1) {
        return '';
    }

    return scriptUrl.pathname.slice(0, markerIndex);
})();

function resolveSuperarsePath(path) {
    if (!path || typeof path !== 'string') {
        return path;
    }

    if (/^(?:[a-z]+:|\/\/|#)/i.test(path) || path.startsWith('mailto:') || path.startsWith('tel:')) {
        return path;
    }

    if (!path.startsWith('/')) {
        return path;
    }

    return `${superarseBasePath}${path}`;
}

window.resolveSuperarsePath = resolveSuperarsePath;
window.superarseBasePath = superarseBasePath;

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
                { enlace: '/assets/docs/Calendarios/CALENDARIO_ACADEMICO/CALENDARIO_ACADEMICO_2025_2026.pdf', texto: 'Calendario Académico'  ,target: '_blank'},
                { enlace: '/assets/docs/Calendarios/CALENDARIO_DE_TITULACION/CRONOGRAMA_PROYECTOS_TITULACION.pdf', texto: 'Calendario de Titulación',target: '_blank' },
                { enlace: '/assets/docs/Calendarios/CALENDARIO_INVESTIGACION/PLANIFICACION_GESTION_INVESTIGACION_2026.pdf', texto: 'Calendario de Investigación',target: '_blank' },
                { enlace: '/assets/docs/Calendarios/CALENDARIO_VINCULACION/CRONOGRAMA_VINCULACION_SOCIEDAD_2025.pdf', texto: 'Calendario de Vinculación',target: '_blank' },
                { enlace: '/assets/docs/Calendarios/CALENDARIO_PRACTICAS_PREPROFESIONALES/CRONOGRAMA_PRACTICAS_PREPROFESIONALES_2025_2026.pdf', texto: 'Calendario de Prácticas <br>Preprofesionales',target: '_blank' }
            ]
            
        }
        
    ],
    
    
    // Barra de navegación principal con los menús institucionales
    mainNav: [
        {
            texto: 'Institución',
            items: [
               { enlace: '/moduls/institucion/MisionVision/index.html', texto: 'Misión y Visión' },
               { enlace: '/moduls/institucion/MensajeRectora/index.html', texto: 'Mensaje de la Rectora' },
               {
                    texto: 'Estructura Organizacional',
                    id: 'dropdownMarcoLegal',
                    items: [
                { enlace: '/moduls/institucion/Organigrama/organigrama.html', texto: 'Organigrama' },
                { enlace: '/moduls/institucion/Autoridades/autoridades.html', texto: 'Autoridades' },                
                    ]
                },
               { enlace: '/moduls/institucion/Modelo-Pedagogico/modeloPedagogico.html', texto: 'Modelo Pedagógico' },
                { enlace: '/moduls/institucion/Codigo-Etica/codigoInstitucional.html', texto: 'Código de ética' },
                { enlace: '/moduls/institucion/Modelos/modelos.html', texto: 'Modelos' },
                 {
                    texto: 'Aseguramiento de la calidad y planificación',
                    id: 'dropdownCalidadPlanificacion',
                    items: [
                        { enlace: '/moduls/institucion/Calidad-Planificacion/calidadPlanificacion.html', texto: 'Calidad y Planificación' },
                        { enlace: '/moduls/institucion/Planificacion-Pedi/planificacionPedi.html', texto: 'PEDI 2024-2028' },
                         { enlace: '/assets/docs/POA/PLAN_OPERATIVO_ANUAL_2025.pdf', texto: 'Plan Operativo Anual (POA) 2025', target: '_blank' },
                        
                    ]
                },
                
        
                {
                    texto: 'Transparencia',
                    id: 'dropdownMarcoLegal',
                    items: [
                { enlace: '/moduls/Servicios/Estado-Financiero/estadoFinanciero.html', texto: 'Estado Financiero' },
                { enlace: '/moduls/Servicios/Rendicion-Cuentas/rendicionCuentas.html', texto: 'Rendición de Cuentas' },
                { enlace: '/moduls/Servicios/Remuneracion-Mensual/remuneracionMensual.html', texto: 'Remuneración Mensual' },
                { enlace: '/moduls/Servicios/Aranceles/aranceles.html', texto: 'Aranceles' },
                { enlace: '/moduls/Servicios/Balances-Generales/balanceGeneral.html', texto: 'Balance General' },
                { enlace: '/moduls/Servicios/Cumplimiento-Tributario/cumplimientoTributario.html', texto: 'Cumplimiento Tributario' },
                { enlace: '/moduls/Servicios/Balances-Auditados/balancesAuditados.html', texto: 'Balances Auditados' },
                    ]
                },
                {
                    texto: 'Marco Legal',
                    id: 'dropdownMarcoLegal',
                    items: [
                        { enlace: '/moduls/institucion/Reglamentos/reglamentos.html', texto: 'Reglamentos' },
                        { enlace: '/moduls/institucion/Normativa/normativa.html', texto: 'Normativa' },
                        { enlace: '/moduls/institucion/Protocolos/protocolos.html', texto: 'Protocolos' },
                        { enlace: '/moduls/institucion/Estatuto/estatuto.html', texto: 'Estatuto' },
                    ]
                },
                
            ]
        },
        {
            texto: 'Oferta Académica',
            items: [
                { enlace: '/moduls/gestionAcademica/ECSOS/escuelaConstruccionExtraccion.html', texto: 'Escuela de Construcción y Extracción Sostenible ECSOS' },
                { enlace: '/moduls/gestionAcademica/ECAVET/escuelaVeterinaria.html', texto: 'Escuela de Ciencias Agropecuarias y Veterinarias ECAVET' },
                { enlace: '/moduls/gestionAcademica/ECSET/escuelaAdministracionIndustria.html', texto: 'Escuela de Ciencias Sociales, Empresariales y Tecnológicas ECSET' },
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
                { enlace: '/moduls/noticiasContactos/Equipo-Conectados/contactanos.html', texto: 'Equipo Conectados' },
                { enlace: '/moduls/Formatos/Solicitudes.html', texto: 'Solicitudes ' },
                
            ]
        },
        {
            texto: 'Admisiones',
            items: [
                { enlace: '/moduls/admisiones/Por-Que-Elegirnos/porQueElegirnos.html', texto: '¿Por qué Elegirnos?' },
                { enlace: '/moduls/admisiones/Proceso-Admision/procesoAdmision.html', texto: 'Proceso de Admisión' }
            
            ]
        },
        {
            texto: 'Vinculación con la sociedad ',
            items: [
                { enlace: '/moduls/subMenu/vinculacionSociedad/Vinculacion-con-la-Sociedad/vinculacionSociedad.html', texto: 'Programas y proyectos de vinculación con la sociedad' },
                { enlace: '/moduls/subMenu/vinculacionSociedad/Practicas-Preprofesionales/practicasPreprofesionales.html', texto: 'Prácticas Pre-Profesionales' },
                { enlace: '/moduls/subMenu/vinculacionSociedad/Relaciones-InterInstitucionales/RelacionesInterinstitucionales.html', texto: 'Relaciones InterInstitucionales' },
                { enlace: '/moduls/subMenu/vinculacionSociedad/Presencia-en-la-Comunidad/PresenciaComunidad.html', texto: 'Presencia en la comunidad' }
            ]
        }, 
        {
            texto: 'Investigación',
            enlace: '/moduls/subMenu/Investigacion/investigacion.html'
        },
        {
            texto: 'Noticias ',
            enlace: '/moduls/noticiasContactos/Noticias/noticias.html',
            //target: '_blank',
        }
    ],
    // Enlace final de "Plataformas"
    finalLink: {
        enlace: '/moduls/Plataformas/plataformas.html',
        texto: 'Plataformas',
        clases: 'btn btn-primary px-4',
        target: '_blank'
    }
};
