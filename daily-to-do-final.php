<?php
require_once 'pdo.php';

session_start();
//Demand an active user
if ( !isset($_SESSION['user']) )
{
    header( 'Location: website-login.php' ) ;
    return;
} 

//saving todos to database
if (isset($_POST['add']))
    {
        echo $_POST['bullet'];
    $_SESSION['bullet'] = $_POST['bullet'];
    $sql_user = 'SELECT user_id from users WHERE email=:email';
    $userid = $pdo->prepare($sql_user);
    $userid->execute(array(':email' => $_SESSION['user']));
    $check = $userid->fetch(PDO::FETCH_ASSOC);
    $userid = $check['user_id'];
    $sql = 'INSERT INTO todolist (bullet, user_id) VALUES (:bullet, :uid)';
    $statement = $pdo->prepare($sql);
    $statement->execute( array(':bullet'=> $_SESSION['bullet'],
                                ':uid' => $userid
                             ));
    
    // POST - Redirect - GET
    header("Location: daily-to-do-final.php?email=".urlencode($_SESSION['user']));
    return;
    }

//Retreiving all todos
if (isset($_POST['show']) )
{
    $sql_user = 'SELECT user_id from users WHERE email=:email';
    $userid = $pdo->prepare($sql_user);
    $userid->execute(array(':email' => $_SESSION['user']));
    $check = $userid->fetch(PDO::FETCH_ASSOC);
    $userid = $check['user_id'];
    $show_stmnt = "SELECT bullet FROM todolist WHERE user_id = :uid";
    $statement = $pdo->prepare($show_stmnt);
    $statement->execute( 
        array( ':uid' => $userid)
    );
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $user_bullets = array();
    $i=0;
    while ($r = $statement->fetch()) {
        $user_bullets[$i] = $r;
        $i = $i + 1;
    }
    $_SESSION['userbullets'] = $user_bullets;
    print_r($_SESSION['userbullets']);

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
            <form action="" method="post">
                <h1>To-Do list</h1>
                <input type="text" id="input_value" placeholder="What to you want to do?" name="bullet">
                <input type="submit" value="Add"  name="add">
                <input type="submit" value="My tasks" name="show">
                <!-- <span class="additem">ADD</span> -->
            </form>
        </div>
        <ul id="mylist">

        </ul>
    </div>



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
    <script src="daily-to-do-final.js"></script>
    
</body>
</html>
