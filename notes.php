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
    header("Location: notes.php?email=".urlencode($_SESSION['user']));
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
    $_SESSION['usernotes'] = $user_notes;
    print_r($_SESSION['usernotes']);
    // POST - Redirect - GET
    header("Location: notes.php?email=".urlencode($_SESSION['user']));
    return;

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="notes-style.css">
    <link rel="stylesheet" href="notes-headerandfooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <div class="head">Manifest</div>
        <ul class="nav-links">
            <li><a href="#">About</a></li>
            <li><a href="features.html">Features</a></li>
            <li><a href="website-logout.php">Logout</a></li>
            <li><a href="#">Signup</a></li>
        </ul>

    </nav>
    <div class="firstcontainer">
        <div >
        <form method="post" id="form1">
            <input class="titleone" name="title" type="text" placeholder="Enter title here"></div>
        <div >
            <textarea class="descriptionone" name="textarea" id="textarea" cols="40" rows="10"
             placeholder="Enter description here"></textarea>
        </div>
        <span>
            <select name="colors" id="colorselection">
            <option value="0">Not important</option>
            <option value="1">Important</option>
            <option value="2">Urgent</option>
            </select>
            <!-- <div class="addbutton"><button>add</button></div> -->
            <!--<input type="submit" name='add' class="addbutton" value="Add"/> -->
            <input type="submit" name='add'  value="Save"/> 
            <input type="submit" name='show' value="Show my notes"/>
           <!-- <button class="addbutton" type="submit" name="add" id="form1" >Show </button>  -->
        </span>
        </form>
        <!-- <button class="addbutton" type="button" name="add" id="form1" >Show </button> -->

    </div>
    <div class="notescontainer"></div>
    <div class="footer">
        <div class="innerfooter">
            <div class="footer-items">
                <h1>Our name</h1>
                <p>description</p>
                <p><a href=""></a>back to top</p>
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
            all rights reserved &copy 2020
        </div>
    </div>
    <script src="hamburgerresponsive.js"></script>
    <script src="notes.js"></script>
</body>
</html>
