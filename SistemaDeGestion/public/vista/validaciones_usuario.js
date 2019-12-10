function validarCamposObligatorios() {
    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML = '<br>Ingrese el numero de cédula'
                bandera = false
            } else
            if (elemento.id == 'nombres') {
                document.getElementById('mensajeNombres').innerHTML = '<br>Ingrese los dos nombre'
                bandera = false
            } else
            if (elemento.id == 'apellidos') {
                document.getElementById('mensajeApellidos').innerHTML = '<br>Ingrese los dos apellidos'
                bandera = false
            } else
            if (elemento.id == 'direccion') {
                document.getElementById('mensajeDireccion').innerHTML = '<br>Ingrese su dirección'
                bandera = false
            } else
            if (elemento.id == 'telefono') {
                document.getElementById('mensajeTelefono').innerHTML = '<br>Ingrese su número teléfonico'
                bandera = false
            }else
            if (elemento.id == 'fechaNacimiento') {
                document.getElementById('mensajeFechaNacimiento').innerHTML = '<br>Ingrese una fecha con formato dd/mm/yyyy'
                bandera = false
            }else
            if (elemento.id == 'correo') {
                document.getElementById('mensajecorreo').innerHTML = '<br>Ingrese su correo electrónico'
            }
            elemento.style.border = '1px red solid'
            elemento.className ='error'
            bandera = false
        } else if (elemento.value == '' && elemento.type == 'passworf') {
            if (elemento.id == 'contrasena') {
                document.getElementById('mensajecontrasena').innerHTML = '<br>Ingrese su contraseña'
                bandera = false
            }
            elemento.style.border = '1px red solid'
            elemento.className ='error'
            bandera = false
        }
    }
    if (!bandera) {
        alert('Error: revisar los comentarios')
        bandera = false
    }
    return bandera

}

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

function validarNumeros(num) {
    var aux = window.Event ? num.which : num.keyCode
    return ((aux >= 48 && aux <= 57))
}

function validarLetrasNumeros(elemento) {
    var aux = elemento.keyCode || elemento.which;
    entrada = String.fromCharCode(aux);
    letras = "qwertyuiopasdfghjklzxcvbnmñQWERTYUIOPASDFGHJKLZXCVBNMÑ1234567890-. ";
    cont = false;
    if (letras.indexOf(entrada) == -1) {
        return false;
    }
}

function validarLetrasCorreo(elemento) {
    var aux = elemento.keyCode || elemento.which;
    entrada = String.fromCharCode(aux);
    letras = "qwertyuiopasdfghjklzxcvbnmñQWERTYUIOPASDFGHJKLZXCVBNMÑ1234567890.@";
    cont = false;
    if (letras.indexOf(entrada) == -1) {
        return false;
    }
}

function validarLetrasContrasena(elemento) {
    var aux = elemento.keyCode || elemento.which;
    entrada = String.fromCharCode(aux);
    letras = "qwertyuiopasdfghjklzxcvbnmñQWERTYUIOPASDFGHJKLZXCVBNMÑ1234567890@,_,$";
    cont = false;
    if (letras.indexOf(entrada) == -1) {
        return false;
    }
}

function validarFechaNumeros(elemento) {
    var aux = elemento.keyCode || elemento.which;
    entrada = String.fromCharCode(aux);
    letras = "1234567890/-";
    cont = false;
    if (letras.indexOf(entrada) == -1) {
        return false;
    }
}

function validarCedula() {
    var num = formulario01.cedula.value;
    arreglo = num.split("");
    aux = arreglo.length;
    if (aux == 10) {
        cont = 0;
        ini = (arreglo[9] * 1);
        for (i = 0; i < (aux - 1); i++) {
            cont1 = 0;
            if ((i % 2) != 0) {
                cont = cont + (arreglo[i] * 1);
            } else {
                cont1 = arreglo[i] * 2;
                if (cont1 > 9)
                    cont = cont + (cont1 - 9);
                else
                    cont = cont + cont1;

            }

        }
        aux1 = cont / 10;
        aux1 = Math.floor(aux1);
        aux1 = (aux1 + 1) * 10;
        w = (aux1 - cont);
        if ((w == 10 && ini == 0) || (w == ini)) {
            document.getElementById('cedula').style.border = "1px solid green";
            document.getElementById('mensajeCedula').innerHTML = ''
            return true;
        } else {
            document.getElementById('cedula').style.border = "1px solid red";
            document.getElementById('mensajeCedula').innerHTML = 'Cédula incorrecta';
            return false;
        }
    } else {

        document.getElementById('cedula').style.border = "1px solid red";
        document.getElementById('mensajeCedula').innerHTML = 'Cédula incorrecta';
        return false;
    }
}

function toUpper(str) {
    return str
        .toLowerCase()
        .split(' ')
        .map(function (word) {
            console.log("First capital letter: " + word[0]);
            console.log("remain letters: " + word.substr(1));
            return word[0].toUpperCase() + word.substr(1);
        })
        .join(' ');
}

function validarNombre() {
    var num = formulario01.nombres.value;
    if (num.length <= 3) {
        document.getElementById('nombres').style.border = "1px solid red";
        document.getElementById('mensajeNombres').innerHTML = 'Nombre incorrecto';
        return false;
    } else {
        document.getElementById('nombres').style.border = "1px solid green";
        document.getElementById('mensajeNombres').innerHTML = '';
        document.getElementById('nombres').value = toUpper(num);
        return true;
    }
}

