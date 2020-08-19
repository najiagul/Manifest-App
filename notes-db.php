<?php
require_once 'pdo.php';
// session_start();
//Demand a get parameter
// if ( !isset($_GET['email']) || strlen($_GET['email']) < 1 )
// {
//     header( 'Location: website-login.php' ) ;
//     return;
//     die('Name parameter missing');
 
// }
// //Demand an active user
// if ( !isset($_SESSION['user']) )
// {
//     header( 'Location: website-login.php' ) ;
//     return;
// } 

//saving stickynotes to database
if (!empty($_POST))
    {
    // $_SESSION['title'] = $_POST['title'];
    // $_SESSION['textarea'] = $_POST['textarea'];
    // $_SESSION['colors'] = $_POST['colors'];
    // $sql_user = 'SELECT user_id from users WHERE email=:email';
    // $userid = $pdo->prepare($sql_user);
    // $userid->execute(array(':email' => $_GET['email']));
    // $check = $userid->fetch(PDO::FETCH_ASSOC);
    // $userid = $check['user_id'];
    //  $sql = 'INSERT INTO notes (title, text, urgency, user_id) VALUES (:title, :textarea,:urgency, :uid)';
    // $statement = $pdo->prepare($sql);
    // $statement->execute( array(':title'=> $_SESSION['title'],
    //                             ':textarea' => $_SESSION['textarea'],
    //                             ':urgency' => $_SESSION['colors'],
    //                             ':uid' => $check['user_id'] ));
    
    // // POST - Redirect - GET
    // header("Location: notes.php?email=".urlencode($_SESSION['user']));
    // return;
    $dbhost = 'localhost';
$dbuser = 'pooja';
$dbpass = 'broomstick';
$db = 'todoapp';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
    $title=$_POST['title'];
    $textarea=$_POST['textarea'];
    $colors=$_POST['colors'];
    mysqli_query($conn, "insert into notes (title, text, urgency) values ('$title', '$textarea','$colors')"); 
//     echo "Name : ".$title."</br>";
//  echo "Email : ".$textarea."</br>";
//  echo "Message : ".$colors."</br>";
    // $sql = 'INSERT INTO notes (title, text, urgency, user_id) VALUES ('$title', '$textarea','$colors', :uid)';
    // $statement = $pdo->prepare($sql);
   


    }

    // if(!empty($_POST)) {
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $message = $_POST['message']; 
    //     mysqli_query($conn, "insert into users (name, email, message) values ('$name', '$email', '$message')"); 
        
    //     echo "Name : ".$name."</br>";
    //     echo "Email : ".$email."</br>";
    //     echo "Message : ".$message."</br>";
    //    }
     




// if (isset($_POST['show']) )
// {
//     $sql_user = 'SELECT user_id from users WHERE email=:email';
//     $userid = $pdo->prepare($sql_user);
//     $userid->execute(array(':email' => $_GET['email']));
//     $check = $userid->fetch(PDO::FETCH_ASSOC);
//     $userid = $check['user_id'];
//     $show_stmnt = "SELECT title, text, urgency FROM notes WHERE user_id = :uid";
//     $statement = $pdo->prepare($show_stmnt);
//     $statement->execute( 
//         array( ':uid' => $userid)
//     );
//     $statement->setFetchMode(PDO::FETCH_ASSOC);
//     $user_notes = array();
//     $i=0;
//     while ($r = $statement->fetch()) {
//         $user_notes[$i] = $r;
//         $i = $i + 1;
//     }
//     $_SESSION['usernotes'] = $user_notes;
//     print_r($_SESSION['usernotes']);
//     // POST - Redirect - GET
//     header("Location: notes.php?email=".urlencode($_SESSION['user']));
//     return;

// }
?>