<?php
include '../../conexion.php'; // Incluye el archivo que contiene la función de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $new_password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    try {
        // Verificar si el usuario existe en la base de datos
        $verif_user_query = "SELECT * FROM usuario WHERE User = :username";
        $verif_stmt = $pdo->prepare($verif_user_query); // Preparar la consulta
        $verif_stmt->bindParam(':username', $username, PDO::PARAM_STR); // Asociar parámetro
        $verif_stmt->execute(); // Ejecutar consulta

        if ($verif_stmt->rowCount() > 0) {
            // El usuario existe, proceder a actualizar la contraseña
            $update_pass_query = "UPDATE usuarios SET Password = :new_password WHERE User = :username";
            $update_stmt = $pdo->prepare($update_pass_query); // Preparar la consulta
            $update_stmt->bindParam(':new_password', $new_password, PDO::PARAM_STR); // Asociar parámetros
            $update_stmt->bindParam(':username', $username, PDO::PARAM_STR); // Asociar parámetros

            if ($update_stmt->execute()) {
                // Contraseña actualizada exitosamente
                echo '<script>
                        alert("Contraseña actualizada exitosamente");
                        window.location="../Login.php";
                      </script>';
            } else {
                // Error al actualizar la contraseña
                echo '<script>
                        alert("Error al actualizar la contraseña: ' . $update_stmt->errorInfo()[2] . '");
                        window.location="Recuperar_Sesion.php";
                      </script>';
            }
        } else {
            // Usuario no encontrado en la base de datos
            echo '<script>
                    alert("Usuario no encontrado. Por favor, verifique el nombre de usuario e inténtelo nuevamente.");
                    window.location="Recuperar_Sesion.php";
                  </script>';
        }
    } catch (PDOException $e) {
        echo '<script>
                alert("Error: ' . $e->getMessage() . '");
                window.location="Recuperar_Sesion.php";
              </script>';
    }
}
?>
