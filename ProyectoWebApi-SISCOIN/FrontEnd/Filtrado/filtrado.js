
// Fetch para nav
//api
fetch('/backend/includes/nav.php')
.then(response => response.json())
.then(data => {
    const nav = document.getElementById('nav');
    const navItems = data.map(item => `<li><a href="${item.href}">${item.text}</a></li>`).join('');
    nav.innerHTML = `<ul>${navItems}</ul>`;
});

//para habilidades 
fetch('/backend/mostrar_habilidad.php')
.then(response => response.json())
.then(data => {
    const habilidadesSelect = document.getElementById('habilidades');
    data.forEach(habilidad => {
        const option = document.createElement('option');
        option.value = habilidad;
        option.text = habilidad;
        habilidadesSelect.add(option);
    });
})
.catch(error => console.error('Error fetching habilidades:', error));

//para caracteristicas 
fetch('/backend/mostrar_caracteristicas.php')
.then(response => response.json())
.then(data => {
    const caracteristicasSelect = document.getElementById('caracteristicas');
    data.forEach(caracteristica => {
        const option = document.createElement('option');
        option.value = caracteristica;
        option.text = caracteristica;
        caracteristicasSelect.add(option);
    });
})
.catch(error => console.error('Error fetching características:', error));