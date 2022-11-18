<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT nom_prov as 'Proveedor', sum(cant) as 'Cantidad' FROM `proveedor`,`entrada`  
	WHERE entrada.id_prov=proveedor.id GROUP BY nom_prov ORDER BY entrada.fecha_entrada");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $data){
        echo "<tr>
            <td>".$data['Proveedor']."</td>
            <td>".$data['Cantidad']."</td>
        </tr>";
    }

        
       
?>