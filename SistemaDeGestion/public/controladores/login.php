<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php

session_start();

include '../../config/conexionBD.php';
$variable1 = null;

$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
//Enviar una consulta MySQL
$result=$conn->query($sql); 
//Recupera una fila de resultados como un array asociativo
 $resultarr=mysqli_fetch_assoc($result);
//Obtnemos el valo de una fila especifica
 $attempts = $resultarr["usu_roles"];



header("Location: ../../admin/vista/usuario/indexU.php?proceso=" . $_POST[$_Proceso]);



 if ($result->num_rows>0) { 
        $_SESSION['isLogged']=TRUE;

        if( $attempts == 'Admin' ){
              $_SESSION['Admin'] = $usuario;
              $_SESSION['privilegios'] = 'Admin';
              header("Location: ../../admin/vista/usuario/index.php");

        } else{

              $_SESSION['User'] = $usuario;
              $_SESSION['privilegios'] = 'User';
              header("Location: ../../admin/vista/usuario/indexU.php");

        }
        
        
   
 } else {
    header("Location: ../vista/login.html");
     
 }

$conn->close();
?>

</body>
</html>
