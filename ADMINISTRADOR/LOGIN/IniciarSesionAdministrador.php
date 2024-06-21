<?php
include '../../conexion.php'; // Incluye el archivo que contiene la función de conexión

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos enviados desde el formulario
    $user = $_POST['username'];
    $pass = $_POST['password'];

    try {
        // Consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE User = :user AND Password = :pass";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        // Verifica si se encontraron resultados en la consulta
        if ($stmt->rowCount() > 0) {
            // Inicio de sesión exitoso
            echo '<script>
                    alert("Inicio de sesión exitoso. Bienvenido, ' . $user. '");
                    window.location="../REPORTE/reporte.php";
                  </script>';

            // Puedes redirigir al usuario a otra página aquí si lo deseas
        } else {
            echo '<script>
                    alert("Erro al Iniciar Sesion. Intentelo Nuevamente");
                    window.location="login_administrador.php";
                </script>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
