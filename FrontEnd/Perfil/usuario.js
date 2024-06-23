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
    const iduser = localStorage.getItem('user_id');
    if (nombreUsuario && iduser) {
        document.getElementById('usuario').innerHTML = `
            <h3>Bienvenido ${nombreUsuario}</h3>
            <img src="../img/Usuario_blanco.png" alt="Usuario" id="userImage">
            <div id="dropdownMenu" class="dropdown-content">
                <a href="#" id="changePassword">Cambiar Contraseña</a>
                <a href="#" id="logout">Cerrar Sesión</a>
            </div>
        `;
        cargarPerfil(iduser); // Pasa el user_id obtenido a la función cargarPerfil
    } else {
        document.getElementById('usuario').innerHTML = `<h3>No has iniciado sesión</h3>`;
    }
}

function cargarPerfil(iduser) {
    fetch(`http://localhost:8080/api/perfil/${iduser}`, {
        method: 'GET',
        credentials: 'include' // Para enviar cookies
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            console.error(data.error);
        } else {
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('apellido').value = data.apellido;
            document.getElementById('ciclo').value = data.ciclo;
            document.getElementById('carrera').value = data.carrera;
            document.getElementById('habilidades').value = data.habilidades.join(', ');
            document.getElementById('caracteristicas').value = data.caracteristicas.join(', ');
        }
    })
    .catch(error => {
        console.error('Error fetching perfil:', error);
        alert('Error fetching perfil: ' + error.message);
    });
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
