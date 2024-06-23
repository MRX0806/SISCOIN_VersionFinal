//Busca los articulos mediante los caracteres q coloquemos
document.getElementById('searchBar').addEventListener('keyup', function() {
    // Obtiene el valor de la barra de búsqueda y lo convierte a mayúsculas
    let filter = this.value.toUpperCase();
    // Selecciona todos los elementos con la clase 'research-card'
    let cards = document.querySelectorAll('.research-card');
    
    // Itera sobre cada tarjeta de investigación
    cards.forEach(card => {
        // Obtiene el texto del título de la tarjeta y lo convierte a mayúsculas
        let title = card.querySelector('.card-title').textContent.toUpperCase();
        // Comprueba si el título incluye el texto filtrado
        if (title.includes(filter)) {
            // Si incluye el texto, muestra la tarjeta
            card.style.display = '';
        } else {
            // Si no incluye el texto, oculta la tarjeta
            card.style.display = 'none';
        }
    });
});

