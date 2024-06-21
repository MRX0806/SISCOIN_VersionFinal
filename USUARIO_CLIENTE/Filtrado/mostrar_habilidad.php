<?php
include '../../conexion.php';
try {
    $sql = "SELECT habilidades FROM Perfil";
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . htmlspecialchars($row['habilidades']) . '">' . htmlspecialchars($row['habilidades']) . '</option>';
        }
    } else {
        echo "<!-- No hay habilidades que mostrar -->"; // Agrega esto
    }
} catch (PDOException $e) {
    echo "Error al mostrar las habilidades: " . $e->getMessage();
}
?>
