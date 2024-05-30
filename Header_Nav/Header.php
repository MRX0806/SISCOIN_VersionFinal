<?php
    $nombre_usuario = "Usuario";
?>
<!DOCTYPE html>
<html lang="en">
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
                    <h3>Hola <?php echo $nombre_usuario; ?></h3>
                    <img src="../img/Usuario_blanco.png" alt="">
                </div>
            </div>
        </header>
    </body>
</html>
