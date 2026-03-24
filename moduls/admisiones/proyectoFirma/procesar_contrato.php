<?php
// Activa la depuración de PHP para mostrar cualquier error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluye el autoload de Composer (Debe estar correcto para mPDF y PHPMailer)
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Evita salida accidental antes de generar el PDF
ob_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1️⃣ Recibir los datos del formulario
    $nombre = $_POST['nombre'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    $carrera = $_POST['carrera'] ?? '';
    $inicio_periodo = $_POST['inicio_periodo'] ?? '';
    $fin_periodo = $_POST['fin_periodo'] ?? '';
    $firma_data = $_POST['firma_data'] ?? '';
    $firma_cc = $_POST['firma_cc'] ?? '';
    $asesor = $_POST['asesor'] ?? '';
    $action = $_POST['action'] ?? '';

    // Ruta del logo institucional (Asegúrate que esta ruta sea correcta)
    $logo_path = __DIR__ . '/assets/img/Logo-Superarse-Negativo.png';

    // 2️⃣ Contenido HTML del contrato (El mismo que tenías)
    $html_content = '
    <html>
    <head>
        <meta charset="UTF-8">
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.8; color: #4a5568; }
            p { margin: 0 0 1rem 0; text-align: justify; }
            ul { list-style: none; padding-left: 1rem; text-align: justify; }
            ul li { position: relative; padding-left: 1.5rem; margin-bottom: 1rem; }
            ul li::before { content: "•"; color: #4a5568; font-weight: bold; display: inline-block; width: 1em; margin-left: -1em; }
            .signature-section { text-align: center; margin-top: 2rem; }
            .signature-section img { max-width: 400px; margin: 0 auto; }
        </style>
    </head>
    <body>
        <p>Yo, <strong>' . htmlspecialchars($nombre) . '</strong>, portador/a de la cédula de ciudadanía/pasaporte N° <strong>' . htmlspecialchars($cedula) . '</strong>, por medio del presente Contrato de Inscripción y Matrícula declaro que me he matriculado en el <strong>Instituto Superior Tecnológico Superarse</strong>, en la carrera de <strong>' . htmlspecialchars($carrera) . '</strong>, correspondiente al período académico <strong>' . htmlspecialchars($inicio_periodo) . '</strong> a <strong>' . htmlspecialchars($fin_periodo) . '</strong>. Me comprometo a lo siguiente:</p>

           <ul>
            <li>Por medio de la presente, autorizo de manera libre, expresa e informada al Instituto Superior Tecnológico Superarse para que almacene, recolecte y procese mis datos personales con fines académicos e institucionales, de conformidad con la Ley Orgánica de Protección de Datos personales. Asimismo, autorizo que esta información pueda ser compartida con los entes de control y autoridades competentes, cuando así corresponda o sea requerida a la normativa vigente.</li>
            <li>De acuerdo al <strong>Artículo 37</strong> del <strong>Reglamento de Estudiantes</strong> los valores ingresados al instituto por concepto de matrículas y aranceles no serán devueltos por el Instituto Superior Tecnológico Superarse.</li>
            <li>El alumno recibirá las credenciales de acceso a la plataforma de Gestión Académica utilizada por el Instituto, incluyendo el software institucional y todos los contenidos disponibles en dicha plataforma.</li>
            <li>Respetar la visión, misión, principios, fines y objetivos institucionales del Instituto Superior Tecnológico Superarse, de acuerdo a lo establecido en el Estatuto de la institución.</li>
            <li>Reconozco que la matrícula tiene vigencia desde la firma del presente contrato, correspondiente al periodo académico en curso, y me comprometo a cumplir con la Ley Orgánica de Educación Superior, el Reglamento General de los Institutos Superiores, el Código de Ética, el Estatuto y los Reglamentos Internos del Instituto Superior Tecnológico Superarse, aceptando que el incumplimiento de estas disposiciones podrá generar procesos disciplinarios, administrativos y/o legales en mi contra.</li>
            <li>Conocer que al momento de matricularme en el Instituto Superior Tecnológico Superarse bajo la modalidad de CRÉDITO EDUCATIVO estoy asumiendo la obligación de cancelar la totalidad de los aranceles generados y aprobados por el Órgano Colegiado Superior, me comprometo a cancelar las cuotas planteadas en las fechas indicadas por el Instituto Superior Tecnológico Superarse</li>
            <li>Conocer que el retiro académico legal se procederá únicamente presentando una solicitud dirigida a la Coordinación de Bienestar Institucional y cubriendo el costo del derecho que implique este proceso.</li>
            <li>Respetar y cumplir los Reglamentos Internos del Instituto Superior Tecnológico Superarse; y, por consiguiente, aceptar que el incumplimiento de los compromisos establecidos generará en mi contra procesos disciplinarios, administrativos y/o legales, cumpliendo todas las obligaciones determinadas para los estudiantes del Instituto Superior Tecnológico Superarse.</li>
        </ul>

        <div class="signature-section">
            <p><strong>FIRMA DEL ESTUDIANTE</strong></p>
            <img src="' . htmlspecialchars($firma_data) . '" alt="Firma del estudiante">
            <p>C.C. <strong>' . htmlspecialchars($firma_cc) . '</strong></p>
            <p>Asesor: <strong>' . htmlspecialchars($asesor) . '</strong></p>
        </div>
    </body>
    </html>';

    // 3️⃣ Crear el PDF
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 60,
        'margin_bottom' => 50
    ]);

    // Encabezado
    $header_html = '
    <div style="width: 100%; height: 100px; background: linear-gradient(to right, #005a9c, #0088cc, #4299e1); color: white; padding: 1rem 2rem; display: flex; align-items: center;">
        <img src="' . $logo_path . '" alt="Logo Superarse" style="height: 70px; width: auto; margin-right: 20px;">
        <h1 style="font-size: 1.5rem;">CONTRATO DE INSCRIPCIÓN Y MATRÍCULA</h1>
    </div>';

    // Pie de página
    $footer_html = '
    <div style="width: 100%; height: 50px; background: linear-gradient(to right, #005a9c, #0088cc, #4299e1); color: white; padding: 0.5rem 1rem;">
        <table width="100%">
            <tr>
                <td style="text-align: left;">Página {PAGENO} de {nbpg}</td>
                <td style="text-align: right;">ISTS-GD-02-001</td>
            </tr>
        </table>
    </div>';

    $mpdf->SetHTMLHeader($header_html);
    $mpdf->SetHTMLFooter($footer_html);
    $mpdf->WriteHTML($html_content);

    // 4️⃣ Generar el PDF en memoria
    $pdf_output = $mpdf->Output('contrato.pdf', 'S');

    // 5️⃣ Enviar correo si corresponde
    if ($action === 'send_and_download') {
        $mail = new PHPMailer(true);
        try {
            // ✅ SOLUCIÓN AL ERROR CN=...: USAR STARTTLS (587) Y DESACTIVAR VERIFICACIÓN SSL
            $mail->isSMTP();
            $mail->Host       = 'mail.superarse.edu.ec'; 
            $mail->SMTPAuth   = true;
            $mail->Username   = 'alexander.quinga@superarse.ec'; 
            $mail->Password   = 'Patoboris123';
            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587; 

            // Esta línea es crucial para ignorar la discrepancia del certificado (CN=cp20.intodomain.com)
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
            // Emisor (Usamos la cuenta autenticada)
            
            $mail->setFrom('alexander.quinga@superarse.ec', 'Instituto Superarse (Sistema)'); 
            
            $mail->addAddress('superarseadmisiones@gmail.com', 'Admisiones Superarse');

            $mail->Subject = 'CONTRATO DE MATRICULA ' . $nombre;
            $mail->isHTML(true);
            
            // Reemplazo del Body (tuve que ponerlo aquí ya que el tuyo estaba como '...')
            $mail->Body = '
                <p>Estimados,</p>
                <p>Adjuntamos el contrato de matrícula correspondiente al estudiante <strong>' . htmlspecialchars($nombre) . '</strong> (Cédula: ' . htmlspecialchars($cedula) . ').</p>
                <p>Saludos cordiales,<br><strong>Instituto Superior Tecnológico Superarse</strong></p>
            ';

            $filename = 'contrato_' . str_replace(' ', '_', $nombre) . '.pdf';
            $mail->addStringAttachment($pdf_output, $filename, 'base64', 'application/pdf');

            $mail->send();
            error_log("✅ Correo enviado correctamente via SMTP al enviar el contrato de $nombre");
        } catch (Exception $e) {
            // Manejo de errores corregido para dar mejor feedback
            error_log("❌ Error al enviar el correo: " . $mail->ErrorInfo);
            // Muestra el error al usuario si la conexión falla (y aún permite descargar el PDF)
            echo "<script>alert('Error de conexión SMTP: El correo no se pudo enviar. Causa: " . str_replace("'", "\'", $mail->ErrorInfo) . "');</script>";
        }
    }

    // 6️⃣ Descargar el PDF en el navegador del usuario (siempre ocurre después de intentar enviar)
    ob_end_clean();
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="contrato_' . str_replace(' ', '_', $nombre) . '.pdf"');
    echo $pdf_output;

} else {
    echo "Acceso no válido.";
}
?>