<?php
declare(strict_types=1);
ob_start();
?>
<div class="container mt-5 mb-5 text-center">
    <h1 class="display-1 font-weight-bold text-danger">404</h1>
    <h2 class="h4 text-dark mb-2">Página no encontrada</h2>
    <p class="text-muted mb-4">La ruta solicitada no existe o fue movida.</p>
    <a href="<?= asset('') ?>" class="btn btn-primary">Volver al inicio</a>
</div>
<?php
$content = ob_get_clean();
$title = 'Página no encontrada';
require_once ROOT_PATH . '/app/Views/layouts/main.php';