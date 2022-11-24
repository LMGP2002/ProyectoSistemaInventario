listarReport();
function listarReport(){
    fetch("../../controlador/listar_reporteEl.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}


