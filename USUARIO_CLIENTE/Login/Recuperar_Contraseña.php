<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Acceso</title>
    <link rel="stylesheet" href="Recuperar_Contraseña.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script>
        // Mostrar alerta si hay una contraseña almacenada en la sesión
        <?php if (isset($_SESSION['password'])): ?>
        alert("Tu contraseña actual es: <?php echo $_SESSION['password']; ?>");
        <?php
        // Borrar la contraseña de la sesión después de mostrarla
        unset($_SESSION['password']);
        endif;
        ?>
    </script>
</head>
<body>
    <div class="contenedor">
        <div class="imagen"></div>
        <div class="formulario-container">
            <div class="formulario">
                <?php
                if (isset($_SESSION['message'])) {
                    $message = $_SESSION['message'];
                    $message_type = $_SESSION['message_type'];
                    echo "<div class='message $message_type'>$message</div>";
                    // Borrar el mensaje después de mostrarlo
                    unset($_SESSION['message']);
                    unset($_SESSION['message_type']);
                }
                ?>
                <!-- Formulario para solicitar el código de recuperación -->
                <form action="Recuperar_Pass.php" method="post">
                    <h1>Recuperar Acceso</h1>
                    <div class="input-box">
                        <input type="text" name="email" placeholder="Ingrese su Correo Electrónico Registrado" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <button type="submit" class="btn">Solicitar Código de Recuperación</button>
                    <div class="register-link">
                        <a href="Login.php">Volver a la Pestaña Login</a>
                    </div>
                </form>
                
                <!-- Formulario para validar el código de recuperación -->
                <form action="Validar_Codigo.php" method="post">
                    <div class="input-box">
                        <input type="text" name="codigo" placeholder="Ingrese el Código de Recuperación" required>
                        <i class='bx bxs-lock'></i>
                    </div>
                    <button type="submit" class="btn">Validar Código</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
