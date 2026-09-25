<?php
declare(strict_types=1);
// Partial Servicios - caja CTA de descarga de documento PDF
$cta = $cta ?? [];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<div class="row mt-5 justify-content-center">
    <div class="col-lg-10">
        <div class="cta-pdf-box">
            <h3 class="mb-4"><?= $escape((string) ($cta['heading'] ?? '')) ?></h3>
            <p class="mb-4"><?= $escape((string) ($cta['text'] ?? '')) ?></p>
            <a href="<?= $escape((string) ($cta['link'] ?? '#')) ?>" target="_blank" class="btn-white-action">
                <i class="fa fa-file-pdf mr-2"></i> <?= $escape((string) ($cta['buttonText'] ?? 'Ver PDF')) ?>
            </a>
        </div>
    </div>
</div>