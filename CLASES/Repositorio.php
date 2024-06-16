<?php
    function ObtenerRepositorio(){
        include '../conexion.php';
        $query = $pdo->query("SELECT * FROM Repositorio");
        return $query;
    }
