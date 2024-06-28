<?php
 if (isset($_FILES['archivo'])) {
   extract($_POST);
   $nombre = $_POST['nombre'];

   $destino = "docs/";

   $nombre_archivo = basename($_FILES['archivo']['name']);
   $ext = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

   if ($ext == "pdf" || $ext == "doc" || $ext == "docx") {
       if (move_uploaded_file($_FILES['archivo']['tmp_name'], $destino . $nombre_archivo)) {
           include "conexion.php"; 
           try {
               $conexion = new PDO($dsn, $username, $password, $options);

               $consulta = "INSERT INTO archivos (nombre, extension) VALUES (:nombre, :extension)";
               $stmt = $conexion->prepare($consulta);

               $stmt->bindParam(':nombre', $nombre);
               $stmt->bindParam(':extension', $ext);

               $stmt->execute();
           } catch (PDOException $e) {
               echo "Error: " . $e->getMessage();
           }
       }
   }
}

?>