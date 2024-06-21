<?php
    function ObtenerProfesor(){
        include '../conexion.php';
        $query = $pdo->query("SELECT * FROM Profesor");
        return $query;
    }
