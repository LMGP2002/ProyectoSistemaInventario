listarSalidas();
selectElemento();

function listarSalidas(){
    fetch("../../controlador/listar_salida.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}
btnregistrar.addEventListener('click',()=>{
    fetch("../../controlador/registro_salida.php",{
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
                listarSalidas();
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
                listarSalidas();
                limpiarSelectE();
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
               
        }
    })
})


document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.form h2').innerHTML="Agregar salida";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    idE.value="";
    idElemento.value="";
    cantidad.value="";
    precio.value="";
    fecha.value="";
    limpiarSelectE();
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
function eliminar(id){
    Swal.fire({
        title: 'Atención',
        text: "¿Desea eliminar la salida?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

        fetch("../../controlador/eliminar_salida.php",{
                method:"POST",
                body: id
            }).then(response => response.text()).then(response => {
                if(response=="ok"){
                    listarSalidas();
                    Swal.fire({
                        icon: 'success',
                        title: 'Salida eliminada',
                        showConfirmButton: false,
                        timer: 1500    
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Salida no eliminada',
                        text: "Puede tener relación con algún proveedor",
                        showConfirmButton: false,
                        timer: 3000    
                    })

                }

            })

        }
      })
}

