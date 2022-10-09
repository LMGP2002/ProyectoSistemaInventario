<?php
    require "../modelo/conexion.php";
    
    $consulta=$pdo->prepare("SELECT * FROM `ciudad`");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $data){

        echo "<div data-id='".$data['id_ciudad']."' class='option'>
                    <input type='radio' class='radio_select' id='".$data['nom_ciu']."' name='ciudad'>
                    <label class='label'>".$data['nom_ciu']."</label>
            </div>";
    } 
    

    
       
?>