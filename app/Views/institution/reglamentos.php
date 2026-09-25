<?php

declare(strict_types=1);
// MVC Institución - Reglamentos Institucionales
$title = 'Reglamentos Institucionales';
$headerText = 'Instituto Superior Tecnológico Superarse';

$extraScripts = [asset('js/app/modules/institution/modelsViewer.js')];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2"><?= $escape($kicker) ?></span>
            </p>
            <h1 class="mb-4"><?= $escape($title) ?></h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="models-card-premium">
                    <div class="text-center mb-4">
                        <p class="lead"><?= $escape($intro) ?></p>
                        <p class="text-muted small"><?= $escape($tip) ?></p>
                    </div>

                    <div class="accordion" id="regulationsAccordion">
                        <?php foreach ($regulations as $index => $reg): ?>
                            <?php $collapseId = 'collapse-reg-' . $index; ?>
                            <?php $viewerId = 'pdf-viewer-reg-' . $index; ?>
                            <div class="card mb-3 border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                                <div class="card-header bg-white p-0 border-0">
                                    <button class="btn-link-accordion collapsed"
                                            data-toggle="collapse"
                                            data-target="#<?= $escape($collapseId) ?>"
                                            aria-expanded="false">
                                        <span>
                                            <i class="fas fa-file-pdf mr-3 text-danger"></i>
                                            <span class="text-dark font-weight-bold"><?= $escape($reg['title']) ?></span>
                                        </span>
                                        <i class="fas fa-chevron-down text-primary"></i>
                                    </button>
                                    <span class="d-none" data-collapse="<?= $escape($collapseId) ?>" data-url="<?= $escape($reg['filePath']) ?>"></span>
                                </div>
                                <div id="<?= $escape($collapseId) ?>" class="collapse" data-parent="#regulationsAccordion">
                                    <div class="card-body bg-light">
                                        <div class="d-flex justify-content-between align-items-center mb-3 bg-white p-2 rounded-pill shadow-sm">
                                            <button class="btn btn-sm btn-info rounded-pill prev-page px-3" data-url="<?= $escape($reg['filePath']) ?>" data-viewer="<?= $escape($viewerId) ?>">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <span class="page-info font-weight-bold text-primary" data-url="<?= $escape($reg['filePath']) ?>">Página: 1 de ...</span>
                                            <button class="btn btn-sm btn-info rounded-pill next-page px-3" data-url="<?= $escape($reg['filePath']) ?>" data-viewer="<?= $escape($viewerId) ?>">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                        <div id="<?= $escape($viewerId) ?>" class="pdf-render-container shadow-sm border rounded bg-white" style="overflow: hidden; min-height: 400px;"></div>
                                        <div class="text-center mt-3">
                                            <a href="<?= $escape($reg['filePath']) ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill px-4">
                                                <i class="fas fa-external-link-alt mr-2"></i> Pantalla Completa
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';