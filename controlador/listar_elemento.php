<?php
    require "../modelo/conexion.php";


    $interactuar=$_POST['int'];

    $consulta=$pdo->prepare("SELECT * FROM elemento");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $data){

        $complemento;
        
        if($interactuar=="true"){
            $complemento="<td>
            <button type='button' onClick=editar('".$data['codigo']."')><i class='fa-solid fa-pen-to-square'></i></button>
            <button  type='button' onClick=eliminar('".$data['codigo']."')><i class='fa-solid fa-trash'></i></button>
            </td>
            </tr>";
        }else{
            $complemento="</tr>";
        }
        

        echo "<tr>
        <td>".$data['codigo']."</td>
        <td>".$data['nombre']."</td>
        <td>".$data['tipo_elemento']."</td>
        <td>".$data['descripcion']."</td>
        <td>".$data['estado']."</td>".$complemento
        ;
    }    
       
?>