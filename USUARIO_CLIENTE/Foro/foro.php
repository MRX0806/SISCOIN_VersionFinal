<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="stylesheet" href="foro.css">
    <link rel="stylesheet" href="../header_Nav/Header.css">
    <link rel="stylesheet" href="../header_Nav/Nav.css">
</head>
<body>
    <?php
        include '../header_Nav/Header.php';
        include '../header_Nav/Nav.php';
        include '../../conexion.php';
    ?>
    <main>
        <section>
            <div class="opciones_botones">
                <button onclick="mostrarFormulario('formulario-agregar')">Agregar Tema</button>
                <button onclick="mostrarFormulario('formulario-buscar')">Buscar Tema</button>
            </div>

            <!-- Formulario de Agregar -->
            <div id="formulario-agregar" class="formulario" style="display: none;">
                <div class="modal-content">
                <form action="agregar_tema.php" method="POST">
                    <label for="nombre">Nombre del Tema:</label>
                    <input type="text" id="nombre" name="nombre" required>
                    <button type="submit" class="botonFormu">Agregar Tema</button>
                </form>
                </div>
            </div>
            <!-- Formulario de búsqueda -->
            <div id="formulario-buscar" class="formulario" style="display: none;">
                <div class="modal-content">
                    <form>
                        <label for="searchBar">Búsqueda:</label>
                        <input type="text" id="searchBar" class="form-control" placeholder="Buscar por Palabras Clave">
                    </form>
                </div>
            </div>
            <!-- Formulario de Modificar -->
            <div id="formulario-modificar" class="formulario" style="display: none;">
                <div class="modal-content">
                <form action="buscar_tema.php" method="GET">
                    <label for="buscar">Buscar Tema:</label>
                    <input type="text" id="buscar" name="buscar" required>
                    <button type="submit">Buscar</button>
                </form>
                </div>
            </div>
            <!-- Formulario de Modificar -->
            <div id="formulario-eliminar" class="formulario" style="display: none;">
                <div class="modal-content">
                <form action="eliminar_tema.php" method="POST">
                    <label for="tema_id_eliminar">ID del Tema:</label>
                    <input type="text" id="tema_id_eliminar" name="tema_id_eliminar" required>
                    <button type="submit">Eliminar Tema</button>
                </form>
                </div>
            </div>

            
            <article class="container">
                <div class="participantes">
                    <h4>Participantes activos</h4>
                    <?php include 'mostrar_usuarios.php'; ?>
                </div>
                <div class="temas">
                    <h4>Temas en discusión</h4>
                    <div class="tema">
                        <?php
                            $sql_temas = "SELECT tema_id, nombre FROM tema";
                            $stmt_temas = $pdo->query($sql_temas);
                            while ($tema = $stmt_temas->fetch(PDO::FETCH_ASSOC)) {
                                echo '<a href="comentario.php?tema_id=' . $tema['tema_id'] . '">';
                                echo '<div class="tema-contenido">';
                                echo htmlspecialchars($tema['nombre']);
                                echo '</div>';
                                echo '</a>';
                            }
                        ?>
                    </div>
                </div>
            </article>
        </section>
    </main>    
    <script>
            function mostrarFormulario(idFormulario) {
                var formularios = document.getElementsByClassName('formulario');
                for (var i = 0; i < formularios.length; i++) {
                    formularios[i].style.display = 'none';
                }
                document.getElementById(idFormulario).style.display = 'block';
            }
        </script>
    <script src="buscar_tema.js"></script>
</body>
</html>
