<?php
declare(strict_types=1);
// Partial Servicios - tarjeta hero (icono + kicker + título + párrafos)
$heroIcon = $heroIcon ?? 'fas fa-file-alt';
$heroKicker = $heroKicker ?? '';
$heroTitle = $heroTitle ?? '';
$heroParagraphs = $heroParagraphs ?? [];
$heroTitleUppercase = $heroTitleUppercase ?? false;

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<div class="row mb-5">
    <div class="col-lg-12">
        <div class="card-main p-4 p-md-5 shadow-sm">
            <div class="d-flex flex-column align-items-center text-center">
                <div class="d-flex justify-content-center mb-3">
                    <div class="icon-circle shadow-sm">
                        <i class="<?= $escape($heroIcon) ?>"></i>
                    </div>
                </div>
                <div class="pb-2">
                    <p class="section-title px-2 px-md-5 d-inline-block">
                        <span class="px-2"><?= $escape($heroKicker) ?></span>
                    </p>
                    <?php if ($heroTitleUppercase): ?>
                        <h1 class="mb-4 mt-2 font-weight-bold text-uppercase"><?= $escape($heroTitle) ?></h1>
                    <?php else: ?>
                        <h1 class="mb-4 mt-2 font-weight-bold"><?= $escape($heroTitle) ?></h1>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                <?php foreach ($heroParagraphs as $parrafo): ?>
                    <p><?= $escape($parrafo) ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>