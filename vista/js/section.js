//Barra de búsqueda

const barraBusqueda=document.querySelector(".search");

if(barraBusqueda!=null) barraBusqueda.addEventListener("input",onInputChange);

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
let closeBtn=document.querySelector('.modal .close-btn');

if(closeBtn!=null){
    closeBtn.addEventListener('click',()=>{
        document.querySelector('.modal-container').classList.remove("modal-container-active")
    });

}

let admUser=document.querySelector('.admUser');

if(admUser!=null){
    admUser.addEventListener('click',()=>{
        window.location.href='../php/profile.php';
    })
}