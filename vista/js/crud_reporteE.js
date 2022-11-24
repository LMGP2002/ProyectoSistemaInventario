
let formReporte= new FormData(document.querySelector('#formReporte'))
formReporte.addEventListener('submit',(e)=>
{
   e.preventDefault();

    fetch("../../controlador/listar_reporteEl.php",{
        method:"POST",
        body:formReporte
    }).then(response => response.text()).then(response => {
        //table_body.innerHTML=response;
    console.log(response)
    console.log(formReporte.get('desde'))
    })

})
