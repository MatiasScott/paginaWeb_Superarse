<?php

declare(strict_types=1);
// MVC Institución - Normativas Generales (visor PDF vía codigoInstitucional.js)
$title = 'Normativas Generales';
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
                        <div class="icon-circle shadow-sm" style="width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; color: #ed7d31; border: 2px solid #ed7d31;">
                            <i class="<?= $escape($icon) ?>"></i>
                        </div>
                    </div>

                    <div class="text-center pb-2">
                        <p class="section-title px-2 px-md-5 d-inline-block">
                            <span class="px-2"><?= $escape($kicker) ?></span>
                        </p>
                        <h1 class="mb-4 titulo-institucional h2 mt-3"><?= $escape($title) ?></h1>
                    </div>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($paragraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 mb-4">
                <div class="codigo-card p-3 p-md-4 shadow-sm" style="border-radius: 15px; background: #fff; height: 100%;">
                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.5rem;"><?= $escape($documentsHeading) ?></h3>

                    <div id="pdf-container"
                         data-pdf-url="<?= $escape($pdfUrl) ?>"
                         style="min-height: 800px; height: 70vh; background: #f8f9fa; border-radius: 8px; position: relative; overflow: hidden;"
                         class="border">
                        <div class="d-flex align-items-center justify-content-center w-100 h-100">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>
                    </div>

                    <div class="mt-4 p-2 p-md-3 d-flex justify-content-center align-items-center"
                         style="background-color: #f0f4f8; border-radius: 50px; width: 100%;">
                        <button id="prev-page" class="btn d-flex align-items-center justify-content-center shadow-sm flex-shrink-0"
                                style="width: 40px; height: 40px; border-radius: 50%; background-color: #17a2b8; border: none; color: white;">
                            <i class="fas fa-chevron-left" style="font-size: 0.9rem;"></i>
                        </button>
                        <span id="page-num" class="mx-2 mx-md-4 font-weight-bold text-center"
                              style="color: #003366; font-size: 0.9rem; min-width: 100px;">
                            <?= $escape($pdfPageLabel) ?>
                        </span>
                        <button id="next-page" class="btn d-flex align-items-center justify-content-center shadow-sm flex-shrink-0"
                                style="width: 40px; height: 40px; border-radius: 50%; background-color: #17a2b8; border: none; color: white;">
                            <i class="fas fa-chevron-right" style="font-size: 0.9rem;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';