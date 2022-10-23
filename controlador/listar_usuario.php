<?php
$data = file_get_contents("php://input");
require "../modelo/conexion_usuario.php";
$consulta = $pdo->prepare("SELECT * FROM usuario ORDER BY id_usuario DESC");
$consulta->execute();
if($data !=""){
    $consulta = $pdo->prepare("SELECT * FROM usuario WHERE nom_usuario LIKE '%".$data."%'");
    $consulta->execute();
}
$table_body = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($table_body as $data) {
    echo "<tr>
    <td>".$data['id_usuario']."</td>
    <td>".$data['nom_usuario']."</td>
    <td>".$data['rol']."</td>
    <td>
    <button type='button' onClick=Editar('".$data['id_usuario']."')><i class='fa-solid fa-pen-to-square'></i></button>
    <button type='button' onClick=ELiminar('".$data['id_usuario']."')><i class='fa-solid fa-trash'></i></button>
</td>
   </tr>";
}

?>