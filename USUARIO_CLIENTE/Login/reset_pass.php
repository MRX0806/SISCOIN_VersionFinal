<?php
include '/xampp/htdocs/SISCOIN_ProyectoFinal/SISCOIN_ProyectoFinal/ConexionBD.php';

// Verificar si se ha enviado el formulario para cambiar la contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico del formulario
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    // Verificar si el correo electrónico existe en la base de datos
    $query = "SELECT Password FROM usuarios WHERE Email = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            // Correo electrónico encontrado, permitir cambiar la contraseña
            // Procesar el cambio de contraseña aquí
            // Por ejemplo, actualizar el registro de usuario con la nueva contraseña
            $new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);

            // Preparar y ejecutar la consulta SQL para actualizar la contraseña
            $update_query = "UPDATE usuarios SET Password = ? WHERE Email = ?";
            if ($update_stmt = mysqli_prepare($conn, $update_query)) {
                mysqli_stmt_bind_param($update_stmt, "ss", $new_password, $email);
                if (mysqli_stmt_execute($update_stmt)) {
                    echo '<script>
                            alert("Contraseña actualizada exitosamente.");
                            window.location="login.php";
                          </script>';
                } else {
                    echo '<script>
                            alert("Error al actualizar la contraseña. Por favor, inténtalo nuevamente más tarde.");
                            window.location="reset_password.php";
                          </script>';
                }
                mysqli_stmt_close($update_stmt);
            } else {
                echo '<script>
                        alert("Error al preparar la consulta para actualizar la contraseña.");
                        window.location="reset_password.php";
                      </script>';
            }
        } else {
            // Correo electrónico no encontrado en la base de datos
            echo '<script>
                    alert("El correo electrónico proporcionado no existe en nuestra base de datos.");
                    window.location="reset_password.php";
                  </script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>
                alert("Error al preparar la consulta para verificar el correo electrónico.");
                window.location="reset_password.php";
              </script>';
    }

}
?>
