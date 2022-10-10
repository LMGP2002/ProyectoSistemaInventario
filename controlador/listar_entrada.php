<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT entrada.id_entrada as id,entrada.fecha_entrada as fecha,entrada.cant as cantidad,entrada.precio_comp as precio, elemento.nombre as nombreE, proveedor.nom_prov as nombreP FROM `entrada`INNER JOIN elemento INNER JOIN proveedor on entrada.codigo_elemento=elemento.codigo AND entrada.id_prov=proveedor.id;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    


    foreach($resultado as $data){

        echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['fecha']."</td>
            <td>".$data['nombreE']."</td>
            <td>".$data['cantidad']."</td>
            <td>".$data['nombreP']."</td>
            <td>".$data['precio']."</td>
            <td>
                <button type='button' onClick=editar('".$data['id']."')><i class='fa-solid fa-pen-to-square'></i></button>
                <button type='button' onClick=eliminar('".$data['id']."')><i class='fa-solid fa-trash'></i></button>
            </td>
        </tr>";
    } 
         
?>