<?php
    require "../modelo/conexion.php";

    $interactuar=$_POST['interactuar'];


    $consulta=$pdo->prepare("SELECT salida.id_salida as id,salida.fecha_salida as fecha,salida.cant_elem_sal as cantidad,(salida.precio_venta * salida.cant_elem_sal) as precio, elemento.nombre as nombreE FROM `salida`INNER JOIN elemento  on salida.codigo_elemento=elemento.codigo;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);    


    foreach($resultado as $data){


        $complemento;
        
        if($interactuar=="true"){
            $complemento="<td>
            <button type='button' onClick=editar('".$data['id']."')><i class='fa-solid fa-pen-to-square'></i></button>
            <button type='button' onClick=eliminar('".$data['id']."')><i class='fa-solid fa-trash'></i></button>
        </td>
    </tr>";
        }else{
            $complemento="</tr>";
        }


        $precio;
        if($data['precio']==null){
            $precio='Sin precio venta';
        }else{
            $precio='$'.$data['precio'];
        }

        echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['fecha']."</td>
            <td>".$data['nombreE']."</td>
            <td>".$data['cantidad']."</td>
            <td>".$precio."</td>".$complemento;
            
    } 
         
?>