document.addEventListener("DOMContentLoaded", function() {
    verificarSesion();
});

function verificarSesion() {
    const nombreUsuario = localStorage.getItem('nombre_usuario');
    const iduser = localStorage.getItem('user_id');
    if (nombreUsuario && iduser) {
        document.getElementById('usuario').innerHTML = `<h3>Bienvenido ${nombreUsuario}</h3> <img src="../img/Usuario_blanco.png" alt="Usuario">`;
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
