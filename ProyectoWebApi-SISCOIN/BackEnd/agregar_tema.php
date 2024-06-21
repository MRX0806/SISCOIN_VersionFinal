<?php
include '../../conexion.php';

header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos JSON enviados en el cuerpo de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['nombre'])) {
        $nombre = $data['nombre'];

        try {
            $sql = "INSERT INTO tema (nombre) VALUES (:nombre)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);

            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Tema agregado exitosamente';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error al agregar el tema';
            }
        } catch (PDOException $e) {
            $response['status'] = 'error';
            $response['message'] = 'Error de base de datos: ' . $e->getMessage();
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Datos incompletos';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método no permitido';
}

echo json_encode($response);
?>
