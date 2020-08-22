<?php
require_once 'pdo.php';
session_start();

//if we have no _POST data
$failure = false; 
//Check to see if we have some _POST data
//If we do, process it

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['login']))
{
  unset( $_SESSION['user']);  //logout current user
  if (strlen($_POST['email']) < 1 || strlen($_POST['password']) < 1 )
  {
    $failure = 'Email and password are required';
    $_SESSION['status'] = $failure;
    header( 'Location: website-login.php' ) ; 
    return;
  }
  else //Login successful
  {
    $sql = 'SELECT email FROM users WHERE email = :email AND password = :pw';
    $statement = $pdo->prepare($sql);
    $statement->execute(array(
                  ':email' => $_POST['email'],
                  ':pw' => $_POST['password']));
    $check = $statement->fetch(PDO::FETCH_ASSOC);
    if ($check != false )
    {
      $failure = 'success';
      //Put the details in the session
      $_SESSION['status'] = $failure;
      $_SESSION['user'] = $_POST['email'];
      //Redirect the browser to notes.php page
      header("Location: About-us.html");
      return;
    }
    else   //Incorrect password
    {
      $failure = 'Incorrect password';
      $_SESSION['status'] = $failure;
      header( 'Location: website-login.php' ) ;
      return;
    }
  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="website_login.css">
      <link href="https://fonts.googleapis.com/css2?family=Alata&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>

 <!-- this is the navbar -->
    <nav>
      <div class="hamburger">
          <div class="line"></div>
          <div class="line"></div>
          <div class="line"></div>
      </div>

      <div class="head"></div>
      <img class="logo" src="logo-final.png"> 
      <ul class="nav-links">
          <li><a href="About-us.html">About</a></li>
          <li><a href="title.html">Home</a></li>
          <li><a href="website-signup.php">Signup</a></li>
      </ul>

  </nav>


    <div class="login-container" id="form">

      <fieldset id="login-form">
      <legend class="login-legend-text">Please Login</legend>
      <?php
      if ( isset($_SESSION["status"]) ) {
        echo('<p style="color:red">'.$_SESSION["status"]."</p>\n");
        unset($_SESSION["status"]);
         }
      ?>
  
      <form method="POST" >
      <label for="name" class="field-text">Email</label>
      <input type="text" name="email" id="name" class="field" required> <br/> <br/>
      <label for="pass" class="field-text">Password</label>
      <input type="password" id="pass" name="password" class="field" required><br/>
      <!--<button type="button" class="login-btn" onclick="LoginValidate()">Login</button>
      <button type="button" name="cancel" class="cancel-btn">Cancel</button> -->
      <input type="submit" name="login" value="Log In" class = "btn">
      </fieldset>
     </form>
    </div>

      <!-- this is the footer -->
    <!-- place it at the end of your code -->

    <div class="footer">
      <div class="innerfooter">
          <div class="footer-items">
              <h1>Manifest</h1>
              <p>Focus on what matters most</p>
              <p><a href=""></a>Back to top</p>
          </div>
          <div class="footer-items">
              <h3>Follow</h3>
              <ul>
                  <a href=""><i class="fa fa-facebook icon-2x"></i></a>
                  <a href=""><i class="fa fa-instagram" ></i></a>
                  <a href=""><i class="fa fa-twitter" ></i></a>
              </ul>
          </div>
          
      </div>
      <div class="btm-most">
          All rights reserved &copy 2020
      </div>
  </div>
  </body>
  <script src="website-login.js"></script> 
  </html>
