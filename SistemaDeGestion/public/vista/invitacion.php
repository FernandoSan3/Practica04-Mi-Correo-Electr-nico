<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="ajax.js"></script>
    <link rel="stylesheet" href ="style.css">
    <title>INVITACIONES</title>
</head>
<body>
<br>
<div id="informacion"><b>Ingrese el motivo de la reunion</b></div>
<br>
    <form onsubmit="return buscarPorMotiv()">
        <input type="text" id="motivo" name="motivo" value="">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorMotiv()">
    </form>
    <br>
<br>
<br>
<div id="informacion2"><b></b></div>
<br>
<br>
<div id="informacion"><b>Ingrese la cédula </b></div>
<br>
    <form onsubmit="return buscarPorCedula()">
        <input type="text" id="cedula" name="cedula" value="" maxlength="10">
        <input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()">
    </form>

<br>
<div id="informacion1"><b></b></div>
<br>

<input type="button" id="buscar" name="buscar" value="Invitar" onclick="buscarPorCedul()">
<div id="informacion3"><b></b></div>
</body>
</html>