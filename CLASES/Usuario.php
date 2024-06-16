<?php
    class Usuario{
        function ObtenerUsuario(){
            include '../conexion.php';
            $query = $pdo->query("SELECT * FROM usuarios");
            return $query;
        }
    }
