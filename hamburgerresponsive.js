const hamburger=document.querySelector('.hamburger');
const navlinks=document.querySelector('.nav-links')
hamburger.addEventListener('click',()=>{
    console.log("wow");
    navlinks.classList.toggle('open');
})