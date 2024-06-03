<?php
include '../../conexion.php';
try {
    $sql = "SELECT nombre FROM tema";
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Modifica cada tema para que sea clicleable y llame a la función mostrarComentarios() al hacer clic
            echo "<p onclick='mostrarComentarios()'>" . htmlspecialchars($row['nombre']) . "</p>";
        }
    } else {
        echo "<p>No hay temas</p>";
    }
} catch (PDOException $e) {
    echo "Error al mostrar los temas " . $e->getMessage();
}
?>
