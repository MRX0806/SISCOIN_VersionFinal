// Función para manejar el evento click del botón de ingresar
function handleLogin() {
    // Obtener los valores de usuario y contraseña del formulario
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Aquí puedes realizar la validación de los datos si es necesario

    // Simplemente mostrar un mensaje en la consola por ahora
    console.log("Usuario:", username);
    console.log("Contraseña:", password);

    // Puedes agregar aquí la lógica para enviar los datos a través de AJAX o cualquier otra acción que necesites
}

// Función para hacer que el formulario sea responsive
function makeFormResponsive() {
    // Obtener el ancho de la ventana
    var windowWidth = window.innerWidth;

    // Ejemplo de acción dependiendo del ancho de la ventana
    if (windowWidth < 768) {
        // Por ejemplo, ocultar un elemento en dispositivos móviles
        document.getElementById("password").style.display = "none";
    } else {
        // Por ejemplo, mostrar el elemento en pantallas más grandes
        document.getElementById("password").style.display = "block";
    }
}

// Agregar el evento click al botón de ingresar
document.getElementById("loginButton").addEventListener("click", handleLogin);

// Agregar el evento resize para hacer el formulario responsive
window.addEventListener("resize", makeFormResponsive);

// Llamar a la función makeFormResponsive al cargar la página para ajustar el formulario inicialmente
makeFormResponsive();
