document.querySelector('#show-modal').addEventListener('click',()=>{
    document.querySelector('.modal-container').classList.add("modal-container-active")
});
document.querySelector('.modal .close-btn').addEventListener('click',()=>{
    document.querySelector('.modal-container').classList.remove("modal-container-active")
});