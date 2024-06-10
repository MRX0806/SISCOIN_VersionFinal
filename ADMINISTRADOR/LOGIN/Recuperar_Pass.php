<?php
include '../../conexion.php'; // Incluye el archivo que contiene la función de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $new_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Verificar si el usuario existe en la base de datos
    $verif_user_query = "SELECT * FROM usuarios WHERE User = ?";
    $verif_stmt = $conn->prepare($verif_user_query); // Preparar la consulta
    $verif_stmt->bind_param("s", $username); // Asociar parámetro
    $verif_stmt->execute(); // Ejecutar consulta
    $verif_stmt->store_result(); // Almacenar resultado

    if ($verif_stmt->num_rows > 0) {
        // El usuario existe, proceder a actualizar la contraseña
        $update_pass_query = "UPDATE usuarios SET Password = ? WHERE User = ?";
        $update_stmt = $conn->prepare($update_pass_query); // Preparar la consulta
        $update_stmt->bind_param("ss", $new_password, $username); // Asociar parámetros

        if ($update_stmt->execute()) {
            // Contraseña actualizada exitosamente
            echo '<script>
                    alert("Contraseña actualizada exitosamente");
                    window.location="../Login.php";
                  </script>';
        } else {
            // Error al actualizar la contraseña
            echo '<script>
                    alert("Error al actualizar la contraseña: ' . $update_stmt->error . '");
                    window.location="Recuperar_Sesion.php";
                  </script>';
        }

        $update_stmt->close(); // Cerrar consulta de actualización
    } else {
        // Usuario no encontrado en la base de datos
        echo '<script>
                alert("Usuario no encontrado. Por favor, verifique el nombre de usuario e inténtelo nuevamente.");
                window.location="Recuperar_Sesion.php";
              </script>';
    }

    $verif_stmt->close(); // Cerrar consulta de verificación
}

$conn->close(); // Cerrar conexión a la base de datos
?>
