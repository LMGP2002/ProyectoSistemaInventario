listarEntradas();
selectElemento();
selectProveedor();

function listarEntradas(){
    fetch("../../controlador/listar_entrada.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}


btnregistrar.addEventListener('click',()=>{
    fetch("../../controlador/registro_entrada.php",{
        method:"POST",
        body:new FormData(form_registro)
    }).then(response => response.text()).then(response => {

        switch (response) {
            case 'vacio':
                Swal.fire({
                    icon: 'warning',
                    title: 'Campos vacíos',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  $('.swal2-container').css("z-index",'999999');
              break;
            case 'ok':
                Swal.fire({
                    icon: 'success',
                    title: 'Registrado',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('.swal2-container').css("z-index",'999999');
                form_registro.reset();
                listarEntradas();
                break;
                case 'modificado':
                    Swal.fire({
                        icon: 'success',
                    title: 'Modificado',
                    showConfirmButton: false,
                    timer: 1500
                })
                $('.swal2-container').css("z-index",'999999');
                form_registro.reset();
                listarEntradas();
              break;
            default:
                Swal.fire({
                    icon: 'error',
                    title: 'No registrado',
                    showConfirmButton: false,
                    timer: 1500    
                })
                $('.swal2-container').css("z-index",'999999');
                form_registro.reset();   
            }
    })
})


document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.form h2').innerHTML="Agregar entrada";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    idE.value="";
    idElemento.value="";
    idCiudad.value="";
    cantidad.value="";
    precio.value="";
    limpiarSelectE();
    limpiarSelectP();
    document.querySelector('.modal-container').classList.add("modal-container-active")
});

//select elemento 


const selected= document.querySelector("[data-elemento-selected]");
const optionsContainer= document.querySelector("[data-elemento-container]");


selected.addEventListener("click",()=>{
    optionsContainer.classList.toggle('active');
    const optionsList=optionsContainer.querySelectorAll(".option");
    optionsList.forEach(o=>{
        o.addEventListener('click', ()=>{
            selected.innerHTML=o.querySelector(".label").innerHTML;
            document.querySelector('#idElemento').value=o.getAttribute('data-id');
            optionsContainer.classList.remove("active");
        })
    })
})

function selectElemento(){
    fetch("../../controlador/listar_select_elemento.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        optionsContainer.innerHTML=response;
    })
}

function limpiarSelectE(){
    const selected= document.querySelector("[data-elemento-selected]");
    selected.innerHTML="Seleccione el elemento";
}

//select proveedor 


const selected2= document.querySelector("[data-proveedor-selected]");
const optionsContainer2= document.querySelector("[data-proveedor-container]");


selected2.addEventListener("click",()=>{
    optionsContainer2.classList.toggle('active');
    const optionsList=optionsContainer2.querySelectorAll(".option");
    optionsList.forEach(o=>{
        o.addEventListener('click', ()=>{
            selected2.innerHTML=o.querySelector(".label").innerHTML;
            document.querySelector('#idCiudad').value=o.getAttribute('data-id');
            optionsContainer2.classList.remove("active");
        })
    })
})


function selectProveedor(){
    fetch("../../controlador/listar_select_proveedor.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        optionsContainer2.innerHTML=response;
    })
}

function limpiarSelectP(){
    const selected2= document.querySelector("[data-proveedor-selected]");
    selected2.innerHTML="Seleccione el proveedor";
}

// NUMBER TEXT 
var input=  document.querySelector('.inputN');


    input.addEventListener('input',function(){
        if (this.value.length > 3) this.value = this.value.slice(0,3);  
    })



    