document.addEventListener("DOMContentLoaded", () => {
    // Cargar habilidades desde la API
    fetch('http://localhost:8080/api/habilidades')
        .then(response => response.json())
        .then(data => {
            const habilidadesSelect = document.getElementById('habilidades');
            data.forEach(habilidad => {
                const option = document.createElement('option');
                option.value = habilidad.id;
                option.textContent = habilidad.nombre;
                habilidadesSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching habilidades:', error));

    // Cargar características desde la API
    fetch('http://localhost:8080/api/caracteristicas')
        .then(response => response.json())
        .then(data => {
            const caracteristicasSelect = document.getElementById('caracteristicas');
            data.forEach(caracteristica => {
                const option = document.createElement('option');
                option.value = caracteristica.id;
                option.textContent = caracteristica.nombre;
                caracteristicasSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching caracteristicas:', error));

    // Cargar estudiantes al cargar la página
    cargarEstudiantes();

    // Manejar el envío del formulario de búsqueda
    document.getElementById('form-filtrado').addEventListener('submit', event => {
        event.preventDefault();
        filtrarEstudiantes();
    });
});

function cargarEstudiantes() {
    fetch('http://localhost:8080/api/estudiantes')
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector('.table tbody');
            tbody.innerHTML = ''; // Limpiar contenido anterior
            data.forEach((estudiante, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${estudiante.nombre_completo}</td>
                    <td>${estudiante.habilidades}</td>
                    <td>${estudiante.caracteristicas}</td>
                    <td><button onclick="window.location.href='../Mensajeria/mensajeria.html?user_id=${estudiante.id}'">Chatear</button></td>
                `;
                tbody.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching estudiantes:', error));
}

function filtrarEstudiantes() {
    const habilidadId = document.getElementById('habilidades').value;
    const caracteristicaId = document.getElementById('caracteristicas').value;

    fetch('http://localhost:8080/api/estudiantes/filtrar', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            habilidad_id: habilidadId,
            caracteristica_id: caracteristicaId
        })
    })
    .then(response => response.json())
    .then(data => {
        const tbody = document.querySelector('.table tbody');
        tbody.innerHTML = ''; // Limpiar contenido anterior
        data.forEach((estudiante, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${estudiante.nombre_completo}</td>
                <td>${estudiante.habilidades}</td>
                <td>${estudiante.caracteristicas}</td>
                <td><button onclick="window.location.href='../Mensajeria/mensajeria.html?user_id=${estudiante.id}'">Chatear</button></td>
            `;
            tbody.appendChild(row);
        });
    })
    .catch(error => console.error('Error fetching estudiantes:', error));
}



