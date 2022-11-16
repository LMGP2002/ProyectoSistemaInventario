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

    let bandera=document.querySelector('.form h2').textContent;
    let formSalida=new FormData(form_registro);
    let elemento=document.querySelector('[data-stock]');
    let stock=parseInt(elemento.getAttribute('data-stock'));
    let validarPrecio=elemento.getAttribute('data-categoria');
  
    console.log(stock);
    
    if(bandera=='Modificar salida' && elemento.getAttribute('data-elemento')==elemento.textContent){
        console.log(cantidad.getAttribute('data-cant'));
        stock+=parseInt(cantidad.getAttribute('data-cant'));
    }
    
    console.log(stock);
    
    


    formSalida.append('stock',stock);
    
    formSalida.append('bandera',bandera);
    
    formSalida.append('validarPrecio',validarPrecio);
    
   

    

    fetch("../../controlador/registro_salida.php",{
        method:"POST",
        body:formSalida
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

            case 'stock':
                Swal.fire({
                    icon: 'warning',
                    title: 'Cantidad no disponible',
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
                limpiarSelectE()
                selectElemento();
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
                listarSalidas();
                limpiarSelectE();
                selectElemento();
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
    selectElemento();
    document.querySelector('.modal-container').classList.add("modal-container-active")
});

//select elemento 


const selected= document.querySelector("[data-elemento-selected]");
const optionsContainer= document.querySelector("[data-elemento-container]");


selected.addEventListener("click",()=>{
    optionsContainer.classList.toggle('active');
    const optionsList=optionsContainer.querySelectorAll(".option");
    const precioInput=document.querySelector('#precio');
    const tituloPrecio=document.querySelector('.label-titulo-precio');
    
    
    optionsList.forEach(o=>{
        o.addEventListener('click', ()=>{
            selected.innerHTML=o.querySelector(".label").innerHTML;
            selected.setAttribute('data-stock', o.getAttribute("data-cantidad")); 
            selected.setAttribute('data-categoria', o.getAttribute("data-categoria")); 
            document.querySelector('#idElemento').value=o.getAttribute('data-id');

            if(o.getAttribute("data-categoria")=='Insumo'){
                precioInput.type='hidden';
                precioInput.value=' ';
                tituloPrecio.classList.add('ocultar');
            }else{
                precioInput.value='';
                precioInput.type='number';
                tituloPrecio.classList.remove('ocultar');

            }

            
            optionsContainer.classList.remove("active");
        })
    })
})

function selectElemento(){
    fetch("../../controlador/listar_select_entrada.php",{
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
                        timer: 800    
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

function editar(id){
    document.querySelector('.form h2').innerHTML="Modificar salida";
    document.querySelector('#btnregistrar').textContent ="Modificar";
    document.querySelector('.modal-container').classList.add("modal-container-active");

    fetch("../../controlador/editar_salida.php",{
        method:"POST",
        body: id
    }).then(response => response.json()).then(response => {
        idE.value=response.id_salida;
        idElemento.value=response.codigo_elemento;

        const optionsList=document.querySelectorAll(".option");
        const selected= document.querySelector(".selected");
        const precioInput=document.querySelector('#precio');
        const tituloPrecio=document.querySelector('.label-titulo-precio');

        optionsList.forEach(e=>{
            if(e.getAttribute('data-id')==idElemento.value){
                selected.innerHTML=e.querySelector(".label").innerHTML;
                selected.setAttribute('data-stock', e.getAttribute("data-cantidad")); 
                selected.setAttribute('data-categoria', e.getAttribute("data-categoria")); 
                selected.setAttribute('data-elemento', e.querySelector(".label").innerHTML); 
                if(selected.getAttribute("data-categoria")=='Insumo'){
                    precioInput.type='hidden';
                    tituloPrecio.classList.add('ocultar');
                    precioInput.value='00';
                }else{
                    precioInput.type='number';
                    tituloPrecio.classList.remove('ocultar');
    
                }
            }

            
        });

        fecha.value=response.fecha_salida;
        cantidad.value=response.cant_elem_sal;
        if(selected.getAttribute("data-categoria")=='Producto'){
        precio.value=response.precio_venta.replace("$", "")
        cantidad.setAttribute('data-cant',response.cant_elem_sal);
        }
    })
}
