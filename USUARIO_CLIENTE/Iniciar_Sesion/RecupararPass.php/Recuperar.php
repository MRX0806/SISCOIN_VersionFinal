<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siscoin_Recuperar_Contraseña</title>
    <link rel="stylesheet" href="Recuperar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="wrapper">
        <!-- Formulario de inicio de sesión que apunta a login.php -->
        <form action="Recuperar_Pass.php" method="post">
            <h1>Recuperar Acceso</h1>
            <!-- Mostrar el mensaje de error si existe -->
            <!-- Campo para el nombre de usuario -->
            <div class="input-box">
                <input type="text" name="username" placeholder="Ingrese su Nombre de Usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <!-- Campo para la contraseña -->
            <div class="input-box">
                <input type="password" name="password" placeholder="Ingrese su Nueva Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            <!-- Botón de inicio de sesión -->
            <button type="submit" class="btn">Recuperar Acceso</button>
            <!-- Enlace para registrarse -->
            <div class="register-link">
                <p>Volver a la Pestaña Login</p>
                <a href="../Login.php">Registrarse</a>
            </div>
        </form>
    </div>  
</body>
</html>
