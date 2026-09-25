<?php
/**
 * Dashboard privado de analítica - Equipo TICs
 * Acceso: login por POST + sesión (la clave nunca viaja en la URL)
 */
declare(strict_types=1);

header('X-Robots-Tag: noindex, nofollow, noarchive');
header('Cache-Control: no-store, private');

require_once __DIR__ . '/app/Core/Env.php';

\App\Core\Env::load(__DIR__ . '/.env');

/**
 * Clave de acceso al panel. Sin TICS_ACCESS_KEY en el .env el panel queda
 * cerrado: es preferible a dejar la clave escrita en el código.
 */
function ticsAccessKey(): string
{
    $clave = \App\Core\Env::get('TICS_ACCESS_KEY', '');

    return is_string($clave) ? $clave : '';
}

/** Minutos... segundos de inactividad antes de cerrar la sesión. */
function ticsSessionTimeout(): int
{
    $segundos = \App\Core\Env::get('TICS_SESSION_TIMEOUT', 1800);

    return is_numeric($segundos) ? (int) $segundos : 1800;
}

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'httponly' => true,
        'samesite' => 'Lax',
        'secure'   => !empty($_SERVER['HTTPS']),
    ]);
    session_start();
}

function e(?string $v): string
{
    return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
}

function normDate(string $value): ?string
{
    $v = trim($value);
    $d = DateTime::createFromFormat('!Y-m-d', $v);
    return ($d && $d->format('Y-m-d') === $v) ? $v : null;
}

/**
 * Devuelve [desde, hasta] como timestamp MySQL (YYYY-MM-DD HH:MM:SS).
 */
function dateWindow(string $range, ?string $desde, ?string $hasta): array
{
    $today = explode(' ', date('Y-m-d H:i:s'));
    switch ($range) {
        case 'hoy':
            return [$today[0] . ' 00:00:00', $today[0] . ' 23:59:59'];
        case 'mes':
            return [date('Y-m-01 00:00:00'), $today[0] . ' 23:59:59'];
        case 'custom':
            if ($desde !== null && $hasta !== null) {
                if ($desde > $hasta) {
                    [$desde, $hasta] = [$hasta, $desde];
                }
                return [$desde . ' 00:00:00', $hasta . ' 23:59:59'];
            }
            $range = '7d';
            // intencional: cae al caso por defecto
        default:
            return [date('Y-m-d 00:00:00', strtotime('-6 days')), $today[0] . ' 23:59:59'];
    }
}

$isAuthorized = !empty($_SESSION['tics_authorized']);

// Seguridad: cierre automático de sesión tras 30 minutos de inactividad
if ($isAuthorized) {
    $lastActivity = (int) ($_SESSION['tics_last_activity'] ?? 0);
    if ($lastActivity > 0 && (time() - $lastActivity) > ticsSessionTimeout()) {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }
        session_destroy();
        header('Location: ' . basename($_SERVER['PHP_SELF']));
        exit;
    }
    $_SESSION['tics_last_activity'] = time();
}

// Cierre de sesión explícito
if (!empty($_GET['logout'])) {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
    }
    session_destroy();
    header('Location: ' . basename($_SERVER['PHP_SELF']));
    exit;
}

// Login vía POST (la clave NUNCA viaja en la URL ni en el historial)
$loginError = false;
if (!$isAuthorized && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $provided = isset($_POST['access_key']) ? (string) $_POST['access_key'] : '';
    if ($provided !== '' && $provided === ticsAccessKey() && ticsAccessKey() !== '') {
        session_regenerate_id(true);
        $_SESSION['tics_authorized'] = true;
        $_SESSION['tics_last_activity'] = time();
        $isAuthorized = true;
        header('Location: ' . basename($_SERVER['PHP_SELF']));
        exit;
    }
    $loginError = true;
}

