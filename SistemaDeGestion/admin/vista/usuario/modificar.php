<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona</title>
        <link rel="stylesheet" href ="../../../public/vista/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        $cadena = $_GET["cam"];
        list($codigo, $motivo) = explode('/', $cadena);
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            ?>
                <form id="formulario01" method="POST" action="../../controladores/usuario/modificar.php" class="cuadro">

                <input type="hidden" id="codigo" name="codigo" value="<?php echo $cadena ?>" />
             

                <label for="cedula">Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" requered placeholder="Ingrese la cedula"/>
                <br>
                <br>

                <label for="nombres">Nombres (*)</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingrese los dos nombres ..."/>
                <br>
                <br>

                <label for="apellidos">Apelidos (*)</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingrese la direcapellidosción ..."/>
                <br>
                <br>

                <label for="direccion">Dirección (*)</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];?>" required placeholder="Ingrese la dirección ..."/> 
                <br>
                <br>

                <label for="telefono">Teléfono (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" required placeholder="Ingrese el teléfono ..."/>
                <br>
                <br>

                <label for="fecha">Fecha Nacimiento (*)</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..."/>
                <br>
                <br>

                <label for="correo">Correo electrónico (*)</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..."/>
                <br><br>
                

                <input class="botonstyle" type="submit" id="modificar" name="modificar" value="Modificar" />
                <?php
                if ($motivo == 'Admin') {
                    ?> <a href="index.php"><input class="botonstyle" type="button" id="cancelar" name="cancelar" value="Cancelar" /></a><?php
                } else {
                    ?> <a href="indexU.php"><input class="botonstyle" type="button" id="cancelar" name="cancelar" value="Cancelar" /></a><?php
                }
                ?>

                </form>
            <?php
            }

        }else{
            echo "<p>Ha ocurrido un error inesperado !</p>";
            echo "<p>" . mysqli_error($conn) . "</p>";

        }
        $conn->close();
    
        ?>

        
    </body>
</html>
