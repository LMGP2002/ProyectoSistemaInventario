<?php
    require "../modelo/conexion.php";
    $consulta=$pdo->prepare("SELECT * FROM ciudad");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    foreach($resultado as $data){
        echo "<tr>
            <td>".$data['id_ciudad']."</td>
            <td>".$data['nom_ciu']."</td>
            <td>
                <button type='button' onClick=editar('".$data['id_ciudad']."')><i class='fa-solid fa-pen-to-square'></i></button>
                <button type='button' onClick=eliminar('".$data['id_ciudad']."')><i class='fa-solid fa-trash'></i></button>
            </td>
        </tr>";
    }

        
       
?>