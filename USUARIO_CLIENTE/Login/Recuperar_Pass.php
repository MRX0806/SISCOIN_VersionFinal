<?php
session_start();
require_once('../../conexion.php');

// Usar namespaces de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Incluir los archivos necesarios de PHPMailer
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

// Función para generar un código aleatorio de 8 caracteres
function generarCodigo($longitud = 8) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

// Obtener el email del formulario POST
$email = $_POST['email'];

// Consultar si el correo electrónico existe en la base de datos
$query = "SELECT * FROM Usuarios WHERE Email = :email";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email]);

// Verificar si se encontró algún resultado
if ($stmt->rowCount() > 0) {
    // Generar un código de recuperación de 8 caracteres
    $codigoRecuperacion = generarCodigo();

    // Guardar el código en la base de datos
    $updateQuery = "UPDATE Usuarios SET Recovery_Code = :codigo WHERE Email = :email";
    $stmt = $pdo->prepare($updateQuery);
    $stmt->execute(['codigo' => $codigoRecuperacion, 'email' => $email]);

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'angel.flexmami@gmail.com';
        $mail->Password = 'bpmeocclhfbvxsol';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('angel.flexmami@gmail.com', 'SISCOIN');
        $mail->addAddress($email);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Codigo de Seguridad';
        $mail->Body    = '<b>Te Adjuntamos tu Código de Seguridad: ' . $codigoRecuperacion . '</b>';
        $mail->AltBody = 'Te Adjuntamos tu Código de Seguridad: ' . $codigoRecuperacion;

        // Enviar el correo
        $mail->send();
        $_SESSION['email'] = $email; // Guardar el email en la sesión
        $_SESSION['message'] = 'El código de recuperación ha sido enviado a tu correo electrónico.';
        $_SESSION['message_type'] = 'success';
    } catch (Exception $e) {
        // Mostrar error si ocurre algún problema al enviar el correo
        $_SESSION['message'] = "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
        $_SESSION['message_type'] = 'error';
    }
} else {
    // Mostrar mensaje si no se encontró el correo electrónico en la base de datos
    $_SESSION['message'] = "El correo electrónico ingresado no está registrado.";
    $_SESSION['message_type'] = 'error';
}

// Redirigir de vuelta a la página original
header('Location: Recuperar_Contraseña.php');
exit();
?>
