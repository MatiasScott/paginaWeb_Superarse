<?php

/**
 * Endpoint receptor de eventos del tracker.js
 * Recibe JSON por POST y lo registra con un INSERT preparado.
 */

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('X-Robots-Tag: noindex, nofollow');
header('Cache-Control: no-store');

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    return;
}

require __DIR__ . '/db.php';

function analyticsField($value, int $max): ?string
{
    if (!is_scalar($value)) {
        return null;
    }
    $text = trim((string) preg_replace('/\s+/u', ' ', (string) $value));
    if ($text === '') {
        return null;
    }
    return function_exists('mb_substr') ? mb_substr($text, 0, $max) : substr($text, 0, $max);
}

$raw    = file_get_contents('php://input');
$payload = json_decode((string) $raw, true);

if (!is_array($payload)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid JSON']);
    return;
}

$allowedTypes   = ['page_view', 'click', 'submit'];
$eventType      = in_array($payload['event_type'] ?? '', $allowedTypes, true)
    ? (string) $payload['event_type']
    : 'click';

$pageUrl = analyticsField($payload['page_url'] ?? ($_SERVER['REQUEST_URI'] ?? '/'), 500) ?? '/';
$ip      = analyticsField($_SERVER['REMOTE_ADDR'] ?? '', 45);
$agent   = analyticsField($_SERVER['HTTP_USER_AGENT'] ?? '', 255);

$sql = 'INSERT INTO superarse_analytics
        (event_type, section_name, element_text, element_id, element_class, element_tag, page_url, user_ip, user_agent)
        VALUES
        (:event_type, :section_name, :element_text, :element_id, :element_class, :element_tag, :page_url, :user_ip, :user_agent)';

try {
    $stmt = superarseDb()->prepare($sql);
    $stmt->execute([
        ':event_type'   => $eventType,
        ':section_name' => analyticsField($payload['section_name'] ?? null, 100),
        ':element_text' => analyticsField($payload['element_text'] ?? null, 255),
        ':element_id'   => analyticsField($payload['element_id'] ?? null, 100),
        ':element_class' => analyticsField($payload['element_class'] ?? null, 255),
        ':element_tag'  => analyticsField($payload['element_tag'] ?? null, 20),
        ':page_url'     => $pageUrl,
        ':user_ip'      => $ip,
        ':user_agent'   => $agent,
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Storage failure']);
    return;
}

http_response_code(202);
echo json_encode(['ok' => true]);
