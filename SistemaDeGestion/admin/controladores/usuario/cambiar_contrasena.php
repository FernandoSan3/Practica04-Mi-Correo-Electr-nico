<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <?php
     include '../../../config/conexionBD.php';
     $cadena = isset($_POST["codigo"]) ? mb_strtoupper(trim($_POST["codigo"]), 'UTF-8') : null;
     list($codigo, $motivo) = explode('/', $cadena);
     $contrasena1 = isset($_POST["contrasena1"]) ? trim($_POST["contrasena1"]) : null;
     $contrasena2 = isset($_POST["contrasena2"]) ? trim($_POST["contrasena2"]) : null;
     $sqlContrasena1 = "SELECT * FROM usuario where usu_codigo=$codigo and usu_password=MD5('$contrasena1')";
     $result1 = $conn->query($sqlContrasena1);

     if ($result1->num_rows > 0) {
         # code...
         date_default_timezone_set("America/Guayaquil");
          $fecha = date('Y-m-d H:i:s', time());
         $sqlContrasena2 = "UPDATE usuario " .
         "SET usu_password = MD5('$contrasena2'), " . 
         "usu_fecha_modificacion = '$fecha' " . 
         "WHERE usu_codigo = $codigo";

         if ($conn->query($sqlContrasena2) === TRUE) {
             # code...
             echo "Se ha actilizado la contraseña correctamente!!!<br>";
         } else {
             echo "<p> Error: " . mysqli_error($conn) . "</p>";
         }
        }else {
            echo "<p> La contraseña actual no coindice con nuestros registros!!! </p>";

        }
        if ($motivo == 'USER') {
            # code...
            echo "<a href='../../vista/usuario/indexU.php'>Regresa</a>";
        }else {
            # code...
            echo "<a href='../../vista/usuario/index.php'>Regresa</a>";
        }
        
        $conn->close();


    ?>
</body>
</html>