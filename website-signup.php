<?php
require_once "pdo.php";  
session_start();
if ( isset($_POST['cancel']) ) {
  header("Location: website-signup.php");
  return;
}
$failure = false;
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['useremail']) && isset($_POST['cemail']) && 
isset($_POST['password']) && isset($_POST['cpassword']) )
{
  if (strlen($_POST['fname']) < 1 || strlen($_POST['lname']) < 1 || strlen($_POST['useremail']) < 1 || 
  strlen($_POST['cemail']) < 1 || strlen($_POST['password']) < 1 || strlen($_POST['cpassword'] < 1))
  {
    $failure = 'Please enter your details';
    $_SESSION['status'] = $failure;
    //header("Location: website-signup.php");
    //return;
  }
  if ( ($_POST['useremail'] != $_POST['cemail']) || ($_POST['password'] != $_POST['cpassword']))
  {
    $failure = 'Fields do not match';
    $_SESSION['status'] = $failure;
    header("Location: website-signup.php");
    return;
  }
  else
  { 
    $sql = 'INSERT INTO users (fname, lname, email, password) VALUES (:fname, :lname, :email, :password)';
    $statement = $pdo->prepare($sql);
    $statement->execute( array(':fname' => $_POST['fname'],
                              ':lname' => $_POST['lname'],
                              ':email' => $_POST['useremail'],
                            ':password'=> $_POST['password']) );
   $failure = 'Account Created!';
   $_SESSION['status'] = $failure;
   header("Location: About-us.html");
  return;

  }

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes" >
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="website_signup.css"> 
     <link href="https://fonts.googleapis.com/css2?family=Alata&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://smtpjs.com/v3/smtp.js">
    
    </script>
    <title>Signup</title>
  </head>
  <body class="container">

    <!-- header here -->

    <nav id="nav">
      <div class="hamburger">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
      </div>

      <div class="head"></div>
       <img class="logo" src="logo-final.png"> 
      <ul class="nav-links">
          <li><a href="About-us.html">About</a></li>
          <li><a href="website-login.php">Login</a></li>
          <li><a href="title.html">Home</a></li>
      </ul>

  </nav>
 
    <hr>
  
      <!-- login form starts here -->


<div class="form-container">
      <fieldset id="form">
      <legend class="legend-text">Sign Up!</legend> 
    <form name="myform" method="POST">
      <label for="firstname" class="field">First Name</label>
      <input type="text" name="fname" placeholder="" class = "form-field"required>
      <br>
      <label for="lastname" class="field">Last Name</label>
      <input type="text" name="lname" placeholder="" class="form-field"required>
      <br>
      <label for="email" class="field">Email</label>
      <input type="text" id="email" name="useremail" placeholder="Enter a valid email address" class="form-field" required>
      <br>
      <label for="confirm-email" class="field">Confirm Email</label>
      <input type="text" name="cemail" placeholder="Re-enter email" class="form-field" required>
      <br>
      <label for="password" class="field">Password</label>
      <input type="password" name="password" class="form-field" placeholder="Choose a strong password" required><br>
      <label for="confirm-password" class="field">Confirm Password</label>
      <input type="password" name="cpassword" class="form-field" placeholder="Re-enter password" required>
      <br> <br>
      <!--<button type="button" name="create" id="sign-up-btn" onclick="sendEmail()">Create Account</button>
      <button type="button" name="cancel" id="submit-btn" >Cancel</button> -->
      <input type="submit" name="create" value="Create account" class="signup-button" >
      <input type="submit" name="cancel" value="Cancel" class="signup-button">
      <?php
      if ( isset($_SESSION["status"]) ) {
        echo('<p style="color:red">'.$_SESSION["status"]."</p>\n");
        unset($_SESSION["status"]);
         }
      ?>

    </fieldset>
    </form>
  </div>

    <!-- //footer here -->
    <div class="footer">
      <div class="innerfooter">
          <div class="footer-items">
              <h1>Manifest</h1>
              <p>Focus on what matters most</p>
              <p><a href=""></a>Back to top</p> 
          </div>
          <div class="footer-items">
              <h3>Follow Us!</h3>
              <ul>
                  <a href=""><i class="fa fa-facebook icon-2x"></i></a>
                  <a href=""><i class="fa fa-instagram" ></i></a>
                  <a href=""><i class="fa fa-twitter" ></i></a>
              </ul>
          </div>
          
      </div>
      <div class="btm-most">
          All Rights Reserved &copy 2020
      </div>
  </div>


  </body>


<script src="website-signup.js"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

</html>
