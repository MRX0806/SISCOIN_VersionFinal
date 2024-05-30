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
    <link rel="stylesheet" href="foro.css">
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
    <section>
        <article>
            <div class="participantes">
                <h4>Participantes activos</h4>
                <?php include 'mostrar_usuarios.php';?>
            </div>
            <div class="temas">
                <h4>Temas en discusión</h4>
                <?php include 'mostrar_temas.php';?> 
                <!-- Tu código HTML principal aquí -->
                <button id="btnAgregarTema">Agregar nuevos temas</button>
            </div>
        </article>
    </section>
    <!-- Ventana emergente para agregar nuevos temas -->
    <div id="modalAgregarTema" class="modal">
        <div class="modal-contenido">
            <span class="cerrar-modal" onclick="cerrarModal()">&times;</span>
            <h2>Agregar Nuevo Tema</h2>
            <form id="formNuevoTema" action="procesar_nuevo_tema.php" method="post">
                <input type="text" name="nombre_tema" placeholder="Nombre del Tema" required>
                <button type="submit">Agregar</button>
                <button type="button" onclick="cerrarModal()">Cancelar</button>
            </form>
        </div>
    </div>
    
    <script>
        // Función para abrir el modal
        function abrirModal() {
            document.getElementById("modalAgregarTema").style.display = "block";
        }

        // Función para cerrar el modal
        function cerrarModal() {
            document.getElementById("modalAgregarTema").style.display = "none";
        }
    </script>
</body>
</html>
