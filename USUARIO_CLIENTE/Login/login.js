
//Agrega eventos al realizar acciones en la pagina
document.getElementById("btn_Register").addEventListener("click",register);
document.getElementById("btn_Login").addEventListener("click",login);

window.addEventListener("resize",TamañoPagina);
//Declaracion de Variables

var contenedor_lg= document.querySelector(".contenedor__Login-Register");
//Objeto y Form Login
var form_login= document.querySelector(".Formulario__Login");
var box_login= document.querySelector(".login__caja");
//Objeto y Form Register
var form_register= document.querySelector(".Formulario__Register");
var box_register= document.querySelector(".register__caja");


function login(){

    if(window.innerWidth > 850)
        {
            form_register.style.display="none";
            contenedor_lg.style.left="10px";
            form_login.style.display="block";
            box_register.style.opacity="1";
            box_login.style.opacity="0";        
        }
    else
        {
            form_register.style.display="none";
            contenedor_lg.style.left="0px";
            form_login.style.display="block";
            box_register.style.display="block";
            box_login.style.display="none";   
        }
    
}

function TamañoPagina(){
    if(window.innerWidth > 850)
        {
            box_login.style.display="block";
            box_register.style.display="block";
        }
    else 
        {
            box_register.style.display="block";
            box_register.style.opacity="1";
            box_login.style.display="none";
            form_login.style.display="block";
            form_register.style.display="none";
            contenedor_lg.style.left="opx";
        }
}
//Cuando se recargue la pagina se ajuste el tamaño
TamañoPagina();

function register(){

    if(window.innerWidth > 850)
    {
        form_register.style.display="block";
        contenedor_lg.style.left="410px";
        form_login.style.display="none";
        box_register.style.opacity="0";
        box_login.style.opacity="1";       
    }
else
    {
        form_register.style.display="block";
        contenedor_lg.style.left="0px";
        form_login.style.display="none";
        box_register.style.display="none";
        box_login.style.display="block";   
        box_login.style.opacity="1";
    }

}


