<?php
include '../../conexion.php'; // Incluye el archivo que contiene la función de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start(); // Inicia la sesión
    $user = $_POST['username'];
    $pass = $_POST['password'];

    try {
        // Consulta SQL usando PDO para verificar las credenciales del usuario
        $sql = "SELECT * FROM Usuarios WHERE User=:user AND Password=:pass";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();

        // Verifica si se encontraron resultados en la consulta
        if ($stmt->rowCount() > 0) {
            $_SESSION['nombre_usuario'] = $user; // Guarda el nombre del usuario en la sesión
            // Inicio de sesión exitoso
            echo '<script>
                    alert("Inicio de sesión exitoso. Bienvenido, ' . $user. '");
                    window.location="../Perfil/perfil.php";
                  </script>';
            // Redirecciona a perfil.php
            // header("Location: ../Perfil/perfil.php");
            // exit();
        } else {
            echo '<script>
                    alert("Error al iniciar sesión. Inténtelo nuevamente");
                    window.location="Login.php";
                  </script>';
            // Redirecciona de nuevo al login en caso de error
            // header("Location: Login.php?error=1");
            // exit();
        }
    } catch (PDOException $e) {
        echo "Error al conectar con la base de datos: " . $e->getMessage();
    }

    // Cierra la conexión a la base de datos
    $pdo = null;
}
?>

