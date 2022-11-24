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


let closePerfil=document.querySelector('.modal-perfil');


if(closePerfil!=null){
    closePerfil.addEventListener('click',(e)=>{
        if(e.target===closePerfil) document.querySelector('.modal-perfil').classList.remove("modal-perfil-active")
    });

}

let verPerfil=document.querySelector('#show-modal-perfil');

if(verPerfil!=null){
    verPerfil.addEventListener('click',()=>{
    document.querySelector('.modal-perfil').classList.add("modal-perfil-active")
    let modContra=document.querySelector('#modificarContraseña')

    modContra.addEventListener('click',()=>{
        document.querySelector('.modal-contra').classList.add("modal-contra-active")
    })
})
};



let closeContra=document.querySelector('.modal .close-btn-contra');

if(closeContra!=null){
    closeContra.addEventListener('click',()=>{
        document.querySelector('.modal-contra').classList.remove("modal-contra-active")
    });

}
