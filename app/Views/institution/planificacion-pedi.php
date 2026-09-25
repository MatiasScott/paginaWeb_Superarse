<?php
declare(strict_types=1);
// Vista MVC Institución - plan estratégico de desarrollo institucional
$title = $title ?? 'Planificacion - PEDI';
$kicker = $kicker ?? '';
$paragraphs = $paragraphs ?? [];
$pillars = $pillars ?? [];
$cta = $cta ?? [];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card-main p-4 p-md-5 shadow-sm bg-white rounded-lg">
                    <div class="d-flex justify-content-center mb-4">
                        <div class="icon-circle shadow-sm">
                            <i class="fas fa-chess-knight"></i>
                        </div>
                    </div>

                    <div class="text-center pb-2">
                        <p class="section-title px-2 px-md-5 d-inline-block">
                            <span class="px-2"><?= $escape($kicker) ?></span>
                        </p>
                        <h1 class="mb-4 mt-3 font-weight-bold">
                            <?= $escape($title) ?>
                        </h1>
                    </div>

                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($paragraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($pillars as $pilar): ?>
                <div class="col-md-4 mb-4">
                    <div class="pilar-card shadow-sm h-100 p-4 border-0 bg-white" style="border-radius: 15px;">
                        <div class="icon-box mb-3" style="font-size: 2rem; color: var(--primary);"><i class="<?= $escape((string) $pilar['icon']) ?>"></i></div>
                        <h4 class="titulo-institucional"><?= $escape((string) $pilar['title']) ?></h4>
                        <p class="small text-muted"><?= $escape((string) $pilar['text']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-lg-10">
                <div class="cta-pdf-box p-5 text-center shadow" style="border-radius: 20px; background: linear-gradient(45deg, var(--primary), #003366);">
                    <h3 class="mb-3 text-white"><?= $escape((string) $cta['heading']) ?></h3>
                    <p class="mb-4 text-white"><?= $escape((string) $cta['text']) ?></p>
                    <a href="<?= $escape((string) $cta['link']) ?>" target="_blank" class="btn btn-light btn-lg rounded-pill px-5 fw-bold">
                        <i class="fa fa-file-pdf mr-2"></i> <?= $escape((string) $cta['buttonText']) ?>
                    </a>
                    <div class="mt-4">
                        <small class="text-white-50"><?= $escape((string) $cta['note']) ?></small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';