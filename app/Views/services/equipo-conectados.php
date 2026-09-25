<?php
declare(strict_types=1);
// Vista MVC Servicios - Equipo Conectados (render server-side)
$title = $title ?? 'Equipo Conectados';
$miembros = $miembros ?? [];
$extraScripts = [];
$extraStyles = '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid pt-5 container-top">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Conoce a Nuestro Equipo Conectados</span>
            </p>
            <h3 class="mb-4">No Dudes En Contactarnos</h3>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($miembros as $miembro): ?>
                <div class="col-md-4 col-lg-4 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 5%">
                        <img class="img-fluid w-100" src="<?= $escape((string) $miembro['imagen']) ?>" alt="Foto de <?= $escape((string) $miembro['nombre']) ?>" />
                        <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <?php if (!empty($miembro['whatsapp'])): ?>
                                <a class="btn btn-outline-light text-center mr-2 px-0 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px" href="<?= $escape((string) $miembro['whatsapp']) ?>" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp fa-2x"></i></a>
                            <?php endif; ?>
                            <a class="btn btn-outline-light text-center px-0 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px" href="mailto:<?= $escape((string) $miembro['correo']) ?>" target="_blank" aria-label="Correo electrónico"><i class="fa fa-envelope fa-2x"></i></a>
                        </div>
                    </div>
                    <h4><?= $escape((string) $miembro['nombre']) ?></h4>
                    <i><?= $escape((string) $miembro['cargo']) ?></i>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';