<?php

declare(strict_types=1);

// MVC Institution - Relaciones Interinstitucionales

$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    asset('js/app/modules/vinculacion/convenios-carousel.js'),
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row align-items-center justify-content-center pasem-section">
            <div class="col-12 text-center text-md-start">
                <div class="text-center pb-2">
                    <p class="section-title px-5">
                        <span class="px-2"><?= $escape($kicker) ?></span>
                    </p>
                    <h1 class="mb-4"><?= $escape($title) ?></h1>
                </div>
                <br />

                <!-- Carrusel Dinámico -->
                <div id="carouselExampleAutoplay" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2500">
                    <div class="carousel-inner">
                        <?php foreach ($carrusel as $index => $item): ?>
                            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                <img
                                    src="<?= $escape($item['imagen']) ?>"
                                    class="d-block w-100 carousel-img-full"
                                    alt="<?= $escape($item['alt']) ?>"
                                />
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

                <p style="text-align: justify;" class="pasem-text mt-4">
                    El Instituto Superior Tecnológico Superarse entiende las relaciones interinstitucionales como un espacio de
                    cooperación y colaboración con instituciones públicas, privadas, productivas y comunitarias, tanto a nivel nacional
                    como internacional. A través de estas alianzas se busca fortalecer la formación de los estudiantes, impulsar
                    proyectos de innovación y generar iniciativas de vinculación que contribuyan al desarrollo social y económico.
                    De esta manera, la institución reafirma su compromiso con una educación de calidad, pertinente y con impacto
                    positivo en la sociedad.
                </p>
                <ul style="text-align: left;" class="list-unstyled">
                    <li style="text-align: justify;">
                        <i class="fas fa-check-circle text-success me-2"></i>Como espacios de cooperación y colaboración.<br>
                        <i class="fas fa-check-circle text-success me-2"></i>Participación con instituciones públicas, privadas, productivas y comunitarias, a nivel nacional e internacional.<br>
                        <i class="fas fa-check-circle text-success me-2"></i>Contribución al desarrollo social y económico.<br>
                        <i class="fas fa-check-circle text-success me-2"></i>Compromiso institucional con una educación de calidad, pertinente y con impacto positivo.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container text-center">
        <h1 style="color: #7BC54A;" class="mb-4">CONVENIOS</h1>
        <h5 style="text-align: center;">Con instituciones de Educación Superior</h5>
        <div class="owl-carousel convenios-carousel">
            <?php foreach ($conveniosInstituciones as $item): ?>
                <div class="team-item p-3">
                    <div class="position-relative overflow-hidden hover-zoom">
                        <a href="<?= $escape($item['url']) ?>" data-lightbox="convenios">
                            <img class="img-fluid w-100 small-convenio" src="<?= $escape($item['url']) ?>" alt="<?= $escape($item['alt']) ?>" />
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h5 style="text-align: center;">Con Empresas Públicas y Privadas</h5>
        <div class="owl-carousel otras-fotos-carousel">
            <?php foreach ($conveniosEmpresas as $item): ?>
                <div class="team-item p-3">
                    <div class="position-relative overflow-hidden hover-zoom">
                        <a href="<?= $escape($item['url']) ?>" data-lightbox="otras-fotos">
                            <img class="img-fluid w-100 small-convenio" src="<?= $escape($item['url']) ?>" alt="<?= $escape($item['alt']) ?>" />
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h5 style="text-align: center;">Redes</h5>
        <div class="owl-carousel otras-fotos-carousel2">
            <?php foreach ($conveniosRedes as $item): ?>
                <div class="team-item p-3">
                    <div class="position-relative overflow-hidden hover-zoom">
                        <a href="<?= $escape($item['url']) ?>" data-lightbox="otras-fotos-2">
                            <img class="img-fluid w-100 small-convenio" src="<?= $escape($item['url']) ?>" alt="<?= $escape($item['alt']) ?>" />
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h1 class="text-center mt-5">Conoce más acerca de nuestro proceso</h1>
        <div class="col-12 text-center">
            <br>
            <a class="btn btn-primary" href="<?= asset('Relaciones-Inter-Institucionales') ?>" target="_blank">Solicitud de convenios</a>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-lg-7">
            <div class="p-3 mx-auto" style="max-width: 500px;">
                <h2 class="text-center text-lg-start">Coordinadores</h2>
                <p style="text-align: justify;">
                    Nosotros como Coordinación de Relaciones Interinstitucionales del Instituto Superior Tecnológico Superarse
                    impulsamos alianzas estratégicas con entidades públicas, privadas y comunitarias, a nivel nacional. Nuestra
                    misión es abrir puertas a la innovación, la vinculación y el crecimiento académico, generando oportunidades
                    que enriquecen la formación de los estudiantes y fortalecen el impacto positivo de la institución en la sociedad.
                </p>
            </div>
        </div>

        <div class="col-lg-3 d-flex justify-content-center">
            <div class="card-container">
                <div class="flip-cardp" style="min-height: 450px; max-width: 400px;">
                    <div class="flip-cardp-inner">
                        <div class="flip-cardp-front">
                            <i class="fas fa-sync-alt flip-icon"></i>
                            <img
                                src="<?= asset('assets/img/RelacionesInterInstitucionales/relaciones-interInstitucionales.jpg') ?>"
                                alt="Imagen Principal"
                                width="100%"
                                height="100%"
                            />
                        </div>
                        <div class="flip-cardp-back">
                            <div class="back-content">
                                <div class="icon-section">
                                    <i class="fas fa-envelope icon"></i>
                                    <p class="style text-center text-warning">
                                        <a href="mailto:vinculacion@superarse.edu.ec">vinculacion@superarse.edu.ec</a>
                                    </p>
                                </div>
                                <a
                                    href="https://wa.me/593984001102?text=Hola,%20me%20gustaría%20más%20información%20sobre%20los%20convenios%20InterInstitucionales"
                                    class="whatsapp-link"
                                >
                                    <div class="icon-section">
                                        <i class="fas fa-mobile-alt icon"></i>
                                        <p class="style text-center">0998409293</p>
                                    </div>
                                </a>
                                <i class="fas fa-sync-alt flip-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center">Coordinación de relaciones Interinstitucionales</p>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';