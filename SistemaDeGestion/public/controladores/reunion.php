
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear reunion</title>
    <style type="text/css" rel="stylesheet">
        .error{
        color: red;
    }
    
</style>
</head>
<body>
    <?php
    //incluir conexión a la base de datos
        include '../../config/conexionBD.php';

        $cedula =isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        //echo $cedula;
        $sql = "SELECT * FROM usuario WHERE usu_cedula='$cedula'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            $codigo = $row['usu_codigo'];
            $rol = $row['usu_roles'];
                if ($rol == 'User') {

                    $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
    
                    $hora = isset($_POST["hora"]) ? mb_strtoupper(trim($_POST["hora"]), 'UTF-8') : null;
        //$fechahora = $fecha+" "+$hora;
   
                    $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null;
                    $coordenadas = isset($_POST["coordenadas"]) ? mb_strtoupper(trim($_POST["coordenadas"]), 'UTF-8') : null;
                    $remitente=isset($_POST["informacion2"]) ? trim($_POST["informacion2"]): null;
                    $motivo = isset($_POST["motivo"]) ? mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null;
                    $observacion =  isset($_POST["observacion"]) ? mb_strtoupper(trim($_POST["observacion"]), 'UTF-8') : null;


                    $sql = "INSERT INTO reuniones VALUES (0, '$fecha', '$hora', '$lugar', '$coordenadas', '$codigo',
                     '$motivo', '$observacion')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Se ha creado la reunion correctamemte!!!</p>";
                    } else {
                        if($conn->errno == 1062){
                            echo "<p class='error'>La reunion ya esta registrada </p>";
                        }else{echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            
                    }
                    }
                   

                    

                }else{
                    echo '<p>Un Admin no puede crear reuniones</p>';

                }


            }
        }else {
         echo "<tr>";
         echo "<td colspan='7'> No existen usuarios registrados en el sistema </td>";
          echo "</tr>";
        }

        
        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/crear_reunion.html'>Regresar</a>";
    ?>
</body>
</html>
