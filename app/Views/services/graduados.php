<?php
declare(strict_types=1);
// Vista MVC Servicios - Graduados (render server-side)
$title = $title ?? 'Graduados';
$beneficios = $beneficios ?? [];
$servicios = $servicios ?? [];
$formulario = $formulario ?? [];
$contacto = $contacto ?? [];
$estadisticasCarreras = $estadisticasCarreras ?? [];
$ofertasLaboralesImagenes = $ofertasLaboralesImagenes ?? [];
$extraScripts = [];
$extraStyles = asset('css/graduados.css');

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

$anios = [];
foreach ($estadisticasCarreras as $carrera) {
    foreach (array_keys($carrera['anios']) as $anio) {
        $anios[$anio] = true;
    }
}
ksort($anios);
$anios = array_keys($anios);

$totalesPorAnio = array_fill_keys($anios, 0);
$totalGeneral = 0;
foreach ($estadisticasCarreras as $carrera) {
    foreach ($carrera['anios'] as $anio => $valor) {
        $valor = (int) $valor;
        if (array_key_exists($anio, $totalesPorAnio)) {
            $totalesPorAnio[$anio] += $valor;
        }
        $totalGeneral += $valor;
    }
}

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container servicios-shell">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">COMUNIDAD DE EXALUMNOS</span>
            </p>
            <h1 class="mb-4">Graduados</h1>
        </div>
        <p class="mb-5 text-center px-lg-5" id="graduados-descripcion">
            Este espacio está orientado a mantener el vínculo con nuestros graduados, facilitar su actualización profesional y fortalecer la red de oportunidades académicas y laborales.
        </p>

        <div class="row mb-5" id="graduados-kpis">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="graduados-kpi h-100">
                    <div class="graduados-kpi-label">Graduados Totales</div>
                    <div class="graduados-kpi-value" id="kpi-graduados-totales"><?= number_format($totalGeneral, 0, ',', '.') ?></div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6 mb-4">
                <div class="graduados-kpi graduados-kpi-empleabilidad h-100">
                    <div class="graduados-kpi-label">Empleabilidad</div>
                    <div class="graduados-kpi-grid">
                        <div class="graduados-kpi-total">
                            <div class="graduados-kpi-value">7 </div>
                            <div class="graduados-kpi-note">de cada </div>
                        </div>
                        <div class="graduados-kpi-split">
                            <div class="graduados-kpi-split-item">
                                <div class="graduados-kpi-value">10</div>
                                <div class="graduados-kpi-note">estudiantes poseen un empleo. </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="graduados-panel mb-5">
            <h3 class="mb-3">Graduados por año y carrera</h3>
            <p class="text-muted mb-3">
                Resumen de graduados por periodo académico para las carreras de la oferta académica.
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered align-middle mb-0" id="graduados-tabla">
                    <thead>
                        <tr>
                            <th>Carrera</th>
                            <?php foreach ($anios as $anio): ?>
                                <th class="text-center"><?= (int) $anio ?></th>
                            <?php endforeach; ?>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estadisticasCarreras as $carrera): ?>
                            <?php $totalCarrera = 0; ?>
                            <tr>
                                <th><?= $escape((string) $carrera['carrera']) ?></th>
                                <?php foreach ($anios as $anio): ?>
                                    <?php
                                    $valor = (int) ($carrera['anios'][$anio] ?? 0);
                                    $totalCarrera += $valor;
                                    ?>
                                    <td class="text-center"><?= $valor ?></td>
                                <?php endforeach; ?>
                                <td class="text-center font-weight-bold"><?= $totalCarrera ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total por año</th>
                            <?php foreach ($anios as $anio): ?>
                                <td class="text-center"><?= $totalesPorAnio[$anio] ?></td>
                            <?php endforeach; ?>
                            <td class="text-center"><?= $totalGeneral ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="container">
            <div class="row mb-5 justify-content-center" id="graduados-beneficios">
                <?php foreach ($beneficios as $item): ?>
                    <div class="col-lg-3 col-md-6 mb-4">
                        <a href="<?= $escape((string) $item['enlace']) ?>" class="text-decoration-none shadow-hover-link" target="_blank">
                            <div class="graduados-card h-100 text-center border-0 shadow-sm p-4">
                                <div class="graduados-icono mb-3">
                                    <i class="<?= $escape((string) $item['icono']) ?> fa-2x"></i>
                                </div>
                                <h5 class="fw-bold text-dark"><?= $escape((string) $item['titulo']) ?></h5>
                                <p class="text-muted small mb-0"><?= $escape((string) $item['descripcion']) ?></p>
                                <div class="mt-3 text-primary fw-bold small">Ingresa <i class="fas fa-chevron-right ms-1"></i></div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="graduados-panel h-100">
                    <h3 class="mb-3">Servicios para graduados</h3>
                    <ul class="list-group list-group-flush" id="graduados-servicios">
                        <?php foreach ($servicios as $servicio): ?>
                            <li class="list-group-item">
                                <i class="fas fa-check-circle text-primary mr-2"></i><?= $escape((string) $servicio) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="graduados-panel h-100">
                    <h3 class="mb-3">Contacto</h3>
                    <div id="graduados-contacto">
                        <p class="mb-2"><i class="fas fa-envelope text-primary mr-2"></i><?= $escape((string) $contacto['correo']) ?></p>
                        <p class="mb-2"><i class="fas fa-phone-alt text-primary mr-2"></i><?= $escape((string) $contacto['telefono']) ?></p>
                        <p class="mb-0"><i class="fas fa-clock text-primary mr-2"></i><?= $escape((string) $contacto['horario']) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="graduados-panel">
            <h3 class="mb-2 text-uppercase text-center text-primary">Ofertas laborales para graduados</h3>
            <p class="mb-4 text-center"><strong>JUNIO 2026</strong></p>

            <div
                id="graduados-ofertas-carousel"
                class="carousel slide carousel-fade"
                data-ride="carousel"
                data-interval="2500"
            >
                <div class="carousel-inner">
                    <?php foreach ($ofertasLaboralesImagenes as $index => $imagen): ?>
                        <div class="carousel-item<?= $index === 0 ? ' active' : '' ?>">
                            <img src="<?= $escape($imagen) ?>" class="d-block mx-auto graduados-oferta-img" alt="Oferta laboral <?= (int) $index + 1 ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>

                <a class="carousel-control-prev" href="#graduados-ofertas-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#graduados-ofertas-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';