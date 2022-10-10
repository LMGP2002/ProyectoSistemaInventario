<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT elemento.codigo as codigo, elemento.nombre as nombre, elemento.tipo_elemento as categoria, (SELECT sum(entrada.cant) FROM entrada WHERE entrada.codigo_elemento=elemento.codigo) as cantE, (SELECT sum(salida.cant_elem_sal) FROM salida WHERE salida.codigo_elemento=elemento.codigo) as cantS, (SELECT sum(entrada.cant) FROM entrada WHERE entrada.codigo_elemento=elemento.codigo)-(SELECT sum(salida.cant_elem_sal) FROM salida WHERE salida.codigo_elemento=elemento.codigo) as Stock FROM elemento ORDER by elemento.nombre;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC); 
    
    foreach($resultado as $data){
        
        if($data['Stock']>0){
            $stock=$data['Stock'];
        }else{
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
        