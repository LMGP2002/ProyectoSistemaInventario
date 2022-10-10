listarSalidas();
function listarSalidas(){
    fetch("../../controlador/listar_salida.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        table_body.innerHTML=response;
    })
}
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

