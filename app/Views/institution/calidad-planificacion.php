<?php
declare(strict_types=1);
// Vista MVC Institución - aseguramiento de la calidad y planificación
$title = $title ?? 'Aseguramiento de la Calidad y Planificación';
$kicker = $kicker ?? '';
$titleLines = $titleLines ?? [];
$sections = $sections ?? [];
$autoevaluacionCard = $autoevaluacionCard ?? [];
$pediFrameUrl = $pediFrameUrl ?? '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2"><?= $escape($kicker) ?></span>
            </p>
            <h1 class="mb-4">
                <?php foreach ($titleLines as $i => $line): ?>
                    <?= $i > 0 ? '<br>' : '' ?><?= $escape($line) ?>
                <?php endforeach; ?>
            </h1>
        </div>

        <?php foreach ($sections as $index => $section): ?>
            <div class="row align-items-center mb-5">
                <?php if ($index % 2 === 0): ?>
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card-main p-4 shadow-sm">
                            <div class="icon-circle mb-3"><i class="<?= $escape((string) $section['icon']) ?>"></i></div>
                            <h4 class="mb-3"><?= $escape((string) $section['heading']) ?></h4>
                            <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                                <?php foreach ($section['paragraphs'] as $parrafo): ?>
                                    <p><?= $parrafo ?></p>
                                <?php endforeach; ?>
                                <?php if (!empty($section['list'])): ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($section['list'] as $item): ?>
                                            <li class="mb-2"><?= $item ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-2 bg-white rounded shadow-sm">
                            <?php if (($section['media']['type'] ?? '') === 'video'): ?>
                                <video class="img-fluid rounded shadow-sm" autoplay loop muted playsinline>
                                    <source src="<?= $escape((string) $section['media']['src']) ?>" type="video/mp4">
                                </video>
                            <?php else: ?>
                                <img class="img-fluid rounded shadow-sm" src="<?= $escape((string) $section['media']['src']) ?>" alt="<?= $escape((string) $section['media']['alt']) ?>">
                            <?php endif; ?>
                            <small class="mt-2 text-muted d-block"><?= $escape((string) $section['media']['caption']) ?></small>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                        <div class="card-main p-4 shadow-sm">
                            <div class="icon-circle mb-3"><i class="<?= $escape((string) $section['icon']) ?>"></i></div>
                            <h4 class="mb-3"><?= $escape((string) $section['heading']) ?></h4>
                            <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                                <?php foreach ($section['paragraphs'] as $parrafo): ?>
                                    <p><?= $parrafo ?></p>
                                <?php endforeach; ?>
                                <?php if (!empty($section['list'])): ?>
                                    <ul class="list-unstyled">
                                        <?php foreach ($section['list'] as $item): ?>
                                            <li class="mb-2"><?= $item ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="text-center p-2 bg-white rounded shadow-sm">
                            <?php if (($section['media']['type'] ?? '') === 'video'): ?>
                                <video class="img-fluid rounded shadow-sm" autoplay loop muted playsinline>
                                    <source src="<?= $escape((string) $section['media']['src']) ?>" type="video/mp4">
                                </video>
                            <?php else: ?>
                                <img class="img-fluid rounded shadow-sm" src="<?= $escape((string) $section['media']['src']) ?>" alt="<?= $escape((string) $section['media']['alt']) ?>">
                            <?php endif; ?>
                            <small class="mt-2 text-muted d-block"><?= $escape((string) $section['media']['caption']) ?></small>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <div class="container-fluid py-5">
            <div class="container text-center">
                <div class="cards-container">
                    <a href="<?= $escape(url((string) $autoevaluacionCard['link'])) ?>" target="_blank" class="card-link">
                        <div class="card-doc">
                            <i class="<?= $escape((string) $autoevaluacionCard['icon']) ?> card-icon"></i>
                            <h4 class="card-title"><?= $escape((string) $autoevaluacionCard['title']) ?></h4>
                            <p class="card-text"><?= $escape((string) $autoevaluacionCard['text']) ?></p>
                            <span class="btn-doc"><?= $escape((string) $autoevaluacionCard['buttonText']) ?></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <br>

        <div class="visor-foto-container" style="position: relative;">
            <div class="pdf-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none;"></div>

            <iframe
                src="<?= $escape($pediFrameUrl) ?>"
                class="pdf-frame"
                style="width: 100%; height: 614px; border: none;"
                scrolling="yes">
            </iframe>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';