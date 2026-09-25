<?php
declare(strict_types=1);
if (!isset($legacyViewPath) || !is_file($legacyViewPath)) {
    http_response_code(404);
    echo 'Contenido no encontrado';
    return;
}
require $legacyViewPath;
