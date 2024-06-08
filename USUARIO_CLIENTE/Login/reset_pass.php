<?php
include '/xampp/htdocs/SISCOIN_ProyectoFinal/SISCOIN_ProyectoFinal/ConexionBD.php';

// Verificar si se ha enviado el formulario para cambiar la contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico del formulario
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $new_password = filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);

    if (!$email || !$new_password) {
        echo '<script>
                alert("Por favor completa todos los campos.");
                window.location="reset_password.php";
              </script>';
        exit();
    }

    // Verificar si el correo electrónico existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE Email = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Correo electrónico encontrado, proceder con el cambio de contraseña
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Preparar y ejecutar la consulta SQL para actualizar la contraseña
            $update_query = "UPDATE usuarios SET Password = ? WHERE Email = ?";
            if ($update_stmt = $conn->prepare($update_query)) {
                $update_stmt->bind_param("ss", $hashed_password, $email);
                if ($update_stmt->execute()) {
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
                $update_stmt->close();
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

        $stmt->close();
    } else {
        echo '<script>
                alert("Error al preparar la consulta para verificar el correo electrónico.");
                window.location="reset_password.php";
              </script>';
    }
}
$conn->close();
?>
