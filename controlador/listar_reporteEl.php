<?php
    require "../modelo/conexion.php";  
    
    $desde=$_POST['desde'];
    $hasta=$_POST['hasta'];
    if(!empty($desde) and !empty($hasta)){

        $consulta2=$pdo->prepare("SELECT elemento.nombre as nombre, proveedor.nom_prov as nomP, entrada.fecha_entrada as fechE,entrada.cant as cantE,entrada.precio_comp as precC,salida.fecha_salida as fechS,salida.cant_elem_sal as cantS,salida.precio_venta as precV FROM elemento INNER JOIN entrada ON entrada.codigo_elemento=elemento.codigo INNER JOIN proveedor ON entrada.id_prov= proveedor.id INNER JOIN salida ON entrada.codigo_elemento=salida.codigo_elemento WHERE entrada.fecha_entrada BETWEEN '$desde' AND '$hasta' AND salida.fecha_salida BETWEEN '$desde' AND '$hasta' GROUP by elemento.nombre;");
    $consulta2->execute();
    $resultado2=$consulta2->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado2 as $data){
    
        if($data['precV']==null){
            $precioV='Sin precio';
        }else{
            $precioV='$'.$data['precV'];
        }
          echo "<tr>
          <td>".$data['nombre']."</td>
          <td>".$data['nomP']."</td>
          <td>".$data['fechE']."</td>
          <td>".$data['cantE']."</td>
          <td>".$data['precC']."</td>
          <td>".$data['fechS']."</td>
          <td>".$data['cantS']."</td>
          <td>".$precioV."</td>
          </tr>";
    } 


    }else{
        
    $consulta=$pdo->prepare("SELECT elemento.nombre as nombre, proveedor.nom_prov as nomP, entrada.fecha_entrada as fechE,entrada.cant as cantE,entrada.precio_comp as precC,salida.fecha_salida as fechS,salida.cant_elem_sal as cantS,salida.precio_venta as precV FROM elemento INNER JOIN entrada ON entrada.codigo_elemento=elemento.codigo INNER JOIN proveedor ON entrada.id_prov= proveedor.id INNER JOIN salida ON entrada.codigo_elemento=salida.codigo_elemento GROUP by elemento.nombre;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $data){
    
        if($data['precV']==null){
            $precioV='Sin precio';
        }else{
            $precioV='$'.$data['precV'];
        }
          echo "<tr>
          <td>".$data['nombre']."</td>
          <td>".$data['nomP']."</td>
          <td>".$data['fechE']."</td>
          <td>".$data['cantE']."</td>
          <td>".$data['precC']."</td>
          <td>".$data['fechS']."</td>
          <td>".$data['cantS']."</td>
          <td>".$precioV."</td>
          </tr>";
    } 
    }

   
   

    
           
      