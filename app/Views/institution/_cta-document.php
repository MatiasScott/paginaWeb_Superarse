<?php
declare(strict_types=1);
// Partial Servicios - caja CTA de descarga de documento PDF
$cta = $cta ?? [];
$buttons = is_array($cta['buttons'] ?? null) ? $cta['buttons'] : [];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<div class="row mt-5 justify-content-center">
    <div class="col-lg-10">
        <div class="cta-pdf-box">
            <h3 class="mb-4"><?= $escape((string) ($cta['heading'] ?? '')) ?></h3>
            <p class="mb-4"><?= $escape((string) ($cta['text'] ?? '')) ?></p>
            <?php if ($buttons !== []): ?>
                <div class="d-flex flex-row justify-content-center align-items-center flex-wrap">
                    <?php foreach ($buttons as $button): ?>
                        <?php
                        $link = (string) ($button['link'] ?? '#');
                        $label = (string) ($button['label'] ?? 'Ver PDF');
                        $year = (string) ($button['year'] ?? '');
                        ?>
                        <a href="<?= $escape(url($link)) ?>" target="_blank" class="btn-white-action mx-3 my-2">
                            <i class="fa fa-file-pdf mr-2"></i> <?= $escape($label) ?>
                            <?php if ($year !== ''): ?>
                                <span class="d-block font-weight-bold"><?= $escape($year) ?></span>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <a href="<?= $escape(url((string) ($cta['link'] ?? '#'))) ?>" target="_blank" class="btn-white-action">
                    <i class="fa fa-file-pdf mr-2"></i> <?= $escape((string) ($cta['buttonText'] ?? 'Ver PDF')) ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>