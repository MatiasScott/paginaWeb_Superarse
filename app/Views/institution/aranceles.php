<?php

declare(strict_types=1);
// MVC Servicios - Aranceles
$title = 'Aranceles Institucionales';
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

        <div class="row justify-content-center">
            <?php foreach ($aranceles as $arancel): ?>
                <div class="col-lg-6 mb-4">
                    <div class="d-flex align-items-center bg-light p-4 rounded">
                        <div class="bg-primary text-white text-center rounded-circle p-3" style="width: 65px; height: 65px;">
                            <i class="fa fa-file-pdf fa-2x"></i>
                        </div>
                        <div class="ml-4">
                            <h4><?= $escape($arancel['titulo']) ?></h4>
                            <p class="m-0"><?= $escape($arancel['descripcion']) ?></p>
                            <a href="<?= $escape($arancel['url']) ?>" class="btn btn-sm btn-outline-primary mt-2" download>
                                Descargar
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';