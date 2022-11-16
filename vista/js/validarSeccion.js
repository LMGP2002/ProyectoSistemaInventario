fetch("../../controlador/validarSeccion.php")
.then(resp=>resp.json())
.then(data=>{
    
    let secciones=document.querySelectorAll("[data-seccion]");
    let menu=document.querySelector(".menu");

    for (var i = 0; i < data.length; i++) {
        
        for (var j = 0; j < secciones.length; j++) {
            
            if(data[i].seccion==secciones[j].getAttribute('data-seccion')){
                                  
                if(data[i].visibilidad=='false'){
                    secciones[j].style.display = "none"
                    menu.style.visibility='visible';
                }else{
                    secciones[j].style.display = "block"
                    menu.style.visibility='visible';                    
                    
                }
                break;
            }
        }
    }
    

})  
  


   
     


