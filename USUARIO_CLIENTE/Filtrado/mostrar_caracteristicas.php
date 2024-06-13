<?php
include '../../conexion.php';
try {
    $sql = "SELECT caracteristicas FROM Perfil";
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . htmlspecialchars($row['caracteristicas']) . '">' . htmlspecialchars($row['caracteristicas']) . '</option>';
        }
    } else {
        echo "<!-- No hay caracteristicas que mostrar -->"; // Agrega esto
    }
} catch (PDOException $e) {
    echo "Error al mostrar las caracteristicas: " . $e->getMessage();
}
?>
