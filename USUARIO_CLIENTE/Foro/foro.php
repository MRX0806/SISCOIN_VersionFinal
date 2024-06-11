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
            <!-- Formulario de búsqueda -->
            <div id="formulario-buscar" style="display: none;">
                <div class="modal-content">
                    <form>
                        <label for="searchBar">Búsqueda:</label>
                        <input type="text" id="searchBar" class="form-control" placeholder="Buscar por Palabras Clave">
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
        function mostrarFormulario(formulario) {
            if(formulario === 'buscar') {
                document.getElementById('formulario-buscar').style.display = 'block';
            } else {
                document.getElementById('formulario-buscar').style.display = 'none';
            }
        }
    </script>
    <script src="foro.js"></script>
</body>
</html>
