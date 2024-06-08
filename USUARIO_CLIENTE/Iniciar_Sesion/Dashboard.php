<?php
session_start();  // Reanuda la sesión existente

if (!isset($_SESSION['username'])) {
    header("Location: Login.php");  // Redirigir al formulario de inicio de sesión si no está autenticado
    exit();
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['name_complete']) . "!";
?>