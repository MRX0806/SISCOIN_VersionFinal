<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="login__caja">
                        <h3>¿Ya estás registrado?</h3>
                        <p>Iniciar Sesión con Cuenta Registrada</p>
                        <button id="btn_Login">Iniciar Sesión</button>
                    </div>
                    <div class="register__caja">
                        <h3>¿Aún no tienes cuenta?</h3>
                        <p>Regístrese para Iniciar Sesión</p>
                        <button id="btn_Register">Registrarse</button>
                    </div>
                </div>
                <div class="contenedor__Login-Register">
                    <form action="Acceso.php" method="POST" class="Formulario__Login">
                        <h2>Iniciar Sesión</h2>
                        <label for="user">Nombre de Usuario:</label>
                        <input type="text" id="user_log" name="user" placeholder="Nombre de Usuario" required>
                        <label for="password">Contraseña:</label>
                        <input type="password" id="pass_log" name="pass" placeholder="Contraseña" required>
                        <button type="submit">Ingresar</button>
                        <br> <br> <!--Doble Salto de Linea-->
                        <p><a href="reset_password.php">¿Olvidaste tu contraseña?</a></p>
                    </form>
                    <form action="Registros.php" method="POST" class="Formulario__Register">
                        <h2>Registrarse</h2>
                        <label for="name_complete">Nombre Completo:</label>
                        <input type="text" id="name_complete" name="name_complete" placeholder="Nombre Completo" required>
                        <label for="email_register">Correo Electrónico:</label>
                        <input type="email" id="email_register" name="email" placeholder="Correo Electrónico" required>
                        <label for="user">Nombre de Usuario:</label>
                        <input type="text" id="user" name="user" placeholder="Nombre de Usuario" required>
                        <label for="password_register">Contraseña:</label>
                        <input type="password" id="password" name="password" placeholder="Contraseña" required>
                        <button type="submit">Registrarse</button>
                    </form>
                </div>
            </div>
            
        </main>
        <script src="login.js"></script>
    </body>
</html>
