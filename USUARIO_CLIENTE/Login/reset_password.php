<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <link rel="stylesheet" href="reset_password.css">
</head>
<body>
    <div class="form-container">
        <h2>Restablecer Contraseña</h2>
        <form action="reset_pass.php" method="POST">
            <label for="username">Usuario o Correo Electrónico:</label>
            <input type="text" id="username" name="username" placeholder="Ingrese su usuario o correo electrónico" required>
            <label for="new_password">Nueva Contraseña:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Ingrese su nueva contraseña" required>
            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme su nueva contraseña" required>
            <button type="submit">Restablecer Contraseña</button>
        </form>
    </div>
    <script src="validate_password.js"></script>
</body>
</html>
