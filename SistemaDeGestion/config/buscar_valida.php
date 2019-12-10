<?php
include "conexionBD.php";


$cedula = $_GET['cedula'];
$sql = "SELECT * FROM usuario WHERE usu_cedula='$cedula'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    # code...

        while($row = $result->fetch_assoc()){
            
            $eliminado = $row['usu_eliminado'];
     
            if ($eliminado == 'N') {
                $codigo = $row['usu_codigo'];
                $rol = $row['usu_roles'];
                if ($rol == 'User') {
                    # code...
                    echo $codigo;

                    

                }else{
                    echo 'No puede recibir invitaciones';

                }

            }else {
                echo "Error Usuario Elimando";
            break;
            }
          
        }
    
    
}else {
    echo "<tr>";
    echo "<td colspan='7'> No existen usuarios registrados en el sistema </td>";
    echo "</tr>";
}
    echo "</table>";
    $conn->close();
?>