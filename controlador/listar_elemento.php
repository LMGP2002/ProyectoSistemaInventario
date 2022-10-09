<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT * FROM elemento");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $data){
        echo "<tr>
            <td>".$data['codigo']."</td>
            <td>".$data['nombre']."</td>
            <td>".$data['tipo_elemento']."</td>
            <td>".$data['descripcion']."</td>
            <td>".$data['estado']."</td>
            <td>
                <button type='button' onClick=editar('".$data['codigo']."')><i class='fa-solid fa-pen-to-square'></i></button>
                <button type='button' onClick=eliminar('".$data['codigo']."')><i class='fa-solid fa-trash'></i></button>
            </td>
        </tr>";
    }    
       
?>