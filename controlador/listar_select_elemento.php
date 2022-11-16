<?php
    require "../modelo/conexion.php";
    
    $consulta=$pdo->prepare("SELECT nombre,codigo,tipo_elemento,estado FROM `elemento`");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $data){
        
        if($data['estado']=='Inactivo') continue;

        echo "<div data-estado='".$data['estado']."' data-categoria='".$data['tipo_elemento']."' data-id='".$data['codigo']."' class='option'>
                    <input type='radio' class='radio_select' id='".$data['nombre']."' name='elemento'>
                    <label class='label'>".$data['nombre']."</label>
            </div>";
    } 
    

    
       
?>