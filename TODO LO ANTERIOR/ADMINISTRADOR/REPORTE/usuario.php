<?php
include '../../conexion.php';

try {
    // Verificar que la conexión PDO esté establecida
    if (!isset($pdo)) {
        throw new Exception("Error: la conexión a la base de datos no está disponible.");
    }

    // Contar el número de visitas en el último mes
    $sql = "SELECT COUNT(*) AS visitas FROM Estudiante WHERE ultima_visita >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Verificar y mostrar el número de visitas
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo "Número de visitas en el último mes: " . $result['visitas'];
    } else {
        echo "No se encontraron visitas recientes";
    }
} catch (PDOException $e) {
    echo "Error al mostrar los datos: " . $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

