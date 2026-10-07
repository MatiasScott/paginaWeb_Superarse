<?php
declare(strict_types=1);

namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;

final class InstitutionalMailer
{
    public static function create(string $name): PHPMailer
    {
        $autoload = ROOT_PATH . '/vendor/autoload.php';
        if (is_file($autoload)) {
            require_once $autoload;
        }

        if (!class_exists(PHPMailer::class)) {
            throw new \RuntimeException('Falta PHPMailer. Ejecute composer install.');
        }

        $password = getenv('SUPERARSE_SMTP_PASSWORD') ?: '';
        if ($password === '' || $password === 'cambia-esta-clave') {
            throw new \RuntimeException('Configure una credencial válida en SUPERARSE_SMTP_PASSWORD.');
        }

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = getenv('SUPERARSE_SMTP_HOST') ?: 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SUPERARSE_SMTP_USERNAME') ?: 'informacion@superarse.edu.ec';
        $mail->Password = $password;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom(getenv('SUPERARSE_SMTP_FROM') ?: 'informacion@superarse.edu.ec', $name);

        return $mail;
    }
}
