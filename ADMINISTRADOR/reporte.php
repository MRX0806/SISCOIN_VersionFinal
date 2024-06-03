<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reporte.css">
    <title>Reporte</title>
   
</head>
<body>
    <main>
        <div class=titulo>
            <h1>Reporte</h1>
        </div>
        <article>
            <div class="wrapper">
                <div class="one">
                    <h3>Temas nuevos</h3>
                    <img src="log1.png" alt=""> 
                <?php
                    include 'temas.php';
                ?>
                </div>

                <div class="two">
                    <h3>Informes</h3>
                    <img src="log2.png" alt=""> 
                <?php
                    include 'informes.php';
                ?>
                </div>
                <div class="three">
                    <h3>Grupos</h3>
                    <img src="log3.png" alt=""> 
                <?php
                    include 'grupo.php';
                ?>
                </div>
            </div>
        </article>
        <!-- hola -->
    </main>
</body>
</html>