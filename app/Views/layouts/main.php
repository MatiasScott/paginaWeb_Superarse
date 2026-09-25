<?php
declare(strict_types=1);
// Layout principal MVC - usado por vistas puras
// Variables esperadas: $title (string), $content (string HTML), $extraScripts (array), $extraStyles (string)
// $bootstrap5Css (string): si se define, se inyecta como <link> ANTES de style.css para que el template gane la cascada.
$title = $title ?? 'Instituto Superarse';
$extraScripts = $extraScripts ?? [];
$extraStyles = $extraStyles ?? '';
$bootstrap5Css = $bootstrap5Css ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?> | Instituto Superarse</title>
    <?php if (!empty($bootstrap5Css)): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($bootstrap5Css, ENT_QUOTES, 'UTF-8') ?>">
    <?php endif; ?>
    <style>body { opacity: 0; transition: opacity 0.3s ease; }</style>
    <?= app_config_script() ?>
    <script src="<?= asset('js/common/config.js') ?>"></script>
    <script src="<?= asset('js/common/page-head.js') ?>"<?= $extraStyles ? ' data-extra-styles="' . htmlspecialchars($extraStyles, ENT_QUOTES, 'UTF-8') . '"' : '' ?>></script>
</head>
<body class="bg-light">
<div class="container-fluid bg-light position-relative shadow"></div>

<?= $content ?>

<div class="color-bar-container">
    <div class="color-stripe color-stripe-1"></div>
    <div class="color-stripe color-stripe-2"></div>
    <div class="color-stripe color-stripe-3"></div>
    <div class="color-stripe color-stripe-4"></div>
</div>

<div class="footer-container"></div>

<script src="<?= asset('js/analytics/tracker.js') ?>" defer></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
<script src="<?= asset('lib/easing/easing.min.js') ?>"></script>
<script src="<?= asset('lib/owlcarousel/owl.carousel.min.js') ?>"></script>
<script src="<?= asset('lib/isotope/isotope.pkgd.min.js') ?>"></script>
<script src="<?= asset('lib/lightbox/js/lightbox.min.js') ?>"></script>
<script src="<?= asset('js/app/layout/header/headerData.js') ?>"></script>
<script src="<?= asset('js/app/layout/footer/footerData.js') ?>"></script>
<script src="<?= asset('js/app/layout/header/headerRenderer.js') ?>"></script>
<script src="<?= asset('js/app/layout/footer/footerRenderer.js') ?>"></script>
<script src="<?= asset('js/app/layout/buzon/buzonRenderer.js') ?>"></script>
<script src="<?= asset('js/app/layout/layout.js') ?>"></script>
<script src="<?= asset('js/global.js') ?>"></script>
<script src="<?= asset('js/main.js') ?>"></script>
<?php foreach ($extraScripts as $src): ?>
<script src="<?= htmlspecialchars($src, ENT_QUOTES, 'UTF-8') ?>"></script>
<?php endforeach; ?>
<script>
window.addEventListener('DOMContentLoaded', function(){ setTimeout(function(){ document.body.style.opacity='1'; }, 50); });
</script>
</body>
</html>
