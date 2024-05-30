<?php
    include 'conexion.php';
    try{
        $sql = "SELECT nombre FROM tema";
        $result = $pdo->query($sql);
        if($result->rowCount()>0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo "<ul>";
                echo "<li>" . htmlspecialchars($row['nombre']) . "</li>";
                echo "</ul>";
            }
        }else{
            echo "<ul><li>No hay temas</li></ul>";
        }
    }catch(PDOException $e){
        echo "Error al mostrar los temas " . $e->getMessage();
    }