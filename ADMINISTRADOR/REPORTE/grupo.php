<?php
    include '../../conexion.php';
    try {
        $sql = "SELECT CONCAT(nombre) AS grupo_nuevos FROM grupo";
        $result = $pdo->query($sql);
        $contador = 0; // Inicializamos el contador
        if ($result->rowCount() > 0) {
            echo "<ul>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . htmlspecialchars($row['grupo_nuevos']) . "</li>";
                $contador++; // Incrementamos el contador por cada tema
            }
            echo "</ul>";
            echo "<p>Total de grupos registrados: " . $contador . "</p>"; // Mostramos el contador
        } else {
            echo "<ul><li>No hay grupos registrados</li></ul>";
        }
    } catch (PDOException $e) {
        echo "Error al mostrar los datos " . $e->getMessage();
    }
?>
