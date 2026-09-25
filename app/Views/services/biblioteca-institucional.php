<?php
declare(strict_types=1);
// Vista MVC Servicios - Biblioteca Institucional (render server-side)
$title = $title ?? 'Biblioteca Institucional';
$hero = $hero ?? [];
$servicios = $servicios ?? [];
$basesDeDatos = $basesDeDatos ?? [];
$horarios = $horarios ?? [];
$contacto = $contacto ?? [];
$reglamento = $reglamento ?? [];
$extraScripts = [];
$extraStyles = asset('css/biblioteca.css');

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container servicios-shell">

        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="pr-2">Servicios Institucionales</span>
            </p>
            <h1 class="mb-4">Biblioteca Institucional</h1>
            <p class="mb-5 px-lg-5">
                Centro de Recursos para el Aprendizaje y la Investigación. Aquí encontrarás
                servicios de préstamo, catálogo en línea, acceso a bases de datos y orientación
                bibliográfica para apoyar tu formación académica.
            </p>
        </div>

        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="bib-panel h-100">
                    <h3 class="mb-3"><i class="fas fa-clock text-primary mr-2"></i>Horarios de atención</h3>
                    <table class="bib-horarios-tabla">
                        <tbody id="biblioteca-horarios">
                            <?php foreach ($horarios as $h): ?>
                                <tr>
                                    <td><i class="fas fa-calendar-day mr-2 text-primary"></i><?= $escape((string) $h['dia']) ?></td>
                                    <td class="font-weight-bold"><?= $escape((string) $h['horario']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bib-panel h-100">
                    <h3 class="mb-3"><i class="fas fa-address-card text-primary mr-2"></i>Contacto</h3>
                    <div id="biblioteca-contacto">
                        <div class="bib-contacto-item">
                            <i class="fas fa-map-marker-alt text-primary"></i>
                            <span><?= $escape((string) $contacto['ubicacion']) ?></span>
                        </div>
                        <div class="bib-contacto-item">
                            <i class="fas fa-phone-alt text-primary"></i>
                            <span><?= $escape((string) $contacto['telefono']) ?></span>
                        </div>
                        <div class="bib-contacto-item">
                            <i class="fas fa-envelope text-primary"></i>
                            <a href="mailto:<?= $escape((string) $contacto['email']) ?>"><?= $escape((string) $contacto['email']) ?></a>
                        </div>
                        <div class="bib-contacto-item">
                            <i class="fas fa-user-tie text-primary"></i>
                            <span><?= $escape((string) $contacto['responsable']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="pr-2">Atención al Estudiante</span>
            </p>
            <h2 class="mb-4">Nuestros Servicios</h2>
        </div>
        <div class="row mb-5" id="biblioteca-servicios">
            <?php foreach ($servicios as $s): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bib-servicio-card h-100">
                        <div class="bib-servicio-icono" style="background:<?= $escape((string) $s['color']) ?>15; color:<?= $escape((string) $s['color']) ?>">
                            <i class="<?= $escape((string) $s['icono']) ?>"></i>
                        </div>
                        <h5><?= $escape((string) $s['titulo']) ?></h5>
                        <p><?= $escape((string) $s['descripcion']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="pr-2">Recursos Académicos</span>
            </p>
            <h2 class="mb-4">Bases de Datos</h2>
        </div>
        <div class="row justify-content-center mb-5" id="biblioteca-bases">
            <?php foreach ($basesDeDatos as $b): ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <a href="<?= $escape((string) $b['url']) ?>" target="_blank" class="bib-base-card text-decoration-none" title="<?= $escape((string) $b['descripcion']) ?>">
                        <div class="bib-base-icono" style="color:<?= $escape((string) $b['color']) ?>">
                            <i class="<?= $escape((string) $b['icono']) ?> fa-2x"></i>
                        </div>
                        <span class="bib-base-nombre"><?= $escape((string) $b['nombre']) ?></span>
                        <small class="bib-base-desc"><?= $escape((string) $b['descripcion']) ?></small>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="bib-panel" id="informacion">
            <div id="biblioteca-reglamento">
                <h5 class="bib-reglamento-titulo"><i class="fas fa-gavel mr-2"></i><?= $escape((string) $reglamento['titulo']) ?></h5>
                <ul class="bib-reglamento-lista">
                    <?php foreach ($reglamento['items'] as $item): ?>
                        <li><i class="fas fa-check-circle text-primary mr-2"></i><?= $escape((string) $item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';