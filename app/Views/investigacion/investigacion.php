<?php

declare(strict_types=1);

// MVC Institución - Investigación, Desarrollo e Innovación

$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    asset('js/app/modules/investigacion/investigacion-publicaciones.js'),
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

// Helpers que replican la lógica previa de js/main.js (generarInvestigacionIDi)
$quitarPrimerH4 = static fn (string $html): string => (string) preg_replace('/^\s*<h4[^>]*>.*?<\/h4>\s*/is', '', $html);

$limpiarTexto = static fn (string $texto): string => trim((string) preg_replace('/\s+/', ' ', strip_tags($texto)));

$obtenerTitulosPublicaciones = static function (string $html) use ($limpiarTexto): array {
    preg_match_all('/<h4[^>]*>(.*?)<\/h4>/is', $html, $matches);
    $titulos = [];
    foreach ($matches[1] as $contenido) {
        $titulo = $limpiarTexto($contenido);
        if ($titulo !== '') {
            $titulos[] = $titulo;
        }
    }
    return $titulos;
};

$resumenIds       = ['modeloInvestigacionVinculacion', 'normativaInvestigacion', 'dominiosLineasInvestigacion'];
$eventosIds       = ['congresoTopografia2025', 'congresoTopografia2023', 'seminarioEquino', 'congresoAgrovet2026'];
$publicacionesIds = ['publicacionesMayoOctubre2025', 'publicacionesNoviembreAbril2025', 'publicacionesMayoOctubre2024', 'publicacionesNoviembre2023Abril2024', 'publicacionesMayoOctubre2023', 'publicacionesMayoOctubre202'];

$porId = [];
foreach ($items as $item) {
    if (!empty($item['id']) && isset($item['content'])) {
        $porId[$item['id']] = $item;
    }
}

$resumenMap       = [];
$eventosMap       = [];
$publicacionesMap = [];
foreach ($resumenIds as $id) {
    if (isset($porId[$id])) {
        $resumenMap[$id] = $porId[$id];
    }
}
foreach ($eventosIds as $id) {
    if (isset($porId[$id])) {
        $eventosMap[$id] = $porId[$id];
    }
}
foreach ($publicacionesIds as $id) {
    if (isset($porId[$id])) {
        $publicacionesMap[$id] = $porId[$id];
    }
}

$resumenRenderizado       = false;
$eventosRenderizados      = false;
$publicacionesRenderizadas = false;

$linear = '';

