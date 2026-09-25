<?php
declare(strict_types=1);
// Vista MVC Servicios - Residencia Estudiantil (render server-side)
$title = $title ?? 'Residencia Estudiantil';
$titulo = $titulo ?? 'Residencia Estudiantil';
$subtitulo = $subtitulo ?? '';
$carrusel = $carrusel ?? [];
$horarios = $horarios ?? [];
$contacto = $contacto ?? [];
$servicios = $servicios ?? [];
$cierre = $cierre ?? [];
$extraScripts = [];
$extraStyles = asset('css/biblioteca.css');

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container servicios-shell">

        <!-- Encabezado Principal -->
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="pr-2">Servicios Institucionales</span>
            </p>
            <h1 class="mb-4"><?= $escape($titulo) ?></h1>
            <h4 class="text-primary mb-3"><?= $escape($subtitulo) ?></h4>
            <p class="mb-4 px-lg-5">
                En el Instituto Superior Tecnológico Superarse contamos con Residencia Estudiantil diseñada especialmente para brindar comodidad, seguridad y bienestar a nuestros estudiantes durante su permanencia en la institución.
            </p>
            <p class="mb-5 px-lg-5">
                Este espacio está pensado para quienes visitan nuestro campus por clases, talleres, congresos, proyectos académicos, prácticas o cualquier otra actividad formativa, permitiéndoles hospedarse en un ambiente tranquilo, cómodo y seguro.
            </p>
        </div>

        <!-- Carrusel de Imágenes de la Residencia -->
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-10">
                <div id="carruselResidencia" class="carousel slide shadow rounded overflow-hidden" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php foreach ($carrusel as $index => $slide): ?>
                            <li data-target="#carruselResidencia" data-slide-to="<?= (int) $index ?>"<?= $index === 0 ? ' class="active"' : '' ?>></li>
                        <?php endforeach; ?>
                    </ol>

                    <div class="carousel-inner">
                        <?php foreach ($carrusel as $index => $slide): ?>
                            <div class="carousel-item<?= $index === 0 ? ' active' : '' ?>">
                                <img src="<?= $escape((string) $slide['imagen']) ?>" class="d-block w-100 residencia-carrusel-img" alt="<?= $escape((string) $slide['alt']) ?>">
                                <div class="carousel-caption d-none d-md-block bg-dark-50 rounded p-2">
                                    <h5><?= $escape((string) $slide['titulo']) ?></h5>
                                    <p><?= $escape((string) $slide['descripcion']) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <a class="carousel-control-prev" href="#carruselResidencia" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carruselResidencia" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Paneles de Horarios de Check-in / Check-out y Contacto -->
        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="bib-panel h-100">
                    <h3 class="mb-3"><i class="fas fa-clock text-primary mr-2"></i>Horarios de Ingreso y Salida</h3>
                    <table class="bib-horarios-tabla w-100">
                        <tbody>
                            <tr>
                                <td><strong>Check-in:</strong></td>
                                <td class="text-right"><?= $escape((string) $horarios['checkIn']) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Check-out:</strong></td>
                                <td class="text-right"><?= $escape((string) $horarios['checkOut']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bib-panel h-100">
                    <h3 class="mb-3"><i class="fas fa-address-card text-primary mr-2"></i>Contacto y Reservas</h3>
                    <div id="residencia-contacto">
                        <p class="mb-2"><i class="fas fa-envelope text-primary mr-2"></i><?= $escape((string) $contacto['email']) ?></p>
                        <p class="mb-0"><i class="fas fa-info-circle text-primary mr-2"></i><?= $escape((string) $contacto['info']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Servicios / Beneficios que Ofrecen -->
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="pr-2">Atención al Estudiante</span>
            </p>
            <h2 class="mb-4">Nuestras Habitaciones Ofrecen</h2>
        </div>

        <div class="row mb-5" id="residencia-servicios">
            <?php foreach ($servicios as $idx => $servicio): ?>
                <div class="<?= $idx >= 3 ? 'col-md-6' : 'col-md-4' ?> mb-4">
                    <div class="bib-panel h-100 text-center">
                        <i class="<?= $escape((string) $servicio['icono']) ?> fa-2x text-primary mb-3"></i>
                        <h5><?= $escape((string) $servicio['titulo']) ?></h5>
                        <p class="mb-0"><?= $escape((string) $servicio['descripcion']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Mensaje de Cierre / Experiencia -->
        <div class="bib-panel text-center p-4 mb-5" id="informacion">
            <h3 class="mb-3 text-primary"><i class="fas fa-heart mr-2"></i><?= $escape((string) $cierre['titulo']) ?></h3>
            <p class="mb-0 px-lg-4">
                <?= $escape((string) $cierre['texto']) ?>
            </p>
        </div>

    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';