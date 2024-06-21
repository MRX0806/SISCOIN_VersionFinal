<?php
include '../../conexion.php';
header('Content-Type: application/json');

try {
    $sql = "SELECT caracteristicas FROM Perfil";
    $result = $pdo->query($sql);
    $caracteristicas = [];
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $caracteristicas[] = htmlspecialchars($row['caracteristicas']);
        }
    }
    echo json_encode($caracteristicas);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error al mostrar las características: " . $e->getMessage()]);
}
?>
