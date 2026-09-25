<?php
declare(strict_types=1);
// Vista MVC Institución - organigrama institucional
$title = $title ?? 'Organigrama Institucional';
$kicker = $kicker ?? '';
$introParagraphs = $introParagraphs ?? [];
$pdfUrl = $pdfUrl ?? '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-title px-5"><span class="px-2"><?= $escape($kicker) ?></span></p>
            <h1 class="display-4 fw-bold mt-2"><?= $escape($title) ?></h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-11 mb-5">
                <div class="card-main p-4 p-md-5">
                    <div class="icon-circle"><i class="fas fa-sitemap"></i></div>
                    <div class="text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($introParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-10 text-center">
                <div class="organigrama-photo-wrapper shadow-sm">
                    <iframe
                        src="<?= $escape($pdfUrl) ?>"
                        class="pdf-embed-photo">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';