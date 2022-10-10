<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $idProveedor=$_POST['idProveedor'];
    $idElemento=$_POST['idElemento'];
    $fecha=$_POST['fecha'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];
    require("../modelo/conexion.php");
    if(!empty($idProveedor) and !empty($idElemento) and !empty($fecha) and !empty($cantidad) and !empty($precio)){
        
        $precio="$".$precio;

        if(empty($id)){
            $query=$pdo->prepare("INSERT INTO entrada (fecha_entrada,codigo_elemento,cant,id_prov,precio_comp) VALUES (:fech,:idEle,:cant,:idProv,:pre)");
            $query->bindParam(":fech",$fecha);
            $query->bindParam(":idEle",$idElemento);
            $query->bindParam(":cant",$cantidad);
            $query->bindParam(":idProv",$idProveedor);
            $query->bindParam(":pre",$precio);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE entrada SET fecha_entrada=:fech, codigo_elemento=:idEle, cant=:cant, id_prov=:idProv, precio_comp=:pre WHERE id_entrada=:id");
            $query->bindParam(":fech",$fecha);
            $query->bindParam(":idEle",$idElemento);
            $query->bindParam(":cant",$cantidad);
            $query->bindParam(":idProv",$idProveedor);
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