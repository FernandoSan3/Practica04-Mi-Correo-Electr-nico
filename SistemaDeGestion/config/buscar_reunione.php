<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buscar Reuniones</title>
    <link rel="stylesheet" href ="../public/vista/style.css">
</head>
<body>
    

<?php
include "conexionBD.php";

$motivo = $_GET['motivo'];
$sql = "SELECT * FROM reuniones WHERE reu_motivo='$motivo'";
$result = $conn->query($sql);

echo "  <table style='width:100%'>
        <tr>
            <th>Fecha</th> 
            <th>Hora</th> 
            <th>lugar</th> 
            <th>coordenadas</th> 
            <th>Remitente</th> 
            <th>Motivo</th>
            <th>Observaciones</th> 
        </tr>";

if ($result->num_rows > 0) {
    # code...
    while($row = $result->fetch_assoc()){

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
}else {
    echo "<tr>";
    echo "<td colspan='7'> No existen reuniones agendadas registrados en el sistema </td>";
    echo "</tr>";
}
    echo "</table>";
    $conn->close();
?>
<br>
<br>
<br>

<table style="width:100%">
     <tr>

         <th>Cedula</th> 
         <th>Nombre</th> 
         <th>Apellido</th> 
         <th>Telefono</th> 
         <th>Fecha</th> 
         <th>Hora</th>
         <th>Lugar</th> 
         <th>Motivo</th>
         <th>Observaciones</th>
         <th>Eliminar</th> 
    </tr>
   


    <?php
    include 'conexionBD.php';
    //$usuario1=$_SESSION['user'];

    $sql2 ="SELECT U.usu_nombres, U.usu_apellidos, U.usu_cedula, U.usu_telefono,
    R.reu_fecha, R.reu_hora, R.reu_lugar, R.reu_motivo, R.reu_observaciones, R.reu_codigo FROM usuario_reuniones UR, usuario U, reuniones R WHERE usuarios_usu_codigo = U.usu_codigo and reuniones_reu_codigo = R.reu_codigo";
   // $sql1="SELECT * FROM reuniones  ORDER BY reu_fecha ASC";
    
    $result2 = $conn->query($sql2);


    if ($result2->num_rows > 0) {

        while($row = $result2->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["usu_cedula"] . "</td>"; 
            echo "<td>" . $row["usu_nombres"] . "</td>"; 
            echo "<td>" . $row['usu_apellidos'] . "</td>";
            echo "<td>" . $row['usu_telefono'] . "</td>";
            echo "<td>" . $row['reu_fecha'] . "</td>";
            echo "<td>" . $row['reu_hora'] . "</td>";
            echo "<td>" . $row['reu_lugar'] . "</td>";
            echo "<td>" . $row['reu_motivo'] . "</td>"; 
            echo "<td>" . $row['reu_observaciones'] . "</td>"; 
            echo "<td> <a href='eliminar.php?codigo=" . $row['reu_codigo'] . "'>Eliminar</a> </td>";
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

</body>
</html>