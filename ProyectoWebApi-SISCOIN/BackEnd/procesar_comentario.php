<?php
include '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tema_id = $_POST['tema_id'];
    $comentario = $_POST['comentario'];

    try {
        $sql = "INSERT INTO Comentario (tema_id, comment) VALUES (:tema_id, :comment)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':tema_id', $tema_id, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comentario, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Redirigir de vuelta a comentario.php con el tema_id
    header("Location: comentario.php?tema_id=" . $tema_id);
    exit();
}
?>
