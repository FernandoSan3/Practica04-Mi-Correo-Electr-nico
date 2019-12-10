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

</body>
</html>