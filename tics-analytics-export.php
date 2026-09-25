<?php
/**
 * Exportador Excel (.xlsx) de analítica TICs
 * Usa la misma sesión que el dashboard (la clave nunca viaja por la URL).
 * Genera el .xlsx a mano con ZipArchive; si no hay zip, cae a CSV con BOM.
 */
declare(strict_types=1);

require_once __DIR__ . '/app/Core/Env.php';

\App\Core\Env::load(__DIR__ . '/.env');

/** Segundos de inactividad antes de cerrar la sesión. */
function ticsSessionTimeout(): int
{
    $segundos = \App\Core\Env::get('TICS_SESSION_TIMEOUT', 1800);

    return is_numeric($segundos) ? (int) $segundos : 1800;
}

header('X-Robots-Tag: noindex, nofollow, noarchive');
header('Cache-Control: no-store, private');

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

if (empty($_SESSION['tics_authorized'])) {
    http_response_code(403);
    exit('No autorizado');
}

// Seguridad: cierre de sesión por inactividad (30 min) antes de exportar
$lastActivity = (int) ($_SESSION['tics_last_activity'] ?? 0);
if ($lastActivity > 0 && (time() - $lastActivity) > ticsSessionTimeout()) {
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
    }
    session_destroy();
    http_response_code(403);
    exit('Sesión expirada por inactividad');
}
$_SESSION['tics_last_activity'] = time();

require __DIR__ . '/api/analytics/db.php';

function normDate(string $value): ?string
{
    $v = trim($value);
    $d = DateTime::createFromFormat('!Y-m-d', $v);
    return ($d && $d->format('Y-m-d') === $v) ? $v : null;
}

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

