<?php
include '../../conexion.php';

header('Content-Type: application/json');

$tema_id = isset($_GET['tema_id']) ? (int)$_GET['tema_id'] : 0;

try {
    $sql_comentarios = "SELECT comentario, fecha FROM Comentario WHERE tema_id = :tema_id ORDER BY fecha DESC";
    $stmt_comentarios = $pdo->prepare($sql_comentarios);
    $stmt_comentarios->bindParam(':tema_id', $tema_id, PDO::PARAM_INT);
    $stmt_comentarios->execute();
    $comentarios = $stmt_comentarios->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($comentarios);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al obtener los comentarios: ' . $e->getMessage()]);
}
?>
