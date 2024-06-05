<?php
include '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema_id = $_POST['tema_id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $sql = "UPDATE tema SET nombre = :nuevo_nombre WHERE tema_id = :tema_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nuevo_nombre', $nuevo_nombre);
    $stmt->bindParam(':tema_id', $tema_id);
    if ($stmt->execute()) {
        header("Location: foro.php");
    } else {
        echo "Error al modificar el tema.";
    }
}
?>