function validarApellido() {
    var num = formulario01.apellidos.value;
    if (num.length <= 3) {
        document.getElementById('apellidos').style.border = "1px solid red";
        document.getElementById('mensajeApellidos').innerHTML = 'Apellido incorrecto';
        return false;
    } else {
        document.getElementById('apellidos').style.border = "1px solid green";
        document.getElementById('mensajeApellidos').innerHTML = '';
        document.getElementById('apellidos').value = toUpper(num);
        return true;
    }
}

function validarDireccion() {
    var dir = formulario01.direccion.value;
    if (dir.length <= 3) {
        document.getElementById('direccion').style.border = "1px solid red";
        document.getElementById('mensajeDireccion').innerHTML = 'Dirección incorrecto';
        return false;
    } else {
        document.getElementById('direccion').style.border = "1px solid green";
        document.getElementById('mensajeDireccion').innerHTML = '';
        //document.getElementById('direccion').value = toUpper(dir);
        var rem = toUpper(dir);
        rem = rem.replace(" Y ", " y ");
        var nue = rem;
        document.getElementById('direccion').value = nue;
        return true;
    }
}

function validarTelefono() {
    var num = formulario01.telefono.value;
    if (num.length <= 9) {
        document.getElementById('telefono').style.border = "1px solid red";
        document.getElementById('mensajeTelefono').innerHTML = 'Teléfono incorrecto';
        return false;
    } else {
        document.getElementById('telefono').style.border = "1px solid green";
        document.getElementById('mensajeTelefono').innerHTML = '';
        return true;
    }
}

function validarCorreo() {
    var cor = formulario01.correo.value;
    var arreglo = cor.split('@');
    var aux1;
    var aux2;
    var num;
    aux1 = arreglo[0];
    num = aux1;
    aux2 = arreglo[1];
    if (num.length <= 2) {
        document.getElementById('correo').style.border = "1px solid red";
        document.getElementById('mensajecorreo').innerHTML = 'Correo incorrecto';
        return false;

    } else {
        if (aux2 == "est.ups.edu.ec" || aux2 == "ups.edu.ec") {
            document.getElementById('correo').style.border = "1px solid green";
            document.getElementById('mensajecorreo').innerHTML = '';
            return true;
        } else {
            document.getElementById('correo').style.border = "1px solid red";
            document.getElementById('mensajecorreo').innerHTML = 'Correo incorrecto';
            return false;
        }
    }

}

function validarFecha() {
    var fecha = formulario01.fechaNacimiento.value;
    var arreglo = fecha.split('-');
    var aux1 = arreglo[2];
    var aux2 = arreglo[1];
    var aux3 = arreglo[0];
    if (fecha.length == 10) {
        if  (aux3 < 1920 || aux3 > 2019) {
                document.getElementById('mensajeFechaNacimiento').innerHTML = "Ingrese un año menor que 2019 y mayor a que 1920";
                document.getElementById('fechaNacimiento').style.border = "1px solid red";
                return false;
        } else if (aux2 < 1 || aux2 > 12) {
            document.getElementById('mensajeFechaNacimiento').innerHTML = "Ingrese un mes menor que 12 y mayor a que 00";
            document.getElementById('fechaNacimiento').style.border = "1px solid red";
            return false;
        } else if (aux1 < 1 || aux1 > 31) {
            document.getElementById('mensajeFechaNacimiento').innerHTML = "Ingrese un día menor que 32 y mayor a que 00";
            document.getElementById('fechaNacimiento').style.border = "1px solid red";
            return false;
        } else {
            document.getElementById('fechaNacimiento').style.border = "1px solid green";
            document.getElementById('mensajeFechaNacimiento').innerHTML = '';
            return true;
        }
    } else {
        document.getElementById('fechaNacimiento').style.border = "1px solid red";
        document.getElementById('mensajeFechaNacimiento').innerHTML = 'Ingrese con formato año-mes-día correctos';
        return false;

    }

}

function validarContrasena() {
    var contrasenna = formulario01.contrasena.value;
    if (contrasenna.length >= 8) {
        var mayuscula = false;
        var minuscula = false;
        var caracter = false;
        for (var i = 0; i < contrasenna.length; i++) {
            if (contrasenna.charCodeAt(i) >= 65 && contrasenna.charCodeAt(i) <= 90) {
                mayuscula = true;
            }
            else if (contrasenna.charCodeAt(i) >= 97 && contrasenna.charCodeAt(i) <= 122) {
                minuscula = true;
            }
            else if (contrasenna.charCodeAt(i) == 64 || contrasenna.charCodeAt(i) == 95 || contrasenna.charCodeAt(i) == 44 || contrasenna.charCodeAt(i) == 46) {
                caracter = true;
            }
        }
        if (mayuscula == true && minuscula == true && caracter == true) {
            document.getElementById('contrasena').style.border = "1px solid green";
            document.getElementById('mensajecontrasena').innerHTML = '';
            return true;
        } else if (mayuscula == false || minuscula == false || caracter == false) {
            document.getElementById('contrasena').style.border = "1px solid red";
            document.getElementById('mensajecontrasena').innerHTML = 'Contraseña incorrecta  ';
            return false;
        }
    } else {
        document.getElementById('contrasena').style.border = "1px solid red";
        document.getElementById('mensajecontrasena').innerHTML = 'Contraseña incorrecta 8 caracteres mínimos ';
        return false;

    }

}