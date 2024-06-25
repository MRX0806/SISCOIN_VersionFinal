document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('password-form').addEventListener('submit', function(event) {
        /*CAMBIO DE CONTRASEÑA*/
        event.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
    
        fetch('http://localhost:8080/api/password/reset', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            credentials: 'include', // Incluye cookies en la solicitud
            body: JSON.stringify({ username: username, password: password }) // Enviar datos como JSON
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Contraseña Cambiada');
                // Limpiar datos de sesión en el frontend
                window.location.href = "../Perfil/perfil.html";
            } else {
                alert('Error al cambiar contraseña: ' + data.message);
            }
        })
        .catch(error => console.error('Error al cambiar contraseña:', error));
    });
});