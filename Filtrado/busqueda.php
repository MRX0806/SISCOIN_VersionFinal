<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchInput = $_POST['searchInput']; // Término de búsqueda
    $tema = $_POST['tema']; // Tema
    $responsable = $_POST['responsable']; // Responsable
    $caracteristicas = $_POST['caracteristicas']; // Características
    $habilidades = $_POST['habilidades']; // Habilidades

    try {
        $conexion = new Conexion();
        $pdo = $conexion->getPdo();

        // Construir la consulta SQL para buscar y filtrar los resultados
        $sql = "SELECT * FROM perfil WHERE (tema LIKE :tema OR responsable = :responsable OR caracteristicas LIKE :caracteristicas OR habilidades LIKE :habilidades) AND (caracteristicas LIKE :searchInput OR habilidades LIKE :searchInput)";

        // Preparar la consulta
        $stmt = $pdo->prepare($sql);

        // Asignar valores a los parámetros y ejecutar la consulta
        $stmt->execute([
            ':searchInput' => '%' . $searchInput . '%', // Buscar coincidencias parciales en características y habilidades
            ':tema' => '%' . $tema . '%', // Buscar coincidencias parciales del tema
            ':responsable' => $responsable, // Buscar usuarios que sean responsables o no según lo proporcionado
            ':caracteristicas' => '%' . $caracteristicas . '%', // Buscar coincidencias parciales en las características
            ':habilidades' => '%' . $habilidades . '%' // Buscar coincidencias parciales en las habilidades
        ]);

        // Obtener los resultados
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Mostrar los resultados
        echo "<h2>Resultados de la búsqueda y filtrado:</h2>";
        foreach ($resultados as $resultado) {
            echo "<p>Nombre: " . $resultado['nombre'] . "</p>";
            echo "<p>Tema: " . $resultado['tema'] . "</p>";
            echo "<p>Responsable: " . ($resultado['responsable'] ? 'Sí' : 'No') . "</p>";
            echo "<p>Características: " . $resultado['caracteristicas'] . "</p>";
            echo "<p>Habilidades: " . $resultado['habilidades'] . "</p>";
            echo "<hr>";
        }

        // Si no se encontraron resultados
        if (empty($resultados)) {
            echo "<p>No se encontraron resultados que coincidan con los criterios de búsqueda y filtrado.</p>";
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
