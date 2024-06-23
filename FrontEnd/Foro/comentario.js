document.addEventListener("DOMContentLoaded", () => {
    const API_BASE_URL = 'http://localhost:8080/api';
    const urlParams = new URLSearchParams(window.location.search);
    const temaId = urlParams.get('tema_id');
    document.getElementById('tema_id').value = temaId;

    const fetchTema = async () => {
        try {
            const response = await fetch(`${API_BASE_URL}/temas/${temaId}`);
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            const data = await response.json();
            console.log('Tema recibido:', data);
            const temaSeleccionadoDiv = document.getElementById('tema-seleccionado');
            if (data.error) {
                temaSeleccionadoDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                temaSeleccionadoDiv.innerHTML = `<p>El tema seleccionado es: ${data.nombre}</p>`;
            }
        } catch (error) {
            console.error('Error fetching tema:', error);
        }
    };

    const fetchComentarios = async () => {
        try {
            const response = await fetch(`${API_BASE_URL}/temas/${temaId}/comentarios`);
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            const data = await response.json();
            console.log('Comentarios recibidos:', data);
            const comentariosDiv = document.getElementById('comentarios');
            comentariosDiv.innerHTML = '';
            if (data.error) {
                comentariosDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                data.forEach(comentario => {
                    const p = document.createElement('p');
                    p.innerHTML = `<strong>${comentario.fecha}:</strong> ${comentario.comentario}`;
                    comentariosDiv.appendChild(p);
                });
            }
        } catch (error) {
            console.error('Error fetching comentarios:', error);
        }
    };

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
                //usuariosActivosDiv.innerHTML = ''; // Limpiar contenido anterior
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


    const enviarComentario = async (event) => {
        event.preventDefault();
        let comentario = document.getElementById('comentario').value;
        try {
            const response = await fetch(`${API_BASE_URL}/comentarios`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ comentario: comentario, tema_id: temaId }),
            });
            const data = await response.json();
            if (data.status === 'success') {
                alert(data.message);
                document.getElementById('form-comentario').reset();
                await fetchComentarios(); // Recargar los comentarios después de agregar uno nuevo
            } else {
                alert(data.message);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    };

    // Cargar datos al cargar la página
    fetchTema();
    fetchComentarios();
    cargarUsuariosActivos();

    // Manejar el envío de comentarios
    document.getElementById('form-comentario').addEventListener('submit', enviarComentario);
});
