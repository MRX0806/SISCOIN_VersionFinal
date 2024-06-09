<?php
include '/xampp/htdocs/SISCOIN_ProyectoFinal/SISCOIN_ProyectoFinal/ConexionBD.php'; // Incluir el archivo que contiene la función de conexión

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

    // Verificar si el correo ya está registrado
    $verif_correo_query = "SELECT * FROM usuarios WHERE Email = ?";
    $verif_stmt = $conn->prepare($verif_correo_query); // Preparar la consulta
    $verif_stmt->bind_param("s", $email); // Asociar parámetros
    $verif_stmt->execute(); // Ejecutar la consulta
    $verif_stmt->store_result(); // Almacenar el resultado

    if ($verif_stmt->num_rows > 0) {
        $error_message = "Este correo ya ha sido registrado, por favor intenta con otro correo diferente.";
        header("Location: Registrar.php?error_message=" . urlencode($error_message));
        exit();
    }
    $verif_stmt->close(); // Cerrar la consulta

    // Preparar la consulta SQL para insertar los datos
    $insert_query = "INSERT INTO usuarios (Name_Complete, Email, User, Password) VALUES (?, ?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query); // Preparar la consulta
    $insert_stmt->bind_param("ssss", $name_complete, $email, $user, $password); // Asociar parámetros

    // Ejecutar la consulta preparada y verificar si se ejecutó correctamente
    if ($insert_stmt->execute()) {
        $success_message = "Datos registrados exitosamente.";
        header("Location: login.php?success_message=" . urlencode($success_message));
        exit();
    } else {
        $error_message = "Error al registrar los datos: " . $insert_stmt->error;
        header("Location: Registrar.php?error_message=" . urlencode($error_message));
        exit();
    }

    // Cerrar la conexión y liberar los recursos
    $insert_stmt->close();
    $conn->close();
} else {
    // Si se intenta acceder al script sin enviar el formulario, redirigir a la página de registro
    header("Location: Registrar.php");
    exit();
}
?>
