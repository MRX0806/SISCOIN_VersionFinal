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
                <button>Agregar Tema</button>
                <button>Buscar Tema</button>
                <button>Modificar Tema</button>
                <button>Eliminar Tema</button>
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
</body>
</html>