$range = isset($_GET['range']) ? (string) $_GET['range'] : '7d';
if (!in_array($range, ['hoy', '7d', 'mes', 'custom'], true)) {
    $range = '7d';
}

$desde = normDate(isset($_GET['desde']) ? (string) $_GET['desde'] : '');
$hasta = normDate(isset($_GET['hasta']) ? (string) $_GET['hasta'] : '');

if ($range === 'custom' && ($desde === null || $hasta === null)) {
    $range = '7d';
}

[$start, $end] = dateWindow($range, $desde, $hasta);
$startDate = substr($start, 0, 10);
$endDate   = substr($end, 0, 10);

function urlFor(string $range): string
{
    return '?range=' . $range;
}

if (!$isAuthorized):
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Acceso restringido | TICs Superarse</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-slate-900 border border-slate-700 rounded-2xl shadow-2xl p-8">
        <div class="flex items-center gap-3 mb-6">
            <span class="inline-flex items-center justify-center w-11 h-11 rounded-xl bg-red-500/20 text-red-400 text-xl">&#x1F512;</span>
            <div>
                <h1 class="text-xl font-bold">Acceso restringido</h1>
                <p class="text-sm text-slate-400">Panel exclusivo del equipo de TICs</p>
            </div>
        </div>
        <p class="text-sm text-slate-400 mb-6">
            Este panel es privado. Ingresa la clave de acceso para ver los datos de analítica.
        </p>
        <?php if ($loginError): ?>
            <div class="mb-4 rounded-lg border border-red-500/40 bg-red-500/10 px-4 py-3 text-sm text-red-300">
                Clave incorrecta. Inténtalo de nuevo.
            </div>
        <?php endif; ?>
        <form method="post" class="space-y-4">
            <input type="password" name="access_key" required autofocus autocomplete="current-password"
                   placeholder="Clave de acceso"
                   class="w-full rounded-lg bg-slate-800 border border-slate-600 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
            <button type="submit"
                    class="w-full rounded-lg bg-cyan-600 hover:bg-cyan-500 transition-colors py-3 font-semibold">
                Ingresar
            </button>
        </form>
    </div>
</body>
</html>
<?php
    http_response_code(403);
    return;
endif;

require __DIR__ . '/api/analytics/db.php';

