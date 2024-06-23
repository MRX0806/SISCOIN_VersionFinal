document.addEventListener("DOMContentLoaded", function() {
    verificarSesion();
});

function verificarSesion() {
    const nombreUsuario = localStorage.getItem('nombre_usuario');
    if (nombreUsuario) {
        document.getElementById('usuario').innerHTML = `<h3>Bienvenido ${nombreUsuario}</h3> <img src="../img/Usuario_blanco.png" alt="Usuario">`;
    } else {
        document.getElementById('usuario').innerHTML = `<h3>No has iniciado sesión</h3>`;
    }
}
