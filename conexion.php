<?php
    $SERVER = "localhost";
    $USUARIO = "root";
    $PASS = "";
    $BD = "bdsiscoin";
    
    try{
        $pdo = new PDO("mysql:host:$SERVER;dbname=$BD", $USUARIO, $PASS);
        echo "todo bien";
    }catch(PDOException $e){
        echo "Error en la base datos " . $e->getMessage();
    }
    // PRUEBA
    