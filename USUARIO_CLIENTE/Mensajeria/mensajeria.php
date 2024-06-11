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
                            <form>
                                <div class="form-group" action="" method="post">
                                    <label for="reply">Responder</label>
                                        <input type="text" name="mensaje" placeholder="Escribe un mensaje..." class="form-control">
                                    </div>
                                <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                            </form>
                            <?php
                            
                            if(isset($_POST['enviar'])){
                                $mensaje =$_POST['mensaje'];
                                $de = $_SESSION['id'];
                                $para = $_GET(['user']);

                                require_once '../../conexion.php';

                                try {
                                    $stmt = $pdo -> prepare("SELECT * FROM info_chat WHERE de = ':de' AND para = ':para' OR de = ':para' AND para = ':de'");
                                    $stmt->bindParam(':de', $de);
                                    $stmt->bindParam(':para', $para);
                                    $stmt->execute();

                                    $com = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    if($stmt->rowCount()== 0){
                                        $insert = $pdo->prepare("INSERT INTO info_chat (de,para) VALUES (':de',':para')");
                                        $insert->bindParam(':de', $de);
                                        $insert->bindParam(':para', $para);
                                        $insert->execute();

                                        $siguiente = $pdo->prepare("SELECT id_infoChat FROM info_chat WHERE de = ':de' AND para = ':para' OR de = ':para' AND para = ':de'");
                                        $siguiente->bindParam(':de', $de);
                                        $siguiente->bindParam(':para', $para);
                                        $siguiente->execute();

                                        $si = $siguiente->fetchAll(PDO::FETCH_ASSOC);

                                        $insert2 = $pdo->prepare("INSERT INTO content_chat (id_chat,de,para,mensaje,fecha,leido) VALUES (':id_chat',':de',':para',':mensaje',now(),'0')");
                                        $insert2->bindParam(':id_chat', $si['id_chat']);
                                        $insert2->bindParam(':de', $de);
                                        $insert2->bindParam(':para', $para);
                                        $insert2->bindParam(':mensaje',$mensaje);
                                        $insert2->execute();
                                    }else{
                                        $insert3 = $pdo->prepare("INSERT INTO content_chat (id_chat,de,para,mensaje,fecha,leido) VALUES (':id_chat',':de',':para',':mensaje',now(),'0')");
                                        $insert3->bindParam(':id_chat', $com['id_chat']);
                                        $insert3->bindParam(':de', $de);
                                        $insert3->bindParam(':para', $para);
                                        $insert3->bindParam(':mensaje',$mensaje);
                                        $insert3->execute();
                                    }
                                } catch (PDOException $e) {
                                    echo "ERROR PE MONGOL" . $e->getMessage();
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
