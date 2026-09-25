<?php
declare(strict_types=1);
// Vista MVC Institución - mensaje de la rectora
$title = $title ?? 'Mensaje de Nuestra Rectora';
$kicker = $kicker ?? '';
$greeting = $greeting ?? '';
$introParagraphs = $introParagraphs ?? [];
$photo = $photo ?? '';
$photoAlt = $photoAlt ?? '';
$closingParagraphs = $closingParagraphs ?? [];
$finalPhrase = $finalPhrase ?? '';
$signatureName = $signatureName ?? '';
$signatureRole = $signatureRole ?? '';

$extraScripts = [
    asset('js/app/modules/institution/mensajeRectora.js')
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-title px-5"><span class="px-2"><?= $escape($kicker) ?></span></p>
            <h1 class="display-4 fw-bold mt-2"><?= $escape($title) ?></h1>
        </div>

        <div class="row align-items-stretch">
            <div class="col-lg-4 mb-4">
                <div class="card-main p-4 h-100">
                    <div class="icon-circle"><i class="fas fa-quote-left"></i></div>
                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <p><strong><?= $escape($greeting) ?></strong></p>
                        <?php foreach ($introParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4 d-flex align-items-center justify-content-center">
                <img
                    class="img-fluid foto-rectora-hex"
                    src="<?= $escape($photo) ?>"
                    alt="<?= $escape($photoAlt) ?>"
                />
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card-main p-4 h-100">
                    <div class="icon-circle"><i class="fas fa-heart"></i></div>
                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($closingParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 contenedor-frase-final text-center mt-5">
                <strong id="frase-animada" class="frase-premium d-block mb-3">
                    <?= $escape($finalPhrase) ?>
                </strong>
                <div class="mt-3">
                    <h4 class="mb-0 font-weight-bold"><?= $escape($signatureName) ?></h4>
                    <p class="text-muted"><?= $escape($signatureRole) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';