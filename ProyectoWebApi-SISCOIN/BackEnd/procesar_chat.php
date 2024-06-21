<?php
session_start();

if(isset($_POST['enviar'])){
    $mensaje = $_POST['mensaje'];
    $de = $_SESSION['id'];
    $para = $_GET['user'];

    require_once '../../conexion.php';

    try {
        $stmt = $pdo->prepare("SELECT * FROM info_chat WHERE (de = :de AND para = :para) OR (de = :para AND para = :de)");
        $stmt->bindParam(':de', $de);
        $stmt->bindParam(':para', $para);
        $stmt->execute();

        $com = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 0) {
            $insert = $pdo->prepare("INSERT INTO info_chat (de, para) VALUES (:de, :para)");
            $insert->bindParam(':de', $de);
            $insert->bindParam(':para', $para);
            $insert->execute();

            $siguiente = $pdo->prepare("SELECT id_infoChat FROM info_chat WHERE (de = :de AND para = :para) OR (de = :para AND para = :de)");
            $siguiente->bindParam(':de', $de);
            $siguiente->bindParam(':para', $para);
            $siguiente->execute();

            $si = $siguiente->fetch(PDO::FETCH_ASSOC);

            $insert2 = $pdo->prepare("INSERT INTO content_chat (id_chat, de, para, mensaje, fecha, leido) VALUES (:id_chat, :de, :para, :mensaje, NOW(), 0)");
            $insert2->bindParam(':id_chat', $si['id_infoChat']);
            $insert2->bindParam(':de', $de);
            $insert2->bindParam(':para', $para);
            $insert2->bindParam(':mensaje', $mensaje);
            $insert2->execute();
        } else {
            $insert3 = $pdo->prepare("INSERT INTO content_chat (id_chat, de, para, mensaje, fecha, leido) VALUES (:id_chat, :de, :para, :mensaje, NOW(), 0)");
            $insert3->bindParam(':id_chat', $com[0]['id_infoChat']);
            $insert3->bindParam(':de', $de);
            $insert3->bindParam(':para', $para);
            $insert3->bindParam(':mensaje', $mensaje);
            $insert3->execute();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
