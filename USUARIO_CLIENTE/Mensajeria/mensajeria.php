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
                        <li class="list-group-item active">Chat 1</li>
                        <li class="list-group-item">Chat 2</li>
                        <li class="list-group-item">Chat 3</li>
                        <li class="list-group-item">Chat 4</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="p-3">
                    <div class="card">
                        <div class="card-header">
                            <strong> Otro user</strong>
                            <span class="float-right">Fecha: <?php
                            $fecha = date("Y-m-d");
                            echo $fecha;
                            ?></span>
                        </div>
                        <div class="card-body">
                            <p>Contenido del chat</p>
                        </div>
                        <div class="card-footer">
                            <form method="POST">
                                <div class="form-group" >
                                    <label for="reply">Responder</label>
                                        <input type="text" name="mensaje" placeholder="Escribe un mensaje..." class="form-control">
                                    </div>
                                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                            </form>
                            <?php  include '../../conexion.php';

if(isset($_POST['enviar'])){
    $mensaje =$_POST['mensaje'];
    $de = 5; // revisar los ID porq este es prueba
    $para = 2; // revisar los ID porq este es prueba


    try {
            // Verificar si ya existe un chat entre los usuarios
            $stmt = $pdo->prepare("SELECT * FROM info_chat WHERE (de = :de AND para = :para) OR (de = :para AND para = :de)");
            $stmt->bindParam(':de', $de);
            $stmt->bindParam(':para', $para);
            $stmt->execute();
            $com = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 0){
                // Si no existe, insertar un nuevo registro en info_chat
                $insert = $pdo->prepare("INSERT INTO info_chat (de, para) VALUES (:de, :para)");
                $insert->bindParam(':de', $de);
                $insert->bindParam(':para', $para);
                $insert->execute();

                // Obtener el ID del nuevo registro insertado
                $id_chat = $pdo->lastInsertId();

            } else {
                // Si ya existe, obtener el ID del chat existente
                $id_chat = $com[0]['id_infoChat'];
            }

            // Insertar el mensaje en content_chat
            $insert2 = $pdo->prepare("INSERT INTO content_chat (id_chat, de, para, mensaje, fecha, leido) 
                                     VALUES (:id_chat, :de, :para, :mensaje, now(), '0')");
            $insert2->bindParam(':id_chat', $id_chat);
            $insert2->bindParam(':de', $de);
            $insert2->bindParam(':para', $para);
            $insert2->bindParam(':mensaje', $mensaje);
            $insert2->execute();

            echo "Mensaje enviado correctamente.";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

}

/*include '../../conexion.php';

// Verificar si $_SESSION['estudiante_id'] está definida y tiene valor
if (isset($_SESSION['perfil_id'])) {
    $de = $_SESSION['estudiante_id'];
    
    if (isset($_POST['enviar'])) {
        $mensaje = $_POST['mensaje'];
        $para = $_GET['user']; // Asegúrate de que $_GET['user'] esté definido y sea seguro de usar

        try {
            // Verificar si ya existe un chat entre los usuarios
            $stmt = $pdo->prepare("SELECT * FROM info_chat WHERE (de = :de AND para = :para) OR (de = :para AND para = :de)");
            $stmt->bindParam(':de', $de);
            $stmt->bindParam(':para', $para);
            $stmt->execute();
            $com = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($stmt->rowCount() == 0){
                // Si no existe, insertar un nuevo registro en info_chat
                $insert = $pdo->prepare("INSERT INTO info_chat (de, para) VALUES (:de, :para)");
                $insert->bindParam(':de', $de);
                $insert->bindParam(':para', $para);
                $insert->execute();

                // Obtener el ID del nuevo registro insertado
                $id_chat = $pdo->lastInsertId();

            } else {
                // Si ya existe, obtener el ID del chat existente
                $id_chat = $com[0]['id_infoChat'];
            }

            // Insertar el mensaje en content_chat
            $insert2 = $pdo->prepare("INSERT INTO content_chat (id_chat, de, para, mensaje, fecha, leido) 
                                     VALUES (:id_chat, :de, :para, :mensaje, now(), '0')");
            $insert2->bindParam(':id_chat', $id_chat);
            $insert2->bindParam(':de', $de);
            $insert2->bindParam(':para', $para);
            $insert2->bindParam(':mensaje', $mensaje);
            $insert2->execute();

            echo "Mensaje enviado correctamente.";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Error: Session 'estudiante_id' no está definida.";
}*/
?>
                            
                        
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
