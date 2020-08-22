<?php
require_once 'pdo.php';

if(!isset($_SESSION))
{
    session_start();
}
//Demand an active user
if ( !isset($_SESSION['user']) )
{
    header( 'Location: website-login.php' ) ;
    return;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <title>To-do List</title>
</head>
<body>
    <!-- <div class="result">jjrj</div> -->
    <nav>
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <div class="head"></div>
        <img class="logo" src="logo-parallax.png" > 
        <ul class="nav-links">
		 <li><a href="title.html">Home</a></li>
            <li><a href="canvas.html" >Canvas</a></li>
            <li><a href="notes.php">Notes</a></li>
		 
            <li><a href="website-logout.php">Signout</a></li>
        </ul>

    </nav>

    <div class="container">
        <div class="header">
            <form action="" method="post" id="to-do-form">
                <h1>To-Do list</h1>
                <span class="inputvalue"><input type="text"  id="input" id="input_value" placeholder="What to you want to do?" name="bullet">
                
                <button class="additem" id="addforjavascript">ADD</button>
                <button></button>
            </span>
                
            </form>
        </div> 
        <ul id="mylist">
        <!-- <li class="checked">wow</li> -->

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
    <script src="daily-to-do-final.js"></script>]

    <script>
        $(document).ready(function () {
          $('.additem').click(function (e) {
          
            e.preventDefault();
            
            var input_value = $('#input').val();        
            $.ajax
              ({
                type: "POST",
                url: "daily-to-do-database.php",
                data: { "input_value": input_value,
                    },
                
                success: function (data) {
                 $('.result').html(data);
                  $('#to-do-form')[0].reset();
                 
                }
              });
          });
        });
        </script>
        <script></script>

    
    
</body>
</html>
