<?php

declare(strict_types=1);

// MVC SubMenu - Evaluación Docente
// Tab "Evaluación Docente" (intro), visor PDF (reutiliza talenHumano-pdfs.js) y
// tab "Mejores Evaluados" con 3 periodos renderizados server-side (show/hide sin clonar).

$title = 'Evaluación Docente';
$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
    asset('js/app/modules/talento-humano/talento-humano-pdfs.js'),
    asset('js/app/modules/evaluacion-docente/evaluacion-docente.js'),
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 bg-light container-top">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <p class="section-title px-5 d-inline-block">
                    <span class="px-2"><?= $escape($kicker) ?></span>
                </p>
                <h1 class="mb-4 titulo-institucional"><?= $escape($title) ?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="list-group list-group-horizontal flex-nowrap overflow-auto shadow-sm mb-4" id="list-tab" role="tablist" style="border-radius: 10px;">
                    <?php foreach ($tabs as $index => $tab): ?>
                        <a class="list-group-item list-group-item-action text-nowrap py-3<?= $index === 0 ? ' active' : '' ?>"
                           id="list-<?= $escape($tab['aria']) ?>-list"
                           data-bs-toggle="list"
                           href="#list-<?= $escape($tab['id']) ?>"
                           role="tab"
                           aria-controls="list-<?= $escape($tab['aria']) ?>"><?= $escape($tab['etiqueta']) ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="p-4 border rounded shadow-sm bg-white">
                    <div class="tab-content" id="nav-tabContent">

                        <!------------------------------------------ INTRODUCCIÓN EVALUACIÓN DOCENTE --------------------------------- -->
                        <div class="tab-pane fade show active" id="list-trabaja" role="tabpanel" aria-labelledby="list-trabaja-list">
                            <div class="row gx-5">
                                <div class="col-lg-12">
                                    <h1 class="text-center text-primary">Evaluación Docente</h1>
                                    <br>
                                    <p style="text-align: justify;">
                                        En el Instituto Superior Tecnológico Superarse, la búsqueda constante de la excelencia académica impulsa nuestra cultura de innovación y mejora continua.
                                        Comprometidos con la calidad de la educación, hemos implementado un sistema de evaluación docente, permitiendo a nuestros estudiantes evaluar a sus profesores
                                        y proporcionar datos valiosos para asegurar la calidad de la enseñanza y promover el desarrollo profesional de nuestros docentes.
                                    </p>
                                    <p class="mb-4" style="text-align: center;">
                                        <strong>¡La evaluación docente es un pilar fundamental !</strong>
                                    </p>
                                    <h4 class="text-uppercase mb-3">Nuestro Objetivo</h4>
                                    <ul style="text-align: justify;">
                                        <li>Elevar la calidad académica: Identificar fortalezas y áreas de mejora en la práctica docente, asegurando una educación de vanguardia.</li>
                                        <li>Facilitar la toma de decisiones estratégicas: Detectar tendencias y necesidades emergentes para una gestión académica proactiva.</li>
                                        <li>Fomentar el crecimiento profesional del docente: Proporcionar herramientas y recursos para el desarrollo continuo de sus competencias pedagógicas y tecnológicas.</li>
                                        <li>Promover la participación activa de los estudiantes: Incluir a los estudiantes como parte activa del proceso de mejora continua.</li>
                                        <li>Asegurar la pertinencia de la formación: Ajustar los contenidos y metodologías a las demandas del sector productivo.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!------------------------------------ REGLAMENTO EVALUACIÓN DOCENTE ----------------------------------------- -->
                        <div class="tab-pane fade" id="list-concurso" role="tabpanel" aria-labelledby="list-concurso-list">
                            <div class="row d-flex">
                                <div class="col-lg-4">
                                    <?php foreach ($pdfGruposReglamento as $grupo): ?>
                                        <h6 class="mb-3"><?= $escape($grupo['encabezado']) ?></h6>
                                        <div class="list-group pdf-submenu" role="tablist">
                                            <?php foreach ($grupo['items'] as $item): ?>
                                                <a class="list-group-item list-group-item-action" href="#" data-pdf-src="<?= $escape($item['pdfSrc']) ?>" data-canvas-id="<?= $escape($item['canvasId']) ?>"><?= $item['label'] ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="pdf-viewer-container border rounded shadow-sm bg-white">
                                        <canvas id="pdf-viewer-concurso" class="pdf-canvas"></canvas>
                                    </div>
                                    <div class="pdf-paginator" data-canvas-id="pdf-viewer-concurso">
                                        <button class="btn btn-primary" data-action="prev">Anterior</button>
                                        <span class="page-info">Página: <span class="page-num">0</span> / <span class="page-count">0</span></span>
                                        <button class="btn btn-primary" data-action="next">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!------------------------------------------------- PROCEDIMIENTO DE EVALUACIÓN ------------------------------------------------------>
                        <div class="tab-pane fade" id="list-convocatoria" role="tabpanel" aria-labelledby="list-convocatoria-list">
                            <div class="row">
                                <div class="col-lg-4">
                                    <?php foreach ($pdfGruposProcedimiento as $grupo): ?>
                                        <h6 class="mb-3"><?= $escape($grupo['encabezado']) ?></h6>
                                        <div class="list-group pdf-submenu" role="tablist">
                                            <?php foreach ($grupo['items'] as $item): ?>
                                                <a class="list-group-item list-group-item-action" href="#" data-pdf-src="<?= $escape($item['pdfSrc']) ?>" data-canvas-id="<?= $escape($item['canvasId']) ?>"><?= $item['label'] ?></a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="col-lg-8">
                                    <div class="pdf-viewer-container border rounded shadow-sm bg-white">
                                        <canvas id="pdf-viewer-igualdad" class="pdf-canvas"></canvas>
                                    </div>
                                    <div class="pdf-paginator" data-canvas-id="pdf-viewer-igualdad">
                                        <button class="btn btn-primary" data-action="prev">Anterior</button>
                                        <span class="page-info">Página: <span class="page-num">0</span> / <span class="page-count">0</span></span>
                                        <button class="btn btn-primary" data-action="next">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--------------------------------------- MEJORES EVALUADOS --------------------------------------------------------->
                        <div class="tab-pane fade" id="list-mejores" role="tabpanel" aria-labelledby="list-mejores-list">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h4 class="mb-3">Mejores Evaluados</h4>
                                    <?php foreach ($periodos as $index => $periodo): ?>
                                        <p><strong><?= $escape($periodo['periodo']) ?></strong></p>
                                        <div class="list-group pdf-submenu" role="tablist">
                                            <a class="list-group-item list-group-item-action<?= $index === 0 ? ' active' : '' ?>" href="#" data-content-id="<?= $escape($periodo['id']) ?>">DOCENTES MEJORES EVALUADOS</a>
                                        </div>
                                        <br>
                                    <?php endforeach; ?>
                                </div>

                                <div class="col-lg-8">
                                    <div id="content-display-area" class="pdf-viewer-container border rounded shadow-sm bg-white p-3">
                                        <?php foreach ($periodos as $index => $periodo): ?>
                                            <div class="mejores-evaluados-periodo<?= $index === 0 ? '' : ' d-none' ?>" id="<?= $escape($periodo['id']) ?>">
                                                <h2 class="text-center"><?= $escape($periodo['periodo']) ?></h2>
                                                <p class="mb-4" style="text-align: justify;">El Tecnológico Superarse define cuidadosamente los perfiles profesionales de los profesores que forman parte de nuestra Institución. Con una sólida formación académica y una gran trayectoria, nuestros profesores son un referente en su campo. Estamos emocionados de contar con su experiencia y liderazgo en Nuestras Carreras.</p>
                                                <h2 style="text-align: center;">DOCENTES</h2>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="d-flex flex-wrap justify-content-center">
                                                            <?php foreach ($periodo['docentes'] as $docente): ?>
                                                                <div class="perfil-profesorp text-center m-2 clickable-item" data-large-src="<?= $escape($docente['large']) ?>" data-name="<?= $escape($docente['nombre']) ?>">
                                                                    <img src="<?= $escape($docente['thumb']) ?>" alt="Foto de perfil" class="border rounded" style="width: <?= (int) $docente['size'] ?>px; height: <?= (int) $docente['size'] ?>px; object-fit: cover;">
                                                                    <h6><?= $escape($docente['nombre']) ?></h6>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <div class="contenedor-foto-grande text-center d-none mt-4">
                                                            <h4 class="foto-profesor-nombre mb-3"></h4>
                                                            <img src="" alt="Foto informativa del profesor" class="foto-profesor-principal img-fluid border rounded" style="max-width: 50%; max-height: 300px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';