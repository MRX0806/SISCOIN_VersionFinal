document.addEventListener("DOMContentLoaded", function() {
    verificarSesion();
    cargarPerfiles();

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
        const userImage = document.getElementById('iconoNav');
        const dropdownMenu = document.getElementById('dropdownNav');
        
        if (userImage && event.target === userImage) {
            dropdownMenu.classList.toggle('showNav');
        } else {
            if (dropdownMenu.classList.contains('showNav')) {
                dropdownMenu.classList.remove('showNav');
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
            <h3 class="bienvenido">Bienvenido ${nombreUsuario}</h3>
        `;
    } else {
        document.getElementById('usuario').innerHTML = `<h3>No has iniciado sesión</h3>`;
    }
}

function cargarPerfiles() {
    fetch('http://localhost:8080/api/perfiles', {
        method: 'GET',
        credentials: 'include'
    })
    .then(response => response.json())
    .then(data => {
        const perfilesContainer = document.getElementById('perfiles-container');
        perfilesContainer.innerHTML = '';

        data.forEach(perfil => {
            const perfilDiv = document.createElement('div');
            perfilDiv.classList.add('perfil-completo');
            perfilDiv.innerHTML = `
                <div class="profile">
                    <h2>Perfil</h2>
                    <label for="text">Nombres</label>
                    <input type="text" value="${perfil.nombre}" readonly>
                    <label for="text">Apellidos</label>
                    <input type="text" value="${perfil.apellido}" readonly>
                    <label for="text">Ciclo</label>
                    <input type="text" value="${perfil.ciclo}" readonly>
                    <label for="text">Carrera</label>
                    <input type="text" value="${perfil.carrera}" readonly>
                    <label for="text">Habilidades</label>
                    <input type="text" value="${perfil.habilidades}" readonly>
                    <label for="text">Características</label>
                    <input type="text" value="${perfil.caracteristicas}" readonly>
                </div>
                <div class="messages">
                    <div class="user">
                        <span>INFORMACIÓN DEL ALUMNO</span>
                        <img id="imgPerfil" src="../img/ftperfil.jpg" alt="Foto de perfil">
                        <span>Editar foto</span>
                    </div>
                </div>
                <div class="files">
                    <h2>Archivos subidos</h2>
                    <div class="file">Archivo 1</div>
                    <div class="file">Archivo 2</div>
                    <div class="buttons">
                        <button class="view">Ver</button>
                        <button class="delete">Eliminar</button>
                    </div>
                </div>
            `;
            perfilesContainer.appendChild(perfilDiv);
        });
    })
    .catch(error => console.error('Error fetching perfiles:', error));
}

function cerrarSesion() {
    fetch('http://localhost:8080/api/logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        credentials: 'include'
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Sesión finalizada');
            localStorage.removeItem('nombre_usuario');
            localStorage.removeItem('user_id');
            window.location.href = "../Index/index.html";
        } else {
            alert('Error al cerrar sesión: ' + data.message);
        }
    })
    .catch(error => console.error('Error al cerrar sesión:', error));
}
