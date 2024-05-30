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
                    <img src="img/usuario_blanco.png" alt="">
                </div>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="../Perfil/perfil.php">PERFIL</a></li>
                <li><a href="../Foro/foro.php">FORO</a></li>
                <li><a href="../Repositorio/repositorio.php">REPOSITORIO</a></li>
                <li><a href="../Filtrado/filtrado.php">FILTRADO</a></li>
                <li><a href="../Mensajeria/mensajeria.php">MENSAJERIA</a></li>
            </ul>
        </nav>
    </body>
</html>