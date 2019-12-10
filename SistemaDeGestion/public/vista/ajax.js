function buscarPorCedula(){
    var cedula = document.getElementById("cedula").value;
    if(cedula == ""){
        document.getElementById("informacion1").innerHTML = "Error ingrese cédula";

    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                
                document.getElementById("informacion1").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET" , "../../config/buscar_cedula.php?cedula=" + cedula, true);
        xmlhttp.send();
    }
    return false;
}
function buscarPorCed(){
    var cedula = document.getElementById("cedula").value;
    if(cedula == ""){
        document.getElementById("informacion2").innerHTML = "Error ingrese cédula";

    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                
                document.getElementById("informacion2").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET" , "../../config/buscar_valida.php?cedula=" + cedula, true);
        xmlhttp.send();
    }
    return false;
}

function buscarPorCedul(){
    var cedula = document.getElementById("cedula").value;
    var motivo = document.getElementById("motivo").value;
    var mot = cedula+"/"+motivo;
    if(cedula == ""){
        document.getElementById("informacion3").innerHTML = "Error ingrese cédula";

    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                
                document.getElementById("informacion3").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET" , "../../config/buscar_ajax.php?mot=" +mot, true);
        xmlhttp.send();
    }
    return false;
}

function buscarPorMotivo(){
    var motivo = document.getElementById("motivo").value;
    if(motivo == ""){
        document.getElementById("informacion").innerHTML = "";

    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("informacion").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET" , "../../config/buscar_reuniones.php?motivo=" + motivo, true);
        xmlhttp.send();
    }
    return false;
}

function buscarPorMotiv(){
    var motivo = document.getElementById("motivo").value;
    if(motivo == ""){
        document.getElementById("informacion2").innerHTML = "Error";

    }else{
        if(window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
        }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("informacion2").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("GET" , "../../config/buscar_reunione.php?motivo=" + motivo, true);
        xmlhttp.send();
    }
    return false;
}


