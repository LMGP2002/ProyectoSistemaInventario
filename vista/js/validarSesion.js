const nomUser=document.querySelector('#nomUser');


    fetch("../../controlador/sesion.php")
    .then(resp=>resp.text())
    .then(data=>{
        nomUser.innerHTML=`Bienvenido ${data}`;
})

