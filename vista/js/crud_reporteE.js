listarElementos();

function listarElementos(){

    let desde=document.querySelector("#desde").value;
    let hasta=document.querySelector("#hasta").value;

    let datos=new FormData();

    datos.append('desde',desde)
    datos.append('hasta',hasta)



        fetch("../../controlador/listar_reporteEl.php",{
            method:"POST",
            body:datos
        })
        .then(resp=>resp.text())
        .then(data=>{
            table_body.innerHTML=data;
        })

    
}

let filtrarBtn=document.querySelector('#filtrarBtn')

filtrarBtn.addEventListener('click',(e)=>{

    e.preventDefault();
    listarElementos();


})


/*btnReporte.addEventListener('click',(e)=>
{
    let formReporte= new FormData(document.querySelector('#formReporte'))

   console.log(formReporte.get('desde'))

    fetch("../../controlador/listar_reporteEl.php",{
        method:"POST",
        body:formReporte
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    console.log(response)
    
    })

})
desde.addEventListener('click',(e)=>{
console.log('puto')
})*/