foreach ($items as $item) {
    // Sección (encabezado estilo Yachay)
    if (!empty($item['section'])) {
        $linear .= '<div class="col-12 mt-5 mb-4">'
            . '<h2 class="text-uppercase fw-bold" style="color: #003366; letter-spacing: 1px; border-left: 5px solid #00aae4; padding-left: 15px;">'
            . $escape($item['title'])
            . '</h2></div>';
        continue;
    }

    $id = $item['id'];

    // Resumen (cards modernas)
    if (in_array($id, $resumenIds, true)) {
        if ($resumenRenderizado) {
            continue;
        }
        $cards = '';
        foreach ($resumenIds as $rid) {
            if (!isset($resumenMap[$rid])) {
                continue;
            }
            $cards .= '<div class="col-md-4 mb-4">'
                . '<div class="card h-100 border-0 shadow-sm" style="border-radius: 12px; transition: transform 0.3s;">'
                . '<div class="card-body p-4">'
                . '<div class="mb-3"><i class="fas fa-microscope fa-2x text-info"></i></div>'
                . '<h5 class="fw-bold mb-3" style="color: #003366;">' . $escape($resumenMap[$rid]['title']) . '</h5>'
                . '<div class="text-muted small">' . $quitarPrimerH4($resumenMap[$rid]['content']) . '</div>'
                . '</div></div></div>';
        }
        $linear .= '<div class="row">' . $cards . '</div>';
        $resumenRenderizado = true;
        continue;
    }

    // Eventos (grid de 2 columnas)
    if (in_array($id, $eventosIds, true)) {
        if ($eventosRenderizados) {
            continue;
        }
        $cards = '';
        foreach ($eventosIds as $eid) {
            if (!isset($eventosMap[$eid])) {
                continue;
            }
            $cards .= '<div class="col-md-6 mb-4">'
                . '<div class="card h-100 border-0 border-top border-4 border-primary shadow-sm">'
                . '<div class="card-body">'
                . '<h5 class="fw-bold" style="color: #003366;">' . $escape($eventosMap[$eid]['title']) . '</h5>'
                . '<div class="mt-3">' . $quitarPrimerH4($eventosMap[$eid]['content']) . '</div>'
                . '</div></div></div>';
        }
        $linear .= '<div class="row">' . $cards . '</div>';
        $eventosRenderizados = true;
        continue;
    }

    // Publicaciones (dashboard universitario)
    if (in_array($id, $publicacionesIds, true)) {
        if ($publicacionesRenderizadas) {
            continue;
        }

        $periodosPublicaciones = [];
        foreach ($publicacionesIds as $pid) {
            if (!isset($publicacionesMap[$pid])) {
                continue;
            }
            $pubs = [];
            $indice = 0;
            foreach ($obtenerTitulosPublicaciones($publicacionesMap[$pid]['content']) as $titulo) {
                $pubs[] = ['titulo' => $titulo, 'llave' => $pid . '-' . $indice];
                $indice++;
            }
            if ($pubs === []) {
                $pubs[] = ['titulo' => 'Sin publicaciones', 'llave' => $pid . '-0'];
            }
            $periodosPublicaciones[] = [
                'id'            => $pid,
                'periodo'       => $publicacionesMap[$pid]['title'],
                'publicaciones' => $pubs,
            ];
        }

        $totalPubs = 0;
        foreach ($periodosPublicaciones as $p) {
            $totalPubs += count($p['publicaciones']);
        }
        $maxPubs = 1;
        foreach ($periodosPublicaciones as $p) {
            $maxPubs = max($maxPubs, count($p['publicaciones']));
        }

        $barrasPublicaciones = '';
        foreach ($periodosPublicaciones as $p) {
            $porcentaje = (count($p['publicaciones']) / $maxPubs) * 100;
            $barrasPublicaciones .= '<div class="mb-4">'
                . '<div class="d-flex justify-content-between mb-1">'
                . '<span class="fw-bold small text-secondary">' . $escape($p['periodo']) . '</span>'
                . '<span class="badge rounded-pill bg-primary">' . count($p['publicaciones']) . '</span>'
                . '</div>'
                . '<div class="progress" style="height: 8px; border-radius: 10px; background-color: #e9ecef;">'
                . '<div class="progress-bar" style="width: ' . $porcentaje . '%; background: linear-gradient(90deg, #003366, #00aae4);"></div>'
                . '</div></div>';
        }

        $filasTabla = '';
        foreach ($periodosPublicaciones as $p) {
            $primeraCelda = true;
            foreach ($p['publicaciones'] as $pub) {
                $celdaPeriodo = $primeraCelda
                    ? '<td rowspan="' . count($p['publicaciones']) . '" class="align-middle fw-bold bg-light" style="width:30%; color:#003366;">' . $escape($p['periodo']) . '</td>'
                    : '';
                $filasTabla .= '<tr>'
                    . $celdaPeriodo
                    . '<td class="py-3">'
                    . '<a href="javascript:void(0)" class="text-decoration-none text-dark hover-link" onclick="mostrarPublicacionInvestigacion(\'' . $escape($p['id']) . '\')">'
                    . '<i class="far fa-file-alt me-2 text-info"></i> ' . $escape($pub['titulo'])
                    . '</a></td></tr>';
                $primeraCelda = false;
            }
        }

        $detallesPeriodos = '';
        foreach ($periodosPublicaciones as $p) {
            $detallesPeriodos .= '<article class="card border-0 shadow mb-4 d-none" data-publicacion-periodo="' . $escape($p['id']) . '" style="border-left: 5px solid #00aae4 !important;">'
                . '<div class="card-body p-4">'
                . '<h4 class="fw-bold" style="color: #003366;">' . $escape($p['periodo']) . '</h4>'
                . '<hr>'
                . $publicacionesMap[$p['id']]['content']
                . '</div></article>';
        }

        $linear .= '<div class="row mt-4">'
            . '<div class="col-lg-4">'
            . '<div class="card border-0 shadow-sm p-4 mb-4" style="background-color: #f8f9fa;">'
            . '<h5 class="fw-bold mb-4">Métricas de Impacto</h5>'
            . '<p class="small text-muted">Producción científica por ciclo académico.</p>'
            . '<div class="display-5 fw-bold text-primary mb-4">' . $totalPubs . '</div>'
            . $barrasPublicaciones
            . '</div></div>'
            . '<div class="col-lg-8">'
            . '<div class="table-responsive shadow-sm rounded">'
            . '<table class="table table-hover bg-white mb-0 border-0">'
            . '<thead style="background-color: #003366; color: white;">'
            . '<tr><th class="py-3">Período</th><th class="py-3">Título de la Investigación</th></tr>'
            . '</thead><tbody>' . $filasTabla . '</tbody></table></div>'
            . '<div id="publicacionesDetalleDinamico" class="mt-4">'
            . '<div class="alert alert-info border-0 shadow-sm" style="background-color: #e3f2fd; color: #0056b3;">'
            . '<i class="fas fa-info-circle me-2"></i> Seleccione un título arriba para ver detalles.'
            . '</div>'
            . $detallesPeriodos
            . '</div></div></div>';

        $publicacionesRenderizadas = true;
        continue;
    }

    // Otros artículos genéricos
    $linear .= '<div class="col-12 mb-4">'
        . '<article id="' . $escape($id) . '" class="card border-0 shadow-sm">'
        . '<div class="card-body p-4">'
        . '<h5 class="fw-bold" style="color: #003366;">' . $escape($item['title']) . '</h5>'
        . '<div class="mt-3">' . $item['content'] . '</div>'
        . '</div></article></div>';
}

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container investigacion-shell">
        <div class="row">
            <div class="col-12">
                <div class="text-center pb-2">
                    <p class="section-title px-5">
                        <span class="px-2"><?= $escape($kicker) ?></span>
                    </p>
                    <h1 class="mb-4">Investigación <br>Desarrollo e Innovación (I+D+i)</h1>
                </div>

                <p style="text-align: justify;">
                    En el Instituto Superior Tecnológico Superarse, la Investigación, el Desarrollo y la Innovación (I+D+i)
                    son pilares estratégicos que impulsan la generación de conocimiento, la solución de problemas y la
                    contribución al progreso científico y tecnológico del país.
                </p>
                <p style="text-align: justify;">
                    Fomentamos una cultura de investigación activa, donde docentes y estudiantes colaboran en proyectos
                    relevantes que no solo enriquecen el currículo académico, sino que también generan un impacto tangible
                    en la sociedad y la industria.
                </p>
                <p style="text-align: justify;">
                    Explore esta sección para conocer nuestro modelo de investigación, los proyectos en curso, las
                    publicaciones recientes, los eventos científicos y las oportunidades de participación en nuestra
                    vibrante comunidad de investigación.
                </p>

                <div class="mt-4">
                    <div class="container-fluid p-0">
                        <?= $linear ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';