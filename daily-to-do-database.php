<?php 
if (!empty($_POST)){
    $dbhost = 'localhost';
$dbuser = 'pooja';
$dbpass = 'broomstick';
$db = 'todoapp';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 
    
    $inputvalue=$_POST['input_value'];
   
    mysqli_query($conn, "insert into todolist (bullet) values ('$inputvalue')"); 
    // echo "Name : ".$inputvalue."</br>";
}
?>