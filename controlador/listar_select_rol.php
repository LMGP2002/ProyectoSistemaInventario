<?php
    require("../modelo/conexionUsuarios.php");
    
    $consulta=$pdo->prepare("SELECT id,nom FROM `rol`");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $data){

        echo "<div data-id='".$data['id']."' class='option'>
                    <input type='radio' class='radio_select' id='".$data['nom']."' name='Rol'>
                    <label class='label'>".$data['nom']."</label>
            </div>";
        
    } 
?>
