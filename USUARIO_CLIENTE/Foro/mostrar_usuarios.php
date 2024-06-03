<?php
    include '../../conexion.php';
    try {
        $sql = "SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo FROM estudiante";
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<ul>";
                echo "<li>" . htmlspecialchars($row['nombre_completo']) . "</li>";
                echo "</ul>";
            }
        } else {
            echo "<ul><li>No hay usuarios registrados</li></ul>";
        }
    } catch (PDOException $e) {
        echo "Error al mostrar los datos " . $e->getMessage();
    }
