let menu =document.querySelector('.menu');

menu.style.visibility='visible';

let modContra=document.querySelector('#modificarContrase├▒a');

modContra.addEventListener('click',()=>{
    document.querySelector('.modal-contra').classList.add("modal-contra-active")
})