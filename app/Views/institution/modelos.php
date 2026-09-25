<?php
declare(strict_types=1);
// Vista MVC Institución - modelos institucionales
$title = $title ?? 'Modelos Institucionales';
$kicker = $kicker ?? '';
$introParagraphs = $introParagraphs ?? [];
$documentsHeading = $documentsHeading ?? '';
$documentsPrompt = $documentsPrompt ?? '';
$modelos = $modelos ?? [];

$extraScripts = [
    asset('js/app/modules/institution/modelsViewer.js')
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="card-main p-4 shadow-sm" style="border-radius: 15px; background: #fff;">
                    <div class="icon-circle mb-3"><i class="fas fa-cubes"></i></div>

                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <span class="px-2"><?= $escape($kicker) ?></span>
                        </p>
                    </div>
                    <h1 class="mb-4 titulo-institucional h2"><?= $escape($title) ?></h1>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($introParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="models-card-premium p-4 shadow-sm" style="border-radius: 15px; background: #fff;">
                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.5rem;"><?= $escape($documentsHeading) ?></h3>
                    <p class="text-center text-muted mb-4"><?= $escape($documentsPrompt) ?></p>

                    <div class="accordion" id="modelsAccordion">
                        <?php foreach ($modelos as $index => $model): ?>
                            <?php $collapseId = 'collapse-' . $index; ?>
                            <?php $viewerId = 'pdf-viewer-' . $index; ?>
                            <?php $filePath = $escape((string) $model['filePath']); ?>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <button class="btn-link-accordion collapsed"
                                            data-toggle="collapse"
                                            data-target="#<?= $collapseId ?>"
                                            aria-expanded="false">
                                        <span><i class="fas fa-file-pdf mr-3 text-danger"></i> <?= $escape((string) $model['title']) ?></span>
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div id="<?= $collapseId ?>" class="collapse" data-parent="#modelsAccordion">
                                    <div class="card-body bg-light">
                                        <div class="d-flex justify-content-between align-items-center mb-3 bg-white p-2 rounded-pill shadow-sm">
                                            <button class="btn btn-sm btn-info rounded-pill prev-page px-3" data-url="<?= $filePath ?>" data-viewer="<?= $viewerId ?>" data-collapse="<?= $collapseId ?>">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <span class="page-info font-weight-bold text-primary" data-url="<?= $filePath ?>">Página: 1 de ...</span>
                                            <button class="btn btn-sm btn-info rounded-pill next-page px-3" data-url="<?= $filePath ?>" data-viewer="<?= $viewerId ?>" data-collapse="<?= $collapseId ?>">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                        <div id="<?= $viewerId ?>" class="pdf-render-container shadow-sm border rounded bg-white" style="overflow: hidden;"></div>
                                        <div class="text-center mt-3">
                                            <a href="<?= $filePath ?>" target="_blank" class="btn btn-sm btn-outline-primary rounded-pill">
                                                <i class="fas fa-external-link-alt mr-1"></i> Abrir en pantalla completa
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
require dirname(__DIR__) . '/layouts/main.php';