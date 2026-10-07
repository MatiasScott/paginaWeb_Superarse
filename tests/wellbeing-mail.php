<?php
declare(strict_types=1);

define('ROOT_PATH', dirname(__DIR__));
spl_autoload_register(static function (string $class): void {
    if (str_starts_with($class, 'App\\')) {
        require ROOT_PATH . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
    }
});

function check(bool $condition, string $message): void
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

// Capture delivery without connecting to SMTP or sending student data.
final class RecordingMailer
{
    public const ENCRYPTION_STARTTLS = 'tls';
    public static array $sent = [];
    public static string $result = 'success';
    public string $Host = '';
    public bool $SMTPAuth = false;
    public string $Username = '';
    public string $Password = '';
    public string $SMTPSecure = '';
    public int $Port = 0;
    public string $CharSet = '';
    public string $Subject = '';
    public string $Body = '';
    public string $AltBody = '';
    public array $addresses = [];
    public array $attachments = [];
    public array $from = [];

    public function __construct(bool $exceptions) {}
    public function isSMTP(): void {}
    public function isHTML(bool $html): void {}
    public function setFrom(string $address, string $name): void { $this->from = [$address, $name]; }
    public function addAddress(string $address): void { $this->addresses[] = $address; }
    public function addStringAttachment(string $data, string $name, string $encoding, string $type): void
    {
        $this->attachments[] = compact('data', 'name', 'encoding', 'type');
    }
    public function send(): bool
    {
        if (self::$result === 'exception') {
            throw new RuntimeException('Simulated SMTP authentication failure');
        }
        if (self::$result === 'false') {
            return false;
        }
        self::$sent[] = clone $this;
        return true;
    }
}

putenv('SUPERARSE_SMTP_HOST=smtp.example.test');
putenv('SUPERARSE_SMTP_USERNAME=sender@example.test');
putenv('SUPERARSE_SMTP_FROM=sender@example.test');
putenv('SUPERARSE_SMTP_PASSWORD=test-only-not-a-real-password');

if (($argv[1] ?? '') === 'config') {
    $mail = \App\Core\InstitutionalMailer::create('Test');
    check($mail->Mailer === 'smtp', 'SMTP transport missing');
    check($mail->Host === 'smtp.example.test' && $mail->SMTPAuth, 'Incorrect SMTP host/auth');
    check($mail->Username === 'sender@example.test' && $mail->From === 'sender@example.test', 'Sender changed');
    check($mail->Port === 587 && $mail->SMTPSecure === 'tls', 'STARTTLS configuration changed');
    check($mail->CharSet === 'UTF-8', 'Incorrect mail charset');
    echo "PASS real PHPMailer configuration (no delivery)\n";
    exit;
}

class_alias(RecordingMailer::class, \PHPMailer\PHPMailer\PHPMailer::class);
require ROOT_PATH . '/vendor/autoload.php';

$buzon = new \App\Models\Buzon\BuzonModel();
$bienestar = new \App\Models\Services\FormularioBienestarModel();
$destination = 'informacion@superarse.edu.ec';
check($buzon->destinatarios() === [$destination], 'Incorrect mailbox recipient');
check($bienestar->datosInstitucionales()['emailDestino'] === $destination, 'Incorrect scholarship recipient');

foreach (array_keys($buzon->tipos()) as $type) {
    check($buzon->enviar($type, 'Mensaje de prueba <script>no ejecutar</script>'), 'Mailbox delivery failed');
    $mail = RecordingMailer::$sent[array_key_last(RecordingMailer::$sent)];
    check($mail->addresses === [$destination], 'Mailbox addressed elsewhere');
    check(str_contains($mail->Body, '&lt;script&gt;'), 'Mailbox content was not escaped');
    check($mail->AltBody !== '', 'Mailbox plain text missing');
}

$_SERVER['REQUEST_METHOD'] = 'POST';
$signature = imagecreatetruecolor(100, 30);
imagefill($signature, 0, 0, imagecolorallocate($signature, 255, 255, 255));
imageline($signature, 10, 20, 90, 10, imagecolorallocate($signature, 0, 0, 0));
ob_start();
imagepng($signature);
$signaturePng = ob_get_clean();
imagedestroy($signature);
$_POST = [
    'nombre' => 'Estudiante de prueba',
    'identificacion' => 'TEST-001',
    'periodo' => '2026',
    'carrera' => 'Carrera de prueba',
    'nivel' => 'Primer',
    'tipo_beca' => 'socioeconomica',
    'telefono' => '0000000000',
    'firma_data_base64' => 'data:image/png;base64,' . base64_encode($signaturePng),
];
$controller = new \App\Controllers\Services\FormularioBienestarController($bienestar);

function submit(\App\Controllers\Services\FormularioBienestarController $controller): array
{
    http_response_code(200);
    ob_start();
    $controller->procesar();
    return [http_response_code(), ob_get_clean()];
}

[$status, $response] = submit($controller);
check($status === 200 && str_contains($response, 'enviada con éxito'), 'Scholarship not successful: ' . $response);
$mail = RecordingMailer::$sent[array_key_last(RecordingMailer::$sent)];
check($mail->addresses === [$destination], 'Scholarship addressed elsewhere');
check(count($mail->attachments) === 1, 'Scholarship attachment missing');
check($mail->attachments[0]['type'] === 'application/pdf', 'Incorrect attachment type');
check(str_starts_with($mail->attachments[0]['data'], '%PDF-'), 'Invalid PDF attachment');
check(substr_count($mail->attachments[0]['data'], '/Subtype /Image') >= 2, 'PDF signature/logo images missing');
check(preg_match_all('~/Type /Page\b~', $mail->attachments[0]['data']) === 1, 'Scholarship PDF no longer fits one page');
check(str_contains($mail->attachments[0]['data'], 'DejaVuSans'), 'Font for selected scholarship mark missing');
check($mail->attachments[0]['name'] === 'Solicitud_Beca.pdf', 'Attachment name changed');
check($mail->AltBody !== '', 'Scholarship plain text missing');

foreach (['', 'cambia-esta-clave'] as $password) {
    putenv('SUPERARSE_SMTP_PASSWORD=' . $password);
    $sentCount = count(RecordingMailer::$sent);
    check(!$buzon->enviar('queja', 'Mensaje de prueba'), 'Invalid credentials accepted');
    [$status, $response] = submit($controller);
    check($status === 500 && !str_contains($response, 'éxito'), 'Missing credentials reported success');
    check(count(RecordingMailer::$sent) === $sentCount, 'Attempted delivery with invalid credentials');
}

putenv('SUPERARSE_SMTP_PASSWORD=test-only-not-a-real-password');
foreach (['exception', 'false'] as $result) {
    RecordingMailer::$result = $result;
    check(!$buzon->enviar('queja', 'Mensaje de prueba'), 'SMTP failure accepted by mailbox');
    [$status, $response] = submit($controller);
    check($status === 500 && !str_contains($response, 'éxito'), 'SMTP failure reported success');
    check(!str_contains($response, 'authentication'), 'SMTP internals exposed');
}

$_POST['firma_data_base64'] = '';
[$status] = submit($controller);
check($status === 400, 'Missing signature accepted');
$_SERVER['REQUEST_METHOD'] = 'GET';
[$status] = submit($controller);
check($status === 405, 'Non-POST accepted');

echo "PASS wellbeing recipients, PDF attachment, credential guards and SMTP failures (delivery simulated)\n";
