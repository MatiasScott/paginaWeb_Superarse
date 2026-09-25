<?php

declare(strict_types=1);

// MVC Institución - Presencia en la Comunidad

$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
];

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

        <!-- Carrusel Dinámico -->
        <div id="carouselExampleAutoplay" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1900">
            <div class="carousel-inner">
                <?php foreach ($carrusel as $index => $item): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img
                            src="<?= $escape($item['imagen']) ?>"
                            class="d-block w-100 carousel-img-full"
                            alt="<?= $escape($item['titulo']) ?>"
                        />
                        <div class="carousel-caption">
                            <h5 style="color: aqua;"><?= $escape($item['titulo']) ?></h5>
                            <p><?= $escape($item['descripcion']) ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplay" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplay" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row align-items-center justify-content-center pasem-section container-top" style="background-color:#f0f0f0;margin-top:20px">
            <div class="col-12 col-md-8 col-lg-9 text-center text-md-start">
                <p style="text-align:justify;" class="pasem-text">
                    Desde el Instituto Superarse, consciente de su rol fundamental en la sociedad, mantiene una presencia activa y comprometida en la comunidad.
                    Más allá de su labor educativa en las aulas, la institución busca ser un motor de cambio y desarrollo local a través de diversas iniciativas.
                    Esta presencia se manifiesta en la organización de <strong>eventos culturales y deportivos</strong>, campañas de <strong>servicio comunitario</strong>
                    y la colaboración con organizaciones de educación media para estudiantes de bachillerato.
                </p>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';