$error   = null;
$totals  = ['page_view' => 0, 'click' => 0, 'submit' => 0, 'total' => 0];
$topElements = [];
$sections    = [];
$topPages    = [];
$trend       = [];
$recent      = [];
try {
    $pdo = superarseDb();
    $startBound = [$start, $end];

    $st = $pdo->prepare(
        'SELECT event_type, COUNT(*) AS c FROM superarse_analytics WHERE created_at >= ? AND created_at <= ? GROUP BY event_type'
    );
    $st->execute($startBound);
    foreach ($st->fetchAll() as $r) {
        if (isset($totals[$r['event_type']])) {
            $totals[$r['event_type']] = (int) $r['c'];
        }
        $totals['total'] += (int) $r['c'];
    }

    $st = $pdo->prepare(
        'SELECT element_text, COUNT(*) AS c
         FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ? AND event_type = \'click\'
           AND element_text IS NOT NULL AND element_text <> \'\'
         GROUP BY element_text
         ORDER BY c DESC, MAX(id) DESC
         LIMIT 10'
    );
    $st->execute($startBound);
    $topElements = $st->fetchAll();

    $st = $pdo->prepare(
        'SELECT COALESCE(NULLIF(section_name, \'\'), \'Sin sección\') AS nombre, COUNT(*) AS c
         FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ?
         GROUP BY nombre
         ORDER BY c DESC
         LIMIT 15'
    );
    $st->execute($startBound);
    $sections = $st->fetchAll();

    $st = $pdo->prepare(
        'SELECT page_url, COUNT(*) AS c
         FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ? AND event_type = \'page_view\'
         GROUP BY page_url
         ORDER BY c DESC
         LIMIT 8'
    );
    $st->execute($startBound);
    $topPages = $st->fetchAll();

    $hourly = ($range === 'hoy') || ($range === 'custom' && $startDate === $endDate);
    if ($hourly) {
        $st = $pdo->prepare(
            'SELECT HOUR(created_at) AS periodo, COUNT(*) AS c
             FROM superarse_analytics
             WHERE created_at >= ? AND created_at <= ?
             GROUP BY HOUR(created_at)
             ORDER BY periodo'
        );
    } else {
        $st = $pdo->prepare(
            'SELECT DATE_FORMAT(created_at, \'%Y-%m-%d\') AS periodo, COUNT(*) AS c
             FROM superarse_analytics
             WHERE created_at >= ? AND created_at <= ?
             GROUP BY DATE_FORMAT(created_at, \'%Y-%m-%d\')
             ORDER BY periodo'
        );
    }
    $st->execute($startBound);
    $trend = $st->fetchAll();

    $st = $pdo->prepare(
        'SELECT id, event_type, section_name, element_text, page_url, user_ip, created_at
         FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ?
         ORDER BY id DESC
         LIMIT 25'
    );
    $st->execute($startBound);
    $recent = $st->fetchAll();
} catch (Throwable $e) {
    $error = $e->getMessage();
}

$rangeLabels = ['hoy' => 'Hoy', '7d' => 'Últimos 7 días', 'mes' => 'Este mes'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Dashboard  | Analítica Superarse</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 8px; }
        .trend-bar { transition: height .5s ease; }
        table { border-collapse: collapse; }
        input[type="date"] { color-scheme: dark; }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen">

    <header class="sticky top-0 z-40 bg-slate-900/90 backdrop-blur border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 py-3 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-3">
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-cyan-600/20 text-cyan-400 text-lg">&#x1F4CA;</span>
                <div>
                    <h1 class="font-bold leading-tight">Analytics · Superarse</h1>
                    <p class="text-xs text-slate-400">Instituto Superior Tecnológico Superarse</p>
                </div>
            </div>

            <nav class="flex items-center gap-2 flex-wrap">
                <?php foreach ($rangeLabels as $key => $label): ?>
                    <a href="<?= e(urlFor($key)) ?>"
                       class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors
                              <?= $range === $key ? 'bg-cyan-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' ?>">
                        <?= e($label) ?>
                    </a>
                <?php endforeach; ?>
                <a href="<?= e(urlFor('custom')) ?>&desde=<?= e(date('Y-m-d', strtotime('-6 days'))) ?>&hasta=<?= e(date('Y-m-d')) ?>"
                   class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors
                          <?= $range === 'custom' ? 'bg-cyan-600 text-white' : 'bg-slate-800 text-slate-300 hover:bg-slate-700' ?>">
                    Personalizado
                </a>
                <a href="<?= e(urlFor($range)) ?>"
                   class="px-3 py-1.5 rounded-lg text-sm font-medium bg-slate-800 text-slate-300 hover:bg-slate-700" title="Actualizar">
                    &#x21BB;
                </a>
                <a href="?logout=1" class="px-3 py-1.5 rounded-lg text-sm font-medium text-red-400 hover:bg-red-500/10">Salir</a>
            </nav>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-6 space-y-6">

        <p class="text-xs text-slate-500">
            Periodo analizado: <span class="text-slate-300"><?= e($rangeLabels[$range] ?? 'Personalizado') ?></span>
            · desde <span class="text-slate-300"><?= e($startDate) ?></span> hasta <span class="text-slate-300"><?= e($endDate) ?></span>
            · generado <span class="text-slate-300"><?= e(date('Y-m-d H:i:s')) ?></span>
        </p>

        <div class="rounded-2xl border border-slate-800 bg-slate-900 p-4 flex flex-wrap items-end gap-4">
            <div class="text-sm">
                <p class="text-slate-400 mb-1">Fechas personalizadas</p>
                <p class="text-xs text-slate-500">Elige el rango y pulsa «Aplicar».</p>
            </div>
            <form method="get" class="flex flex-wrap items-end gap-3" autocomplete="off">
                <input type="hidden" name="range" value="custom">
                <label class="flex flex-col text-xs text-slate-400 gap-1">
                    Desde
                    <input type="date" name="desde" value="<?= e($range === 'custom' ? $startDate : date('Y-m-d', strtotime('-6 days'))) ?>"
                           class="rounded-lg bg-slate-800 border border-slate-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </label>
                <label class="flex flex-col text-xs text-slate-400 gap-1">
                    Hasta
                    <input type="date" name="hasta" value="<?= e($range === 'custom' ? $endDate : date('Y-m-d')) ?>"
                           class="rounded-lg bg-slate-800 border border-slate-600 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                </label>
                <button type="submit"
                        class="rounded-lg bg-cyan-600 hover:bg-cyan-500 transition-colors px-5 py-2 text-sm font-semibold">
                    Aplicar
                </button>
                <a href="tics-analytics-export.php?range=<?= e($range) ?>&desde=<?= e($startDate) ?>&hasta=<?= e($endDate) ?>"
                   class="rounded-lg bg-emerald-600 hover:bg-emerald-500 transition-colors px-5 py-2 text-sm font-semibold text-white inline-flex items-center gap-2"
                   title="Descargar el periodo actual (.xlsx con hojas Resumen y Eventos)">
                    <span aria-hidden="true">&#x1F4E5;</span> Descargar Excel
                </a>
            </form>
        </div>

        <?php if ($error !== null): ?>
            <div class="rounded-xl border border-red-500/40 bg-red-500/10 px-5 py-4 text-sm">
                <strong class="text-red-400">Error de base de datos:</strong>
                <span class="text-slate-300"><?= e($error) ?></span>
            </div>
        <?php endif; ?>

        <?php if ($error === null): ?>
        <!-- KPI -->
        <section class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <?php
            $kpis = [
                ['Visitas de página', $totals['page_view'], 'text-cyan-400', 'bg-cyan-500/10'],
                ['Clics', $totals['click'], 'text-emerald-400', 'bg-emerald-500/10'],
                ['Formularios enviados', $totals['submit'], 'text-amber-400', 'bg-amber-500/10'],
                ['Eventos totales', $totals['total'], 'text-violet-400', 'bg-violet-500/10'],
            ];
            foreach ($kpis as $kpi):
            ?>
            <div class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                <p class="text-xs text-slate-400 uppercase tracking-wide"><?= e($kpi[0]) ?></p>
                <p class="mt-2 text-3xl font-bold <?= e($kpi[1+1] ?? '') ?>"><?= number_format($kpi[1]) ?></p>
            </div>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>

        <?php if ($error !== null): return; endif; ?>

        <!-- Tendencia -->
        <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
            <h2 class="font-semibold mb-4 text-slate-200">Tendencia de actividad <?= $hourly ? 'por hora' : 'por día' ?></h2>
            <?php if (!$trend): ?>
                <p class="text-sm text-slate-500">Sin datos en el periodo.</p>
            <?php else:
                $maxTrend = max(array_column($trend, 'c'));
                $fullRow = $hourly ? array_fill(0, 24, null) : [];
            ?>
            <div class="flex items-end gap-1 h-44">
                <?php foreach ($trend as $row): ?>
                    <?php
                    $pct = $maxTrend > 0 ? (int) round((int) $row['c'] / $maxTrend * 100) : 0;
                    $label = $hourly
                        ? str_pad((string) $row['periodo'], 2, '0', STR_PAD_LEFT) . ':00'
                        : (string) $row['periodo'];
                    ?>
                    <div class="flex-1 flex flex-col items-center justify-end gap-1 min-w-0" title="<?= e($label) ?> · <?= (int) $row['c'] ?>">
                        <span class="text-[10px] text-slate-500"><?= (int) $row['c'] ?></span>
                        <div class="w-full max-w-[28px] rounded-t bg-cyan-500/80 trend-bar"
                             style="height: <?= max($pct, 4) ?>%;"></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="flex gap-1 mt-1">
                <?php foreach ($trend as $row): ?>
                    <?php $label = $hourly ? str_pad((string) $row['periodo'], 2, '0', STR_PAD_LEFT) . ':00' : (string) substr((string) $row['periodo'], 5); ?>
                    <div class="flex-1 text-center text-[10px] text-slate-600 truncate"><?= e($label) ?></div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </section>

        <div class="grid lg:grid-cols-2 gap-6">
            <!-- Secciones -->
            <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                <h2 class="font-semibold mb-4 text-slate-200">Mapa por secciones</h2>
                <?php if (!$sections): ?>
                    <p class="text-sm text-slate-500">Sin datos en el periodo.</p>
                <?php else:
                    $maxSec = max(array_column($sections, 'c'));
                ?>
                <ul class="space-y-3">
                    <?php foreach ($sections as $row):
                        $pct = $maxSec > 0 ? (int) round((int) $row['c'] / $maxSec * 100) : 0;
                    ?>
                    <li>
                        <div class="flex justify-between items-center mb-1 text-sm">
                            <span class="text-slate-300 truncate mr-2"><?= e($row['nombre']) ?></span>
                            <span class="font-bold text-emerald-400"><?= number_format((int) $row['c']) ?></span>
                        </div>
                        <div class="h-2.5 rounded-full bg-slate-800 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-emerald-600 to-emerald-400"
                                 style="width: <?= $pct ?>%;"></div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </section>

            <!-- Top páginas -->
            <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
                <h2 class="font-semibold mb-4 text-slate-200">Páginas más visitadas</h2>
                <?php if (!$topPages): ?>
                    <p class="text-sm text-slate-500">Sin visitas en el periodo.</p>
                <?php else:
                    $maxPages = max(array_column($topPages, 'c'));
                ?>
                <ul class="space-y-3">
                    <?php foreach ($topPages as $row):
                        $pct = $maxPages > 0 ? (int) round((int) $row['c'] / $maxPages * 100) : 0;
                    ?>
                    <li>
                        <div class="flex justify-between items-center mb-1 text-sm">
                            <span class="text-slate-300 truncate mr-2 font-mono text-xs"><?= e($row['page_url']) ?></span>
                            <span class="font-bold text-violet-400"><?= number_format((int) $row['c']) ?></span>
                        </div>
                        <div class="h-2.5 rounded-full bg-slate-800 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-violet-600 to-violet-400"
                                 style="width: <?= $pct ?>%;"></div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </section>
        </div>

        <!-- Ranking de elementos -->
        <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
            <h2 class="font-semibold mb-4 text-slate-200">Top 10 · Botones y enlaces más cliqueados</h2>
            <?php if (!$topElements): ?>
                <p class="text-sm text-slate-500">Sin clics registrados en el periodo.</p>
            <?php else:
                $maxEl = max(array_column($topElements, 'c'));
            ?>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-slate-400 border-b border-slate-800">
                            <th class="py-2 pr-4 w-10">#</th>
                            <th class="py-2 pr-4">Elemento</th>
                            <th class="py-2 pr-4 w-1/3">Clics</th>
                            <th class="py-2 w-20 text-right">%</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; foreach ($topElements as $row): $i++;
                            $pct = $maxEl > 0 ? round((int) $row['c'] / $maxEl * 100, 1) : 0;
                        ?>
                        <tr class="border-b border-slate-800/60">
                            <td class="py-2.5 pr-4 text-slate-500 font-mono"><?= $i ?></td>
                            <td class="py-2.5 pr-4 text-slate-200"><?= e($row['element_text']) ?></td>
                            <td class="py-2.5 pr-4">
                                <div class="flex items-center gap-3">
                                    <div class="h-2 rounded-full bg-slate-800 overflow-hidden flex-1 min-w-[80px]">
                                        <div class="h-full rounded-full bg-gradient-to-r from-amber-500 to-orange-400" style="width: <?= (int) round($pct) ?>%;"></div>
                                    </div>
                                    <span class="font-bold text-amber-400 whitespace-nowrap"><?= number_format((int) $row['c']) ?></span>
                                </div>
                            </td>
                            <td class="py-2.5 text-right text-slate-400 font-mono"><?= e((string) $pct) ?>%</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </section>

        <!-- Eventos recientes -->
        <section class="rounded-2xl border border-slate-800 bg-slate-900 p-5">
            <h2 class="font-semibold mb-4 text-slate-200">Últimos eventos (<?= count($recent) ?>)</h2>
            <?php if (!$recent): ?>
                <p class="text-sm text-slate-500">Sin eventos en el periodo.</p>
            <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead>
                        <tr class="text-left text-slate-400 border-b border-slate-800">
                            <th class="py-2 pr-3">Fecha</th>
                            <th class="py-2 pr-3">Tipo</th>
                            <th class="py-2 pr-3">Sección</th>
                            <th class="py-2 pr-3">Elemento</th>
                            <th class="py-2 pr-3">Página</th>
                            <th class="py-2">IP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $badge = [
                            'page_view' => ['bg-cyan-500/15 text-cyan-400', 'vista'],
                            'click'     => ['bg-emerald-500/15 text-emerald-400', 'clic'],
                            'submit'    => ['bg-amber-500/15 text-amber-400', 'form'],
                        ];
                        foreach ($recent as $r):
                            $b = $badge[$r['event_type']] ?? ['bg-slate-700 text-slate-300', e($r['event_type'])];
                        ?>
                        <tr class="border-b border-slate-800/40">
                            <td class="py-2 pr-3 text-slate-400 whitespace-nowrap font-mono"><?= e($r['created_at']) ?></td>
                            <td class="py-2 pr-3">
                                <span class="inline-block px-2 py-0.5 rounded-full text-[10px] font-semibold <?= e($b[0]) ?>"><?= e($b[1]) ?></span>
                            </td>
                            <td class="py-2 pr-3 text-slate-300"><?= e((string) ($r['section_name'] ?? '')) ?></td>
                            <td class="py-2 pr-3 text-slate-200 max-w-[260px] truncate" title="<?= e((string) ($r['element_text'] ?? '')) ?>"><?= e((string) ($r['element_text'] ?? '')) ?></td>
                            <td class="py-2 pr-3 text-slate-400 font-mono max-w-[280px] truncate"><?= e((string) $r['page_url']) ?></td>
                            <td class="py-2 text-slate-500 font-mono"><?= e((string) ($r['user_ip'] ?? '')) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </section>

        <footer class="text-center text-xs text-slate-600 pb-8">
             &copy; <a class='text-primary font-weight-bold' href='#'>Superarse.edu.ec</a>. All Rights Reserved. Designed by <a class='text-primary font-weight-bold' href='https://superarse.edu.ec/'>Instituto Superarse</a>
        </footer>
    </main>

    <script>
        // Seguridad: cierre de sesión automático tras 30 minutos sin interactuar
        (function () {
            var TIMEOUT_MS = 30 * 60 * 1000;
            var timer;
            function resetIdle() {
                clearTimeout(timer);
                timer = setTimeout(function () { window.location = '?logout=1'; }, TIMEOUT_MS);
            }
            ['click', 'keydown', 'mousemove', 'scroll', 'touchstart'].forEach(function (ev) {
                window.addEventListener(ev, resetIdle, { passive: true });
            });
            resetIdle();
        })();
    </script>
</body>
</html>