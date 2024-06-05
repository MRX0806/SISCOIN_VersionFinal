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
                <button onclick="mostrarFormulario('agregar')" >Agregar Tema</button>
                <button onclick="mostrarFormulario('buscar')" >Buscar Tema</button>
                <button onclick="mostrarFormulario('modificar')" >Modificar Tema</button>
                <button onclick="mostrarFormulario('eliminar')" >Eliminar Tema</button>
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

    <!-- Formularios Modales -->
    <div id="formulario-agregar" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="cerrarFormulario('agregar')">&times;</span>
            <form action="agregar_tema.php" method="POST">
                <label for="nombre">Nombre del Tema:</label>
                <input type="text" id="nombre" name="nombre" required>
                <button type="submit">Agregar Tema</button>
            </form>
        </div>
    </div>

    <div id="formulario-buscar" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="cerrarFormulario('buscar')">&times;</span>
            <form action="buscar_tema.php" method="GET">
                <label for="buscar">Buscar Tema:</label>
                <input type="text" id="buscar" name="buscar" required>
                <button type="submit">Buscar</button>
            </form>
        </div>
    </div>

    <div id="formulario-modificar" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="cerrarFormulario('modificar')">&times;</span>
            <form action="modificar_tema.php" method="POST">
                <label for="tema_id">ID del Tema:</label>
                <input type="text" id="tema_id" name="tema_id" required>
                <label for="nuevo_nombre">Nuevo Nombre:</label>
                <input type="text" id="nuevo_nombre" name="nuevo_nombre" required>
                <button type="submit">Modificar Tema</button>
            </form>
        </div>
    </div>

    <div id="formulario-eliminar" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close" onclick="cerrarFormulario('eliminar')">&times;</span>
            <form action="eliminar_tema.php" method="POST">
                <label for="tema_id_eliminar">ID del Tema:</label>
                <input type="text" id="tema_id_eliminar" name="tema_id_eliminar" required>
                <button type="submit">Eliminar Tema</button>
            </form>
        </div>
    </div>

    <script>
        function mostrarFormulario(formulario) {
            document.getElementById('formulario-' + formulario).style.display = 'flex';
        }

        function cerrarFormulario(formulario) {
            document.getElementById('formulario-' + formulario).style.display = 'none';
        }

        // Cerrar el modal si se hace clic fuera de la ventana modal
        window.onclick = function(event) {
            const modales = document.querySelectorAll('.modal');
            modales.forEach(function(modal) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            });
        }
    </script>
</body>
</html>
