<?php
    require("../modelo/conexionUsuarios.php");
    $consulta=$pdo->prepare("SELECT usuario.id_usuario as id,usuario.nom_usuario as nomb,rol.nom as Nrol FROM `usuario` INNER JOIN rol on rol.id=usuario.id_rol;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultado as $data){
        echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['nomb']."</td>
            <td>".$data['Nrol']."</td>
            <td>
                <button type='button' onClick=eliminar('".$data['id']."')><i class='fa-solid fa-trash'></i></button>
            </td>
        </tr>";
    }

        
       
?>