<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar datos de persona</title>
        <link rel="stylesheet" href ="../../../public/vista/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM usuario where usu_codigo=$codigo";

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            ?>
                <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php" class="cuadro">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                <label for="cedula">Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/>
                <br><br>

                <label for="nombres">Nombres (*)</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled/>
                <br><br>

                <label for="cedula">Cedula (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/>
                <br><br>

                <label for="apellidos">Apelidos (*)</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled/>
                <br><br>

                <label for="direccion">Dirección (*)</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"];?>" disabled/> 
                <br><br>

                <label for="telefono">Teléfono (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled/>
                <br><br>

                <label for="fecha">Fecha Nacimiento (*)</label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled/>
                <br><br>

                <label for="correo">Correo electrónico (*)</label>
                <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/>
                <br><br>

                <input class="botonstyle" type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                
                <a href="index.php"><input class="botonstyle" type="button" id="cancelar" name="cancelar" value="Cancelar" /></a>
                

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