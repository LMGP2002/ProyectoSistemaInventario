const nomUser=document.querySelector('#nomUser');

    fetch("../../controlador/sesion.php")
    .then(resp=>resp.json())
    .then(data=>{
        nomUser.innerHTML=`Bienvenido ${data.usuario}`;
})

