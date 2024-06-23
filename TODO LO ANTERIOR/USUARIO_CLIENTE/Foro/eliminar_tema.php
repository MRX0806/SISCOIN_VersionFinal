<?php
include '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema_id_eliminar = $_POST['tema_id_eliminar'];
    $sql = "DELETE FROM tema WHERE tema_id = :tema_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':tema_id', $tema_id_eliminar);
    if ($stmt->execute()) {
        header("Location: foro.php");
    } else {
        echo "Error al eliminar el tema.";
    }
}
?>
