<?php
    require "../modelo/conexion.php";   
    $desde=$_POST['desde'] 
    echo $desde;
         /*$consulta =$pdo->prepare( "SELECT nombre,nom_prov, fecha_entrada,entrada.cant AS cantE,fecha_salida,salida.cant_elem_sal AS cantS,precio_comp,precio_venta FROM `elemento`,`proveedor`,`entrada`,`salida` 
         WHERE elemento.codigo= entrada.codigo_elemento and elemento.codigo=salida.codigo_elemento and proveedor.id=entrada.id_prov GROUP BY entrada.id_entrada");
           $consulta->execute();
           $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
           foreach($resultado as $data){

        echo "<tr>
            <td>".$data['nombre']."</td>
            <td>".$data['nom_prov']."</td>
            <td>".$data['fecha_entrada']."</td>
            <td>".$data['cantE']."</td>
            <td>".$data['precio_comp']."</td>
            <td>".$data['fecha_salida']."</td>
            <td>".$data['cantS']."</td>
            <td>".$data['precio_venta']."</td>
            
            
        </tr>";
    } 
