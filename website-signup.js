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




  function sendEmail() {
    var firstname = document.forms["myform"]["fname"].value;
    var lastname = document.forms["myform"]["lname"].value;
    var user = document.forms["myform"]["useremail"].value;
    var confirmUser = document.forms["myform"]["cemail"].value;
    var pass = document.forms["myform"]["password"].value;
    var confirmPass = document.forms["myform"]["cpassword"].value;
    if (firstname == "") {
      alert("All fields must be filled.");
    }
    if (lastname == "")
    {
      alert("All fields must be filled.")
    }
    if (user == "")
    {
      alert("All fields must be filled.")
    }
    if (confirmUser == "")
    {
      alert("All fields must be filled.")
    }
    if (pass == "")
    {
      alert("All fields must be filled.")
    }
    if (confirmUser == "")
    {
      alert("All fields must be filled.")
    }
    else {
  var emailid = document.querySelector("#email").value;
  console.log(emailid);

Email.send({
  Host : "smtp.gmail.com",
  Username : "manifesttheapp@gmail.com",
  Password : "Hello@Manifest123!",
  To : emailid,
  From : "manifesttheapp@gmail.com",
  Subject : "Welcome to Manifest!",
  Body : `Hello! Welcome to Manifest. You're almost on your way to becoming more productive! 
  Thank you for being part of Manifest.
  Have a productive day!`
})
.then(message => console.log(message));
}
  }
