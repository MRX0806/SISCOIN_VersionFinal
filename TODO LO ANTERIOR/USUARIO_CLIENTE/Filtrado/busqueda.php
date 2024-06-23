<?php
include '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $searchInput = isset($_POST['searchInput']) ? $_POST['searchInput'] : ''; // Término de búsqueda
    $characteristicInput = isset($_POST['characteristicInput']) ? $_POST['characteristicInput'] : ''; // Característica
    $skillInput = isset($_POST['skillInput']) ? $_POST['skillInput'] : ''; // Habilidad

    // Crear conexión a la base de datos usando MySQLi
    $conn = new mysqli($host, $user, $password, $db);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Construir la consulta SQL para buscar y filtrar los resultados
    $sql = "SELECT e.nombre, p.caracteristicas, p.habilidades
            FROM Estudiante e
            JOIN Perfil p ON e.estudiante_id = p.estudiante_id
            WHERE (e.nombre LIKE ? OR p.habilidades LIKE ?)
            AND (p.caracteristicas LIKE ?)
            AND (p.habilidades LIKE ?)";

    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Asignar valores a los parámetros y ejecutar la consulta
    $searchInputParam = "%{$searchInput}%";
    $characteristicInputParam = "%{$characteristicInput}%";
    $skillInputParam = "%{$skillInput}%";
    $stmt->bind_param("ssss", $searchInputParam, $searchInputParam, $characteristicInputParam, $skillInputParam);
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();
    $resultados = $result->fetch_all(MYSQLI_ASSOC);

    // Mostrar los resultados
    echo "<h2>Resultados de la búsqueda y filtrado:</h2>";
    echo "<div class='table-container'><table><thead><tr><th>Nombre</th><th>Característica</th><th>Habilidad</th></tr></thead><tbody>";
    foreach ($resultados as $resultado) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($resultado['nombre'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($resultado['caracteristicas'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($resultado['habilidades'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table></div>";

    // Si no se encontraron resultados
    if (empty($resultados)) {
        echo "<p>No se encontraron resultados que coincidan con los criterios de búsqueda y filtrado.</p>";
    }

    // Cerrar la conexión y liberar recursos
    $stmt->close();
    $conn->close();

} else {
    echo "<p>Por favor, realice una búsqueda desde el formulario.</p>";
}
?>
