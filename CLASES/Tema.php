<?php
    function ObtenerTema(){
        include '../conexion.php';
        $query = $pdo->query("SELECT * FROM Tema");
        return $query;
    }
