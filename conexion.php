<?php
    $SERVER = "localhost";
    $BDNAME = "bdsiscoin";
    $USUARIO = "root"; 
    $PASS = "";

    try {
        $pdo = new PDO("mysql:host=$SERVER;dbname=$BDNAME", $USUARIO, $PASS);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "No se pudo acceder a la BD: " . $e->getMessage(); //me indica el error que capturo en caso de que el try no funcione
    }

