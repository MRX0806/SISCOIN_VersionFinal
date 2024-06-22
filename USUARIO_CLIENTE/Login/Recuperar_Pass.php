<?php
require_once('../../conexion.php');

// Usar namespaces de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir los archivos necesarios de PHPMailer
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

// Obtener el email del formulario POST
$email = $_POST['email'];

// Consultar si el correo electrónico existe en la base de datos
$query = "SELECT * FROM Usuarios WHERE Email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email]);

// Verificar si se encontró algún resultado
if ($stmt->rowCount() > 0) {
    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Cambia esto al servidor SMTP que estés usando
        $mail->SMTPAuth = true;
        $mail->Username = 'angel.flexmami@gmail.com'; // Tu correo electrónico
        $mail->Password = 'bpmeocclhfbvxsol'; // Tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // O PHPMailer::ENCRYPTION_SMTPS
        $mail->Port = 587; // Cambia esto si usas un puerto diferente

        // Configuración del remitente y destinatario
        $mail->setFrom('angel.flexmami@gmail.com', 'SISCOIN');
        $mail->addAddress($email);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Codigo de Seguridad';
        $mail->Body    = '<b>Te Adjuntamos tu Código de Seguridad</b> ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // Enviar el correo
        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        // Mostrar error si ocurre algún problema al enviar el correo
        echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
    }
} else {
    // Mostrar mensaje si no se encontró el correo electrónico en la base de datos
    echo "El correo electrónico ingresado no está registrado.";
}
?>
