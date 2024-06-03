<?php
include '/xampp/htdocs/SISCOIN_ProyectoFinal/SISCOIN_ProyectoFinal/ConexionBD.php'; // Incluye el archivo que contiene la función de conexión

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        // Obtiene los datos enviados desde el formulario
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        // Consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT * FROM usuarios WHERE User='$user' AND Password='$pass'";
        $result = $conn->query($sql);

        // Verifica si se encontraron resultados en la consulta
        if ($result->num_rows > 0)
            {
                // Inicio de sesión exitoso
                //echo "Inicio de sesión exitoso. Bienvenido, $user!";
                echo    '<script>
                            alert("Inicio de sesión exitoso. Bienvenido");
                            window.location="login.php";
                        </script>';

                // Puedes redirigir al usuario a otra página aquí si lo deseas
            } 
            else 
                {
                    // Error en las credenciales de inicio de sesión
                    echo "Usuario o contraseña incorrectos. Por favor, inténtenlo nuevamente.";
                    // Puedes redirigir al usuario a la página de inicio de sesión con un mensaje de error
                }
    }

// Cierra la conexión a la base de datos
$conn->close();
?>