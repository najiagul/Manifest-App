<?php
require_once 'pdo.php';

if(!isset($_SESSION))
{
    session_start();
}
//Demand a get parameter
// if ( !isset($_GET['email']) || strlen($_GET['email']) < 1 )
// {
//     header( 'Location: website-login.php' ) ;
//     return;
//     die('Name parameter missing');
 
// }
//Demand an active user
// if ( !isset($_SESSION['user']) )
// {
//     header( 'Location: website-login.php' ) ;
//     return;
// } 

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <title>Notes</title>
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
   <li><a href="title.html">Home</a></li> 
            <li><a href="daily-to-do-final.php">To-Do List</a></li>
            <li><a href="canvas.html">Canvas</a></li>
         
            <li><a href="website-logout.php">Logout</a></li>
           
        </ul>

    </nav>
    <div class="firstcontainer">
    <form method="post" id="form1" name="form1">
   
        <div id="title2">
        
       <input type="text" class="form-control"    id="title"  placeholder="Enter title here">
            <!-- <input class="titleone"  type="text" id="titleone" placeholder="Enter title here"></div> -->
            </div>
        <div id="textarea2">
            <textarea   class="form-control" id="textarea"  cols="40" rows="10"
             placeholder="Enter description here"></textarea>
        </div>

    
        <span>
            <select name="colors" id="colors">
            <option value="0">Not important</option>
            <option value="1">Important</option>
            <option value="2">Urgent</option>
            </select>
            <!-- <div class="addbutton"><button>add</button></div> -->
            <!--<input type="submit" name='add' class="addbutton" value="Add"/> -->
            <!-- <input type="submit" name='add'  value="Save"/> -->
            <!-- <input type="submit" name='show' value="Show my notes"/> -->
            <button type="submit" class="addbutton" id="one" >Show </button> 
        </span>
        </form>
        <!-- <button class="addbutton" type="button" name="add" id="form1" >Show </button> -->

    </div>
    <div class="notescontainer"></div>
    <div class="footer">
        <div class="innerfooter">
            <div class="footer-items">
                <h1>Manifest</h1>
                <p>Focus on what matters</p>
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
    <div class="result">
   
    <script>
    $(document).ready(function () {
      $('.addbutton').click(function (e) {

        e.preventDefault();
        
        var title = $('#title').val();
        var two="iiii"
       
        var textarea = $('#textarea').val();
        
        var colors = $('#colors').val();
        $.ajax
          ({
            type: "POST",
            url: "notes-db.php",
            data: { "title": title, "textarea": textarea, "colors": colors },
            
            success: function (data) {
             $('.result').html(data);
              $('#form1')[0].reset();
             
            }
          });
      });
    });
    </script>
     <script src="hamburgerresponsive.js"></script>
    <script src="notes.js"></script>
    
</body>
</html>
