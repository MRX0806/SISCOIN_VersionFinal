<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación Code</title>
    <link rel="stylesheet" href="Verificar_Codigo.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="contenedor">
        <div class="imagen"></div>
        <div class="formulario-container">
            <div class="formulario">
                <form action="Verificar_Code.php" method="post">
                    <h1>Validación Code</h1>
                    <div class="input-box">
                        <input type="text" name="code" placeholder="Ingrese su el Codigo de Verificación" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="contraseña" placeholder="Codigo de Verificación" disabled>
                        <i class='bx bxs-user'></i>
                    </div>
                    <!-- Botón de solicitar código de recuperación -->
                    <button type="submit" class="btn">Recuperar Contraseña</button>
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
