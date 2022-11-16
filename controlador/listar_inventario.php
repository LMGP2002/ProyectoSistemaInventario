<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT elemento.codigo as codigo, elemento.nombre as nombre, elemento.tipo_elemento as categoria,IFNULL((SELECT sum(entrada.cant) FROM entrada WHERE entrada.codigo_elemento=elemento.codigo),0) as cantE, IFNULL((SELECT sum(salida.cant_elem_sal) FROM salida WHERE salida.codigo_elemento=elemento.codigo),0) as cantS FROM elemento ORDER by elemento.nombre;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach($resultado as $data){

        $stock=$data['cantE']-$data['cantS'];
        
        if($stock==0){
            $stock='No hay stock';
        }

        echo "<tr>
            <td>".$data['codigo']."</td>
            <td>".$data['nombre']."</td>
            <td>".$data['categoria']."</td>
            <td>".$data['cantE']."</td>
            <td>".$data['cantS']."</td>
            <td>".$stock."</td>
            
        </tr>";
    } 
        