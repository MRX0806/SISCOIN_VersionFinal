<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logeo</title>
    <link rel="stylesheet" href="Login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="contenedor">
        <div class="imagen"></div>
        <div class="formulario-container">
            <div class="formulario">
                <form action="Iniciar_Sesion.php" method="post">
                    <h1>Bienvenido a SISCOIN</h1>
                    <div class="input-box">
                        <input type="text" name="username" placeholder="Ingrese su Usuario" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Ingrese su Contraseña" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="remember-forgot">
                        <a href="Recuperar.php">Recuperar Acceso</a>
                    </div>
                    <a href="../Index/index.php">
                        <button type="submit" class="btn">Iniciar Sesión</button>   
                    </a>
                    <div class="register-link">
                        <p>No tienes una cuenta?</p>
                        <a href="Registrar.php">Registrarse</a>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>
