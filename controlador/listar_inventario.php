<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT elemento.codigo as codE,elemento.nombre as nomE,elemento.tipo_elemento as tipoE, sum(entrada.cant) as cantE, sum(salida.cant_elem_sal) as cantS, sum(entrada.cant)-sum(salida.cant_elem_sal) as Stock FROM elemento INNER JOIN entrada INNER JOIN salida on elemento.codigo=entrada.codigo_elemento AND elemento.codigo=salida.codigo_elemento GROUP by nomE;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    

    foreach($resultado as $data){
        
        echo "<tr>
            <td>".$data['codE']."</td>
            <td>".$data['nomE']."</td>
            <td>".$data['tipoE']."</td>
            <td>".$data['cantE']."</td>
            <td>".$data['cantS']."</td>
            <td>".$data['Stock']."</td>
            
        </tr>";
    } 
        