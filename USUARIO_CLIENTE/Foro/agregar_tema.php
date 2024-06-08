<?php
include '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $sql = "INSERT INTO tema (nombre) VALUES (:nombre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    if ($stmt->execute()) {
        header("Location: foro.php");
    } else {
        echo "Error al agregar el tema.";
    }
}
?>
