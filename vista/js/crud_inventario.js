listarInventario();
function listarInventario(){
    fetch("../../controlador/listar_inventario.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}


