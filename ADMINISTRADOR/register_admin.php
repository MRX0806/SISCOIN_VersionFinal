<?php
include '/xampp/htdocs/SISCOIN_ProyectoFinal/SISCOIN_ProyectoFinal/ConexionBD.php'; // Incluye el archivo que contiene la conexión a la base de datos

// Verificar si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario y validarlos
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Verificar si alguno de los campos está vacío
    if (!$username || !$email || !$password) {
        echo '<script>
                alert("Por favor, completa todos los campos.");
                window.location="register_admin.html";
              </script>';
        exit(); // Terminar la ejecución del script si falta algún campo
    }

    // Verificar si el correo ya está registrado
    $verif_correo_query = "SELECT * FROM usuarios WHERE Email = ?";
    $verif_stmt = $conn->prepare($verif_correo_query); // Preparar la consulta
    $verif_stmt->bind_param("s", $email); // Asociar parámetros
    $verif_stmt->execute(); // Ejecutar la consulta
    $verif_stmt->store_result(); // Almacenar el resultado

    if ($verif_stmt->num_rows > 0) {
        echo '<script>
                alert("Este correo ya ha sido registrado, por favor intenta con otro correo diferente.");
                window.location="register_admin.html";
              </script>';
        exit(); // Terminar la ejecución del script si el correo ya está registrado
    }
    $verif_stmt->close(); // Cerrar la consulta

    // Preparar la consulta SQL para insertar los datos
    $insert_query = "INSERT INTO usuarios (User, Email, Password) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_query); // Preparar la consulta
    $insert_stmt->bind_param("sss", $username, $email, $password); // Asociar parámetros

    // Ejecutar la consulta preparada y verificar si se ejecutó correctamente
    if ($insert_stmt->execute()) {
        echo '<script>
                alert("Administrador registrado exitosamente.");
                window.location="admin_dashboard.php";
              </script>';
    } else {
        echo '<script>
                alert("Error al registrar el administrador: ' . $insert_stmt->error . '");
                window.location="register_admin.html";
              </script>';
    }

    // Cerrar la conexión y liberar los recursos
    $insert_stmt->close();
    $conn->close();
}
?>
