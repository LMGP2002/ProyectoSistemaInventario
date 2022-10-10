<?php
if(isset($_POST)){
    $id=$_POST['idE'];
    $idElemento=$_POST['idElemento'];
    $fecha=$_POST['fecha'];
    $cantidad=$_POST['cantidad'];
    $precio=$_POST['precio'];
    require("../modelo/conexion.php");
    if(!empty($idElemento) and !empty($fecha) and !empty($cantidad) and !empty($precio)){
        
        $precio="$".$precio;

        if(empty($id)){
            $query=$pdo->prepare("INSERT INTO salida (fecha_salida,codigo_elemento,cant_elem_sal,precio_venta) VALUES (:fech,:idEle,:cant,:pre)");
            $query->bindParam(":fech",$fecha);
            $query->bindParam(":idEle",$idElemento);
            $query->bindParam(":cant",$cantidad);
            $query->bindParam(":pre",$precio);
            $query->execute();
            $pdo=null;
            echo "ok";
        }else{
            $query=$pdo->prepare("UPDATE proveedor SET nit=:nit, nom_prov=:nom, direc_prov=:dic, tel_prov=:tel, id_ciudad=:idCiu WHERE id=:id");
            $query->bindParam(":nit",$nit);
            $query->bindParam(":nom",$nombre);
            $query->bindParam(":dic",$direccion);
            $query->bindParam(":tel",$telefono);
            $query->bindParam(":idCiu",$idCiudad);
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