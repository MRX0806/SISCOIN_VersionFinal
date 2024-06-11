//Busca los temas mediante los caracteres que coloquemos
document.getElementById('searchBar').addEventListener('keyup', function() {
    // Obtiene el valor de la barra de búsqueda y lo convierte a mayúsculas
    let filter = this.value.toUpperCase();
    // Selecciona todos los elementos con la clase 'tema-contenido'
    let temas = document.querySelectorAll('.tema-contenido');
    
    // Itera sobre cada tema
    temas.forEach(tema => {
        // Obtiene el texto del tema y lo convierte a mayúsculas
        let nombreTema = tema.textContent.toUpperCase();
        // Comprueba si el nombre del tema incluye el texto filtrado
        if (nombreTema.includes(filter)) {
            // Si incluye el texto, muestra el tema
            tema.parentNode.style.display = '';
        } else {
            // Si no incluye el texto, oculta el tema
            tema.parentNode.style.display = 'none';
        }
    });
});
