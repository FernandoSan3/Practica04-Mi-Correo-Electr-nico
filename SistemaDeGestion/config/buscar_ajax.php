<?php
include "conexionBD.php";

$cedula = $_GET['cedula'];

$sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
$result = $conn->query($sql);

echo "  <table style='width:100%'>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th></th>
            <th></th>
            <th></th>
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
        echo "<td>" . $row['reu_invitado'] . "</td>";
        echo "<td>" . $row['reu_motivo'] . "</td>"; 
        echo "<td>" . $row['reu_observaciones'] . "</td>"; 
        echo "</tr>";
    }
}else {
    echo "<tr>";
    echo "<td colspan='7'> No existen usuarios registrados en el sistema </td>";
    echo "</tr>";
}
    echo "</table>";
    $conn->close();
?>