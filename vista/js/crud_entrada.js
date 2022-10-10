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
                limpiarSelectE();
                limpiarSelectP(); 
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
                limpiarSelectE();
                limpiarSelectP(); 
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
                limpiarSelectE();
                limpiarSelectP();  
        }
    })
})


document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.form h2').innerHTML="Agregar entrada";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    idE.value="";
    idElemento.value="";
    idProveedor.value="";
    cantidad.value="";
    precio.value="";
    fecha.value="";
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
            document.querySelector('#idProveedor').value=o.getAttribute('data-id');
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
var input=document.querySelectorAll('.inputN');

input.forEach(el=>{
    el.addEventListener('input',function(){
        if(el.hasAttribute('data-cant')){
            if (el.value.length > 3) this.value = this.value.slice(0,3); 
        }else{
            if (this.value.length > 10) this.value = this.value.slice(0,10); 
        }
    })
})


//eliminar
function eliminar(id){
    Swal.fire({
        title: 'Atención',
        text: "¿Desea eliminar la entrada?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

        fetch("../../controlador/eliminar_entrada.php",{
                method:"POST",
                body: id
            }).then(response => response.text()).then(response => {
                if(response=="ok"){
                    listarEntradas();
                    Swal.fire({
                        icon: 'success',
                        title: 'Elemento eliminado',
                        showConfirmButton: false,
                        timer: 1500    
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Elemento no eliminado',
                        showConfirmButton: false,
                        timer: 1500    
                    })

                }

            })

          
        }
      })
}
  
//editar
function editar(id){
    document.querySelector('.form h2').innerHTML="Modificar entrada";
    document.querySelector('#btnregistrar').textContent ="Modificar";
    document.querySelector('.modal-container').classList.add("modal-container-active");

    fetch("../../controlador/editar_entrada.php",{
        method:"POST",
        body: id
    }).then(response => response.json()).then(response => {
        idE.value=response.id_entrada;
        idElemento.value=response.codigo_elemento;
        idProveedor.value=response.id_prov;

        //traer elemento
        const options=document.querySelector("[data-elemento-container]");
        const optionsList=options.querySelectorAll(".option");
        const selected=document.querySelector("[data-elemento-selected]");

        optionsList.forEach(e=>{
            if(e.getAttribute('data-id')==idElemento.value){
                selected.innerHTML=e.querySelector(".label").innerHTML;
            }
        });

        fecha.value=response.fecha_entrada;
        cantidad.value=response.cant;

        //traer proveedor
        const options2=document.querySelector("[data-proveedor-container]");
        const optionsList2=options2.querySelectorAll(".option");
        const selected2= document.querySelector("[data-proveedor-selected]");

        optionsList2.forEach(e=>{
            if(e.getAttribute('data-id')==idProveedor.value){
                selected2.innerHTML=e.querySelector(".label").innerHTML;
            }
        });

        precio.value=response.precio_comp.replace("$", "");
        
    })
}