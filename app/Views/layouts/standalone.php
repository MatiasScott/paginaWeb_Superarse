<?php
declare(strict_types=1);

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', dirname(__DIR__, 2));
}

$standaloneStyles = $standaloneStyles ?? [];
$extraScripts = $extraScripts ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars((string) ($title ?? '')); ?></title>
    <link href="<?= asset('assets/img/content/logo/superarse_gris.png') ?>" rel="icon" />
    <?php foreach ($standaloneStyles as $cssUrl): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars((string) $cssUrl); ?>">
    <?php endforeach; ?>
    <?= app_config_script() ?>
    <script src="<?= asset('js/common/config.js') ?>"></script>
</head>
<body>
<?php echo $content; ?>
<script src="<?= asset('js/analytics/tracker.js') ?>" defer></script>
<?php echo $extraScripts; ?>
</body>
</html>