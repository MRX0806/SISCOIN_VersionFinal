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
            <h4>Buscador de Personas Registradas en SISCOIN </h4>
            <form method="POST" action="busqueda.php"> <!-- Cambiado el action -->
                <label for="searchInput">Ingrese Título o Tema de Investigación</label>
                <div class="search-box1">
                    <input type="text" id="searchInput" name="searchInput" placeholder="Qué deseas buscar ahora?">
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
                  <label for="characteristicInput">A quién quieres buscar hoy?</label>
                    <select class="caracter" id="characteristicInput" name="characteristicInput">
                        <option value="Habilidades de Programación">Docente</option>
                        <option value="Conocimientos en Diseño Gráfico">Alumno</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="skillInput">Especialidad / Conocimientos</label>
                    <input class="caracter" type="text" id="skillInput" name="skillInput" placeholder="Especialidad / Conocimientos">
                </div>
                <button type="submit">Aplicar Filtro</button>
            </form>
        </div>
        <!-- Cuadro Resultado Búsqueda -->
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
        <!-- Cuadro Resultado Búsqueda -->
    </div>
</article>
</body>
</html>
