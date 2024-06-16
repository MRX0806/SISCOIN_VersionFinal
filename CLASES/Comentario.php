<?php
    function ObtenerComentario(){
        include '../conexion.php';
        $query = $pdo->query("SELECT * FROM Comentario");
        return $query;
    }
