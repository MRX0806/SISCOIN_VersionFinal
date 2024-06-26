document.addEventListener('DOMContentLoaded', () => {
    const solicitarRecuperacionForm = document.getElementById('solicitar-recuperacion-form');
    const verificarCodigoForm = document.getElementById('verificar-codigo-form');
    const cambiarContraseñaForm = document.getElementById('cambiar-contraseña-form');

    if (solicitarRecuperacionForm) {
        solicitarRecuperacionForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;

            fetch('http://localhost:8080/api/solicitar-recuperacion', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ email }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Código de recuperación enviado al correo.');
                    window.location.href = 'verificarCodigo.html';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }

    if (verificarCodigoForm) {
        verificarCodigoForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const codigo = document.getElementById('codigo').value;

            fetch('http://localhost:8080/api/verificar-codigo', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ codigo }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Código verificado correctamente.');
                    window.location.href = 'cambiarContraseña.html';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }

    if (cambiarContraseñaForm) {
        cambiarContraseñaForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const nuevaContraseña = document.getElementById('nueva_contraseña').value;

            fetch('http://localhost:8080/api/cambiar-contraseña', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ nueva_contraseña: nuevaContraseña }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('Contraseña cambiada correctamente.');
                    window.location.href = 'inicioSesion.html';
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
