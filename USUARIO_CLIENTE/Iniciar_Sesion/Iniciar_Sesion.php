<?php
include '/xampp/htdocs/SISCOIN_ProyectoFinal/SISCOIN_ProyectoFinal/ConexionBD.php'; // Incluye el archivo que contiene la función de conexión

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos enviados desde el formulario
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE User='$user' AND Password='$pass'";
    $result = $conn->query($sql);

    // Verifica si se encontraron resultados en la consulta
    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        echo '<script>
                alert("Inicio de sesión exitoso. Bienvenido");
                window.location="Login.php";
             </script>';

        // Puedes redirigir al usuario a otra página aquí si lo deseas
    } else {
        // Error en las credenciales de inicio de sesión
        // $error_message = "Usuario o contraseña incorrectos. Por favor, inténtenlo nuevamente.";
        //header("Location: Login.php?error_message=" . urlencode($error_message));
        //exit();

        echo '<script>
                alert("Erro al Iniciar Sesion. Intentelo Nuevamente");
                window.location="Login.php";
            </script>';
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
