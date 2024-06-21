<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Acceso</title>
    <link rel="stylesheet" href="Recuperar_Contraseña.css">
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
                        <input type="text" name="email" placeholder="Ingrese su Correo Electrónico Registrado" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <!-- Botón de solicitar código de recuperación -->
                    <button type="submit" class="btn">Solicitar Código de Recuperación</button>
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


