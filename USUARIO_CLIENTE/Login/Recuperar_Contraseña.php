<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Acceso</title>
    <link rel="stylesheet" href="Recuperar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="contenedor">
        <div class="imagen"></div>
        <div class="formulario-container">
            <div class="formulario">
                <form action="Recuperar_Pass.php" method="post">
                    <h1>Recuperar Acceso</h1>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="Ingrese su Correo Electrónico Registrado" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <!-- Campo para el código de recuperación -->
                    <div class="input-box">
                        <input type="password" name="recovery_code" placeholder="Código de Recuperación" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <!-- Campo para la nueva contraseña -->
                    <div class="input-box">
                        <input type="password" name="new_password" placeholder="Contraseña Recuperada" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <!-- Botón de recuperar acceso -->
                    <button type="submit" class="btn">Recuperar Acceso</button>
                    <!-- Enlace para volver a la pestaña Login -->
                    <div class="register-link">
                        <a href="Login.php">Volver a la Pestaña Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

