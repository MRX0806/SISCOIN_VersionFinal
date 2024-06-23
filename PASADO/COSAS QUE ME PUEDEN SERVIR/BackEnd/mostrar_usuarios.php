<?php
include '../../conexion.php';

header('Content-Type: application/json');

try {
    $sql = "SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo FROM Estudiante";
    $result = $pdo->query($sql);
    $usuarios = [];
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = htmlspecialchars($row['nombre_completo']);
        }
    } else {
        $usuarios[] = "No hay usuarios registrados";
    }
    echo json_encode($usuarios);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Error al mostrar los datos: ' . $e->getMessage()]);
}
?>
