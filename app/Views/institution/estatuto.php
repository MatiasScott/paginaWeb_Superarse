<?php

declare(strict_types=1);
// MVC Institución - Estatuto Institucional (visor PDF vía codigoInstitucional.js)
$title = 'Estatuto Institucional';
$headerText = 'Instituto Superior Tecnológico Superarse';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-5 mb-lg-0">
                <div class="card-main p-4 shadow-sm" style="border-radius: 15px; background: #fff;">
                    <div class="icon-circle mb-3"><i class="<?= $escape($icon) ?>"></i></div>
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <span class="px-2"><?= $escape($kicker) ?></span>
                        </p>
                        <h3 class="mb-4"><?= $escape($title) ?></h3>
                    </div>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($paragraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="estatuto-card">
                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.5rem;"><?= $escape($documentsHeading) ?></h3>

                    <div id="pdf-container" data-pdf-url="<?= $escape($pdfUrl) ?>">
                        <div class="d-flex align-items-center justify-content-center w-100">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>
                    </div>

                    <div class="pdf-controls">
                        <button id="prev-page" class="btn-pdf"><i class="fas fa-chevron-left"></i></button>
                        <span id="page-num"><?= $escape($pdfPageLabel) ?></span>
                        <button id="next-page" class="btn-pdf"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';