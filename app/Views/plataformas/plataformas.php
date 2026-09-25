<?php

declare(strict_types=1);

// MVC Institución - Plataformas Instituto Superarse

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="body-plataforma">
    <div class="container-fluid py-5 container-top">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2"><?= $escape($kicker) ?></span>
                </p>
                <h1 class="mb-4"><?= $escape($title) ?></h1>
            </div>
            <div class="plataformas-grid">
                <?php foreach ($plataformas as $item): ?>
                    <div class="plataforma-item">
                        <a href="<?= $escape($item['enlace']) ?>" target="_blank" rel="noopener">
                            <img
                                class="img-plataformas"
                                src="<?= $escape($item['imagen']) ?>"
                                alt="<?= $escape($item['alt']) ?>"
                            />
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';