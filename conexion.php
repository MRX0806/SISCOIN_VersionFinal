<?php
    $SERVER = "localhost";
    $BDNAME = "bdsiscoin";
    $USUARIO = "root"; 
    $PASS = "";

    try 
        {
            $pdo = new PDO("mysql:host=$SERVER;dbname=$BDNAME", $USUARIO, $PASS);
           
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa a la base de datos";//Verifica si hubo conexion
        } catch (PDOException $e) 
            {
                echo "No se pudo acceder a la BD: " . $e->getMessage();
            }
?>
