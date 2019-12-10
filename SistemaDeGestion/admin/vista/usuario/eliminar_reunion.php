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
        $sql = "SELECT * FROM reuniones where reu_codigo=$codigo";

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
            ?>
                <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar_reunion.php"  class="cuadro">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                <label for="cedula">Fecha (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["reu_fecha"]; ?>" disabled/>
                <br><br>
                

                <label for="nombres">Hora (*)</label>
                <input type="text" id="nombres" name="nombres" value="<?php echo $row["reu_hora"]; ?>" disabled/>
                <br><br>

                <label for="cedula">Lugar (*)</label>
                <input type="text" id="cedula" name="cedula" value="<?php echo $row["reu_lugar"]; ?>" disabled/>
                <br><br>

                <label for="apellidos">Coordenadas (*)</label>
                <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["reu_coordenadas"]; ?>" disabled/>
                <br><br>

                <label for="direccion">Remitente (*)</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["reu_remitente"];?>" disabled/> 
                <br><br>

                <label for="telefono">Motivo (*)</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["reu_motivo"]; ?>" disabled/>
                <br><br>

                <label for="fecha">Observaciones (*)</label>
                <input type="text" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["reu_observaciones"]; ?>" disabled/>
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