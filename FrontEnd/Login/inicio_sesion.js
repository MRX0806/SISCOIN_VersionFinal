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
                window.location.href = "inicio_sesion.html";
            }
        })
        .catch(error => console.error('Error al iniciar sesión:', error));
    });
});
/* aqui dejo el tema de registrarse
<div class="register-link">
    <p>No tienes una cuenta?</p>
    <a href="registrar.html">Registrarse</a>
</div>
*/