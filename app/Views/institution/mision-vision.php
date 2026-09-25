<?php
declare(strict_types=1);
// Vista MVC Institución - misión, visión y valores
$title = $title ?? 'Misión, Visión y Valores';
$mission = $mission ?? '';
$vision = $vision ?? '';
$video = $video ?? '';
$valores = $valores ?? [];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="text-center mb-5">
        <p class="section-title px-5"><span class="px-2">Nuestra Esencia</span></p>
        <h1 class="display-4 fw-bold mt-2">Instituto Superarse</h1>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-lg-8">
            <div class="video-modern-wrapper">
                <video controls autoplay muted playsinline>
                    <source src="<?= $escape($video) ?>" type="video/mp4" />
                </video>
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row g-4">
        <div class="col-md-6 mb-4">
            <div class="card-main p-4 p-lg-5">
                <div class="icon-circle"><i class="fas fa-rocket"></i></div>
                <h2 class="fw-bold mb-3">Misión</h2>
                <p class="text-muted lh-lg text-justify"><?= $escape($mission) ?></p>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card-main p-4 p-lg-5">
                <div class="icon-circle"><i class="fas fa-lightbulb"></i></div>
                <h2 class="fw-bold mb-3">Visión</h2>
                <p class="text-muted lh-lg text-justify"><?= $escape($vision) ?></p>
            </div>
        </div>
    </div>
</div>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6">Valores Institucionales</h2>
            <p class="text-muted">Los pilares que guían nuestro comportamiento y decisiones.</p>
        </div>
        <div id="contenedor-valores-cards">
            <?php foreach ($valores as $valor): ?>
                <div class="card-valor-pro">
                    <div class="icon-wrapper-pro"><i class="<?= $escape((string) $valor['icono']) ?>"></i></div>
                    <h4><?= $escape((string) $valor['nombre']) ?></h4>
                    <p><?= $escape((string) $valor['texto']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';