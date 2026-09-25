<?php

declare(strict_types=1);

// MVC Institución - Noticias Instituto Superarse

$bootstrap5Css = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css';
$extraScripts = [
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js',
    asset('js/app/modules/noticias/noticias-grid.js'),
];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

// Ordenar de la más reciente a la más antigua (replica el sort de dataNoticias.js)
usort($noticias, static function (array $a, array $b): int {
    return strcmp($b['fecha'], $a['fecha']);
});

$meses = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];

/** @param array{imagen: string, titulo: string, resumen: string, enlace: string} $item */
$renderCard = static function (array $item) use ($escape, $meses): string {
    $fecha = $item['fecha'];
    if ($fecha !== '' && preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $fecha, $partes) === 1) {
        $fechaLegible = $partes[3] . ' de ' . $meses[(int) $partes[2] - 1] . ' del ' . $partes[1];
    } else {
        $fechaLegible = $fecha !== '' ? $fecha : 'Reciente';
    }

    $busqueda = strtolower($item['titulo'] . ' ' . $item['resumen']);
    $target   = ($item['enlace'] !== '#' && $item['enlace'] !== '' && $item['enlace'] !== null)
        ? ' target="_blank" rel="noopener"'
        : '';

    return '<div class="noticia-card" data-busqueda="' . $escape($busqueda) . '">'
        . '<div class="noticia-img-box">'
        . '<img src="' . $escape($item['imagen']) . '" alt="' . $escape($item['titulo']) . '">'
        . '</div>'
        . '<div class="noticia-body">'
        . '<span class="noticia-fecha"><i class="far fa-calendar-alt mr-1"></i> ' . $escape($fechaLegible) . '</span>'
        . '<h3 class="noticia-titulo">' . $escape($item['titulo']) . '</h3>'
        . '<p class="noticia-desc">' . $escape($item['resumen']) . '</p>'
        . '<a href="' . $escape($item['enlace']) . '"' . $target . ' class="btn btn-outline-success btn-sm mt-auto alignment-btn" style="border-radius: 10px; font-weight: bold; width: fit-content;">'
        . 'Leer más <i class="fas fa-arrow-right ml-1" style="font-size: 0.8rem;"></i>'
        . '</a>'
        . '</div>'
        . '</div>';
};

ob_start();
?>
<div class="container-fluid py-5 container-top">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2"><?= $escape($kicker) ?></span>
            </p>
            <h1 class="mb-4">Noticias <br>Instituto Superarse</h1>
        </div>

        <div class="noticias-buscador">
            <input type="text" id="buscadorNoticias" placeholder="🔎 Buscar noticias por título o contenido...">
        </div>

        <div id="noticias-grid" class="noticias-grid">
            <?php foreach ($noticias as $item): ?>
                <?= $renderCard($item) ?>
            <?php endforeach; ?>
        </div>

        <div id="paginacionNoticias" class="noticias-paginacion"></div>
    </div>
</div>
<?php
$content = ob_get_clean();
require ROOT_PATH . '/app/Views/layouts/main.php';