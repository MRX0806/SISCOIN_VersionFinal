<?php
session_start(); // Inicia o reanuda la sesión del usuario
// Verifica si 'nombre_usuario' está en la sesión, asigna su valor a $user, o null si no está presente
$user = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
    <link rel="stylesheet" href="Header.css"> 
</head>
<body>
<header>
    <div class="header-degradado"> 
        <div class="center"> 
            <h1>SISCOIN</h1> 
            <h3>Sistema Colaborativo para la Investigación</h3>
        </div>
        <div class="usuario"> 
            <?php if ($user): ?> 
                <h3>Bienvenido <?php echo htmlspecialchars($user); ?></h3> 
                <img src="../../img/Usuario_blanco.png" alt="Usuario"> 
            <?php else: ?> <!-- Empleando operador Ternario en vez de IF -->
                <h3>No has iniciado sesión</h3> 
            <?php endif; ?> 
        </div>
    </div>
</header>
</body>
</html>