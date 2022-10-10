<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT proveedor.id as id,proveedor.nit as nit,proveedor.nom_prov as nombre,proveedor.direc_prov as direccion, proveedor.tel_prov as telefono, ciudad.nom_ciu as ciudad FROM `proveedor`INNER JOIN ciudad on ciudad.id_ciudad=proveedor.id_ciudad;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    


    foreach($resultado as $data){

        echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['nit']."</td>
            <td>".$data['nombre']."</td>
            <td>".$data['direccion']."</td>
            <td>".$data['telefono']."</td>
            <td>".$data['ciudad']."</td>
            <td>
                <button type='button' onClick=editar('".$data['id']."')><i class='fa-solid fa-pen-to-square'></i></button>
                <button type='button' onClick=eliminar('".$data['id']."')><i class='fa-solid fa-trash'></i></button>
            </td>
        </tr>";
    } 
    


   



       
?>