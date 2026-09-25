<?php

declare(strict_types=1);
// MVC Servicios - Remuneración Mensual
$title = 'Remuneración Mensual';
$headerText = 'Instituto Superior Tecnológico Superarse';

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <?php require ROOT_PATH . '/app/Views/institution/_hero-document.php'; ?>

        <div class="row g-4">
            <?php foreach ($pillars as $pilar): ?>
                <div class="col-md-4 mb-4">
                    <div class="pilar-card shadow-sm h-100 p-4 border-0 bg-white" style="border-radius: 15px;">
                        <div class="icon-box mb-3" style="font-size: 2rem; color: #003366;">
                            <i class="<?= htmlspecialchars($pilar['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>
                        </div>
                        <h4 class="titulo-institucional"><?= htmlspecialchars($pilar['title'], ENT_QUOTES, 'UTF-8') ?></h4>
                        <p class="small text-muted"><?= htmlspecialchars($pilar['text'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php require ROOT_PATH . '/app/Views/institution/_cta-document.php'; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';