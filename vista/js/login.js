const formLogin=document.querySelector('#login');



formLogin.addEventListener('submit',(e)=>{
    e.preventDefault();
    const datosForm=new FormData(formLogin);

    fetch("../../controlador/login.php",{
        method:"POST",
        body:datosForm
    })
    .then(resp=>resp.text())
    .then(data=>{
       if(data==0){
        Swal.fire({
            icon: 'error',
            title: 'Datos incorrectos',
            showConfirmButton: false,
            timer: 1500    
        })
        $('.swal2-container').css("z-index",'999999');
       }else{
        window.location.href='../php/index.php';
    }
    })
});