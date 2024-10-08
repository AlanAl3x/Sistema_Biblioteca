// Accion de Botones
document.getElementById("btn__registrarse").addEventListener("click", register);
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);

// Acciona la funcion anchoPagina cuando la ventana cambia de tamaño
window.addEventListener("resize", anchoPagina);

//Declaracion de variables
var contenedor_login_register = document.querySelector(".contenedor__login-register");

var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");

var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

function anchoPagina(){ //Se encarga de acomodar las cajas cuando se acorta la pagina
    if(window.innerWidth > 850){
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        formulario_register.style.display = "none";
        contenedor_login_register.style.left = "opx";
    }
}

function iniciarSesion(){

if (window.innerWidth > 850){
    formulario_register.style.display = "none";
    contenedor_login_register.style.left = "20px";
    formulario_login.style.display = "block";
    caja_trasera_register.style.opacity = "1";
    caja_trasera_login.style.opacity = "0";
} else{
    formulario_register.style.display = "none";
    contenedor_login_register.style.left = "0";
    formulario_login.style.display = "block";
    caja_trasera_register.style.display = "block";
    caja_trasera_login.style.display = "none";
    }
}

function register(){

    if(window.innerWidth > 850){
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    }else{
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }


}

anchoPagina() //Evita que quede mal la pagina al estar acortada y regarguen la pagina