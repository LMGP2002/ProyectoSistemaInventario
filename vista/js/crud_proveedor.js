listarProveedores();
selectBox();

function listarProveedores(){
    fetch("../../controlador/listar_proveedor.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}


btnregistrar.addEventListener('click',()=>{
    fetch("../../controlador/registro_proveedor.php",{
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
                listarProveedores();
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
                limpiarSelect();
                listarProveedores();
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
    document.querySelector('.form h2').innerHTML="Agregar proveedor";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    document.querySelectorAll("[data-ocultar]").forEach(e => {
        e.classList.add('ocultar');
    });
    nombre.value="";
    idE.value="";
    idCiudad.value="";
    nit.value="";
    direccion.value="";
    telefono.value="";
    limpiarSelect();
    document.querySelector('.modal-container').classList.add("modal-container-active")
});


function limpiarSelect(){
    const selected= document.querySelector(".selected");
    selected.innerHTML="Seleccione la ciudad";
}


// NUMBER TEXT 
var input=document.querySelectorAll('.inputN');

input.forEach(el=>{
    el.addEventListener('input',function(){
        if(el.hasAttribute('data-nit')){
            if (this.value.length > 15) this.value = this.value.slice(0,15); 
        }else{
            if (this.value.length > 10) this.value = this.value.slice(0,10); 
        }
    })
})


/*SELECT PROVEEDOR*/

const selected= document.querySelector(".selected");
const optionsContainer= document.querySelector(".options-container");


selected.addEventListener("click",()=>{
    optionsContainer.classList.toggle('active');
    const optionsList=document.querySelectorAll(".option");
    optionsList.forEach(o=>{
        o.addEventListener('click', ()=>{
            selected.innerHTML=o.querySelector(".label").innerHTML;
            document.querySelector('#idCiudad').value=o.getAttribute('data-id');
            optionsContainer.classList.remove("active");
        })
    })
})




//Llenar SELECT BOX

function selectBox(){
    fetch("../../controlador/listar_select.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        document.querySelector('.options-container').innerHTML=response;
    })
}



function eliminar(id){
    Swal.fire({
        title: 'Atención',
        text: "¿Desea eliminar el proveedor?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

        fetch("../../controlador/eliminar_proveedor.php",{
                method:"POST",
                body: id
            }).then(response => response.text()).then(response => {
                if(response=="ok"){
                    listarProveedores();
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

function editar(id){
    document.querySelector('.form h2').innerHTML="Modificar proveedor";
    document.querySelector('#btnregistrar').textContent ="Modificar";
    document.querySelector('.modal-container').classList.add("modal-container-active");

    fetch("../../controlador/editar_proveedor.php",{
        method:"POST",
        body: id
    }).then(response => response.json()).then(response => {
        idE.value=response.id;
        nit.value=response.nit;
        nombre.value=response.nom_prov;
        direccion.value=response.direc_prov;
        telefono.value=response.tel_prov;
        idCiudad.value=response.id_ciudad;
        const optionsList=document.querySelectorAll(".option");
        const selected= document.querySelector(".selected");

        optionsList.forEach(e=>{
            if(e.getAttribute('data-id')==idCiudad.value){
                selected.innerHTML=e.querySelector(".label").innerHTML;
            }
        });
    })
}
