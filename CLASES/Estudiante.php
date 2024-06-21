<?php
    function ObtenerEstudiante(){
        include '../conexion.php';
        $query = $pdo->query("SELECT * FROM Estudiante");
        return $query;
    }
