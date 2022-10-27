<?php
    require "../modelo/conexion_usuario.php";
    
    $consulta=$pdo->prepare("SELECT * FROM `rol`");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $data){

        echo "<div data-id='".$data['id']."' class='option'>
                    <input type='radio' class='radio_select' id='".$data['id']."' name='idrol'>
                    <label class='label'>".$data['idrol']."</label>
            </div>";
        
    } 
  

    
       
echo($resultado);       
?>
