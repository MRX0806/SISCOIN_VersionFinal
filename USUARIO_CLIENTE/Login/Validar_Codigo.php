<?php
session_start();
require_once('../../conexion.php');

// Obtener el código del formulario POST
$codigoIngresado = $_POST['codigo'];

// Obtener el email de la sesión
$email = $_SESSION['email'];

// Consultar si el código ingresado coincide con el código almacenado en la base de datos
$query = "SELECT * FROM Usuarios WHERE Email = :email AND Recovery_Code = :codigo";
$stmt = $pdo->prepare($query);
$stmt->execute(['email' => $email, 'codigo' => $codigoIngresado]);

// Verificar si se encontró algún resultado
if ($stmt->rowCount() > 0) {
    // Código válido, obtener la contraseña del usuario
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    $contrasenaActual = $usuario['Password']; // Asegúrate de que el campo de la contraseña se llama 'Password'

    // Preparar el mensaje para la alerta JavaScript
    $mensaje = "Código ingresado: " . htmlspecialchars($codigoIngresado) . "\nContraseña recuperada: " . $contrasenaActual;

    // Mostrar el mensaje en una alerta JavaScript
    echo '<script>
            alert("' . $mensaje . '");
            window.location="../Login/Login.php";
         </script>';
} else {
    // Código inválido
    $_SESSION['message'] = "El código ingresado no es válido.";
    $_SESSION['message_type'] = 'error';

    // Redirigir de vuelta a la página original
    header('Location: Recuperar_Contraseña.php');
    exit();
}
?>
