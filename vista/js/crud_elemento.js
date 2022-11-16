listarElementos();
btnregistrar.addEventListener('click',()=>{
    fetch("../../controlador/registro_elemento.php",{
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
                listarElementos();
                break;
                case 'modificado':
                    Swal.fire({
                        icon: 'success',
                    title: 'Modificado',
                    showConfirmButton: false,
                    timer: 900
                })
                $('.swal2-container').css("z-index",'999999');
                form_registro.reset();
                listarElementos();
                document.querySelector('.modal-container').classList.remove("modal-container-active");
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

function listarElementos(){

    let interactuar;
    let registrar;
    let acciones=document.querySelector('[data-acciones]');
    let showM=document.querySelector('#show-modal');
    fetch("../../controlador/validarSeccion.php")
    .then(resp=>resp.json())
    .then(data=>{

        data.forEach(el=>{
            if(el.seccion=='Elemento'){
                interactuar=el.interactuar;
                registrar=el.registrar;
            }
        })

        let datos = new FormData();
        datos.append('int', interactuar);

        fetch("../../controlador/listar_elemento.php",{
            method:"POST",
            body:datos
        })
        .then(resp=>resp.text())
        .then(data=>{
            if(interactuar=="true"){
                acciones.style.display='table-cell'
            }else{
                acciones.style.display='none'

            }

            if(registrar=="true"){
                showM.style.display='inline'
            }else{
                showM.style.display='none'
            }
            table_body.innerHTML=data;
        })


    })
       



    
}

function eliminar(id){
    Swal.fire({
        title: 'Atención',
        text: "¿Desea eliminar el elemento?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

        fetch("../../controlador/eliminar_elemento.php",{
                method:"POST",
                body: id
            }).then(response => response.text()).then(response => {
                if(response=="ok"){
                    listarElementos();
                    Swal.fire({
                        icon: 'success',
                        title: 'Elemento eliminado',
                        showConfirmButton: false,
                        timer: 800    
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Elemento no eliminado',
                        text: "Puede tener relación con algún registro",
                        showConfirmButton: false,
                        timer: 3000    
                    })

                }

            })

          
        }
      })
}

function editar(id){
    document.querySelector('.form h2').innerHTML="Modificar elemento";
    document.querySelector('#btnregistrar').textContent ="Modificar";
    document.querySelectorAll("[data-ocultar]").forEach(e => {
        e.classList.remove('ocultar');
    });
    document.querySelector('.modal-container').classList.add("modal-container-active");
    fetch("../../controlador/editar_elemento.php",{
        method:"POST",
        body: id
    }).then(response => response.json()).then(response => {
        if(response.tipo_elemento=='Insumo'){
            insumo.checked = true;
        }else{
            producto.checked = true;
        }
        if(response.estado=='Activo'){
            activo.checked = true;
        }else{
            inactivo.checked = true;
        }
        nombre.value=response.nombre;
        descripcion.value=response.descripcion;
        idE.value=response.codigo;
    })
}


document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.form h2').innerHTML="Agregar elemento";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    document.querySelectorAll("[data-ocultar]").forEach(e => {
        e.classList.add('ocultar');
    });
    producto.checked = true;
    nombre.value="";
    idE.value="";
    descripcion.value="";
    document.querySelector('.modal-container').classList.add("modal-container-active")
});

