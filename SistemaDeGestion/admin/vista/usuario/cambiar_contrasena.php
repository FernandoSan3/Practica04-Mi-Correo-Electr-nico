<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar contraseña</title>
    <link rel="stylesheet" href ="../../../public/vista/style.css" rel="stylesheet">
</head>

<body>
    <?php
    $cadena = $_GET["cam"];
    list($codigo, $motivo) = explode('/', $cadena);
    ?>

    <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php" class="cuadro">
    
    <input type="hidden" id="codigo" name="codigo" value="<?php echo $cadena ?>" />    
    <br>
    <br>
    <label for="cedula">Contraseña Actual (*)</label>
    <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/>
    <br>
    <br>
    <br>

    <label for="cedula">Contraseña Nueva (*)</label>
    <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/>
    <br>
    <br>
    <br>

    <input class="botonstyle" type="submit" id="modificar" name="modificar" value ="Modificar">
    <?php
                if ($motivo == 'Admin') {
                    ?> <a href="index.php"><input class="botonstyle" type="button" id="cancelar" name="cancelar" value="Cancelar" /></a><?php
                } else {
                    ?> <a href="indexU.php"><input class="botonstyle" type="button" id="cancelar" name="cancelar" value="Cancelar" /></a><?php
                }
                ?>

    </form>
    
</body>
</html>