document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const temaId = urlParams.get('tema_id');
    document.getElementById('tema_id').value = temaId;

    // Obtener nombre del tema
    fetch(`../backend/obtener_tema.php?tema_id=${temaId}`)
        .then(response => response.json())
        .then(data => {
            const temaSeleccionadoDiv = document.getElementById('tema-seleccionado');
            if (data.error) {
                temaSeleccionadoDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                temaSeleccionadoDiv.innerHTML = `<p>El tema seleccionado es: ${data.nombre}</p>`;
            }
        })
        .catch(error => console.error('Error fetching tema:', error));

    // Obtener comentarios del tema
    fetch(`../backend/obtener_comentarios.php?tema_id=${temaId}`)
        .then(response => response.json())
        .then(data => {
            const comentariosDiv = document.getElementById('comentarios');
            if (data.error) {
                comentariosDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                data.forEach(comentario => {
                    const p = document.createElement('p');
                    p.innerHTML = `<strong>${comentario.fecha}:</strong> ${comentario.comentario}`;
                    comentariosDiv.appendChild(p);
                });
            }
        })
        .catch(error => console.error('Error fetching comentarios:', error));

    // Cargar usuarios activos
    fetch('../backend/mostrar_usuarios.php') // Ajusta la ruta según sea necesario
        .then(response => response.json())
        .then(data => {
            const usuariosActivosDiv = document.getElementById('usuarios-activos');
            if (data.error) {
                usuariosActivosDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                const ul = document.createElement('ul');
                data.forEach(usuario => {
                    const li = document.createElement('li');
                    li.textContent = usuario;
                    ul.appendChild(li);
                });
                usuariosActivosDiv.appendChild(ul);
            }
        })
        .catch(error => console.error('Error fetching usuarios activos:', error));
});
