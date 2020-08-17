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



function LoginValidate()
{
    var username = document.querySelector("#name").value;
    var password = document.querySelector("#pass").value;
    console.log(username);
    console.log(password);
    if (username == ""|| password == "")
    {
        alert("Please fill in all fields");
    }
    else
    {
      alert("Login Successful!");
    }
}
