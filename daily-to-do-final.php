<?php
require_once 'pdo.php';

session_start();
//Demand a get parameter
if ( !isset($_GET['email']) || strlen($_GET['email']) < 1 )
{
    header( 'Location: website-login.php' ) ;
    return;
    die('Name parameter missing');
 
}
//Demand an active user
if ( !isset($_SESSION['user']) )
{
    header( 'Location: website-login.php' ) ;
    return;
} 

//saving stickynotes to database
if (isset($_POST['add']))
    {
    $_SESSION['title'] = $_POST['title'];
    $_SESSION['textarea'] = $_POST['textarea'];
    $_SESSION['colors'] = $_POST['colors'];
    $sql_user = 'SELECT user_id from users WHERE email=:email';
    $userid = $pdo->prepare($sql_user);
    $userid->execute(array(':email' => $_GET['email']));
    $check = $userid->fetch(PDO::FETCH_ASSOC);
    $userid = $check['user_id'];
    $sql = 'INSERT INTO notes (title, text, urgency, user_id) VALUES (:title, :textarea,:urgency, :uid)';
    $statement = $pdo->prepare($sql);
    $statement->execute( array(':title'=> $_SESSION['title'],
                                ':textarea' => $_SESSION['textarea'],
                                ':urgency' => $_SESSION['colors'],
                                ':uid' => $check['user_id'] ));
    
    // POST - Redirect - GET
    header("Location: daily-to-do.php?email=".urlencode($_SESSION['user']));
    return;
    }

if (isset($_POST['show']) )
{
    $sql_user = 'SELECT user_id from users WHERE email=:email';
    $userid = $pdo->prepare($sql_user);
    $userid->execute(array(':email' => $_GET['email']));
    $check = $userid->fetch(PDO::FETCH_ASSOC);
    $userid = $check['user_id'];
    $show_stmnt = "SELECT title, text, urgency FROM notes WHERE user_id = :uid";
    $statement = $pdo->prepare($show_stmnt);
    $statement->execute( 
        array( ':uid' => $userid)
    );
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $user_notes = array();
    $i=0;
    while ($r = $statement->fetch()) {
        $user_notes[$i] = $r;
        $i = $i + 1;
    }
    print_r($user_notes);

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="daily-to-do-final.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>To-do List</title>
</head>
<body>

    <nav>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <div class="head"></div>
        <img class="logo" src="logo-final.png" > 
        <ul class="nav-links">
            <li><a href="#" >About</a></li>
            <li><a href="features.html">Features</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Signup</a></li>
        </ul>

    </nav>

    <div class="container">
        <div class="header">
            <h1>To-Do list</h1>
            <input type="text" id="input_value" placeholder="What to you want to do?">
            <span class="additem">ADD</span>
        </div>
        <ul id="mylist">
            <!-- <li>wow</li>
            <li class="checked">wow</li>
             <li>wow</li>
             -->

        </ul>
    </div>



    <div class="footer">
        <div class="innerfooter">
            <div class="footer-items">
                <h1>Manifest</h1>
                <p>Description</p>
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
    <script src="daily-to-do-final.js"></script>
    
</body>
</html>
