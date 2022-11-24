<?php
    require "../modelo/conexion.php";   
    $desde=$_POST['desde']; 
    $hasta=$_POST['hasta'];
    if (empty($desde) || empty($hasta) ) {
        $consulta = "SELECT nombre,nom_prov, fecha_entrada,entrada.cant AS cantE,fecha_salida,salida.cant_elem_sal AS cantS,precio_comp,precio_venta FROM `elemento`,`proveedor`,`entrada`,`salida` 
        WHERE elemento.codigo= entrada.codigo_elemento and elemento.codigo=salida.codigo_elemento and proveedor.id=entrada.id_prov GROUP BY entrada.id_entrada;";
          
       }else{
        $consulta = "SELECT elemento.nombre,proveedor.nom_prov,entrada.fecha_entrada,entrada.cant AS cantE,salida.cant_elem_sal AS cantS ,entrada.precio_comp,salida.fecha_salida,salida.precio_venta FROM entrada 
        INNER JOIN elemento ON elemento.codigo=entrada.codigo_elemento 
        INNER JOIN salida ON salida.codigo_elemento=entrada.codigo_elemento inner join proveedor on proveedor.id=entrada.id_prov WHERE entrada.fecha_entrada BETWEEN '$desde' AND '$hasta' AND salida.fecha_salida BETWEEN '$desde' AND '$hasta';";  
      }
           
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
