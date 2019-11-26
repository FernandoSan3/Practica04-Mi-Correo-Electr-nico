
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
        

        $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : null;
    
        $hora = isset($_POST["hora"]) ? mb_strtoupper(trim($_POST["hora"]), 'UTF-8') : null;
   
        $lugar = isset($_POST["lugar"]) ? mb_strtoupper(trim($_POST["lugar"]), 'UTF-8') : null;
        $coordenadas = isset($_POST["coordenadas"]) ? mb_strtoupper(trim($_POST["coordenadas"]), 'UTF-8') : null;
        $remitente=isset($_POST["remitente"]) ? trim($_POST["remitente"]): null;
        $invitado=isset($_POST["invitado"]) ? trim($_POST["invitado"]): null;
        $motivo = isset($_POST["motivo"]) ? mb_strtoupper(trim($_POST["motivo"]), 'UTF-8') : null;
        $observacion =  isset($_POST["observacion"]) ? mb_strtoupper(trim($_POST["observacion"]), 'UTF-8') : null;


        $sql = "INSERT INTO reuniones VALUES (0, '$fecha', '$hora', '$lugar', '$coordenadas', '$remitente',
        '$invitado', '$motivo', '$observacion')";
        if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha creado la reunion correctamemte!!!</p>";
        } else {
        if($conn->errno == 1062){
        echo "<p class='error'>La reunion ya esta registrada </p>";
        }else{echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            
        }
        }
        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/crear_reunion.html'>Regresar</a>";
    ?>
</body>
</html>
