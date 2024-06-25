document.addEventListener('DOMContentLoaded', () => {
    // Manejar la verificación del código de recuperación
    document.getElementById('verificar-codigo-form').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);
        const data = Object.fromEntries(formData);

        fetch('http://localhost:8080/verificar-codigo', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
            credentials: 'include' // Incluye cookies en la solicitud
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Código verificado. Contraseña recuperada: ' + data.contrasena);
                window.location.href = "inicio_sesion.html";
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => console.error('Error al verificar código:', error));
    });
});