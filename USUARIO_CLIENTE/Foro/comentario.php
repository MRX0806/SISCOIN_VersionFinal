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
    <body><?php
      include '../header_Nav/Header.php';
      include '../header_Nav/Nav.php';
    ?>
    <main>
        <section>
            <div class="opciones_botones">
                

            </div>
            <article class="container">
                <div class="participantes">
                    <h4>Participantes activos</h4>
                    <?php 
                        include 'mostrar_usuarios.php';
                    ?>
                </div>
                <div class="temas">
                    <h5>Comentarios</h5>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Procesar el comentario enviado
                            if (isset($_POST['comentario'])) {
                                $comentario = $_POST['comentario'];
                                // Aquí puedes guardar el comentario en la base de datos, enviarlo por correo electrónico, etc.
                                echo "<p>¡Comentario enviado con éxito!</p>";
                            }
                        }
                    ?>
                    <div class="contenedor_comen">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <label for="comentario">Escribe tu comentario:</label><br>
                            <textarea id="comentario" name="comentario" rows="4" cols="50"></textarea><br>
                            <input type="submit" value="Enviar comentario">
                        </form>
                    </div>
                    
                </div>
                
            </article>
        </section>
    </body>
</html>