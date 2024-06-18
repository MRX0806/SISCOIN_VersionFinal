<?php
    session_start();
    $user = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : null;
    header('Content-Type: application/json');
    echo json_encode(['user' => $user]);
