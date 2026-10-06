<?php

declare(strict_types=1);
// MVC Servicios - Cumplimiento Tributario
$title = 'Cumplimiento Tributario';
$headerText = 'Instituto Superior Tecnológico Superarse';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="card-main p-4 p-md-5 shadow-sm" style="border-radius: 15px; background: #fff;">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="icon-circle shadow-sm" style="width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; border: 2px;">
                            <i class="<?= $escape($heroIcon) ?>"></i>
                        </div>
                    </div>

                    <div class="text-center pb-2">
                        <p class="section-title px-2 px-md-5 d-inline-block">
                            <span class="px-2"><?= $escape($heroKicker) ?></span>
                        </p>
                        <h1 class="mb-4 titulo-institucional h2 mt-3"><?= $escape($heroTitle) ?></h1>
                    </div>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($heroParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>

                    <div class="stamp-container mt-4 text-center">
                        <div class="p-2 border rounded d-inline-block bg-light">
                            <small class="font-weight-bold text-uppercase" style="color: #17a2b8;">
                                <i class="fas fa-check-circle mr-2"></i> <?= $escape($stampText) ?>
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="models-card-premium p-4 p-md-5 shadow-sm" style="border-radius: 15px; background: #fff; border-top: 5px solid #003366;">
                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.5rem;"><?= $escape($documentsHeading) ?></h3>
                    <p class="text-center text-muted mb-4"><?= $escape($documentsPrompt) ?></p>

                    <div class="list-group-scrollable mb-4" style="max-height: 400px; overflow-y: auto;">
                        <ul class="list-group list-group-flush" id="documentos-list" style="display: block !important;">
                            <?php foreach ($documents as $documento): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center w-100 border-bottom py-3">
                                    <span><?= $escape($documento['title']) ?></span>
                                    <a href="<?= $escape(url($documento['file'])) ?>" target="_blank"
                                       class="btn btn-sm btn-primary px-3"
                                       style="background-color: #17a2b8; border: none;">
                                        <i class="fa fa-file-pdf mr-2"></i> Ver PDF
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="mt-4 pt-3 border-top text-center">
                        <small class="text-muted">
                            <i class="fas fa-file-pdf mr-2 text-danger"></i> <?= $escape($note) ?>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';