<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reporte.css">
    <link rel="stylesheet" href="../../USUARIO_CLIENTE/header_Nav/Header.css">
    <link rel="stylesheet" href="../../USUARIO_CLIENTE/header_Nav/Nav.css">
    <title>Reporte</title>
   
</head>
<body>
    <header>
        <div class="header-degradado">
            <div class="center">
                <h1>SISCOIN</h1>
                <h3>Sistema Colaborativo para la Investigación</h3>
            </div>
        </div>
    </header>
    <nav>
            <ul>
                <li><a href="">REPORTE</a></li>
                <li><a href="">LISTADO</a></li>
                <li><a href="">GENERAR PDF</a></li>
            </ul>
        </nav>
    <main>
         <div class="wrapper">
        <div class=one>
            <div class=inte1>
            <div class=reporimt>
                <img src="../../img/repor.png" alt="icon">   
            </div>
            <div class=titulo>
                <h1>Reporte</h1>
            </div>
        </div>
            </div>
           
                <div class="two">
                    <h3>Estudiantes nuevos</h3>
                    <img src="../../img/estu1.png" alt="log1"> 
                <?php
                    include 'estudiante.php';
                ?>
                </div>
                <div class="three">
                    <h3>Temas nuevos</h3>
                    <img src="../../img/log1.png" alt="log1"> 
                <?php
                    include 'temas.php';
                ?>
                </div>
                <div class="four">
                    <h3>Informes</h3>
                    <img src="../../img/log2.png" alt="noda"> 
                <?php
                    include 'informes.php';
                ?>
                </div>
                <div class="five">
                    <h3>Grupos</h3>
                    <img src="../../img/log3.png" alt="log3"> 
                <?php
                    include 'grupo.php';
                ?>
                </div>
                
            </div>
       <!-- estesi -->
    
    </main>
</body>
</html>