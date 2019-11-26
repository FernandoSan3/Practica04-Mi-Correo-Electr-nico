function validarLetras(elemento) {
    var aux = elemento.keyCode || elemento.which;
    entrada = String.fromCharCode(aux);
    letras = "qwertyuiopasdfghjklzxcvbnmñQWERTYUIOPASDFGHJKLZXCVBNMÑ ";
    cont = false;
    if (letras.indexOf(entrada) == -1) {
        return false;
    }

}

function validarRol() {
    var num = formulario01.roles.value;
    if (num.length <= 3) {
        document.getElementById('roles').style.border = "1px solid red";
        document.getElementById('mensajeRol').innerHTML = 'Rol incorrecto';
        return false;
    } else if (num == "admin" || num == "user") {
        document.getElementById('roles').style.border = "1px solid green";
        document.getElementById('mensajeRol').innerHTML = '';
        document.getElementById('roles').value = toUpper(num);
        return true;

        
    } 
}