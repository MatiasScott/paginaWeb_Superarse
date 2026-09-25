<?php

declare(strict_types=1);
// MVC Servicios - Estado Financiero
$title = 'Estado Financiero Institucional';
$headerText = 'Instituto Superior Tecnológico Superarse';

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <?php require ROOT_PATH . '/app/Views/institution/_hero-document.php'; ?>
        <?php require ROOT_PATH . '/app/Views/institution/_cta-document.php'; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';