try {
    $pdo = superarseDb();

    $st = $pdo->prepare(
        'SELECT event_type, COUNT(*) AS c FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ? GROUP BY event_type'
    );
    $st->execute([$start, $end]);
    $totals = ['page_view' => 0, 'click' => 0, 'submit' => 0, 'total' => 0];
    foreach ($st->fetchAll() as $r) {
        if (isset($totals[$r['event_type']])) {
            $totals[$r['event_type']] = (int) $r['c'];
        }
        $totals['total'] += (int) $r['c'];
    }

    $st = $pdo->prepare(
        'SELECT COALESCE(NULLIF(section_name, \'\'), \'Sin sección\') AS nombre, COUNT(*) AS c
         FROM superarse_analytics WHERE created_at >= ? AND created_at <= ?
         GROUP BY nombre ORDER BY c DESC'
    );
    $st->execute([$start, $end]);
    $sections = $st->fetchAll();

    $st = $pdo->prepare(
        'SELECT element_text, COUNT(*) AS c FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ? AND event_type = \'click\'
           AND element_text IS NOT NULL AND element_text <> \'\'
         GROUP BY element_text ORDER BY c DESC, MAX(id) DESC LIMIT 10'
    );
    $st->execute([$start, $end]);
    $topElements = $st->fetchAll();

    $st = $pdo->prepare(
        'SELECT id, created_at, event_type, section_name, element_text, element_id,
                element_class, element_tag, page_url, user_ip
         FROM superarse_analytics
         WHERE created_at >= ? AND created_at <= ?
         ORDER BY id DESC
         LIMIT 50000'
    );
    $st->execute([$start, $end]);
    $rows = $st->fetchAll();
} catch (Throwable $e) {
    http_response_code(500);
    exit('Error al consultar la base de datos: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
}

// ---------------------------------------------------------------------
// Hoja 1: Resumen (con estilos profesionales)
// 's' => estilo (0 datos, 1 título, 2 encabezado, 3 fila sección, 4 etiqueta, 5 texto)
// 'merge' => la fila ocupa las 2 columnas (A:B)
// ---------------------------------------------------------------------
$resumen = [
    ['s' => 1, 'merge' => true, 'c' => ['Instituto Superior Tecnológico Superarse — Analítica TICs', '']],
    ['s' => 4, 'c' => ['Periodo analizado', $startDate . ' al ' . $endDate]],
    ['s' => 4, 'c' => ['Generado (hora de Ecuador, UTC-5)', date('Y-m-d H:i:s')]],
    ['s' => 0, 'c' => ['', '']],
    ['s' => 2, 'c' => ['Indicador', 'Valor']],
    ['s' => 0, 'c' => ['Visitas de página', $totals['page_view']]],
    ['s' => 0, 'c' => ['Clics', $totals['click']]],
    ['s' => 0, 'c' => ['Formularios enviados', $totals['submit']]],
    ['s' => 0, 'c' => ['Eventos totales', $totals['total']]],
    ['s' => 0, 'c' => ['', '']],
    ['s' => 3, 'merge' => true, 'c' => ['Eventos por sección', '']],
    ['s' => 2, 'c' => ['Sección', 'Eventos']],
];
foreach ($sections as $r) {
    $resumen[] = ['s' => 0, 'c' => [(string) $r['nombre'], (int) $r['c']]];
}
$resumen[] = ['s' => 0, 'c' => ['', '']];
$resumen[] = ['s' => 3, 'merge' => true, 'c' => ['Top 10 elementos cliqueados', '']];
$resumen[] = ['s' => 2, 'c' => ['Texto del elemento', 'Clics']];
foreach ($topElements as $r) {
    $resumen[] = ['s' => 0, 'c' => [(string) $r['element_text'], (int) $r['c']]];
}

// ---------------------------------------------------------------------
// Hoja 2: Eventos (detalle según el filtro activo)
// ---------------------------------------------------------------------
$eventos = [
    ['s' => 2, 'c' => [
        'ID', 'Fecha', 'Tipo', 'Sección', 'Texto elemento', 'ID elemento',
        'Clase elemento', 'Etiqueta', 'URL página', 'IP',
    ]],
];
foreach ($rows as $r) {
    $eventos[] = ['s' => 5, 'c' => [
        (int) $r['id'],
        (string) $r['created_at'],
        (string) $r['event_type'],
        (string) ($r['section_name'] ?? ''),
        (string) ($r['element_text'] ?? ''),
        (string) ($r['element_id'] ?? ''),
        (string) ($r['element_class'] ?? ''),
        (string) ($r['element_tag'] ?? ''),
        (string) $r['page_url'],
        (string) ($r['user_ip'] ?? ''),
    ]];
}

$filename = 'superarse_analytics_' . $startDate . '_' . $endDate;

// ---------------------------------------------------------------------
// Generación del .xlsx (ZipArchive, sin librerías externas)
// ---------------------------------------------------------------------
function xlsxColLetter(int $i): string
{
    $s = '';
    while ($i >= 0) {
        $s = chr(65 + ($i % 26)) . $s;
        $i = intdiv($i, 26) - 1;
    }
    return $s;
}

/**
 * Serializa una hoja de cálculo.
 * - Cada fila: ['s' => estilo, 'c' => [valores...]] o [valores...]
 * - $cols: anchos de columna (unidades de caracteres de Excel)
 */
function xlsxSheetXml(array $rows, array $cols = [], array $merges = []): string
{
    $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">';
    if ($cols) {
        $xml .= '<cols>';
        foreach ($cols as $i => $w) {
            $xml .= '<col min="' . ($i + 1) . '" max="' . ($i + 1) . '" width="' . $w . '" customWidth="1"/>';
        }
        $xml .= '</cols>';
    }
    $xml .= '<sheetData>';
    foreach (array_values($rows) as $r => $row) {
        $rowNum = $r + 1;
        $cells  = (isset($row['c']) && is_array($row['c'])) ? $row['c'] : $row;
        $st     = (int) ($row['s'] ?? 0);
        $xml .= '<row r="' . $rowNum . '">';
        foreach (array_values($cells) as $c => $v) {
            $ref = xlsxColLetter($c) . $rowNum;
            if ($v === null || $v === '') {
                $xml .= '<c r="' . $ref . '" s="' . $st . '"/>';
                continue;
            }
            if (is_int($v) || is_float($v)) {
                $xml .= '<c r="' . $ref . '" s="' . $st . '"><v>' . $v . '</v></c>';
            } else {
                $text = htmlspecialchars((string) $v, ENT_XML1 | ENT_QUOTES, 'UTF-8');
                $xml .= '<c r="' . $ref . '" s="' . $st . '" t="inlineStr"><is><t xml:space="preserve">' . $text . '</t></is></c>';
            }
        }
        $xml .= '</row>';
    }
    $xml .= '</sheetData>';
    if ($merges) {
        $xml .= '<mergeCells count="' . count($merges) . '">';
        foreach ($merges as $m) {
            $xml .= '<mergeCell ref="' . $m . '"/>';
        }
        $xml .= '</mergeCells>';
    }
    return $xml . '</worksheet>';
}

function buildXlsx(array $sheets): ?string
{
    if (!extension_loaded('zip')) {
        return null;
    }
    $tmp = tempnam(sys_get_temp_dir(), 'xl');
    if ($tmp === false) {
        return null;
    }
    $zip = new ZipArchive();
    if ($zip->open($tmp, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
        return null;
    }

    $n = count($sheets);
    $types = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">'
        . '<Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>'
        . '<Default Extension="xml" ContentType="application/xml"/>'
        . '<Override PartName="/xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml"/>'
        . '<Override PartName="/xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml"/>';
    for ($i = 1; $i <= $n; $i++) {
        $types .= '<Override PartName="/xl/worksheets/sheet' . $i . '.xml"'
            . ' ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml"/>';
    }
    $types .= '</Types>';

    $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">'
        . '<Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/>'
        . '</Relationships>';

    $wb = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main"'
        . ' xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><sheets>';
    $wbRels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">';
    foreach (array_values($sheets) as $i => $sheet) {
        $num = $i + 1;
        $name = htmlspecialchars((string) $sheet['name'], ENT_XML1 | ENT_QUOTES, 'UTF-8');
        $wb .= '<sheet name="' . $name . '" sheetId="' . $num . '" r:id="rId' . $num . '"/>';
        $wbRels .= '<Relationship Id="rId' . $num . '"'
            . ' Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet"'
            . ' Target="worksheets/sheet' . $num . '.xml"/>';
    }
    $stylesRid = $n + 1;
    $wbRels .= '<Relationship Id="rId' . $stylesRid . '"'
        . ' Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/styles"'
        . ' Target="styles.xml"/>';
    $wbRels .= '</Relationships>';
    $wb .= '</sheets></workbook>';

    $styles = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
        . '<styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main">'
        // fuentes: 0 normal, 1 título (negrita 14), 2 encabezado (negrita 11 blanca), 3 sección (negrita oscura)
        . '<fonts count="4">'
        . '<font><sz val="11"/><color rgb="FF212121"/><name val="Calibri"/><family val="2"/></font>'
        . '<font><b/><sz val="14"/><color rgb="FFFFFFFF"/><name val="Calibri"/><family val="2"/></font>'
        . '<font><b/><sz val="11"/><color rgb="FFFFFFFF"/><name val="Calibri"/><family val="2"/></font>'
        . '<font><b/><sz val="11"/><color rgb="FF1F2937"/><name val="Calibri"/><family val="2"/></font>'
        . '</fonts>'
        // rellenos: 0 none, 1 gray125 (obligatorio), 2 teal oscuro,3 gris claro
        . '<fills count="4">'
        . '<fill><patternFill patternType="none"/></fill>'
        . '<fill><patternFill patternType="gray125"/></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FF0F766E"/><bgColor indexed="64"/></patternFill></fill>'
        . '<fill><patternFill patternType="solid"><fgColor rgb="FFE2E8F0"/><bgColor indexed="64"/></patternFill></fill>'
        . '</fills>'
        // bordes: 0 ninguno, 1 delgado
        . '<borders count="2">'
        . '<border><left/><right/><top/><bottom/><diagonal/></border>'
        . '<border><left style="thin"><color rgb="FF94A3B8"/></left><right style="thin"><color rgb="FF94A3B8"/></right><top style="thin"><color rgb="FF94A3B8"/></top><bottom style="thin"><color rgb="FF94A3B8"/></bottom><diagonal/></border>'
        . '</borders>'
        . '<cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0"/></cellStyleXfs>'
        // estilos de celda: 0 datos, 1 título, 2 encabezado, 3 fila sección, 4 etiqueta, 5 texto con ajuste
        . '<cellXfs count="6">'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" xfId="0" applyFont="1" applyBorder="1"/>'
        . '<xf numFmtId="0" fontId="1" fillId="2" borderId="0" xfId="0" applyFont="1" applyFill="1"><alignment vertical="center"/></xf>'
        . '<xf numFmtId="0" fontId="2" fillId="2" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1"><alignment horizontal="center" vertical="center" wrapText="1"/></xf>'
        . '<xf numFmtId="0" fontId="3" fillId="3" borderId="1" xfId="0" applyFont="1" applyFill="1" applyBorder="1"><alignment vertical="center"/></xf>'
        . '<xf numFmtId="0" fontId="3" fillId="0" borderId="1" xfId="0" applyFont="1" applyBorder="1"/>'
        . '<xf numFmtId="0" fontId="0" fillId="0" borderId="1" xfId="0" applyFont="1" applyBorder="1"><alignment vertical="top" wrapText="1"/></xf>'
        . '</cellXfs>'
        . '<cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0"/></cellStyles>'
        . '</styleSheet>';

    $zip->addFromString('[Content_Types].xml', $types);
    $zip->addFromString('_rels/.rels', $rels);
    $zip->addFromString('xl/workbook.xml', $wb);
    $zip->addFromString('xl/_rels/workbook.xml.rels', $wbRels);
    $zip->addFromString('xl/styles.xml', $styles);
    foreach (array_values($sheets) as $i => $sheet) {
        $zip->addFromString(
            'xl/worksheets/sheet' . ($i + 1) . '.xml',
            xlsxSheetXml($sheet['rows'], $sheet['cols'] ?? [], $sheet['merges'] ?? [])
        );
    }
    $zip->close();

    $data = file_get_contents($tmp);
    @unlink($tmp);
    return ($data === false || $data === '') ? null : $data;
}

$resumenMerges = [];
foreach ($resumen as $i => $row) {
    if (!empty($row['merge'])) {
        $resumenMerges[] = 'A' . ($i + 1) . ':B' . ($i + 1);
    }
}

$payload = buildXlsx([
    [
        'name'   => 'Resumen',
        'cols'   => [48, 24],
        'rows'   => $resumen,
        'merges' => $resumenMerges,
    ],
    [
        'name' => 'Eventos',
        'cols' => [7, 20, 10, 16, 70, 13, 28, 9, 50, 15],
        'rows' => $eventos,
    ],
]);

if ($payload !== null) {
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '.xlsx"');
    header('Content-Length: ' . strlen($payload));
    echo $payload;
    exit;
}

// Fallback: CSV compatible con Excel (BOM UTF-8 + separador ";")
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="' . $filename . '.csv"');
$out = fopen('php://output', 'w');
fwrite($out, "\xEF\xBB\xBF");       // BOM UTF-8
fwrite($out, "sep=;\n");            // Excel en español usa punto y coma
foreach ($eventos as $row) {
    fputcsv($out, (array) ($row['c'] ?? $row), ';', '"', '\\');
}
fclose($out);
