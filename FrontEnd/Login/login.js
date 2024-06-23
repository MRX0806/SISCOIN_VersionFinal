document.addEventListener('DOMContentLoaded', () => {
    // Inicio de sesión
    document.getElementById('login-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData);

        fetch('http://localhost:8080/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Inicio de sesión exitoso');
                localStorage.setItem('nombre_usuario', data.nombre_usuario);
                localStorage.setItem('user_id', data.user_id);
                window.location.href = "../Perfil/perfil.html";
            } else {
                alert('Error al iniciar sesión: ' + data.message);
            }
        })
        .catch(error => console.error('Error al iniciar sesión:', error));
    });
    /*
    // Registro de usuario
    document.getElementById('register-form').addEventListener('submit', function(event) {
        event.preventDefault();
        let nombre_completo = document.getElementById('Nombre_Completo').value;
        let correo = document.getElementById('Correo').value;
        let username = document.getElementById('username').value;
        let password = document.getElementById('password').value;
    
        fetch('http://localhost:8080/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                Nombre_Completo: nombre_completo,
                Correo: correo,
                username: username,
                password: password
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.href = "inicio_sesion.html"; // Redirigir a la página de inicio de sesión
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Verificar sesión y cargar perfil en la página de perfil
    if (window.location.pathname.includes('perfil.html')) {
        verificarSesion();
        cargarPerfil();
    }*/
});

function verificarSesion() {
    fetch('http://localhost:8080/api/verificar-sesion', {
        method: 'GET',
        credentials: 'include' // Para enviar cookies
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Añade esta línea para verificar los datos en la consola
        if (data.status === 'success') {
            document.getElementById('usuario').innerHTML = `<h3>Bienvenido ${data.nombre_usuario}</h3>`;
        } else {
            document.getElementById('usuario').innerHTML = `<h3>No has iniciado sesión</h3>`;
        }
    })
    .catch(error => console.error('Error verificando la sesión:', error));
}

function cargarPerfil() {
    fetch('http://localhost:8080/api/perfil', {
        method: 'GET',
        credentials: 'include' // Para enviar cookies
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            document.getElementById('nombre').value = data.nombre || '';
            document.getElementById('apellido').value = data.apellido || '';
            document.getElementById('ciclo').value = data.ciclo || '';
            document.getElementById('carrera').value = data.carrera || '';
            // document.getElementById('habilidades').value = data.habilidades || '';
            // document.getElementById('caracteristicas').value = data.caracteristicas || '';
        }
    })
    .catch(error => console.error('Error cargando el perfil:', error));
}
