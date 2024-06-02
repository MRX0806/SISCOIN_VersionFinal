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
    ?>
    <section>
        <article>
            <div class="participantes">
                <h4>Participantes activos</h4>
                <?php 
                    include 'mostrar_usuarios.php';
                ?>
            </div>
            <div class="temas">
                <h4>Temas en discusión</h4>
                <?php 
                    include 'mostrar_temas.php';
                ?> 
                <button id="btnAgregarTema">Agregar nuevos temas</button>
            </div>
        </article>
    </section>
</body>
</html>
