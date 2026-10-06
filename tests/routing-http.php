<?php

declare(strict_types=1);

$site = rtrim($argv[1] ?? 'http://localhost/paginaWeb_Superarse', '/');
$root = dirname((string) realpath(__FILE__), 2);
$definitions = require $root . '/routes/web.php';
$base = (string) (parse_url($site, PHP_URL_PATH) ?? '');
$failures = [];
$checks = 0;

function request(string $url, string $method = 'GET'): array
{
    $context = stream_context_create(['http' => [
        'method' => $method,
        'ignore_errors' => true,
        'follow_location' => 0,
        'timeout' => 15,
    ]]);
    $body = file_get_contents($url, false, $context);
    if ($body === false) {
        throw new RuntimeException('Cannot connect to ' . $url);
    }
    return [$http_response_header, $body];
}

foreach ($definitions['routes'] as $path => $definition) {
    if ($definition['action'] !== 'show') {
        continue;
    }
    [$headers, $body] = request($site . '/' . $path);
    $checks++;
    if (!str_contains($headers[0], ' 200 ')) {
        $failures[] = $path . ': ' . $headers[0];
    }
    if (preg_match('/(?:Fatal error|Warning:|Parse error)/i', $body)) {
        $failures[] = $path . ': PHP error in response';
    }
    $dom = new DOMDocument();
    $previous = libxml_use_internal_errors(true);
    $dom->loadHTML($body);
    libxml_clear_errors();
    libxml_use_internal_errors($previous);
    $xpath = new DOMXPath($dom);
    foreach ($xpath->query('//@href | //@src | //@action | //@data-pdf-src') as $attribute) {
        $value = $attribute->nodeValue;
        if ($base !== '' && str_starts_with($value, '/') && !str_starts_with($value, '//') && $value !== $base && !str_starts_with($value, $base . '/')) {
            $failures[] = $path . ': missing base in ' . $attribute->nodeName . '=' . $value;
        }
    }
}

foreach (['ECSOS/topografia', 'ECAVET/enfermeria-veterinaria', 'ECSET/educacion-basica', 'Solicitudes/subir?tipo=contrato', 'Balances-Auditados/', 'Balances-Auditados?url=Noticias', 'public/index.php?url=Balances-Auditados'] as $path) {
    [$headers, $body] = request($site . '/' . $path);
    $checks++;
    if (!str_contains($headers[0], ' 200 ') || preg_match('/(?:Fatal error|Warning:|Parse error)/i', $body)) {
        $failures[] = $path . ': invalid page response';
    }
    if (str_starts_with($path, 'Balances-Auditados') && !str_contains($body, $base . '/balancesAuditados2025')) {
        $failures[] = $path . ': missing balance link';
    }
}

foreach (require $root . '/routes/documents.php' as $alias => $file) {
    [$headers] = request($site . '/' . rawurlencode(ltrim($alias, '/')), 'HEAD');
    $checks++;
    if (!str_contains($headers[0], ' 200 ')) {
        $failures[] = $alias . ': ' . $headers[0] . ' (' . $file . ')';
    } elseif (!preg_grep('/^Content-Type: application\//i', $headers)) {
        $failures[] = $alias . ': invalid document MIME';
    }
}

foreach (['balancesAuditados2025', 'balancesAuditados', 'bancesAuditados'] as $alias) {
    [$headers, $body] = request($site . '/' . $alias);
    $checks++;
    $files = require $root . '/routes/documents.php';
    if (!str_starts_with($body, '%PDF-') || hash('sha256', $body) !== hash_file('sha256', $root . '/' . $files['/' . $alias])) {
        $failures[] = $alias . ': incorrect PDF content';
    }
}

[$headers] = request($site . '/index.html?test=1', 'HEAD');
$checks++;
if (!str_contains($headers[0], ' 301 ') || !in_array('Location: ' . $site . '/?test=1', $headers, true)) {
    $failures[] = 'index.html: incorrect canonical redirect';
}
[$headers] = request($site . '/ruta-inexistente', 'HEAD');
$checks++;
if (!str_contains($headers[0], ' 404 ')) {
    $failures[] = 'Unknown route did not return 404';
}
[$headers] = request($site . '/js/common/config.js', 'HEAD');
$checks++;
if (!str_contains($headers[0], ' 200 ')) {
    $failures[] = 'Static files are not accessible';
}

if ($failures !== []) {
    fwrite(STDERR, implode("\n", array_unique($failures)) . "\n");
    exit(1);
}
echo 'PASS Apache: ' . $checks . " page/document/redirect checks\n";
