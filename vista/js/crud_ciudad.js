listarCiudad();
function listarCiudad(){
    fetch("../../controlador/listar_ciudad.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}


btnregistrar.addEventListener('click',()=>{
    fetch("../../controlador/registro_ciudad.php",{
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
                idE.value="";
                listarCiudad();
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
                idE.value="";
                listarCiudad();
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
                idE.value="";
            }
    })
})

document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.form h2').innerHTML="Agregar ciudad";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    idE.value="";
    nombre.value="";
    document.querySelector('.modal-container').classList.add("modal-container-active")
});


function eliminar(id){
    Swal.fire({
        title: 'Atención',
        text: "¿Desea eliminar la ciudad?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

        fetch("../../controlador/eliminar_ciudad.php",{
                method:"POST",
                body: id
            }).then(response => response.text()).then(response => {
                if(response=="ok"){
                    listarCiudad();
                    Swal.fire({
                        icon: 'success',
                        title: 'Ciudad eliminada',
                        showConfirmButton: false,
                        timer: 1500    
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Ciudad no eliminada',
                        text: "Puede tener relación con algún proveedor",
                        showConfirmButton: false,
                        timer: 3000    
                    })

                }

            })

        }
      })
}


function editar(id){
    document.querySelector('.form h2').innerHTML="Modificar ciudad";
    document.querySelector('#btnregistrar').textContent ="Modificar";
    document.querySelector('.modal-container').classList.add("modal-container-active");

    fetch("../../controlador/editar_ciudad.php",{
        method:"POST",
        body: id
    }).then(response => response.json()).then(response => {
        idE.value=response.id_ciudad;
        nombre.value=response.nom_ciu;
    })
}