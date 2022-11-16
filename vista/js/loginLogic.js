const formLogin=document.querySelector('#formLogin');
const formR=document.querySelector('.respuesta');



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
            formR.style.display = "block";
        }else{
            window.location.href='../php/index.php';
            formLogin.reset();
        }
    })
});