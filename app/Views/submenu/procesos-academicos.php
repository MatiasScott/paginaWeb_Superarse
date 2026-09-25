<?php

declare(strict_types=1);

// MVC SubMenu - Procesos Académicos

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 text-center pb-4">
                <p class="section-title px-5 d-inline-block">
                    <span class="px-2"><?= $escape($kicker) ?></span>
                </p>
                <h1 class="mb-4 titulo-institucional"><?= $escape($title) ?></h1>
            </div>

            <div class="col-lg-12">
                <div class="card-main p-3 p-md-4 border rounded shadow-sm bg-white">
                    <div style="width: 100%;">
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 8px;">
                            <iframe
                                title="Procesos Académicos Genially"
                                frameborder="0"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                src="<?= $escape($genially) ?>"
                                type="text/html"
                                allowscriptaccess="always"
                                allowfullscreen="true"
                                scrolling="yes"
                                allownetworking="all">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-15 col-md-12">

                <div class="codigo-card p-4 p-md-5 shadow-sm" style="border-radius: 15px; background: #fff; border-top: 5px solid #003366;">

                    <div class="d-flex justify-content-center mb-3">
                        <div class="icon-circle shadow-sm" style="width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; border: 2px;">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                    </div>

                    <h3 class="mb-4 text-center titulo-institucional" style="font-size: 1.8rem;">Calendarios Académicos</h3>

                    <div class="mb-4">
                        <p class="text-muted lh-lg" style="text-align: justify;">
                            Mantente informado sobre las fechas clave del período lectivo,
                            incluyendo inicio y fin de clases, periodos de exámenes,
                            recesos y eventos importantes. Selecciona el calendario que
                            necesitas:
                        </p>
                    </div>

                    <div class="list-group-scrollable pr-2" style="max-height: 500px; overflow-y: auto;">
                        <ul class="list-group list-group-flush">
                            <?php foreach ($calendarios as $item): ?>
                                <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-center border shadow-sm mb-3 rounded p-3">
                                    <span class="font-weight-bold mb-2 mb-md-0 text-dark"><?= $escape($item['titulo']) ?></span>
                                    <a href="<?= $escape($item['enlace']) ?>" target="_blank" class="btn btn-info rounded-pill px-4 shadow-sm">
                                        <i class="fa fa-file-pdf mr-2"></i> Ver PDF
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="color-bar-container">
    <div class="color-stripe color-stripe-1"></div>
    <div class="color-stripe color-stripe-2"></div>
    <div class="color-stripe color-stripe-3"></div>
    <div class="color-stripe color-stripe-4"></div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';