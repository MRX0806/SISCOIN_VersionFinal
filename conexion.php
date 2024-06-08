<?php


$SERVER = "localhost";
$BDNAME = "bdsiscoin";
$USUARIO = "root"; 
$PASS = "";

try {
        // Intentar crear la conexión con la base de datos
        $conn = new mysqli($SERVER, $USUARIO, $PASS, $BDNAME);

        // Verificar si hay errores de conexión
        if ($conn->connect_error)
            {
                throw new Exception("Conexión fallida: " . $conn->connect_error);
            }

        // Mensaje de conexión exitosa
        echo "Conexión exitosa";
    } catch (Exception $e) 
        {
            // Capturar y manejar cualquier excepción que ocurra
            echo "No se pudo conectar a la base de datos: " . $e->getMessage();
        }
?>
