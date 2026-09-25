<?php
// public/index.php

declare(strict_types=1);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__));
}

spl_autoload_register(function ($class) {
    $class = ltrim((string) $class, '\\');

    // Clases del namespace App\... -> app/...
    if (stripos($class, 'App\\') === 0) {
        $file = ROOT_PATH . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }

    // Clases legadas sin namespace -> app/Controllers|Models|Core
    foreach (['Controllers', 'Models', 'Core'] as $dir) {
        $file = ROOT_PATH . "/app/{$dir}/{$class}.php";
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

use App\Controllers\Document\DocumentController as DocumentRouterController;
use App\Controllers\Page\ContentController;
use App\Controllers\Page\InstitutionController;
use App\Models\Document\DocumentModel;
use App\Models\Page\ContentModel;
use App\Models\Page\InstitutionModel;

// ── Configuración centralizada (.env) ──────────────────────────────
// Define APP_URL / APP_BASE_PATH y expone asset(), url(), route(), base().
\App\Core\Config::boot(ROOT_PATH);
require_once ROOT_PATH . '/app/Core/helpers.php';


$url = trim((string) ($_GET['url'] ?? ''), '/');

// ── Carreras: /ESOS|ECAVET|ECSET/{slug} (migradas a MVC) ────────────
if (preg_match('#^(ECSOS|ECAVET|ECSET)/([a-zA-Z0-9][a-zA-Z0-9-]*)$#i', $url, $matches)) {
    switch (strtoupper($matches[1])) {
        case 'ECSOS':
            (new \App\Controllers\OfertaAcademica\EcsosController(new \App\Models\OfertaAcademica\EcsosModel()))->showCareer($matches[2]);
            break;
        case 'ECAVET':
            (new \App\Controllers\OfertaAcademica\EcavetController(new \App\Models\OfertaAcademica\EcavetModel()))->showCareer($matches[2]);
            break;
        case 'ECSET':
            (new \App\Controllers\OfertaAcademica\EcsetController(new \App\Models\OfertaAcademica\EcsetModel()))->showCareer($matches[2]);
            break;
    }
    return;
}

// ── Oferta Académica: ECSOS (migrada a MVC) ──────────────────────────
if ($url === 'ECSOS') {
    (new \App\Controllers\OfertaAcademica\EcsosController(new \App\Models\OfertaAcademica\EcsosModel()))->show();
    return;
}

// ── Oferta Académica: ECAVET (migrada a MVC) ─────────────────────────
if ($url === 'ECAVET') {
    (new \App\Controllers\OfertaAcademica\EcavetController(new \App\Models\OfertaAcademica\EcavetModel()))->show();
    return;
}

// ── Oferta Académica: ECSET (migrada a MVC) ──────────────────────────
if ($url === 'ECSET') {
    (new \App\Controllers\OfertaAcademica\EcsetController(new \App\Models\OfertaAcademica\EcsetModel()))->show();
    return;
}

// ── Institución: Misión y Visión (migrada a MVC) ─────────────────────
if ($url === 'MisionVision') {
    (new \App\Controllers\Institution\MisionVisionController(new \App\Models\Institution\MisionVisionModel()))->show();
    return;
}

// ── Institución: Mensaje de la Rectora (migrada a MVC) ───────────────
if ($url === 'MensajeRectora') {
    (new \App\Controllers\Institution\MensajeRectoraController(new \App\Models\Institution\MensajeRectoraModel()))->show();
    return;
}

// ── Institución: Organigrama y Autoridades (migradas a MVC) ─────────
if ($url === 'Organigrama') {
    (new \App\Controllers\Institution\OrganigramaController(new \App\Models\Institution\OrganigramaModel()))->show();
    return;
}

if ($url === 'Autoridades') {
    (new \App\Controllers\Institution\AutoridadesController(new \App\Models\Institution\AutoridadesModel()))->show();
    return;
}

// ── Institución: Código de Ética (migrada a MVC) ─────────────────────
if ($url === 'Codigo-Etica') {
    (new \App\Controllers\Institution\CodigoEticaController(new \App\Models\Institution\CodigoEticaModel()))->show();
    return;
}

// ── Institución: Modelos (Modelo Educativo y Pedagógico) ─────────────
if ($url === 'Modelos') {
    (new \App\Controllers\Institution\ModelosController(new \App\Models\Institution\ModelosModel()))->show();
    return;
}

// ── Institución: Calidad y Planificación (migrada a MVC) ─────────────
if ($url === 'Calidad-Planificacion') {
    (new \App\Controllers\Institution\CalidadPlanificacionController(new \App\Models\Institution\CalidadPlanificacionModel()))->show();
    return;
}

// ── Institución: Plan Estratégico PEDI (migrada a MVC) ───────────────
if ($url === 'Planificacion-Pedi') {
    (new \App\Controllers\Institution\PlanificacionPediController(new \App\Models\Institution\PlanificacionPediModel()))->show();
    return;
}

// ── Institución: Reglamentos (migrada a MVC) ──────────────────────────
if ($url === 'Reglamentos') {
    (new \App\Controllers\Institution\ReglamentosController(new \App\Models\Institution\ReglamentosModel()))->show();
    return;
}

// ── Institución: Normativa (migrada a MVC) ────────────────────────────
if ($url === 'Normativa') {
    (new \App\Controllers\Institution\NormativaController(new \App\Models\Institution\NormativaModel()))->show();
    return;
}

// ── Institución: Estatuto (migrada a MVC) ─────────────────────────────
if ($url === 'Estatuto') {
    (new \App\Controllers\Institution\EstatutoController(new \App\Models\Institution\EstatutoModel()))->show();
    return;
}

// ── Institución: Modelo Pedagógico (migrada a MVC) ────────────────────
if ($url === 'Modelo-Pedagogico') {
    (new \App\Controllers\Institution\ModeloPedagogicoController(new \App\Models\Institution\ModeloPedagogicoModel()))->show();
    return;
}

// ── Institución: Protocolos (migrada a MVC) ───────────────────────────
if ($url === 'Protocolos') {
    (new \App\Controllers\Institution\ProtocolosController(new \App\Models\Institution\ProtocolosModel()))->show();
    return;
}

// ── Institución: Estado Financiero (migrada a MVC) ──────────────────────
if ($url === 'Estado-Financiero') {
    (new \App\Controllers\Institution\EstadoFinancieroController(new \App\Models\Institution\EstadoFinancieroModel()))->show();
    return;
}

// ── Institución: Rendición de Cuentas (migrada a MVC) ───────────────────
if ($url === 'Rendicion-Cuentas') {
    (new \App\Controllers\Institution\RendicionCuentasController(new \App\Models\Institution\RendicionCuentasModel()))->show();
    return;
}

// ── Institución: Remuneración Mensual (migrada a MVC) ───────────────────
if ($url === 'Remuneracion-Mensual') {
    (new \App\Controllers\Institution\RemuneracionMensualController(new \App\Models\Institution\RemuneracionMensualModel()))->show();
    return;
}

// ── Institución: Aranceles (migrada a MVC) ──────────────────────────────
if ($url === 'Aranceles') {
    (new \App\Controllers\Institution\ArancelesController(new \App\Models\Institution\ArancelesModel()))->show();
    return;
}

// ── Institución: Balances Generales (migrada a MVC) ─────────────────────
if ($url === 'Balances-Generales') {
    (new \App\Controllers\Institution\BalanceGeneralController(new \App\Models\Institution\BalanceGeneralModel()))->show();
    return;
}

// ── Institución: Cumplimiento Tributario (migrada a MVC) ────────────────
if ($url === 'Cumplimiento-Tributario') {
    (new \App\Controllers\Institution\CumplimientoTributarioController(new \App\Models\Institution\CumplimientoTributarioModel()))->show();
    return;
}

// ── Institución: Balances Auditados (migrada a MVC) ─────────────────────
if ($url === 'Balances-Auditados') {
    (new \App\Controllers\Institution\BalancesAuditadosController(new \App\Models\Institution\BalancesAuditadosModel()))->show();
    return;
}

// ── Servicios: Graduados (migrada a MVC) ─────────────────────────────
if ($url === 'Graduados') {
    (new \App\Controllers\Services\GraduadosController(new \App\Models\Services\GraduadosModel()))->show();
    return;
}

// ── Servicios: Biblioteca Institucional (migrada a MVC) ──────────────
if ($url === 'Biblioteca-Institucional') {
    (new \App\Controllers\Services\BibliotecaInstitucionalController(new \App\Models\Services\BibliotecaInstitucionalModel()))->show();
    return;
}

// ── Servicios: Residencia (migrada a MVC) ────────────────────────────
if ($url === 'Residencia') {
    (new \App\Controllers\Services\ResidenciaController(new \App\Models\Services\ResidenciaModel()))->show();
    return;
}

// ── Servicios: Bienestar Institucional (migrada a MVC) ───────────────
if ($url === 'Bienestar-Institucional') {
    (new \App\Controllers\Services\BienestarInstitucionalController(new \App\Models\Services\BienestarInstitucionalModel()))->show();
    return;
}

// ── Servicios: Formatos (migrada a MVC) ──────────────────────────────
if ($url === 'Formatos') {
    (new \App\Controllers\Services\FormatosController(new \App\Models\Services\FormatosModel()))->show();
    return;
}

// ── Servicios: Solicitudes - procesar subida (migrada a MVC) ─────────
if ($url === 'Solicitudes/procesar') {
    (new \App\Controllers\Services\SolicitudesController(new \App\Models\Services\SolicitudesModel()))->procesar();
    return;
}

// ── Servicios: Solicitudes - página para subir solicitud firmada ─────
if ($url === 'Solicitudes/subir') {
    (new \App\Controllers\Services\SolicitudesController(new \App\Models\Services\SolicitudesModel()))->subir();
    return;
}

// ── Servicios: Solicitudes - formularios llenables (migrados a MVC) ──
if (preg_match('#^Solicitudes/(contrato|reingreso|homologacion|cambio-malla|tercera-matricula|cambio-carrera|retiro-voluntario)$#i', $url, $matches)) {
    (new \App\Controllers\Services\SolicitudesController(new \App\Models\Services\SolicitudesModel()))->show(strtolower($matches[1]));
    return;
}

// ── Servicios: Equipo Conectados (migrada a MVC) ─────────────────────
if ($url === 'Equipo-Conectados') {
    (new \App\Controllers\Services\EquipoConectadosController(new \App\Models\Services\EquipoConectadosModel()))->show();
    return;
}

// ── Servicios: Formulario Bienestar (migrada a MVC) ──────────────────
if ($url === 'Formulario-Bienestar/enviar') {
    (new \App\Controllers\Services\FormularioBienestarController(new \App\Models\Services\FormularioBienestarModel()))->procesar();
    return;
}

if ($url === 'Formulario-Bienestar') {
    (new \App\Controllers\Services\FormularioBienestarController(new \App\Models\Services\FormularioBienestarModel()))->show();
    return;
}

// ── Admisiones: ¿Por qué elegirnos? (migrada a MVC) ─────────────────
if ($url === 'Por-Que-Elegirnos') {
    (new \App\Controllers\Admisiones\PorQueElegirnosController(new \App\Models\Admisiones\PorQueElegirnosModel()))->show();
    return;
}

// ── Admisiones: Proceso de Admisión (migrada a MVC) ─────────────────
if ($url === 'Proceso-Admision') {
    (new \App\Controllers\Admisiones\ProcesoAdmisionController(new \App\Models\Admisiones\ProcesoAdmisionModel()))->show();
    return;
}

// ── Admisiones: Contrato de Matrícula - procesar (migrada a MVC) ─────
if ($url === 'Contrato-Matricula/procesar') {
    (new \App\Controllers\Admisiones\FirmaContratoController(new \App\Models\Admisiones\FirmaContratoModel()))->procesar();
    return;
}

// ── Admisiones: Contrato de Matrícula - formulario (migrada a MVC) ──
if ($url === 'Contrato-Matricula') {
    (new \App\Controllers\Admisiones\FirmaContratoController(new \App\Models\Admisiones\FirmaContratoModel()))->show();
    return;
}

// ── Buzón institucional (migrada a MVC) ─────────────────────────────
if ($url === 'buzon/enviar') {
    (new \App\Controllers\Buzon\BuzonController(new \App\Models\Buzon\BuzonModel()))->enviar();
    return;
}

if ($url === 'buzon') {
    (new \App\Controllers\Buzon\BuzonController(new \App\Models\Buzon\BuzonModel()))->show();
    return;
}

if ($url === 'buzon-qr') {
    (new \App\Controllers\Buzon\BuzonController(new \App\Models\Buzon\BuzonModel()))->mostrarQr();
    return;
}

// ── Contacto: formulario del pie de página (migrada a MVC) ───────────
if ($url === 'contacto/enviar') {
    (new \App\Controllers\Contacto\ContactoController(new \App\Models\Contacto\ContactoModel()))->enviar();
    return;
}
// ── Institución: Vinculación con la Sociedad ─────────────────
if ($url === 'Vinculacion-con-la-Sociedad') {
(new \App\Controllers\VinculacionConLaSociedad\VinculacionController(new \App\Models\VinculacionConLaSociedad\VinculacionModel()))->show();
    return;
}
// ── Institución: Prácticas (migrada a MVC) ───────────────────────────
if ($url === 'Practicas-Preprofesionales') {
    (new \App\Controllers\VinculacionConLaSociedad\PracticasController(
        new \App\Models\VinculacionConLaSociedad\PracticasModel()
    ))->show();
    return;
}

// ── Institución: Relaciones Interinstitucionales (migrada a MVC) ─────
if ($url === 'Relaciones-InterInstitucionales') {
    (new \App\Controllers\VinculacionConLaSociedad\RelacionesInterinstitucionalesController(
        new \App\Models\VinculacionConLaSociedad\RelacionesInterinstitucionalesModel()
    ))->show();
    return;
}

// ── Institución: Presencia en la Comunidad (migrada a MVC) ───────────
if ($url === 'Presencia-en-la-Comunidad') {
    (new \App\Controllers\VinculacionConLaSociedad\PresenciaComunidadController(
        new \App\Models\VinculacionConLaSociedad\PresenciaComunidadModel()
    ))->show();
    return;
}

// ── Institución: Investigación, Desarrollo e Innovación (migrada a MVC)
if ($url === 'Investigacion') {
    (new \App\Controllers\Investigacion\InvestigacionController(
        new \App\Models\Investigacion\InvestigacionModel()
    ))->show();
    return;
}

// ── Institución: Noticias (migrada a MVC) ────────────────────────────
if ($url === 'Noticias') {
    (new \App\Controllers\Noticias\NoticiasController(
        new \App\Models\Noticias\NoticiasModel()
    ))->show();
    return;
}

// ── Institución: Plataformas (migrada a MVC) ─────────────────────────
if ($url === 'Plataformas') {
    (new \App\Controllers\Plataformas\PlataformasController(
        new \App\Models\Plataformas\PlataformasModel()
    ))->show();
    return;
}

// ── SubMenu: Procesos Académicos (migrada a MVC) ─────────────────────
if ($url === 'Procesos-Academicos') {
    (new \App\Controllers\SubMenu\ProcesosAcademicosController(
        new \App\Models\SubMenu\ProcesosAcademicosModel()
    ))->show();
    return;
}

// ── SubMenu: Titulación (migrada a MVC) ──────────────────────────────
if ($url === 'Titulacion') {
    (new \App\Controllers\SubMenu\TitulacionController(
        new \App\Models\SubMenu\TitulacionModel()
    ))->show();
    return;
}

// ── SubMenu: Talento Humano (migrada a MVC) ──────────────────────────
if ($url === 'Talento-Humano') {
    (new \App\Controllers\SubMenu\TalentoHumanoController(
        new \App\Models\SubMenu\TalentoHumanoModel()
    ))->show();
    return;
}

// ── SubMenu: Evaluación Docente (migrada a MVC) ──────────────────────
if ($url === 'Evaluacion-Docente') {
    (new \App\Controllers\SubMenu\EvaluacionDocenteController(
        new \App\Models\SubMenu\EvaluacionDocenteModel()
    ))->show();
    return;
}

// ── Páginas institucionales / servicios / contenido y documentos ─────
$page = '/' . $url;

$institution = new InstitutionModel(ROOT_PATH);
if ($institution->find($page) !== null || $page === '/CalidadPlanificacion') {
    $institutionController = new InstitutionController($institution);
    if ($page === '/CalidadPlanificacion') {
        $institutionController->document($page);
    } else {
        $institutionController->show($page);
    }
    return;
}


$content = new ContentModel(ROOT_PATH);
if ($content->find($page) !== null) {
    (new ContentController($content))->show($page);
    return;
}

$documents = new DocumentModel(ROOT_PATH);
if ($documents->find($page) !== null) {
    (new DocumentRouterController($documents))->show($page);
    return;
}

// ── No encontrado ────────────────────────────────────────────────────
http_response_code(404);
$pageTitle = '404 - Página no encontrada';
require_once ROOT_PATH . '/app/Views/errors/404.php';