document.addEventListener("DOMContentLoaded", () => {
    const defaultFile = '../img/Usuario_negro.png';
    const file = document.getElementById('userfile');
    const img = document.getElementById('imgPerfil');
/*
    if (file) {
        file.addEventListener('change', e => {
            if (e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            } else {
                img.src = defaultFile;
            }
        });
    } else {
        console.error('Elemento con id "userfile" no encontrado.');
    }*/
   
});
