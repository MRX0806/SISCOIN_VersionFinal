document.addEventListener("DOMContentLoaded", () => {
    console.log("DOMContentLoaded event fired");

    // Función para cargar usuarios activos
    function cargarUsuariosActivos() {
        fetch('http://localhost:8080/api/estudiantes/nombres-completos', {
            method: 'GET',
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
            .then(data => {
                console.log("Data received for usuarios activos:", data);
                const usuariosActivosDiv = document.getElementById('usuarios-activos');
                usuariosActivosDiv.innerHTML = ''; // Limpiar contenido anterior
                if (data.error) {
                    usuariosActivosDiv.innerHTML = `<p>${data.error}</p>`;
                } else {
                    data.forEach(usuario => {
                        const usuarioDiv = document.createElement('p');
                        usuarioDiv.textContent = usuario.nombre_completo;
                        usuariosActivosDiv.appendChild(usuarioDiv);
                    });
                }
            })
            .catch(error => console.error('Error fetching usuarios activos:', error));
    }

    // Función para cargar temas en discusión
    function cargarTemas() {
        fetch('http://localhost:8080/api/temas')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            })
            .then(data => {
                console.log("Data received for temas en discusión:", data);
                const temasDiscusionDiv = document.getElementById('temas-discusion');
                temasDiscusionDiv.innerHTML = ''; // Limpiar contenido anterior
                if (data.error) {
                    temasDiscusionDiv.innerHTML = `<p>${data.error}</p>`;
                } else {
                    data.forEach(tema => {
                        const temaLink = document.createElement('a');
                        temaLink.href = `comentario.html?tema_id=${tema.tema_id}`; // Ajustar la ruta al archivo correcto
                        temaLink.innerHTML = `<div class="tema-contenido">${tema.nombre}</div>`;
                        temasDiscusionDiv.appendChild(temaLink);
                    });
                }
            })
            .catch(error => console.error('Error fetching temas en discusión:', error));
    }

    // Cargar usuarios activos y temas en discusión al cargar la página
    cargarUsuariosActivos();
    cargarTemas();

    // Agregar evento al formulario de agregar tema
    document.getElementById('form-agregar-tema').addEventListener('submit', function(event) {
        event.preventDefault();
        let nombre = document.getElementById('nombre').value;

        fetch('http://localhost:8080/api/temas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ nombre: nombre }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                document.getElementById('form-agregar-tema').reset();
                cargarTemas(); // Actualizar la lista de temas después de agregar uno nuevo
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

function mostrarFormulario(idFormulario) {
    var formularios = document.getElementsByClassName('formulario');
    for (var i = 0; i < formularios.length; i++) {
        formularios[i].style.display = 'none';
    }
    document.getElementById(idFormulario).style.display = 'block';
}
