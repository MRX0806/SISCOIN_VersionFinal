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
        <form action="Iniciar_Sesion.php" method="post">
            <h1>Login</h1>
            <!---->
                <?php
                if (isset($_GET['error_message'])) 
                    {
                        echo "<div class='error-message'>" . htmlspecialchars($_GET['error_message']) . "</div>";
                    }
                ?>
            <!---->
                <div class="input-box">
                    <input type="text"  placeholder="Ingrese su Nombre de Usuario" required>
                    <i class='bx bxs-user'></i>
                </div>
                <!---->
                <div class="input-box">
                    <input type="password" placeholder="Ingrese su Contraseña" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <!---->
                <div class="remember-forgot">
                    <a href="#">Forgot Password?</a>
                </div>
                <!---->
                <button type="submit" class="btn">Ingresar</button>
                <!---->
                <div class="register-link">
                        <p>No tienes una cuenta?</p>
                        <a href="#">Registrarse</a>
                </div>

        </form>
    </div>  
</body>
</html>