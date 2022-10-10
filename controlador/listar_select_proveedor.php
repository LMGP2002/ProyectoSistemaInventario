<?php
    require "../modelo/conexion.php";
    
    $consulta=$pdo->prepare("SELECT nom_prov,id FROM `proveedor`");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $data){

        echo "<div data-id='".$data['id']."' class='option'>
                    <input type='radio' class='radio_select' id='".$data['nom_prov']."' name='proveedor'>
                    <label class='label'>".$data['nom_prov']."</label>
            </div>";
    } 
    

    
       
?>