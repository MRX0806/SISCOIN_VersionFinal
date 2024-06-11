<?php
include '../../conexion.php'; // Incluye el archivo que contiene la función de conexión

// Verificar si se ha enviado el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar los datos del formulario
    $name_complete = filter_input(INPUT_POST, 'Nombre_Completo', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'Correo', FILTER_VALIDATE_EMAIL);
    $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Verificar si alguno de los campos está vacío
    if (!$name_complete || !$email || !$user || !$password) {
        $error_message = "Por favor completa todos los campos.";
        header("Location: Registrar.php?error_message=" . urlencode($error_message));
        exit();
    }

    try {
        // Verificar si el correo ya está registrado
        $verif_correo_query = "SELECT * FROM usuarios WHERE Email = :email";
        $verif_stmt = $pdo->prepare($verif_correo_query); // Preparar la consulta
        $verif_stmt->bindParam(':email', $email, PDO::PARAM_STR); // Asociar parámetros
        $verif_stmt->execute(); // Ejecutar la consulta

        if ($verif_stmt->rowCount() > 0) {
            $error_message = "Este correo ya ha sido registrado, por favor intenta con otro correo diferente.";
            header("Location: Registrar.php?error_message=" . urlencode($error_message));
            exit();
        }

        // Preparar la consulta SQL para insertar los datos
        $insert_query = "INSERT INTO usuarios (Name_Complete, Email, User, Password) VALUES (:name_complete, :email, :user, :password)";
        $insert_stmt = $pdo->prepare($insert_query); // Preparar la consulta
        $insert_stmt->bindParam(':name_complete', $name_complete, PDO::PARAM_STR); // Asociar parámetros
        $insert_stmt->bindParam(':email', $email, PDO::PARAM_STR); // Asociar parámetros
        $insert_stmt->bindParam(':user', $user, PDO::PARAM_STR); // Asociar parámetros
        $insert_stmt->bindParam(':password', $password, PDO::PARAM_STR); // Asociar parámetros

        // Ejecutar la consulta preparada y verificar si se ejecutó correctamente
        if ($insert_stmt->execute()) {
            echo '<script>
                    alert("Registro de Usuario exitoso. Bienvenido");
                    window.location="Registrar.php";
                 </script>';
        } else {
            echo '<script>
                    alert("Error al Registrar Usuario. Intentelo Nuevamente");
                    window.location="Registrar.php";
                </script>';
        }
    } catch (PDOException $e) {
        echo '<script>
                alert("Error: ' . $e->getMessage() . '");
                window.location="Registrar.php";
              </script>';
    }
} else {
    // Si se intenta acceder al script sin enviar el formulario, redirigir a la página de registro
    header("Location: Registrar.php");
    exit();
}
?>
