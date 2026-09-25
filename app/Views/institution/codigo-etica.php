<?php
declare(strict_types=1);
// Vista MVC Institución - código de ética
$title = $title ?? 'Código de Ética';
$kicker = $kicker ?? '';
$youtubeId = $youtubeId ?? '';
$normativesLabel = $normativesLabel ?? '';
$introParagraphs = $introParagraphs ?? [];
$documentHeading = $documentHeading ?? '';
$pdfUrl = $pdfUrl ?? '';

$extraScripts = [
    asset('js/app/modules/institution/codigoInstitucional.js')
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-title px-5"><span class="px-2"><?= $escape($kicker) ?></span></p>
            <div class="video-wrapper">
                <iframe src="https://www.youtube.com/embed/<?= $escape($youtubeId) ?>" title="Video Institucional" allowfullscreen></iframe>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 mb-4">
                <div class="card-main p-4 shadow-sm" style="border-radius: 15px; background: #fff;">
                    <div class="icon-circle mb-3"><i class="fas fa-gavel"></i></div>

                    <p class="section-title pr-5">
                        <span class="pr-2"><?= $escape($normativesLabel) ?></span>
                    </p>
                    <h1 class="mb-4 titulo-institucional h2"><?= $escape($title) ?></h1>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($introParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 mb-4">
                <div class="codigo-card p-4 shadow-sm" style="border-radius: 15px; background: #fff; height: 100%;">
                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.5rem;"><?= $escape($documentHeading) ?></h3>

                    <div id="pdf-container" data-pdf-url="<?= $escape($pdfUrl) ?>" style="min-height: 650px; background: #f8f9fa; border-radius: 8px;">
                        <div class="d-flex align-items-center justify-content-center w-100" style="height: 400px;">
                            <div class="spinner-border text-primary" role="status"></div>
                        </div>
                    </div>

                    <div class="pdf-controls mt-3 d-flex justify-content-center align-items-center">
                        <button id="prev-page" class="btn-pdf mr-3"><i class="fas fa-chevron-left"></i></button>
                        <span id="page-num" class="font-weight-bold">Cargando...</span>
                        <button id="next-page" class="btn-pdf ml-3"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';