<?php
    require "../modelo/conexion.php";
    
    $consulta=$pdo->prepare("SELECT elemento.codigo as codigo, elemento.nombre as nombre, elemento.tipo_elemento as categoria, IFNULL((SELECT sum(entrada.cant) FROM entrada WHERE entrada.codigo_elemento=elemento.codigo)-(SELECT sum(salida.cant_elem_sal) FROM salida WHERE salida.codigo_elemento=elemento.codigo), (SELECT sum(entrada.cant) FROM entrada WHERE entrada.codigo_elemento=elemento.codigo)) as stock FROM elemento INNER JOIN entrada ON elemento.codigo=entrada.codigo_elemento GROUP BY elemento.codigo;");
    $consulta->execute();
    $resultado=$consulta->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($resultado as $data){

        echo "<div data-cantidad='".$data['stock']."' data-categoria='".$data['categoria']."' data-id='".$data['codigo']."' class='option'>
                    <input type='radio' class='radio_select' id='".$data['nombre']."' name='elemento'>
                    <label class='label'>".$data['nombre']."</label>
            </div>";
    } 
    

    
       
?>