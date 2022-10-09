const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
      selector=document.querySelectorAll("[data-dark]");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

const lightMode=()=>{
    selector.forEach(el => el.classList.remove("dark_text"));
    localStorage.setItem("theme","light");
    body.classList.remove("dark");
}
const darkMode=()=>{
    body.classList.add("dark");
    selector.forEach(el => el.classList.add("dark_text"));
    localStorage.setItem("theme","dark");
    body.classList.add("dark");
}

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
        darkMode();
    }else{
        modeText.innerText = "Dark mode";
        lightMode();
    }
});


document.addEventListener("DOMContentLoaded",(e)=>{
    if(localStorage.getItem("theme")===null)localStorage.setItem("theme","light");
    if(localStorage.getItem("theme")==="light")lightMode();
    if(localStorage.getItem("theme")==="dark") darkMode();
});

