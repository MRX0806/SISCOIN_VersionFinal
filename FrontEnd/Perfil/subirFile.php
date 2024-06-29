<?php
 if (isset($_FILES['archivo'])) {
    // Extraer variables del formulario
    extract($_POST);
    $nombre = $_POST['nombre'];

    // Definir el destino del archivo
    $destino = "files/";

    // Obtener el nombre y la extensión del archivo
    $nombre_archivo = basename($_FILES["archivo"]["name"]);
    $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

    // Verificar la extensión del archivo
    if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {
        // Mover el archivo al destino
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino . $nombre_archivo)) {
            // Incluir archivo de conexión
            include "conexion.php"; 
            try {
                // Preparar la consulta
                $consulta = "INSERT INTO archivo (nombre, archivo) VALUES (:nombre, :archivo)";
                $stmt = $conn->prepare($consulta);
                // Enlazar los parámetros
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':archivo', $nombre_archivo);
                // Ejecutar la consulta
                $stmt->execute();
                echo "<script lenguage='JavaScript'>alert('Archivo subido correctamente.');
                location.assign('../Perfil/perfil.html');</script>";
            } catch (PDOException $e) {
                echo "<script lenguage='JavaScript'>alert('Error');
                location.assign('../Perfil/perfil.html');</script>" . $e->getMessage();
            }
        } else {
            echo "<script lenguage='JavaScript'>alert('Error');
                location.assign('../Perfil/perfil.html');</script>";
        }
    } else {
        echo "<script lenguage='JavaScript'>alert('Error');
                location.assign('../Perfil/perfil.html');</script>";
    }
} else {
    echo "<script lenguage='JavaScript'>alert('Error');
                location.assign('../Perfil/perfil.html');</script>";
}


?>