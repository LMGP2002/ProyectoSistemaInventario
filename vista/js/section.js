//Barra de búsqueda

const barraBusqueda=document.querySelector(".search");

barraBusqueda.addEventListener("input",onInputChange);

function onInputChange(){
    let inputText=barraBusqueda.value.toLowerCase();
    const tableBody=document.querySelector('#table_body');
    let tableRows=tableBody.getElementsByTagName('tr');
    Array.from(tableRows).forEach(el=>{
        let textoConsulta=el.cells[1].textContent.toLowerCase();
        if(textoConsulta.indexOf(inputText)===-1){
            el.style.visibility="collapse";
        }else{
            el.style.visibility="";
        }
    });
    
    
}

//Modal

document.querySelector('.modal .close-btn').addEventListener('click',()=>{
    document.querySelector('.modal-container').classList.remove("modal-container-active")
});



