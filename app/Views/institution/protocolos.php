<?php

declare(strict_types=1);
// MVC Institución - Protocolos Institucionales
$title = 'Protocolos Institucionales';
$headerText = 'Instituto Superior Tecnológico Superarse';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2"><?= $escape($kicker) ?></span>
            </p>
            <h1 class="mb-4"><?= $escape($title) ?></h1>
        </div>

        <?php foreach ($protocols as $index => $proto): ?>
            <?php $restId = 'protocolo' . ($index + 1) . '-rest'; ?>
            <div class="models-card-premium <?= $index === 0 ? 'mb-5' : '' ?>">
                <div class="row align-items-start">
                    <div class="col-lg-7">
                        <h4 class="mb-3"><?= $escape($proto['heading']) ?></h4>
                        <?php foreach ($proto['intro'] as $parrafo): ?>
                            <p style="text-align: justify;"><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>

                        <div id="<?= $escape($restId) ?>" style="display: none">
                            <?php foreach ($proto['extra'] as $parrafo): ?>
                                <p style="text-align: justify;"><?= $escape($parrafo) ?></p>
                            <?php endforeach; ?>
                        </div>

                        <button class="btn btn-link p-0 font-weight-bold"
                                onclick="toggleText('<?= $escape($restId) ?>', this)"
                                style="color: #17a2b8;">
                            <?= $escape($buttonLabel) ?>
                        </button>
                    </div>
                    <div class="col-lg-5 text-center">
                        <ul id="documentos-list">
                            <li>
                                <a href="<?= $escape(url($proto['document']['link'])) ?>" target="_blank" class="doc-item-link">
                                    <i class="fas fa-file-pdf icon-badge"></i>
                                    <span><?= $escape($proto['document']['title']) ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';