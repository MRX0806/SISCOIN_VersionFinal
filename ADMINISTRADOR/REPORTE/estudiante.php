<?php
    include '../../conexion.php';
    try {
        $sql = "SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo FROM estudiante";
        $result = $pdo->query($sql);
        $contador = 0; // Inicializamos el contador
        if ($result->rowCount() > 0) {
            echo "<ul>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>" . htmlspecialchars($row['nombre_completo']) . "</li>";
                $contador++; // Incrementamos el contador por cada tema
            }
            echo "</ul>";
            echo "<p>Total de estudiantes registrados: " . $contador . "</p>"; // Mostramos el contador
        } else {
            echo "<ul><li>No hay temas registrados</li></ul>";
        }
    } catch (PDOException $e) {
        echo "Error al mostrar los datos " . $e->getMessage();
    }
?>
