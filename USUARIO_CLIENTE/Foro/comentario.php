<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="comentario.css">
    <link rel="stylesheet" href="foro.css">
    <link rel="stylesheet" href="../header_Nav/Header.css">
    <link rel="stylesheet" href="../header_Nav/Nav.css">
</head>
<body>
    <?php
        include '../header_Nav/Header.php';
        include '../header_Nav/Nav.php';
        include '../../conexion.php';

        $tema_id = isset($_GET['tema_id']) ? (int)$_GET['tema_id'] : 0;

        // Obtener nombre del tema
        $sql_tema = "SELECT nombre FROM tema WHERE tema_id = :tema_id";
        $stmt_tema = $pdo->prepare($sql_tema);
        $stmt_tema->bindParam(':tema_id', $tema_id, PDO::PARAM_INT);
        $stmt_tema->execute();
        $tema = $stmt_tema->fetch(PDO::FETCH_ASSOC);

        if (!$tema) {
            echo "<p>El tema seleccionado no existe.</p>";
            exit;
        }
    ?>
    <main>
        <section>
            <div class="tema_seleccionado">
                <p>El tema seleccionado es: <?php echo htmlspecialchars($tema['nombre']); ?></p>
            </div>
            <article class="container">
                <div class="participantes">
                    <h4>Participantes activos</h4>
                    <?php include 'mostrar_usuarios.php'; ?>
                </div>
                <div class="comentarios">
                    <h5>Comentarios</h5>
                    <?php
                        // Mostrar comentarios anteriores
                        $sql_comentarios = "SELECT comment, fecha FROM Comentario WHERE tema_id = :tema_id ORDER BY fecha DESC";
                        $stmt_comentarios = $pdo->prepare($sql_comentarios);
                        $stmt_comentarios->bindParam(':tema_id', $tema_id, PDO::PARAM_INT);
                        $stmt_comentarios->execute();
                        $comentarios = $stmt_comentarios->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($comentarios as $comentario) {
                            echo "<p><strong>" . htmlspecialchars($comentario['fecha']) . ":</strong> " . htmlspecialchars($comentario['comment']) . "</p>";
                        }
                    ?>
                </div>
                <div class="boton_regreso">
                    <form action="foro.php">
                        <input type="submit" value="Regresar">
                    </form>
                    
                </div>
                <div class="contenedor_comen">
                    <form action="procesar_comentario.php" method="post">
                        <input type="hidden" name="tema_id" value="<?php echo $tema_id; ?>">
                        <label for="comentario">Escribe tu comentario:</label><br>
                        <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br>
                        <div class="submit-container">
                            <input type="submit" value="Enviar comentario" >
                        </div>
                    </form>
                </div>
                
            </article>
            
        </section>
    </main>
</body>
</html>
