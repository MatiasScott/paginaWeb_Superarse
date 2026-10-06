<?php

declare(strict_types=1);

// MVC SubMenu - Titulación

$title = 'Proceso de Titulación';
$extraScripts = [
    asset('js/moduls/BienestarEstudiantil/CarruselBienestar.js'),
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="custom-carousel-wrapper">
                    <div class="custom-carousel-track">
                        <?php foreach ($graduados as $grado): ?>
                            <div class="custom-carousel-item"><img src="<?= $escape($grado) ?>" alt="Graduados Superarse"></div>
                        <?php endforeach; ?>
                    </div>
                    <div class="custom-dots-container">
                        <span class="custom-dot custom-active"></span>
                        <span class="custom-dot"></span>
                        <span class="custom-dot"></span>
                        <span class="custom-dot"></span>
                    </div>
                    <p class="text-center">NUESTROS GRADUADOS </p>
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <span class="px-2"><?= $escape($kicker) ?></span>
                        </p>
                        <h3 class="mb-4"><?= $escape($title) ?></h3>
                    </div>
                    <p style="text-align: justify;">
                        La titulación es el hito más importante en tu trayectoria
                        académica en el Instituto Superior Tecnológico Superarse.
                        Representa la culminación de años de esfuerzo, dedicación y
                        aprendizaje, y te abre las puertas al mundo profesional.
                    </p>
                    <p style="text-align: justify;">
                        En esta sección, hemos consolidado toda la información necesaria
                        para guiarte en este crucial proceso. Desde el reglamento que
                        detalla cada paso hasta los calendarios clave, nuestro objetivo
                        es proporcionarte las herramientas y la claridad que necesitas
                        para alcanzar tu meta.
                    </p>
                    <p style="text-align: justify;">
                        Estamos comprometidos con tu éxito y te acompañaremos en cada
                        fase para asegurar que tu proceso de titulación sea fluido y
                        exitoso. Explora los recursos aquí disponibles para dar este
                        importante paso en tu carrera.
                    </p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="d-flex flex-column justify-content-center h-100 p-4 border rounded shadow-sm">
                    <div id="titulacionContainer" style="text-align: justify;">
                        <?php
                        $total = count($secciones);
                        foreach ($secciones as $index => $item):
                            $marginBottomClass = $index === $total - 1 ? 'mb-0' : 'mb-5';
                        ?>
                            <div class="<?= $marginBottomClass ?>">
                                <h4 class="mb-3"><?= $escape($item['title']) ?></h4>
                                <p class="text-muted"><?= trim($item['description']) ?></p>
                                <div class="text-center mt-4">
                                    <?php if (isset($item['buttons'])): ?>
                                        <?php foreach ($item['buttons'] as $button): ?>
                                            <a href="<?= $escape(url($button['link'])) ?>" target="_blank" class="btn btn-primary py-2 px-4 m-2" rel="noopener noreferrer">
                                                <i class="<?= $escape($button['buttonIcon']) ?>"></i> <?= $button['buttonText'] ?>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <a href="<?= $escape(url($item['link'])) ?>" target="_blank" class="btn btn-primary py-2 px-4" rel="noopener noreferrer">
                                            <i class="<?= $escape($item['buttonIcon']) ?>"></i> <?= $item['buttonText'] ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';