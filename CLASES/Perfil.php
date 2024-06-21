<?php
    function ObtenerPerfil(){
        include '../conexion.php';
        $query = $pdo->query("SELECT * FROM Perfil");
        return $query;
    }
