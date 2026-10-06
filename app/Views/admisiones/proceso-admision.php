<?php
declare(strict_types=1);
// Vista MVC Admisiones - Proceso de Admisión (render server-side)
$title = $title ?? 'Proceso de Admisión';
$cta = $cta ?? '';
$pasos = $pasos ?? [];
$extraScripts = [
    asset('js/moduls/Admisiones/procesoAdmisiones.js'),
];
$extraStyles = '';

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

ob_start();
?>
<div class="container-fluid container-top">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">ADMISIONES</span>
            </p>
            <h3 class="mb-4">Proceso <br>de Admisión</h3>
        </div>

        <div class="p-4 border rounded shadow-sm bg-white">
            <div class="row justify-content-center">
                <?php foreach ($pasos as $paso): ?>
                    <div class="col-11 col-sm-6 col-lg-3 mb-4">
                        <div class="card card-custom mx-auto">
                            <img src="<?= $escape((string) $paso['imagen']) ?>" class="card-img-top" alt="Paso <?= $escape((string) $paso['numero']) ?>" />
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><?= $escape((string) $paso['titulo']) ?></h5>
                                <p class="card-text"><?= $escape((string) $paso['texto']) ?></p>
                                <?php if (($paso['accion'] ?? '') === 'modal'): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#genericModal"
                                        data-title="<?= $escape((string) $paso['modal']['titulo']) ?>"
                                        <?php foreach ($paso['modal']['imagenes'] as $indice => $imagen): ?>
                                            data-image<?= $indice === 0 ? '' : ('-' . $indice) ?>="<?= $escape((string) $imagen) ?>"
                                        <?php endforeach; ?>
                                        <?php if (!empty($paso['modal']['texto'])): ?>
                                            data-text="<?= $escape((string) $paso['modal']['texto']) ?>"
                                        <?php endif; ?>
                                        <?php if (!empty($paso['modal']['whatsapp'])): ?>
                                            data-whatsapp-url="<?= $escape((string) $paso['modal']['whatsapp']) ?>"
                                        <?php endif; ?>>
                                        <?= $escape((string) $paso['boton']) ?>
                                    </button>
                                <?php else: ?>
                                    <a href="<?= $escape(url((string) $paso['enlace'])) ?>" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                                        <?= $escape((string) $paso['boton']) ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="genericModal" tabindex="-1" role="dialog" aria-labelledby="genericModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content rounded">
            <div class="modal-header">
                <h5 class="modal-title" id="genericModalLabel">Información de Admisión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="modalImage" class="img-fluid rounded" alt="Imagen en Modal" />
                <div id="modalText" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>
<br>

<h1 class="mb-4 text-center px-2"><?= $escape((string) $cta) ?></h1>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';