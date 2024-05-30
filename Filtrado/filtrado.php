<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrado de búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../Foro/foro.css">
    <link rel="stylesheet" href="filtrado.css">
</head>
<body>
<header>
    <div class="header-degradado">
        <div class="div-siscoin">
            <h1>SISCOIN</h1>
            <div class="div-subsiscoin">
                <p>Sistema de Colaboración de Investigación</p>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
              <a class="navbar-brand" href="../Index/index.html"><img class="logos" src="../imgs/SISCOIN_LOGO.jpg" alt="LogoS"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Perfil/perfil.html" style="color: white;">PERFIL</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Foro/foro.html" style="color: white;">FORO</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link  active " aria-current="page" href="../Repositorio/repositorio.html" style="color: white;" >REPOSITORIO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Filtrado/filtrado.php" style="color: white;">FILTRADO</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                    <!--  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">  //POSIBLE SEARCH para algo deah
                  <button class="btn btn-outline-success" type="submit">Search</button> -->
                </form>
              </div>
            </div>
</nav>
<article>
    <div id="sep">
        <div class="sep2">
            <h4>Buscador</h4>
            <form method="POST" action="busqueda.php"> <!-- Cambiado el action -->
                <label for="searchInput">Ingrese título</label>
                <div class="search-box1">
                    <input type="text" id="searchInput" name="searchInput" placeholder="Buscar interés">
                    <button type="submit">Buscar</button>
                </div>
            </form>
        </div>
        <div class="filtro"><br>
            <h4>Filtro de búsqueda</h4>
        </div>
        <div class="container">
            <form method="POST" action="busqueda.php"> <!-- Cambiado el action -->
                <div class="input-group">
                  <label for="characteristicInput">Característica</label>
                  <select class="caracter" id="characteristicInput" name="characteristicInput">
                    <option value="Habilidades de Programación">Habilidades de Programación</option>
                    <option value="Conocimientos en Diseño Gráfico">Conocimientos en Diseño Gráfico</option>
                  </select>
                </div>
                <div class="input-group">
                    <label for="skillInput">Habilidad</label>
                    <input class="caracter" type="text" id="skillInput" name="skillInput" placeholder="Ingrese habilidad">
                </div>
                <button type="submit">Aplicar Filtro</button>
            </form>
        </div>
        <div class="Resul"><br>
            <h4>Resultados de búsqueda</h4>
            <div class="table-container">
                <table>
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Característica</th>
                        <th>Habilidad</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Aquí se mostrarán los resultados de la búsqueda -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</article>
</body>
</html>
