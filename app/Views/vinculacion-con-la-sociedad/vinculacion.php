<?php

declare(strict_types=1);

// MVC Institution - Vinculación con la Sociedad
$headerText = 'Instituto Superior Tecnológico Superarse';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row align-items-start">
            
            <!-- Presentación Institucional -->
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="card-main p-4 p-md-5 shadow-sm" style="border-radius: 15px; background: #fff; height: 100%;">
                    
                    <div class="d-flex justify-content-center mb-3">
                        <div class="icon-circle shadow-sm" style="width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; border: 2px;">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                    </div>

                    <div class="text-center pb-2">
                        <p class="section-title px-2 px-md-5 d-inline-block">
                            <span class="px-2"><?= $escape($kicker) ?></span>
                        </p>
                        <h1 class="mb-4 titulo-institucional h2 mt-3"><?= $escape($title) ?></h1>
                    </div>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <p>
                            <strong>El Instituto Superior Tecnológico Superarse</strong> concibe la <strong>Vinculación con la Sociedad</strong> como un eje estratégico que articula la formación académica y la investigación con las necesidades reales de la comunidad, promoviendo proyectos de impacto social, productivo, cultural y ambiental que fortalecen la calidad de vida y fomentan el desarrollo sostenible.
                        </p>
                        <p>
                            Bajo principios de pertinencia, inclusión y corresponsabilidad, la vinculación se convierte en un espacio de aprendizaje mutuo donde estudiantes y docentes aplican sus conocimientos en beneficio de la sociedad, al tiempo que se consolidan alianzas interinstitucionales y se impulsa la innovación y la economía circular.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Listado de Áreas -->
            <div class="col-lg-7">
                <div class="codigo-card p-4 p-md-5 shadow-sm" style="border-radius: 15px; background: #fff; height: 100%; border-top: 5px solid #003366;">
                    
                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.5rem;">Nuestras Áreas de Vinculación</h3>
                    
                    <p class="text-center text-muted mb-4">
                        Haz clic en cada opción para conocer más detalles:
                    </p>
                    
                    <div class="list-group-scrollable" style="max-height: 500px; overflow-y: auto;">
                        <ul class="list-group list-group-flush" id="vinculacionList">
                            <?php if (!empty($areas)): ?>
                                <?php foreach ($areas as $area): ?>
                                    <li class="list-group-item d-flex align-items-center justify-content-between p-3 mb-2 shadow-sm rounded border" style="cursor: pointer;" data-toggle="modal" data-target="#modal-<?= $escape($area['id']) ?>">
                                        <div class="d-flex align-items-center">
                                            <i class="fas <?= $escape($area['icono']) ?> text-primary mr-3 fa-lg"></i>
                                            <span class="font-weight-bold text-dark"><?= $escape($area['titulo']) ?></span>
                                        </div>
                                        <i class="fas fa-chevron-right text-muted"></i>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li class="list-group-item text-center text-muted">No hay áreas disponibles.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modales Dinámicos (Inyección de Contenido HTML) -->
            <div id="vinculacionModals">
                <?php if (!empty($areas)): ?>
                    <?php foreach ($areas as $area): ?>
                        <div class="modal fade" id="modal-<?= $escape($area['id']) ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title font-weight-bold text-primary">
                                            <i class="fas <?= $escape($area['icono']) ?> mr-2"></i><?= $escape($area['titulo']) ?>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?= $area['contenidoHtml'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';