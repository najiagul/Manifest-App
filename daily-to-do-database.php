<?php 
require_once 'pdo.php';
session_start();
if (!empty($_POST))
{
/* $dbhost = 'localhost';
$dbuser = 'pooja';
$dbpass = 'broomstick';
$db = 'todoapp'; */


$inputvalue = $_POST['input_value'];
$email = $_SESSION['user'];

    $sql = 'SELECT user_id from users WHERE email=:email';    
    $userid = $pdo->prepare($sql);
    $userid->execute(array(':email' => $email));
    $check = $userid->fetch(PDO::FETCH_ASSOC);
    $userid = $check['user_id'];                 
    $sql = 'INSERT INTO todolist (bullet, user_id) VALUES (:bullet, :userid)';
    $statement = $pdo->prepare($sql);
    $statement->execute( array(':bullet'=> $inputvalue,
                                ':userid'=> $userid));

   /* $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
    mysqli_query($conn, "insert into todolist (bullet) values ('$inputvalue')"); 
    echo "Name : ".$inputvalue."</br>"; */
}
?>