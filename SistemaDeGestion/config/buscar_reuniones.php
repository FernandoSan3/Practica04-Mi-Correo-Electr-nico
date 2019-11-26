<?php
include "conexionBD.php";

$cedula = $_GET['motivo'];

$sql = "SELECT * FROM reuniones WHERE usu_motivo='$cedula'";
$result = $conn->query($sql);

echo "  <table style='width:100%'>
        <tr>
            <th>Fecha</th> 
            <th>Hora</th> 
            <th>lugar</th> 
            <th>coordenadas</th> 
            <th>Remitente</th> 
            <th>Invitado</th>
            <th>Motivo/th> 
            <th>Observaciones</th> 
            <th></th>
            <th></th>
            <th></th>
        </tr>";

if ($result->num_rows > 0) {
    # code...
    while($row = $result->fetch_assoc()){

        echo "<tr>";
        echo " <td>" . $row['usu_cedula'] . "</td>";
        echo " <td>" . $row['usu_nombres'] . "</td>";
        echo " <td>" . $row['usu_apellidos'] . "</td>";
        echo " <td>" . $row['usu_direccion'] . "</td>";
        echo " <td>" . $row['usu_telefono'] . "</td>";
        echo " <td>" . $row['usu_correo'] . "</td>";
        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>";
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