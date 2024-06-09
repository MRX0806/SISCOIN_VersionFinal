<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siscoin_Register</title>
    <link rel="stylesheet" href="Registrar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="wrapper">
        <!-- Formulario de inicio de sesión que apunta a login.php -->
        <form action="login.php" method="post">
            <h1>Registro</h1>
            <div class="input-box">
                <input type="text" name="Nombre Completo" placeholder="Ingrese su Nombre Completo" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" name="Correo" placeholder="Ingrese su Correo Electronico" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="Ingrese su Nombre de Usuario" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Ingrese su Contraseña" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Ingresar</button>
            <div class="register-link">
                <a href="../Iniciar_Sesion/Login.php">Volver a la Pestaña de Login</a>
            </div>
        </form>
    </div>  
</body>
</html>
