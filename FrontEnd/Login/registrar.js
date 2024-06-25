document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('register-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const nombre = document.getElementById('Nombre_Completo').value;
        const correo = document.getElementById('Correo').value;
        const usuario = document.getElementById('username').value;
        const contraseña = document.getElementById('password').value;

        fetch('http://localhost:8080/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            credentials: 'include', // Incluye cookies en la solicitud
            body: JSON.stringify({ Nombre_Completo:nombre, Correo:correo, username: usuario, password: contraseña }) // Enviar datos como JSON
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert("Usuario Registrado");
                window.location.href = "../Perfil/perfil.html"; // Redirigir a la página de perfil
            } else {
                alert('Error al registrar un usuario: ' + data.message);
            }
        })
        .catch(error => console.error('Error al cambiar contraseña:', error));
    });
});