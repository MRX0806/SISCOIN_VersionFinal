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
                            <?php
                            include '../../conexion.php';
                            $user = $_POST['usuario'];//no funca
                            $sess = $_SESSION['estudiante_id'];//no funca
                            //$de = 6; // revisar los ID porq este es prueba pero si funciona
                            //$para = 4; // revisar los ID porq este es prueba pero si funciona

                            $chats = $pdo->prepare("SELECT * FROM content_chat WHERE (de = :user AND para = :sess) OR (de = :sess AND para = :user)");
                            $chats->bindParam(':user', $user);
                            $chats->bindParam(':sess', $sess);
                            $chats->execute();
                            
                            while ($ch = $chats->fetch(PDO::FETCH_ASSOC)){?>

                            <?php 
                            if ($ch['para'] == $user){?>

                            <div class="burbuja">
                            <?php 
                            echo $ch['mensaje'];
                            ?>
                            </div>
                            <?php } elseif ($ch['de'] == $user){?>
                
                            <div class="burbuja">
                            <?php 
                            echo $ch['mensaje'];
                            ?>
                            <?php } ?>
                            </div>

                            <?php } ?>
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
    $de = $_SESSION['estudiante_id']; //no funca
    $para = $_POST['usuario']; //no funca
    //$de = 6; // revisar los ID porq este es prueba pero si funciona
    //$para = 4; // revisar los ID porq este es prueba pero si funciona


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
                //$id_chat = $pdo->lastInsertId();
                $sig = $pdo->prepare("SELECT id_infoChat FROM info_chat WHERE (de = :de AND para = :para) OR (de = :para AND para = :de)");
                $sig->bindParam(':de', $de);
                $sig->bindParam(':para', $para);
                $sig->execute();

                $si = $sig->fetchAll(PDO::FETCH_ASSOC);
                 // Insertar el mensaje en content_chat
            $insert2 = $pdo->prepare("INSERT INTO content_chat (id_infoChat, de, para, mensaje, fecha, leido) 
            VALUES (:id_infoChat, :de, :para, :mensaje, now(), '0')");
            $insert2->bindParam(':id_infoChat', $si);
            $insert2->bindParam(':de', $de);
            $insert2->bindParam(':para', $para);
            $insert2->bindParam(':mensaje', $mensaje);
            $insert2->execute();
            
            if ($insert) {
                echo '<script>window.location="mensajeria.php"</script>';
            }

            } else {
                $insert3 = $pdo->prepare("INSERT INTO content_chat (id_infoChat, de, para, mensaje, fecha, leido) 
            VALUES (:id_infoChat, :de, :para, :mensaje, now(), '0')");
            $insert3->bindParam(':id_infoChat', $com);
            $insert3->bindParam(':de', $de);
            $insert3->bindParam(':para', $para);
            $insert3->bindParam(':mensaje', $mensaje);
            $insert3->execute();

            if ($insert3) {
                echo '<script>window.location="mensajeria.php"</script>';
            }
            }

           

            echo "Mensaje enviado correctamente.";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

}

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
