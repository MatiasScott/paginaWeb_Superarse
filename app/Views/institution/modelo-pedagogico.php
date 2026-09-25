<?php

declare(strict_types=1);
// MVC Institución - Modelo Pedagógico
$title = 'Modelo Pedagógico';
$headerText = 'Instituto Superior Tecnológico Superarse';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <p class="section-title pr-5">
                    <span class="pr-2"><?= $escape($kicker) ?></span>
                </p>
                <h1 class="mb-4 titulo-institucional"><?= $escape($title) ?></h1>

                <div class="texto-justificado px-md-2">
                    <?php foreach ($paragraphs as $parrafo): ?>
                        <p><?= $escape($parrafo) ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php require ROOT_PATH . '/app/Views/institution/_cta-document.php'; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';