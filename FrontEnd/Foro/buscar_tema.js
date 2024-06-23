document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('searchBar').addEventListener('keyup', function() {
        // Obtiene el valor de la barra de búsqueda y lo convierte a mayúsculas
        let filter = this.value.toUpperCase();
        // Selecciona todos los elementos con la clase 'tema-contenido'
        let temas = document.querySelectorAll('.tema-contenido');

        // Itera sobre cada tema
        temas.forEach(tema => {
            let nombreTema = tema.textContent.toUpperCase();
            if (nombreTema.includes(filter)) {
                tema.parentNode.style.display = '';
            } else {
                tema.parentNode.style.display = 'none';
            }
        });
    });
});
