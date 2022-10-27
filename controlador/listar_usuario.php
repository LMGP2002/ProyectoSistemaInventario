<?php
    require "../modelo/conexion_usuario.php";
    $consulta=$pdo->prepare("SELECT id_usuario , nom_usuario, nom FROM `usuario`,`rol` WHERE usuario.id_rol= rol.id;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $data){
        echo "<tr>
            <td>".$data['id_usuario']."</td>
            <td>".$data['nom_usuario']."</td>
            <td>".$data['nom']."</td>
            <td>
                <button type='button' onClick=editar('".$data['id_usuario']."')><i class='fa-solid fa-pen-to-square'></i></button>
                <button type='button' onClick=eliminar('".$data['id_usuario']."')><i class='fa-solid fa-trash'></i></button>
            </td>
        </tr>";
    }

        
       
?>