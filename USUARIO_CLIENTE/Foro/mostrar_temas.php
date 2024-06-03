<?php
    include '../../conexion.php';
    try{
        $sql = "SELECT nombre FROM tema";
        $result = $pdo->query($sql);
        if($result->rowCount()>0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo "<p>" . htmlspecialchars($row['nombre']) . "</p>";

            }
        }else{
            echo "<p>No hay temas</p>";
        }
    }catch(PDOException $e){
        echo "Error al mostrar los temas " . $e->getMessage();
    }