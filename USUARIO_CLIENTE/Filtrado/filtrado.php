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
    <section>
        <article class="container">
            <h4>Búsqueda de personas</h4>
            <div class="caracteristicas">
                <form method="POST" action="busqueda.php">
                    <div class="input-group">
                    <label for="characteristicInput">¿Qué habilidades debe tener tu compañero?</label>
                    <select class="caracter" id="characteristicInput" name="characteristicInput">
                            <?php
                                include 'mostrar_habilidad.php';  // Asegúrate de que esta ruta es correcta
                            ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="skillInput">¿Qué características debe tener tu compañero?</label>
                        <input class="caracter" type="text" id="skillInput" name="skillInput" placeholder="caracteristicas">
                    </div>
                    <button type="submit">Aplicar Filtro</button>
                </form>
            </div>
        </article>
    </section>
</body>
</html>
