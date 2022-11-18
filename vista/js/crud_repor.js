listarCant();
function listarCant(){
    fetch("../../controlador/listar_repor.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}