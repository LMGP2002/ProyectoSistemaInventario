<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT elemento.codigo as codEle,elemento.nombre as nomEle,elemento.tipo_elemento as tipEle,salida.cant_elem_sal as salida,entrada.cant as entrada FROM `salida`INNER JOIN elemento INNER JOIN entrada on salida.codigo_elemento=elemento.codigo and entrada.codigo_elemento=elemento.codigo;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    


    foreach($resultado as $data){

        echo "<tr>
            <td>".$data['codEle']."</td>
            <td>".$data['nomEle']."</td>
            <td>".$data['tipEle']."</td>
            <td>".$data['salida']."</td>
            <td>".$data['entrada']."</td>
           
        </tr>";
    } 
         
?>