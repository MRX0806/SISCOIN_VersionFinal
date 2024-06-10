<?php
include '../../conexion.php'; // Incluye el archivo que contiene la función de conexión

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos enviados desde el formulario
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM Usuario WHERE User='$user' AND Password='$pass'";
    $result = $conn->query($sql);

    // Verifica si se encontraron resultados en la consulta
    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        echo '<script>
                alert("Inicio de sesión exitoso. Bienvenido");
                window.location="../../USUARIO_CLIENTE/Index/index.php";
             </script>';

        // Puedes redirigir al usuario a otra página aquí si lo deseas
    } else {

        echo '<script>
                alert("Erro al Iniciar Sesion. Intentelo Nuevamente");
                window.location="Login.php";
            </script>';
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
