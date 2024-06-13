<?php
    $SERVER = "localhost";
    $BDNAME = "bdsiscoin";
    $USUARIO = "root"; 
    $PASS = "";

    try {
        // Intenta conectar a la base de datos usando PDO
        $pdo = new PDO("mysql:host=$SERVER;dbname=$BDNAME", $USUARIO, $PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        // Si hay un error al conectar, captura la excepción y muestra un mensaje de error
        echo "No se pudo conectar a la base de datos: " . $e->getMessage();
    }
?>
