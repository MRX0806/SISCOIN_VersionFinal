<?php
include '../conexion.php';
try {
    $contador = 0; // Inicializamos el contador
    $sql = "SELECT CONCAT(titulo) AS informes_nuevos FROM repositorio";
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {
        echo "<ul>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<li>" . htmlspecialchars($row['informes_nuevos']) . "</li>";
            $contador++; // Incrementamos el contador por cada informe encontrado
        }
        echo "</ul>";
        echo "Total de informes: " . $contador; // Mostramos el total de informes
    } else {
        echo "<ul><li>No hay informes registrados</li></ul>";
    }
} catch (PDOException $e) {
    echo "Error al mostrar los datos " . $e->getMessage();
}
?>
