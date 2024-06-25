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
