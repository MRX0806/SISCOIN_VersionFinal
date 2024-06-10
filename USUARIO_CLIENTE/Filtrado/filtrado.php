<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrado de búsqueda</title>
    <link rel="stylesheet" href="filtrado.css">
    <link rel="stylesheet" href="../header_Nav/Header.css">
    <link rel="stylesheet" href="../header_Nav/Nav.css">
</head>
<body>
    <?php
      include '../header_Nav/Header.php';
      include '../header_Nav/Nav.php';
    ?>
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
                    <input class="caracter" type="text" id="skillInput" name="skillInput" placeholder="Ingrese Habilidad">
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
