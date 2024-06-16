<?php
    $SERVER = "localhost";
    $BDNAME = "bdsiscoin";
    $USUARIO = "root"; 
    $PASS = "";

    try {
        $pdo = new PDO("mysql:host=$SERVER;dbname=$BDNAME", $USUARIO, $PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa";
    } catch (Exception $e) {
        echo "No se pudo conectar a la base de datos: " . $e->getMessage();
    }
?>
