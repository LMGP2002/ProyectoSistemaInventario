<?php
include("../../controlador/validarSesion.php");
include("layout/header.php");

if($rol==3){
    include("adminUsuario.php");
}else{
    include("profile.php");
}


include("layout/footer.php");


?>

