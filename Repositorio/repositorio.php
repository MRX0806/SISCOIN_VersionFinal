<?php
    $nombre_usuario = "Usuario";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>repositorio</title>
        <link rel="stylesheet" href="repositorio.css">
        <script src = "repositorio.js"></script>
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
                <div id="tab4" class="tab">
                  <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-4 research-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Servicios globales en Windows Server 2019 para mejorar la administración y seguridad lógica de infraestructura de TI en una organización multisede MASS</h5>
                                    <p class="card-text">Facultad de Ingeniería y Arquitectura</p>
                                    <a href="../docs/Grupo 3 - Redes y Comunicaciones II_ INFORME FINAL.pdf" class="btn"  style="background-color: rgb(16, 16, 52); color: white;" target="_blank">Ver PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 research-card">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">Rediseño de procesos basados en TI</h5>
                                    <p class="card-text">Facultad de Ingeniería y Arquitectura</p>
                                    <a href="../docs/INFORME 1 - GTI.pdf" class="btn btn-primary"  style="background-color: rgb(16, 16, 52); color: white;" target="_blank" >Ver PDF</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 research-card">
                          <div class="card" style="height: 100%;">
                              <div class="card-body">
                                  <h5 class="card-title">Análisis jurídico de los derechos de la huelga y al libre tránsito Arequipa Metropolitana, 2022</h5>
                                  <p class="card-text">Facultad de Derecho y Humanidades</p>
                                  <a href="../docs/Maldonado_CGS-SD.pdf"  style="background-color: rgb(16, 16, 52); color: white;" class="btn btn-primary" target="_blank">Ver PDF</a>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-4 research-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">El hallazgo inevitable y la teoría del riesgo como excepciones a la teoría del fruto del árbol envenenado en delitos comunes</h5>
                                <p class="card-text">Facultad de Derecho y Humanidades</p>
                                <a href="../docs/Grupo 3 - Redes y Comunicaciones II_ INFORME FINAL.pdf" class="btn btn-primary"  style="background-color: rgb(16, 16, 52); color: white;" target="_blank">Ver PDF</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 research-card">
                      <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">Adaptación de la Escala de Actitudes Comunitarias hacia la 
                                Enfermedad Mental en adultos de Lima, 2018.</h5>
                              <p class="card-text">Facultad de Humanidades</p>
                              <a href="../docs/Garate_RZ.pdf"  style="background-color: rgb(16, 16, 52); color: white;" class="btn btn-primary" target="_blank">Ver PDF</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 research-card">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">“Estrategias del Product Placement en el cine Peruano, 
                              Piura2020</h5>
                            <p class="card-text">Facultad de Ciencias Empresariales</p>
                            <a href="../docs/Garate_RZ.pdf"  style="background-color: rgb(16, 16, 52); color: white;" class="btn btn-primary" target="_blank">Ver PDF</a>
                    </div>
                </div>
                </div>
            </article>
        </section>
    </body>
</html>