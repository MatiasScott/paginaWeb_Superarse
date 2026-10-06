<?php

declare(strict_types=1);

/** @var array $career */

$escape = static function (string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $escape($career['title']) ?> | Instituto Superarse</title>
    <meta name="description" content="<?= $escape($career['description']) ?>">
    <link href="<?= asset('assets/img/content/logo/superarse_gris.png') ?>" rel="icon" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="<?= asset('lib/flaticon/font/flaticon.css') ?>" rel="stylesheet" />
    <link href="<?= asset('lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet" />
    <link href="<?= asset('lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/style.css?v=2.1') ?>" rel="stylesheet" />
    <link href="<?= asset('css/responsive.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/vistas-internas.css') ?>" rel="stylesheet" />
    <link href="<?= asset('css/vistas-personalizadas.css') ?>" rel="stylesheet" />
    <?= app_config_script() ?>
    <script src="<?= asset('js/common/config.js') ?>"></script>
    <style>
        body { opacity: 0; transition: opacity 0.3s ease; }
        
        /* Contenedor Institucional de Acreditaciones */
        .institutional-accreditation-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 20px 25px;
            border: 1px solid #e1e8ed;
            border-left: 4px solid #17a2b8;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            margin-top: 25px;
        }

        .institutional-title {
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 1.2px;
            color: #6c757d;
            text-transform: uppercase;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .institutional-logos-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .institutional-logo-item {
            max-height: 48px;
            width: auto;
            object-fit: contain;
            filter: grayscale(10%);
            transition: filter 0.2s ease;
        }

        .institutional-logo-item:hover {
            filter: grayscale(0%);
        }

        /* Banner de Solicitud de Información (Estilo Imagen) */
        .banner-solicitud {
            position: relative;
            background: linear-gradient(rgba(30, 41, 59, 0.85), rgba(30, 41, 59, 0.85)), 
                        url('<?= $escape($career['image']) ?>') center/cover no-repeat;
            color: #ffffff;
            border-radius: 15px;
            padding: 60px 20px;
            margin-top: 50px;
        }

        .banner-solicitud h2 {
            color: #ffffff;
            font-weight: 700;
            font-size: 2.2rem;
        }

        .banner-solicitud a.contact-link {
            color: #ffffff;
            text-decoration: underline;
            font-weight: 600;
            transition: opacity 0.2s;
        }

        .banner-solicitud a.contact-link:hover {
            opacity: 0.8;
        }

        .btn-asesor {
            display: inline-block;
            border: 2px solid #ffffff;
            color: #ffffff !important;
            border-radius: 50px;
            padding: 12px 35px;
            font-weight: 600;
            text-decoration: none !important;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
        }

        .btn-asesor:hover {
            background: #ffffff;
            color: #1e293b !important;
        }

        .social-icons-banner a {
            color: #ffffff;
            font-size: 1.2rem;
            margin: 0 10px;
            transition: transform 0.2s;
            display: inline-block;
        }

        .social-icons-banner a:hover {
            transform: translateY(-3px);
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid bg-light position-relative shadow" id="header-container" data-header-rendered="false"></div>

    <main class="container py-5 container-top">
        <header class="text-center mb-5">
            <p class="section-title px-5"><span class="px-2"><?= $escape($career['school']) ?></span></p>
            <h1 class="display-4 fw-bold"><?= $escape($career['title']) ?></h1>
            <p class="lead"><?= $escape($career['degree']) ?></p>
        </header>

        <div class="row align-items-center mb-5">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="<?= $escape($career['image']) ?>" alt="<?= $escape($career['title']) ?>" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-7">
                <h2>Información de la carrera</h2>
                <p><strong>Resolución:</strong> <?= $escape($career['resolution']) ?></p>
                <p><strong>Duración:</strong> <?= $escape($career['duration']) ?></p>
                <p><strong>Modalidad:</strong> <?= $escape($career['modality']) ?></p>
                <p class="text-justify"><?= $escape($career['description']) ?></p>

                <!-- SECCIÓN INSTITUCIONAL DE LOGOS -->
                <?php if (!empty($career['institutionalLogos'])): ?>
                    <div class="institutional-accreditation-card">
                        <div class="institutional-title">
                            <i class="fas fa-award text-info"></i>Acreditaciones
                        </div>
                        <div class="institutional-logos-wrapper">
                            <?php foreach ($career['institutionalLogos'] as $logoInst): ?>
                                <div title="<?= $escape($logoInst['name']) ?>" class="d-flex align-items-center justify-content-center">
                                    <img src="<?= $escape($logoInst['image']) ?>" alt="<?= $escape($logoInst['name']) ?>" class="institutional-logo-item">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <section class="mb-5">
            <h2>Perfil profesional</h2>
            <ul>
                <?php foreach ($career['profile'] as $item): ?>
                    <li><?= $escape($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="mb-5">
            <h2>Campo laboral</h2>
            <ul>
                <?php foreach ($career['careerPath'] as $item): ?>
                    <li><?= $escape($item) ?></li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="text-center mb-5">
            <h2>Malla curricular</h2>
            <p>Consulta el plan de estudios detallado de esta carrera.</p>
            <a href="<?= $escape(url($career['curriculum'])) ?>" target="_blank" rel="noopener" data-section="Malla Curricular" class="btn btn-info">
                Ver malla curricular PDF
            </a>
        </section>

        <!-- SECCIÓN DE SOLICITUD DE INFORMACIÓN (DESPUÉS DE LA MALLA CURRICULAR) -->
        <section class="banner-solicitud text-center shadow-lg">
            <h2 class="mb-4">Solicita más información</h2>
            
            <div class="d-flex justify-content-center align-items-center flex-wrap gap-4 mb-4">
                <span class="d-inline-flex align-items-center mx-3">
                    <i class="fas fa-envelope mr-2"></i>
                    <a href="mailto:admisiones@superarse.edu.ec" class="contact-link">matriculas@superarse.edu.ec</a>
                </span>
                <span class="d-inline-flex align-items-center mx-3">
                    <i class="fas fa-phone-alt mr-2"></i>
                    <a href="tel:0995901732" class="contact-link">0995901732</a>
                </span>
            </div>

            <div class="mb-4">
                <a href="https://wa.me/593995901732" target="_blank" rel="noopener noreferrer" class="btn-asesor">
                    Conversar con un asesor
                </a>
            </div>

            <div class="social-icons-banner pt-2">
                <a href="https://www.facebook.com/superarse1" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/superarse1" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://www.tiktok.com/@superarse1" target="_blank" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                <a href="https://x.com/superarse1" target="_blank" aria-label="X"><i class="fab fa-x-twitter"></i></a>
                <a href="https://ec.linkedin.com/company/superarse1" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.youtube.com/@InstitutoSuperarse" target="_blank" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            </div>
        </section>
    </main>

    <div class="footer-container" data-career-footer="true"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?= asset('lib/easing/easing.min.js') ?>"></script>
    <script src="<?= asset('lib/owlcarousel/owl.carousel.min.js') ?>"></script>
    <script src="<?= asset('lib/isotope/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= asset('lib/lightbox/js/lightbox.min.js') ?>"></script>
    <script src="<?= asset('js/moduls/header.js') ?>"></script>
    <script src="<?= asset('js/moduls/footer.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>
    <script src="<?= asset('js/moduls/core/header-module.js') ?>"></script>
    <script src="<?= asset('js/moduls/core/footer-module.js') ?>"></script>
    <script src="<?= asset('js/moduls/core/buzon-module.js') ?>"></script>
    <script src="<?= asset('js/moduls/core/layout-functions.js') ?>"></script>
    <script>
      // Evitar FOUC - mostrar body cuando todo cargó (como hace page-head.js)
      window.addEventListener('DOMContentLoaded', function() {
        setTimeout(function(){ document.body.style.opacity = '1'; }, 50);
      });
    </script>
</body>
</html>