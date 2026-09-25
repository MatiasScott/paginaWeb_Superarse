<?php

declare(strict_types=1);

// MVC Institution - Prácticas
$headerText = 'Instituto Superior Tecnológico Superarse';

$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="text-center pb-2">
        <p class="section-title px-5">
            <span class="px-2"><?= $escape($kicker) ?></span>
        </p>
        <h1 class="mb-4"><?= $escape($title) ?></h1>
    </div>

    <div class="container">
        <!-- Carrusel Dinámico -->
        <div id="carouselExampleAutoplay" class="carousel slide carousel-fade mb-4" data-bs-ride="carousel" data-bs-interval="2500">
            <div class="carousel-inner">
                <?php foreach ($carrusel as $index => $item): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= $escape($item['imagen']) ?>" class="d-block w-100 carousel-img-full" alt="<?= $escape($item['carrera']) ?>" />
                        <div class="carousel-caption">
                            <h5 style="color: aqua;"><?= $escape($item['carrera']) ?></h5>
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

        <p style="text-align: justify;">
            <strong>Las prácticas preprofesionales son una etapa crucial en la formación académica y profesional de los estudiantes. Más que un requisito curricular, representan un puente vital entre el conocimiento teórico adquirido en el aula y la experiencia práctica en el mundo laboral real.</strong>
        </p>

        <br>

        <div class="row align-items-center justify-content-center pasem-section">
            <div class="col-12 text-center text-md-start">
                <h3 style="text-align: center">¿Por qué son tan importantes?</h3>
                <br />
                <p style="text-align: justify;" class="pasem-text">
                    Las prácticas preprofesionales son una etapa crucial en la formación académica y profesional de los estudiantes. Más que un requisito curricular, representan un puente vital entre el conocimiento teórico adquirido en el aula y la experiencia práctica en el mundo laboral real.
                </p>
                <ul style="text-align: left;" class="list-unstyled">
                    <li style="text-align: justify;" class="mb-3">
                        <i class="fas fa-check-circle text-success me-2"></i><strong>Aplicación de conocimientos:</strong> Permiten a los estudiantes aplicar lo que han aprendido en un entorno de trabajo real, consolidando su comprensión y habilidades. Esto no solo refuerza la teoría, sino que también les muestra cómo resolver problemas y enfrentar desafíos de la vida real.
                    </li>
                    <li style="text-align: justify;" class="mb-3">
                        <i class="fas fa-check-circle text-success me-2"></i><strong>Desarrollo de habilidades:</strong> Ayudan a desarrollar competencias blandas esenciales como el trabajo en equipo, la comunicación efectiva, la resolución de problemas, y la adaptabilidad. Estas habilidades son altamente valoradas por los empleadores.
                    </li>
                    <li style="text-align: justify;" class="mb-3">
                        <i class="fas fa-check-circle text-success me-2"></i><strong>Exploración de carrera:</strong> Ofrecen la oportunidad de explorar diferentes roles y sectores dentro de su campo de estudio. Esta experiencia práctica puede confirmar una elección de carrera o ayudar a descubrir un nuevo camino profesional.
                    </li>
                    <li style="text-align: justify;" class="mb-3">
                        <i class="fas fa-check-circle text-success me-2"></i><strong>Contactos:</strong> Brindan la posibilidad de establecer contactos valiosos con profesionales del sector. Estas conexiones pueden convertirse en referencias y futuras oportunidades de empleo.
                    </li>
                </ul>
            </div>

            <!-- Modalidades Dinámicas (Renderizado 1:1 desde PHP) -->
            <div class="mt-4">
                <h3 class="mb-3">Modalidades</h3>
                <p style="text-align: justify;">
                    En el Instituto Superior Tecnológico Superarse, entendemos que cada estudiante tiene una realidad única. Por ello, ponemos a tu disposición cuatro modalidades para validar tus prácticas preprofesionales, permitiéndote elegir la opción que mejor se ajuste a tu tiempo y a tus actividades diarias.
                </p>
                <div class="row mt-4">
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <div class="list-group" id="list-tab" role="tablist">
                            <?php foreach ($modalidades as $index => $mod): ?>
                                <a 
                                    class="list-group-item list-group-item-action <?= $index === 0 ? 'active' : '' ?>" 
                                    id="<?= $escape($mod['id']) ?>-list" 
                                    data-bs-toggle="list" 
                                    href="#<?= $escape($mod['id']) ?>" 
                                    role="tab"
                                >
                                    <?= $escape($mod['nombre']) ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-12 col-md-8">
                        <div class="tab-content border p-4 rounded bg-white shadow-sm" id="nav-tabContent" style="text-align: justify;">
                            <?php foreach ($modalidades as $index => $mod): ?>
                                <div 
                                    class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" 
                                    id="<?= $escape($mod['id']) ?>" 
                                    role="tabpanel"
                                >
                                    <h5 class="text-primary mb-3"><?= $escape($mod['nombre']) ?></h5>
                                    <p class="texto-justificado m-0"><?= $escape($mod['texto']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mt-5">
                <a class="btn btn-primary" href="<?= asset('Practicas') ?>" target="_blank">
                    <i class="fas fa-file-alt me-2"></i>Reglamento de Prácticas
                </a>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';