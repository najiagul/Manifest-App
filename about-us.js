
const hamburger=document.querySelector('.hamburger');
const navlinks=document.querySelector('.nav-links')
hamburger.addEventListener('click',()=>{
    navlinks.classList.toggle('open');
})



var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.querySelector("nav").style.top = "0";
  } else {
    document.querySelector("nav").style.top = "-12vh";
  }
  prevScrollpos = currentScrollPos;
}


const firstp=document.querySelector("#first");
window.addEventListener('scroll',function(){
    let offset=window.pageYOffset;
    console.log(firstp)
    firstp.style.backgroundPositionY=offset*0.7+"px";
    console.log(offset)
    
})


function DirectToCanvas()
{
  window.location.href = "daily-to-do-final.html";
}


function DirectToList()
{
  window.location.href = "daily-to-do-final.html";
}



function DirectToNotes()
{
  window.location.href = "daily-to-do-final.html";
}


