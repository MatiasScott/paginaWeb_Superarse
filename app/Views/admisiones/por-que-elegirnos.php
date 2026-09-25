<?php
declare(strict_types=1);
// Vista MVC Admisiones - ¿Por qué elegirnos? (render server-side)
$title = $title ?? '¿Por qué elegirnos?';
$intro = $intro ?? [];
$frases = $frases ?? [];
$secciones = $secciones ?? [];
$extraScripts = [
    asset('js/app/modules/admisiones/texto-animado.js'),
    asset('js/moduls/Admisiones/porQueElegirnos.js'),
];
$extraStyles = '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="text-center pb-2">
                    <p class="section-title px-5">
                        <span class="px-2"><?= $escape((string) ($intro['etiqueta'] ?? '')) ?></span>
                    </p>
                    <h1 class="mb-4"><?= $intro['heading'] ?? '' ?></h1>
                </div>
                <h1 id="texto-animado" data-frases="<?= $escape(json_encode($frases, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE)) ?>"></h1>
                <div>
                    <p style="text-align: justify;">
                        <?= $escape((string) ($intro['parrafo'] ?? '')) ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-container">
    <?php foreach ($secciones as $seccion): ?>
        <div class="seccion">
            <?php if (($seccion['posicion'] ?? '') === 'imagen-izquierda'): ?>
                <div class="imagen-container izquierda">
                    <img src="<?= $escape((string) $seccion['imagen']) ?>" alt="<?= $escape((string) $seccion['alt']) ?>" />
                </div>
                <div class="cuadro-texto desde-izquierda">
                    <h3><?= $escape((string) $seccion['titulo']) ?></h3>
                    <p><?= $escape((string) $seccion['texto']) ?></p>
                </div>
            <?php else: ?>
                <div class="cuadro-texto desde-derecha">
                    <h3><?= $escape((string) $seccion['titulo']) ?></h3>
                    <p><?= $escape((string) $seccion['texto']) ?></p>
                </div>
                <div class="imagen-container derecha">
                    <img src="<?= $escape((string) $seccion['imagen']) ?>" alt="<?= $escape((string) $seccion['alt']) ?>" />
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';