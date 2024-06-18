document.addEventListener("DOMContentLoaded", () => {
    // Cargar usuarios activos
    fetch('../backend/mostrar_usuarios.php') // Ajusta la ruta según sea necesario
        .then(response => response.json())
        .then(data => {
            const usuariosActivosDiv = document.getElementById('usuarios-activos');
            if (data.error) {
                usuariosActivosDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                data.forEach(usuario => {
                    const usuarioDiv = document.createElement('div');
                    usuarioDiv.textContent = usuario;
                    usuariosActivosDiv.appendChild(usuarioDiv);
                });
            }
        })
        .catch(error => console.error('Error fetching usuarios activos:', error));

    // Cargar temas en discusión
    fetch('../backend/obtener_tema.php') // Ajusta la ruta según sea necesario
        .then(response => response.json())
        .then(data => {
            const temasDiscusionDiv = document.getElementById('temas-discusion');
            if (data.error) {
                temasDiscusionDiv.innerHTML = `<p>${data.error}</p>`;
            } else {
                data.forEach(tema => {
                    const temaLink = document.createElement('a');
                    temaLink.href = `comentario.php?tema_id=${tema.tema_id}`;
                    temaLink.innerHTML = `<div class="tema-contenido">${tema.nombre}</div>`;
                    temasDiscusionDiv.appendChild(temaLink);
                });
            }
        })
        .catch(error => console.error('Error fetching temas en discusión:', error));
});
