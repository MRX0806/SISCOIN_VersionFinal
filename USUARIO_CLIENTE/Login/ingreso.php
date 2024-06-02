<?php
session_start();

// Aquí se manejaría la lógica para verificar las credenciales del usuario
// Supongamos que el nombre de usuario es "Usuario" y la contraseña es "password"

if ($_POST['username'] == 'Usuario' && $_POST['password'] == 'password') {
    $_SESSION['nombre_usuario'] = 'Usuario';
    header('Location: index.php');
    exit;
} else {
    echo "Credenciales incorrectas";
}
