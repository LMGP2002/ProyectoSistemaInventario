
btnReporte.addEventListener('click',(e)=>
{
    let formReporte= new FormData(document.querySelector('#formReporte'))

   console.log(formReporte.get('desde'))

    fetch("../../controlador/listar_reporteEl.php",{
        method:"POST",
        body:formReporte
    }).then(response => response.text()).then(response => {
        //table_body.innerHTML=response;
    console.log(response)
    
    })

})
desde.addEventListener('click',(e)=>{
console.log('puto')
})