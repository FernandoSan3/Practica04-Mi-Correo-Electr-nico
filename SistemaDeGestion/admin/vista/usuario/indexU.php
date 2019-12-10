<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location: /SistemaDeGestion/public/vista/login.html"); }
?>

<!DOCTYPE html> 
<html>
    <head>
        <meta charset="UTF-8">
         <title>Gestión de usuarios</title>
         <link rel="stylesheet" href ="../../../public/vista/style.css">
         <script type="text/javascript" src="../../../public/vista/ajax.js"></script>
    </head>

<body>
    <br>
    <?php
    echo "<td> <a class ='f' href = '../../../config/cerrar_sesion.php" ."'> Cerrar Sesion</a> </td>";
    ?>
    <br>
    <br>
    <table style="width:100%" >
     <tr>
         <th>Cedula</th> 
         <th>Nombres</th> 
         <th>Apellidos</th> 
         <th>Dirección</th> 
         <th>Telefono</th> 
         <th>Correo</th>
         <th>Fecha Nacimiento</th> 
         <th>Rol</th> 
         <th>Modificar</th> 
         <th>Cambiar contraseña</th> 
    </tr>
   



    <?php
    include '../../../config/conexionBD.php';
    $usuario=$_SESSION['User'];

    $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
    $result = $conn->query($sql);
    $prin = "User";

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            $codigos1 = $row["usu_codigo"] ;
            $cam= $codigos1."/".$prin;
            echo "<td>" . $row["usu_cedula"] . "</td>"; 
            echo "<td>" . $row['usu_nombres'] ."</td>";
            echo "<td>" . $row['usu_apellidos'] . "</td>";
            echo "<td>" . $row['usu_direccion'] . "</td>";
            echo "<td>" . $row['usu_telefono'] . "</td>";
            echo "<td>" . $row['usu_correo'] . "</td>";
            echo "<td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
            echo "<td>" . $row['usu_roles'] . "</td>"; 
            echo "<td> <a href='modificar.php?cam=" . $cam . "'>Modificar</a> </td>"; 
            echo "<td> <a href='cambiar_contrasena.php?cam=" . $cam . "'>Cambiar contraseña</a> </td>";
            echo "</tr>";

        }
    } else {
        echo "<tr>";
        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
        echo "</tr>";
    }
    $conn->close(); 
    ?>
    </table>
    <br>
    <br>
    <br>
    <?php
    echo "<td> <a class ='f'  href = '../../../public/vista/crear_reunion.html" ."'> Crear reuniones</a> </td>";
    ?>
    <br>
    <br>
    <br>

    <table style="width:100%">
     <tr>
         <th>Fecha</th> 
         <th>Hora</th> 
         <th>lugar</th> 
         <th>coordenadas</th> 
         <th>Remitente</th> 
         <th>Motivo</th> 
         <th>Observaciones</th> 
    </tr>
   


    <?php
    include '../../../config/conexionBD.php';
    $usuario1=$_SESSION['User'];
   
   // REUNIONES DE SOLO SU REMITENTE
   // $sql1="SELECT * FROM reuniones WHERE reu_remitente = '$codigos1' ORDER BY reu_fecha ASC";
    $sql1="SELECT * FROM reuniones  ORDER BY reu_fecha ASC";
    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0) {

        while($row = $result1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["reu_fecha"] . "</td>"; 
            echo "<td>" . $row['reu_hora'] . "</td>";
            echo "<td>" . $row['reu_lugar'] . "</td>";
            echo "<td>" . $row['reu_coordenadas'] . "</td>";
            echo "<td>" . $row['reu_remitente'] . "</td>";
            echo "<td>" . $row['reu_motivo'] . "</td>"; 
            echo "<td>" . $row['reu_observaciones'] . "</td>"; 
            echo "</tr>";

        }
    } else {
        echo "<tr>";
        echo " <td colspan='7'> No existen reuniones registradas en el sistema </td>"; 
        echo "</tr>";
    }
    $conn->close(); 
    ?>
    </table>

    <br>
    <br>
    <br>
    <?php
    echo "<td> <a  class ='f'  href = '../../../public/vista/invitacion.php" ."'> Invitar</a> </td>";
    ?>
    <br>
    <br>
    <br>

    <?php
    echo "<td> <a class ='f'  href = '../../../public/vista/buscarmotivo.html" ."'> Buscar reuniones agendadas</a> </td>";
    ?>
    



    
</body> 
</html>