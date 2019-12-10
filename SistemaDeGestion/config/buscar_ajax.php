<?php
include "conexionBD.php";
$cadena = $_GET['mot'];

list($cedula, $motivo) = explode('/', $cadena);
$sql = "SELECT * FROM usuario WHERE usu_cedula='$cedula'";
$result = $conn->query($sql);
$sql1 = "SELECT * FROM reuniones WHERE reu_motivo='$motivo'";
$result1 = $conn->query($sql1);


if ($result->num_rows > 0) {
    # code...

        while($row = $result->fetch_assoc()){
            
            $eliminado = $row['usu_eliminado'];
     
            if ($eliminado == 'N') {
                $codigo = $row['usu_codigo'];
                $rol = $row['usu_roles'];
                if ($rol == 'User') {
                    # code...

                    if ($result->num_rows > 0) {
                        while($row1 = $result1->fetch_assoc()){
                            $codigor = $row1['reu_codigo'];
                            $sql2 = "INSERT INTO usuario_reuniones VALUES (0, '$codigo', '$codigor')";
                            if ($conn->query($sql2) === TRUE) {
                                echo "<p>Se ha invitado correctamemte!!!</p>";
                                } else {
                                if($conn->errno == 1062){
                                echo "<p class='error'>Usuario ya invitado </p>";
                                }else{
                                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                                } }
                                //cerrar la base de datos
                                //$conn->close();

                        }
                    } else {
                        echo "<tr>";
                        echo "<td colspan='7'> No existen invitaciones registrados en el sistema </td>";
                        echo "</tr>";
                    }

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