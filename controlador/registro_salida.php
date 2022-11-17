<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $idElemento=$_POST['idElemento'];
    $fecha=$_POST['fecha'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];
    $stock=$_POST['stock'];
    $bandera=$_POST['bandera'];
    require("../modelo/conexion.php");
    if(!empty($idElemento) and !empty($fecha) and !empty($cantidad) and !empty($precio)){
        
        $cantidad=abs($_POST['cantidad']);
        $validarPrecio=$_POST['validarPrecio'];


        if($validarPrecio=='Insumo'){
            $precio=null;
        }

       
        if($cantidad>$stock){
            echo "stock";
        }else if(empty($id)){
            $query=$pdo->prepare("INSERT INTO salida (fecha_salida,codigo_elemento,cant_elem_sal,precio_venta) VALUES (:fech,:idEle,:cant,:pre)");
            $query->bindParam(":fech",$fecha);
            $query->bindParam(":idEle",$idElemento);
            $query->bindParam(":cant",$cantidad);
            $query->bindParam(":pre",$precio);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE salida SET fecha_salida=:fech, codigo_elemento=:idEle, cant_elem_sal=:cant, precio_venta=:pre WHERE id_salida =:id");
            $query->bindParam(":fech",$fecha);
            $query->bindParam(":idEle",$idElemento);
            $query->bindParam(":cant",$cantidad);
            $query->bindParam(":pre",$precio);
            $query->bindParam(":id",$id);
            $query->execute();
            $pdo=null;
            echo "modificado";
        }




    }else{
        echo "vacio";
    }

}

?>