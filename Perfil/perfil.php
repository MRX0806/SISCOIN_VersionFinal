<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="perfil.css">
    <link rel="stylesheet" href="../header_Nav/Header.css">
    <link rel="stylesheet" href="../header_Nav/Nav.css">
</head>
<body>
    <?php
      include '../header_Nav/Header.php';
      include '../header_Nav/Nav.php';
    ?>
        <main>
            <div class="container">
                <div class="profile">
                    <h2>Perfil</h2>
                    <input type="text" placeholder="Nombres">
                    <input type="text" placeholder="Apellidos">
                    <input type="text" placeholder="Ciclo">
                    <input type="text" placeholder="Carrera">
                    <input type="text" placeholder="Habilidades">
                    <input type="text" placeholder="Características">
                </div>
                <div class="messages">
                    <div class="user">
                        <span>INFORMACIÓN DEL ALUMNO</span>
                        <img src="../img/ftperfil.jpg" alt="User Image" >
                    </div>
                    <span>Editar foto</span>
                </div>
                <div class="files">
                    <h2>Archivos subidos</h2>
                    <div class="file">Archivo 1</div>
                    <div class="file">Archivo 2</div>
                    <div class="buttons">
                        <button class="view">Ver</button>
                        <button class="delete">Eliminar</button>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>