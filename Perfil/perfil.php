<?php
    $nombre_usuario = "Usuario";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Foro/foro.css">
    <link rel="stylesheet" href="perfil.css">
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
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
              <a class="navbar-brand" href="../Index/index.php"><img class="logos" src="../img/SISCOIN_LOGO.jpg" alt="LogoS"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Perfil/perfil.php" style="color: white;">PERFIL</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Foro/foro.php" style="color: white;">FORO</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link  active " aria-current="page" href="../Repositorio/repositorio.php" style="color: white;" >REPOSITORIO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Filtrado/filtrado.php" style="color: white;">FILTRADO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Mensajeria/mensajeria.php" style="color: white;">FILTRADO</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                    <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">  //POSIBLE SEARCH para algo deah
                  <button class="btn btn-outline-success" type="submit">Search</button> -->
                </form>
              </div>
            </div>
        </nav>
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
                        <img src="./img/ftperfil.jpg" alt="User Image" >
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