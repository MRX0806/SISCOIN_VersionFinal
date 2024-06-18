<?php
include '../../conexion.php';

header('Content-Type: application/json');

try {
    $sql_temas = "SELECT tema_id, nombre FROM tema";
    $result = $pdo->query($sql_temas);
    $temas = [];
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $temas[] = [
                'tema_id' => $row['tema_id'],
                'nombre' => htmlspecialchars($row['nombre'])
            ];
        }
    } else {
        $temas[] = ['tema_id' => 0, 'nombre' => 'No hay temas disponibles'];
    }
    echo json_encode($temas);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al obtener los temas: ' . $e->getMessage()]);
}
?>
