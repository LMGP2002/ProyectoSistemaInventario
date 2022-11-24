
btnModContra.addEventListener('click',()=>{


    let formContra=new FormData(form_contra);

    fetch("../../controlador/modificarContra.php",{
        method:"POST",
        body:formContra
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

              case 'incorrecto':
                Swal.fire({
                    icon: 'error',
                    title: 'Contraseña actual inválida',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  $('.swal2-container').css("z-index",'999999');
              break;

              case 'igual':
                Swal.fire({
                    icon: 'warning',
                    title: 'Contraseñas idénticas',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  $('.swal2-container').css("z-index",'999999');
              break;

              case 'modificado':
                Swal.fire({
                    icon: 'success',
                    title: 'Contraseña modificada',
                    text:'Cerrando sesión...',
                    showConfirmButton: false,
                    timer: 4000
                  })
                  $('.swal2-container').css("z-index",'999999');

                  setTimeout(function(){
                      window.location.href='../../controlador/logout.php';
                }, 4000);
                  break;
                  
                  default:
                      
                      Swal.fire({
                          icon: 'error',
                          title: 'Error inesperado',
                          showConfirmButton: false,
                          timer: 1500
                        })
                        $('.swal2-container').css("z-index",'999999');
                        break;
            }
    })
})