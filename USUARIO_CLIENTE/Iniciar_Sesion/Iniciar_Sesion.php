<?php
session_start();  // Inicia la sesión o reanuda la sesión existente
include '/xampp/htdocs/Proyectos_G/SISCOIN_VersionFinalPokemon/conexion.php'; // Incluye el archivo que contiene la función de conexión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta SQL
    $stmt = $conn->prepare("SELECT * FROM Usuarios WHERE User = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['User'];  // Almacenar el nombre de usuario en la sesión
        $_SESSION['name_complete'] = $user['Name_Complete'];  // Almacenar el nombre completo en la sesión
        header("Location: Index.php");  // Redirigir a una página de dashboard o bienvenida
        exit();
    } else {
        // Error en el inicio de sesión
        $error_message = "Nombre de usuario o contraseña incorrectos.";
        header("Location: index.html?error_message=" . urlencode($error_message));
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>
