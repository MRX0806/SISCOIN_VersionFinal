<?php
include '../../conexion.php';
header('Content-Type: application/json');

try {
    $sql = "SELECT habilidades FROM Perfil";
    $result = $pdo->query($sql);
    $habilidades = [];
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $habilidades[] = htmlspecialchars($row['habilidades']);
        }
    }
    echo json_encode($habilidades);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error al mostrar las habilidades: " . $e->getMessage()]);
}
?>
