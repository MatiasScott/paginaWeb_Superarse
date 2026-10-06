<?php

declare(strict_types=1);

// Ruta => [grupo, controlador/modelo]. Solo se instancian las clases registradas.
$pages = [
    'ECSOS' => ['OfertaAcademica', 'Ecsos'],
    'ECAVET' => ['OfertaAcademica', 'Ecavet'],
    'ECSET' => ['OfertaAcademica', 'Ecset'],
    'MisionVision' => ['Institution', 'MisionVision'],
    'MensajeRectora' => ['Institution', 'MensajeRectora'],
    'Organigrama' => ['Institution', 'Organigrama'],
    'Autoridades' => ['Institution', 'Autoridades'],
    'Codigo-Etica' => ['Institution', 'CodigoEtica'],
    'Modelos' => ['Institution', 'Modelos'],
    'Calidad-Planificacion' => ['Institution', 'CalidadPlanificacion'],
    'Planificacion-Pedi' => ['Institution', 'PlanificacionPedi'],
    'Reglamentos' => ['Institution', 'Reglamentos'],
    'Normativa' => ['Institution', 'Normativa'],
    'Estatuto' => ['Institution', 'Estatuto'],
    'Modelo-Pedagogico' => ['Institution', 'ModeloPedagogico'],
    'Protocolos' => ['Institution', 'Protocolos'],
    'Estado-Financiero' => ['Institution', 'EstadoFinanciero'],
    'Rendicion-Cuentas' => ['Institution', 'RendicionCuentas'],
    'Remuneracion-Mensual' => ['Institution', 'RemuneracionMensual'],
    'Aranceles' => ['Institution', 'Aranceles'],
    'Balances-Generales' => ['Institution', 'BalanceGeneral'],
    'Cumplimiento-Tributario' => ['Institution', 'CumplimientoTributario'],
    'Balances-Auditados' => ['Institution', 'BalancesAuditados'],
    'Graduados' => ['Services', 'Graduados'],
    'Biblioteca-Institucional' => ['Services', 'BibliotecaInstitucional'],
    'Residencia' => ['Services', 'Residencia'],
    'Bienestar-Institucional' => ['Services', 'BienestarInstitucional'],
    'Formatos' => ['Services', 'Formatos'],
    'Equipo-Conectados' => ['Services', 'EquipoConectados'],
    'Formulario-Bienestar' => ['Services', 'FormularioBienestar'],
    'Por-Que-Elegirnos' => ['Admisiones', 'PorQueElegirnos'],
    'Proceso-Admision' => ['Admisiones', 'ProcesoAdmision'],
    'Contrato-Matricula' => ['Admisiones', 'FirmaContrato'],
    'buzon' => ['Buzon', 'Buzon'],
    'Vinculacion-con-la-Sociedad' => ['VinculacionConLaSociedad', 'Vinculacion'],
    'Practicas-Preprofesionales' => ['VinculacionConLaSociedad', 'Practicas'],
    'Relaciones-InterInstitucionales' => ['VinculacionConLaSociedad', 'RelacionesInterinstitucionales'],
    'Presencia-en-la-Comunidad' => ['VinculacionConLaSociedad', 'PresenciaComunidad'],
    'Investigacion' => ['Investigacion', 'Investigacion'],
    'Noticias' => ['Noticias', 'Noticias'],
    'Plataformas' => ['Plataformas', 'Plataformas'],
    'Procesos-Academicos' => ['SubMenu', 'ProcesosAcademicos'],
    'Titulacion' => ['SubMenu', 'Titulacion'],
    'Talento-Humano' => ['SubMenu', 'TalentoHumano'],
    'Evaluacion-Docente' => ['SubMenu', 'EvaluacionDocente'],
];

$routes = [];
foreach ($pages as $path => [$group, $name]) {
    $routes[$path] = [
        'controller' => "App\\Controllers\\{$group}\\{$name}Controller",
        'model' => "App\\Models\\{$group}\\{$name}Model",
        'action' => 'show',
        'arguments' => [],
    ];
}

$actions = [
    'Solicitudes/procesar' => ['Services', 'Solicitudes', 'procesar'],
    'Solicitudes/subir' => ['Services', 'Solicitudes', 'subir'],
    'Formulario-Bienestar/enviar' => ['Services', 'FormularioBienestar', 'procesar'],
    'Contrato-Matricula/procesar' => ['Admisiones', 'FirmaContrato', 'procesar'],
    'buzon/enviar' => ['Buzon', 'Buzon', 'enviar'],
    'buzon-qr' => ['Buzon', 'Buzon', 'mostrarQr'],
    'contacto/enviar' => ['Contacto', 'Contacto', 'enviar'],
];
foreach ($actions as $path => [$group, $name, $action]) {
    $routes[$path] = [
        'controller' => "App\\Controllers\\{$group}\\{$name}Controller",
        'model' => "App\\Models\\{$group}\\{$name}Model",
        'action' => $action,
        'arguments' => [],
    ];
}

foreach (['contrato', 'reingreso', 'homologacion', 'cambio-malla', 'tercera-matricula', 'cambio-carrera', 'retiro-voluntario'] as $type) {
    $routes['Solicitudes/' . $type] = [
        'controller' => \App\Controllers\Services\SolicitudesController::class,
        'model' => \App\Models\Services\SolicitudesModel::class,
        'action' => 'show',
        'arguments' => [$type],
    ];
}

return [
    'routes' => $routes,
    'careers' => [
        'ECSOS' => $routes['ECSOS'],
        'ECAVET' => $routes['ECAVET'],
        'ECSET' => $routes['ECSET'],
    ],
];
