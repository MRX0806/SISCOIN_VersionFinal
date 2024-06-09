<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siscoin_Login</title>
    <link rel="stylesheet" href="Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="wrapper">
        <!-- Formulario de inicio de sesión que apunta a login.php -->
        <form action="Iniciar_Sesion.php" method="post">
            <h1>Login</h1>
            <!-- Campo para el nombre de usuario -->
            <div class="input-box">
                <input type="text" name="username" placeholder="Ingrese su Nombre de Usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <!-- Campo para la contraseña -->
            <div class="input-box">
                <input type="password" name="password" placeholder="Ingrese su Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <!-- Enlace para la recuperación de contraseña -->
            <div class="remember-forgot">
                <a href="../Iniciar_Sesion/RecupararPass.php/Recuperar.php">Recuperar Acceso</a>
            </div>
            <!-- Botón de inicio de sesión -->
            <a href="../Index/index.php">
                <button type="submit" class="btn">Ingresar</button>   
            </a>
            <!-- Enlace para registrarse -->
            <div class="register-link">
                <p>No tienes una cuenta?</p>
                <a href="../Registrar_Sesion/Registrar.php">Registrarse</a>
            </div>
        </form>
    </div>  
</body>
</html>
