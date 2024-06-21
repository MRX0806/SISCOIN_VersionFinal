<?php
// Incluir archivo de conexión a la base de datos
require_once  '../../conexion.php'; // Incluye el archivo que contiene la función de conexión
require_once '../SISCOIN_VersionFinal/phpmailer/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico ingresado por el usuario
    $email = $_POST['email'];

    // Consultar si el correo electrónico existe en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM Usuarios WHERE Email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // El correo electrónico existe en la base de datos
        // Generar un código de recuperación de 8 caracteres alfanuméricos
        $codigoRecuperacion = generarCodigoRecuperacion();

        // Guardar el código de recuperación en la base de datos (ejemplo)
        guardarCodigoRecuperacion($email, $codigoRecuperacion);

        // Enviar el código de recuperación por correo electrónico
        enviarCodigoRecuperacion($email, $codigoRecuperacion);

        // Redirigir a la página donde se verifica el código
        header('Location: Verificar_Codigo.php');
        exit();
    } else {
        // El correo electrónico no existe en la base de datos
        echo "El correo electrónico ingresado no está registrado.";
        // Puedes redirigir o mostrar un mensaje de error, según tu diseño
    }
}

// Función para generar un código de recuperación aleatorio de 8 caracteres alfanuméricos
function generarCodigoRecuperacion() {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longitud = 8;
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

// Función para guardar el código de recuperación en la base de datos (ejemplo)
function guardarCodigoRecuperacion($email, $codigoRecuperacion) {
    global $pdo;

    try {
        // Preparar la consulta SQL para insertar el código de recuperación
        $stmt = $pdo->prepare("UPDATE Usuarios SET Recovery_Code = :codigo WHERE Email = :email");
        
        $stmt->execute(['codigo' => $codigoRecuperacion, 'email' => $email]);

        // Opcional: Puedes verificar si se insertó correctamente
        if ($stmt->rowCount() > 0) {
            return true; // Éxito al guardar el código
        } else {
            return false; // Fallo al guardar el código
        }
    } catch (PDOException $e) {
        // Manejo de errores: Puedes registrar el error o manejarlo de otra manera
        echo "Error al guardar el código de recuperación: " . $e->getMessage();
        return false;
    }
}

function enviarCodigoRecuperacion($email, $codigoRecuperacion) {
    global $pdo; // Asegúrate de tener acceso a la conexión PDO global aquí

    try {
        // Consultar la información del usuario basada en el correo electrónico
        $stmt = $pdo->prepare("SELECT Name_Complete, Email FROM Usuarios WHERE Email = :email");
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Información del usuario
            $nombreCompleto = $usuario['Name_Complete'];
            $destinatario = $usuario['Email'];

            // Configurar PHPMailer
            $mail = new PHPMailer(true); // True habilita excepciones
            $mail->isSMTP();
            $mail->Host = 'smtp.tudominio.com'; // Cambiar por el servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@tudominio.com'; // Cambiar por tu correo
            $mail->Password = 'tu_contraseña'; // Cambiar por tu contraseña
            $mail->SMTPSecure = 'tls'; // O ssl, dependiendo de tu configuración
            $mail->Port = 587; // O el puerto que uses para SMTP
            $mail->setFrom('tu_correo@tudominio.com', 'Tu Nombre'); // Cambiar por tu información
            $mail->addAddress($destinatario, $nombreCompleto); // Destinatario

            // Contenido del correo
            $mail->isHTML(false); // O true si el contenido es HTML
            $mail->Subject = 'Código de Recuperación de Contraseña';
            $mail->Body = "Hola $nombreCompleto,\n\nTu código de recuperación es: $codigoRecuperacion\n\nGracias,\nTu equipo de soporte";

            // Enviar el correo
            $mail->send();
            echo "Se ha enviado el código de recuperación a $destinatario.";
        } else {
            echo "No se encontró el usuario con el correo electrónico $email en la base de datos.";
        }
    } catch (PDOException $e) {
        // Manejo de errores de la base de datos
        echo "Error al recuperar información del usuario: " . $e->getMessage();
    } catch (Exception $e) {
        // Manejo de errores de PHPMailer
        echo "Error al enviar el correo de recuperación: " . $mail->ErrorInfo;
    }
}

?>
