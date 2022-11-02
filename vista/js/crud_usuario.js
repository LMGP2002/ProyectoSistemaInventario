ListarUsuarios();
selectBox();
function ListarUsuarios(busqueda){
    fetch("../../controlador/listar_usuario.php",{
        method: "POST",
        body: busqueda
    }).then(response => response.text()).then(response =>{
        table_body.innerHTML = response;
       
    })
}


btnregistrar.addEventListener("click", ()=>{
fetch("../../controlador/registro_usuario.php", {
method: "POST",
body: new FormData(form_registro)
}).then(response => response.text()).then(response =>{
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
            ListarUsuarios();
            limpiarSelect();
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
            ListarUsuarios();
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

});

document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.form h2').innerHTML="Agregar Usuario";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    document.querySelectorAll("[data-ocultar]").forEach(e => {
        e.classList.add('ocultar');
    });
    idE.value="";
    nom_usuario.value="";
    contrasena.value="";
    id_rol.value="";
    limpiarSelect();
    document.querySelector('.modal-container').classList.add("modal-container-active")
});

/*SELECT ROL*/
function limpiarSelect(){
    const selected= document.querySelector(".selected");
    selected.innerHTML="Seleccione el rol";
}


const selected= document.querySelector(".selected");
const optionsContainer= document.querySelector(".options-container");
  


selected.addEventListener("click",()=>{
    optionsContainer.classList.toggle('active');
    const optionsList=document.querySelectorAll(".option");
    optionsList.forEach(o=>{
        o.addEventListener('click', ()=>{
            selected.innerHTML=o.querySelector(".label").innerHTML;
            document.querySelector('#id_rol').value=o.getAttribute('data-id');
            optionsContainer.classList.remove("active");
        })
    })
})


function selectBox(){
    fetch("../../controlador/listar_select_rol.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        document.querySelector('.options-container').innerHTML=response;
    })
}


function ELiminar(idE){
    Swal.fire({
        title: 'Atención',
        title: '¿Desea eliminar el usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            fetch("../../controlador/eliminar_usuario.php",{
                method: "POST",
                body: idE
            }).then(response => response.text()).then(response =>{
                if(response == "ok"){
                    ListarUsuarios();  
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario eliminado',
                        showConfirmButton: false,
                        timer: 1500
                      })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Usuario no eliminado',
                            showConfirmButton: false,
                            timer: 3000    
                        })
    
                    }
               
            })
        
        }
      })
}

function Editar(idE){
    document.querySelector('.form h2').innerHTML="Modificar usuario";
    document.querySelector('#btnregistrar').textContent ="Modificar";
    document.querySelector('.modal-container').classList.add("modal-container-active");

    fetch("../../controlador/editar_usuario.php", {
        method: "POST",
        body: idE
    }).then(response => response.json()).then(response => {
        idE.value = response.idE;
        nom_usuario.value = response.nom_usuario;
        contrasena.value = response.contrasena;
        rol.value = response.rol;
        btnregistrar.value = "Actualizar";
    })
}


