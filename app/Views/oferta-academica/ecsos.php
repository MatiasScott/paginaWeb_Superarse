<?php

declare(strict_types=1);
// MVC Oferta Académica - ECSOS (Escuela de Construcción y Extracción Sostenible)
$title = 'Escuela de Construcción y Extracción Sostenible ECSOS';
$extraStyles = asset('css/modals-custom.css');

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
$careerBase = rtrim($schoolUrl, '/') . '/';

ob_start();
?>
<style>
    /* Posicionamiento del logo en la esquina superior izquierda */
    .logo-superior-izq {
        position: absolute;
        top: 25px;
        left: 100px;
        max-width: 180px;
        height: auto;
        z-index: 10;
    }

    @media (max-width: 991px) {
        .logo-superior-izq {
            position: relative;
            display: block;
            margin: 0 auto 25px auto;
            top: 0;
            left: 0;
            max-width: 150px;
        }
    }

    .modal-glass-uniform {
        position: relative;
        background-size: cover;
        background-position: center;
    }
    .modal-glass-uniform::before {
        content: "";
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        z-index: 0;
    }
    .content-wrapper-construction {
        position: relative;
        z-index: 1;
    }
    .glass-section-modern {
        background: rgba(255, 255, 255, 0.6);
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        border: 1px solid rgba(255,255,255,0.2);
    }
    .section-label-v {
        background: linear-gradient(90deg, #28a745, #20c997);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 1px;
        display: block;
        margin-bottom: 10px;
    }
</style>

<div class="container-fluid py-5 container-top position-relative">

    <img src="<?= $escape($logo) ?>" alt="Logo Escuela" class="logo-superior-izq" />

    <svg class="bg-circles" width="400" height="400" viewBox="0 0 100 100">
        <circle cx="80" cy="20" r="40" fill="#F2AA5C" />
    </svg>

    <div class="container text-center">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2"><?= $escape($kicker) ?></span>
            </p>
            <h1 class="mb-4"><?= $escape($title) ?></h1>
        </div>

        <div class="school-badgeECSOS">
            <i class="<?= $escape($schoolIcon) ?> mr-2"></i> <?= $escape($schoolBadge) ?>
        </div>

        <div class="row justify-content-center">
            <?php foreach ($careers as $career): ?>
                <?php $careerUrl = $careerBase . $career['slug']; ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card h-100 border-0 shadow-lg" style="border-radius: 20px; transition: all 0.4s ease; overflow: hidden; background: #fff; cursor: pointer;"
                         onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';"
                         onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';">

                        <div style="position: relative; height: 500px; overflow: hidden;">
                            <img src="<?= $escape($career['imagePath']) ?>" alt="<?= $escape($career['title']) ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.7) 100%);"></div>

                            <span style="position: absolute; top: 15px; right: 15px; background: #28a745; color: white; padding: 5px 12px; border-radius: 50px; font-size: 0.7rem; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">
                                Cupos Disponibles
                            </span>
                        </div>

                        <div class="card-body p-4 d-flex flex-column justify-content-between">
                            <div>
                                <h4 class="font-weight-bold mb-2" style="color: #2c3e50; font-size: 1.25rem; line-height: 1.2;">
                                    <?= $escape($career['title']) ?>
                                </h4>
                                <p class="text-muted mb-4" style="font-size: 0.9rem;">
                                    Explora tu futuro profesional y conviértete en un experto en esta área de alta demanda.
                                </p>
                            </div>

                            <a class="btn btn-block py-2"
                               href="<?= $escape($careerUrl) ?>"
                               style="background: linear-gradient(90deg, #f27230, #ff8c42); color: white; border-radius: 12px; font-weight: bold; border: none; transition: 0.3s; display: block; text-align: center; text-decoration: none;">
                                Más Información <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';