const defaultFile = '../img/R.png';
const file = document.getElementById('userfile');
const img = document.getElementById('imgPerfil');
file.addEventListener('change', e => {
    if(e.target.files[0]){
        const reader = new FileReader();
        reader.onload = function(e){ 
            img.src = e.target.result; }
        reader.readAsDataURL(e.target.files[0]);
}else{
img.src = defaultFile;
}
});