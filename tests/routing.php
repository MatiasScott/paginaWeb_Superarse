<?php

declare(strict_types=1);

define('ROOT_PATH', dirname((string) realpath(__FILE__), 2));
spl_autoload_register(static function (string $class): void {
    if (str_starts_with($class, 'App\\')) {
        require ROOT_PATH . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
    }
});

$mode = $argv[1] ?? 'subdirectory';
putenv('APP_URL=auto');
putenv('APP_BASE_PATH=auto');
$_SERVER['DOCUMENT_ROOT'] = $mode === 'root' ? ROOT_PATH : dirname(ROOT_PATH);
if ($mode === 'windows') {
    $_SERVER['DOCUMENT_ROOT'] = strtoupper(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']));
}
if ($mode === 'fallback') {
    $_SERVER['DOCUMENT_ROOT'] = '';
}
if ($mode === 'explicit') {
    putenv('APP_BASE_PATH=/custom/base');
}
$_SERVER['SCRIPT_NAME'] = '/' . basename(ROOT_PATH) . '/public/index.php';
$_SERVER['HTTP_HOST'] = 'localhost';
require ROOT_PATH . '/app/Core/helpers.php';

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

$expectedBase = $mode === 'explicit' ? '/custom/base' : ($mode === 'root' ? '' : '/' . basename(ROOT_PATH));
check(base() === $expectedBase, 'Incorrect detected base: ' . base());
check(url('/balancesAuditados2025') === $expectedBase . '/balancesAuditados2025', 'Document base missing');
check(url(url('ECSOS')) === url('ECSOS'), 'Duplicated base');
check(url(base()) === ($expectedBase === '' ? '/' : $expectedBase), 'Bare base duplicated');
foreach (['#', '#panel', '?tipo=contrato', 'https://example.com/x', '//example.com/x', 'mailto:a@example.com', 'tel:123'] as $external) {
    check(url($external) === $external, 'Modified external URL: ' . $external);
}

$definitions = require ROOT_PATH . '/routes/web.php';
$router = new \App\Core\Router($definitions);
$cases = [
    [$expectedBase . '/Balances-Auditados?url=Noticias', [], 'Balances-Auditados'],
    [$expectedBase . '/balancesAuditados2025/', [], 'balancesAuditados2025'],
    [$expectedBase . '/MARKETING_DISE%C3%91O_MULTIMEDIA', [], 'MARKETING_DISEÑO_MULTIMEDIA'],
    [$expectedBase . '/Solicitudes/subir?tipo=contrato', ['tipo' => 'contrato'], 'Solicitudes/subir'],
    [$expectedBase . '/public/index.php?url=Balances-Auditados', ['url' => 'Balances-Auditados'], 'Balances-Auditados'],
    [$expectedBase . '/index.php?url=Balances-Auditados', ['url' => 'Balances-Auditados'], 'Balances-Auditados'],
    [$expectedBase . '/', [], ''],
];
foreach ($cases as [$uri, $query, $expected]) {
    $_SERVER['REQUEST_URI'] = $uri;
    $_GET = $query;
    check($router->requestPath() === $expected, 'Incorrect request path: ' . $uri);
}

foreach ($definitions['routes'] as $path => $definition) {
    check(class_exists($definition['model']), 'Missing model: ' . $path);
    check(method_exists($definition['controller'], $definition['action']), 'Missing action: ' . $path);
}
foreach ($definitions['careers'] as $school => $definition) {
    check(method_exists($definition['controller'], 'showCareer'), 'Missing career action: ' . $school);
}
check(!$router->dispatch('ruta-inexistente'), 'Unknown route accepted');

ob_start();
check($router->dispatch('Balances-Auditados'), 'Balance page not dispatched');
$html = ob_get_clean();
check(str_contains($html, 'href="' . $expectedBase . '/balancesAuditados2025"'), 'Rendered 2025 link is incorrect');
check(str_contains($html, 'href="' . $expectedBase . '/balancesAuditados"'), 'Rendered 2024 link is incorrect');

$documents = new \App\Models\Document\DocumentModel(ROOT_PATH);
foreach (['/balancesAuditados2025' => '2025.pdf', '/balancesAuditados' => '2024-1.pdf', '/bancesAuditados' => '2024-1.pdf'] as $alias => $suffix) {
    $file = $documents->find($alias);
    check($file !== null && str_ends_with($file, $suffix), 'Wrong balance year: ' . $alias);
    check(is_file($documents->absolutePath($file)), 'Missing balance file: ' . $alias);
}
echo 'PASS routing (' . $mode . '): ' . count($definitions['routes']) . " registered handlers\n";
