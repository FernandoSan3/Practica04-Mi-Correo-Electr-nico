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
            
        </tr>";

if ($result->num_rows > 0) {
    # code...
    
    //if ($eliminado = 'N') {
        # code...
        while($row = $result->fetch_assoc()){
          
                
                # code...
                echo "<tr>";
                $codigo = $row['usu_codigo'];
                echo "<td>" . $row["usu_cedula"] . "</td>"; 
                echo "<td>" . $row['usu_nombres'] ."</td>";
                echo "<td>" . $row['usu_apellidos'] . "</td>";
                echo "<td>" . $row['usu_direccion'] . "</td>";
                echo "<td>" . $row['usu_telefono'] . "</td>";
                echo "<td>" . $row['usu_correo'] . "</td>";
                echo "<td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
                $rol = $row['usu_roles'];
           // $eliminado = $row['usu_eliminado'];
                echo "</tr>";
                
            
        }
   // }else {
    //    echo "Error Usuario Elimando";
  //  }
    
    
}else {
    echo "<tr>";
    echo "<td colspan='7'> No existen usuarios registrados en el sistema </td>";
    echo "</tr>";
}
    echo "</table>";
    $conn->close();
?>