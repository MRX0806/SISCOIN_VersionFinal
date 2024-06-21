<?php
    $SERVER = "localhost";
    $BDNAME = "bdsiscoin";
    $USUARIO = "root"; 
    $PASS = "";

    /*PDO*/
    try {
        $pdo = new PDO("mysql:host=$SERVER;dbname=$BDNAME", $USUARIO, $PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa";
    } catch (Exception $e) {
        echo "No se pudo conectar a la base de datos: " . $e->getMessage();
    }

    /* MYSQLI
    try {
        $mysqli = new mysqli($SERVER, $USUARIO, $PASS, $BDNAME);
        if ($mysqli->connect_errno) {
            throw new Exception("No se pudo conectar a la base de datos: " . $mysqli->connect_error);
        }
        echo "Conexión exitosa";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    */
?>
