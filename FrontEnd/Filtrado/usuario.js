// usuario.js
document.addEventListener("DOMContentLoaded", function() {
    verificarSesion();

    document.addEventListener("click", function(event) {
        const userImage = document.getElementById('userImage');
        const dropdownMenu = document.getElementById('dropdownMenu');
        
        if (userImage && event.target === userImage) {
            dropdownMenu.classList.toggle('show');
        } else {
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            }
        }
    });
    document.addEventListener("click", function(event) {
        if (event.target && event.target.id === 'logout') {
            cerrarSesion();
        }
    });
});

function verificarSesion() {
    const nombreUsuario = localStorage.getItem('nombre_usuario');
    if (nombreUsuario) {
        document.getElementById('usuario').innerHTML = `
            <h3>Bienvenido ${nombreUsuario}</h3>
            <img src="../img/Usuario_blanco.png" alt="Usuario" id="userImage">
            <div id="dropdownMenu" class="dropdown-content">
                <a href="#" id="changePassword">Cambiar Contraseña</a>
                <a href="#" id="logout">Cerrar Sesión</a>
            </div>
        `;
    } else {
        document.getElementById('usuario').innerHTML = `<h3>No has iniciado sesión</h3>`;
    }
}
function cerrarSesion() {
    fetch('http://localhost:8080/api/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        credentials: 'include' // Incluye cookies en la solicitud
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Sesión finalizada');
            // Limpiar datos de sesión en el frontend
            localStorage.removeItem('nombre_usuario');
            localStorage.removeItem('user_id');
            window.location.href = "../Index/index.html";
        } else {
            alert('Error al cerrar sesión: ' + data.message);
        }
    })
    .catch(error => console.error('Error al cerrar sesión:', error));
}
