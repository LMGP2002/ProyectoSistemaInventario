listarEntradas();


function listarEntradas(){
    fetch("../../controlador/listar_entrada.php",{
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
    document.querySelector('.form h2').innerHTML="Agregar entrada";
    document.querySelector('#btnregistrar').textContent ="Agregar";
    idE.value="";
    idCiudad.value="";
    cantidad.value="";
    precio.value="";
    //limpiarSelect();
    document.querySelector('.modal-container').classList.add("modal-container-active")
});

//select elemento proveedor

const selected= document.querySelectorAll(".selected");
const optionsContainer=document.querySelectorAll(".options-container");

console.log(selected);
console.log(optionsContainer);




selected.forEach(e=>{

    if(e.hasAttribute('data-elemento')){
        e.addEventListener('click',()=>{
            optionsContainer[0].classList.toggle('active');
            selectElemento(optionsContainer[0]);
        })
    }else{
        e.addEventListener('click',()=>{
            optionsContainer[1].classList.toggle('active');
            selectProveedor(optionsContainer[1]);
        })

    }


})





function selectElemento(contenedor){
    fetch("../../controlador/listar_select_elemento.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        contenedor.innerHTML=response;
    })
}
function selectProveedor(contenedor){
    fetch("../../controlador/listar_select_proveedor.php",{
        method:"POST"
    }).then(response => response.text()).then(response => {
        contenedor.innerHTML=response;
    })
}


// NUMBER TEXT 
var input=  document.querySelector('.inputN');


    input.addEventListener('input',function(){
        if (this.value.length > 3) this.value = this.value.slice(0,3);  
    })



    