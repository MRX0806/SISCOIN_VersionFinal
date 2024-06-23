<?php
include '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $buscar = $_GET['buscar'];
    $sql = "SELECT tema_id, nombre FROM tema WHERE nombre LIKE :buscar";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':buscar', $buscar);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados) {
        foreach ($resultados as $tema) {
            echo "<p>ID: " . htmlspecialchars($tema['tema_id']) . " - Nombre: " . htmlspecialchars($tema['nombre']) . "</p>";
        }
    } else {
        echo "No se encontraron temas.";
    }
}
?>
