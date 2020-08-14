<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=todoapp', 'pooja', 'broomstick');
//to see erros
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
