<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajería</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mensajeria.css">
    <link rel="stylesheet" href="../header_Nav/Header.css">
    <link rel="stylesheet" href="../header_Nav/Nav.css">
</head>
<body>
<?php
      include '../header_Nav/Header.php';
      include '../header_Nav/Nav.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="p-3">
                    <h4>Bandeja de entrada</h4>
                    <ul class="list-group">
                        <li class="list-group-item active">Mensaje 1</li>
                        <li class="list-group-item">Mensaje 2</li>
                        <li class="list-group-item">Mensaje 3</li>
                        <li class="list-group-item">Mensaje 4</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="p-3">
                    <h4>Mensaje Seleccionado</h4>
                    <div class="card">
                        <div class="card-header">
                            <strong>De: Axel Huaman</strong>
                            <span class="float-right">Fecha: 03/04/2024</span>
                        </div>
                        <div class="card-body">
                            <p>Contenido del mensaje...</p>
                        </div>
                        <div class="card-footer">
                            <form>
                                <div class="form-group">
                                    <label for="reply">Responder</label>
                                    <textarea class="form-control" id="reply" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
