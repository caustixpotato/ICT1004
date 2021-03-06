<?php
$fname = $email = $lname = $pwd_hashed = $errorMsg = "";
$success = true;


//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


if ($_SERVER["REQUEST_METHOD"]=="POST")  #validation the result when press register 
{
    //email validation
    if (empty($_POST["email"]))
    {
     $errorMsg .= "Email is required.<br>";
     $success = false;
     }
   else
   {
    $email = sanitize_input($_POST["email"]);
    // Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
    $errorMsg .= "Invalid email format.";
    $success = false;
    }
   }
  
   
   //password validation
    if (empty($_POST["pwd"]))
    {
        $errorMsg = "Password is needed!!!<br>";
        $success = false;
    }
    else
    {
       //HASH THE PASSWORD SO USER COULD NEVER SEE THE PLAINTEXT
        $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
     }
    
}
else
{
    echo "<h2>this page not meant to run directly</h2>";
    echo "<p>you can register the link below</p>";
    echo "<a href='register.php'>Go to sign up page....</a>";
    exit();
}



/*
* Helper function to authenticate the login.
*/
function authenticateUser()
{
     global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
     // Create database connection.
     $config = parse_ini_file('../../private/db1-config.ini');
     $conn = new mysqli($config['servername'], $config['username'],
     $config['password'], $config['dbname']);
     // Check connection
     if ($conn->connect_error)
    {
     $errorMsg = "Connection failed: " . $conn->connect_error;
     $success = false;
    }
     else
    {
    // Prepare the statement:
    $stmt = $conn->prepare("SELECT * FROM cake_member WHERE email =? AND status = 'Active'");
    // Bind & execute the query statement:
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
    // Note that email field is unique, so should only have
    // one row in the result set.
  
    $row = $result->fetch_assoc();
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $position = $row["Mem"];
    
    $pwd_hashed = $row["password"];
    
   
    // Check if the password matches:
    if (!password_verify($_POST["pwd"], $pwd_hashed))
    {
   // Don't be too specific with the error message - hackers don't
   // need to know which one they got right or wrong. :)
    $errorMsg = "Email not found or password doesn't match...";
    $success = false;
    }
    else{
        
     if ($position == 'admin')
    {
          session_start();
        
          $userid = $row["userID"];
          $_SESSION['whoami'] = $email;
          $_SESSION['username'] = $lname;
          $_SESSION['userid'] = $userid;
          $_SESSION['admin'] = $email;
    }
    if ($position == 'user')
    {
          session_start();
        
          $userid = $row["userID"];
          $_SESSION['whoami'] = $email;
          $_SESSION['username'] = $lname;
          $_SESSION['userid'] = $userid;
    }
   }
    }
 else
 {
 $errorMsg = "Need to verify your account first or your Email not found or password doesn't match...";
 $success = false;
 }
 $stmt->close();
 }
 $conn->close();
}

?>



﻿<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login result</title>  
    <link rel="stylesheet" href="css/main.css" />
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
       
       <style>
           
           #profileimg
           {
               width: 100px;
               height: 100px;
               clear: both;
               margin-bottom: 10px;
               
           }
           #mask 
           {
              position: absolute;
             left: 0;
              top: 0;
              z-index: 9000;
              background-color: #000;
             display: none;
          }
             #boxes .window {
              position: absolute;
              left: 0;
              top: 0;
               width: 440px;
               height: 200px;
               display: none;
               z-index: 9999;
               padding: 20px;
               border-radius: 15px;
               text-align: center;
              }

              #boxes #dialog 
              {
              width: 350px;
             height: 400px;
              padding: 10px;
              background-color: #ffffff;
              font-family: 'Segoe UI Light', sans-serif;
              font-size: 15pt;
               }



       </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 
    
    <script>
         $(document).ready(function() {	

          var id = '#dialog';
	
          //Get the screen height and width
          var maskHeight = $(document).height();
          var maskWidth = $(window).width();
	
         //Set heigth and width to mask to fill up the whole screen
          $('#mask').css({'width':maskWidth,'height':maskHeight});

          //transition effect
         $('#mask').fadeIn(500);	
         $('#mask').fadeTo("slow",0.9);	
	
           //Get the window height and width
           var winH = $(window).height();
           var winW = $(window).width();
              
           //Set the popup window to center
           $(id).css('top',  winH/2-$(id).height()/2);
            $(id).css('left', winW/2-$(id).width()/2);
	
          //transition effect
          $(id).fadeIn(2000); 	
	
           //if close button is clicked
            $('.window .close').click(function (e) {
           //Cancel the link behavior
             e.preventDefault();

             $('#mask').hide();
             $('.window').hide();
            });
});
    
    
    </script> 
</head>
<body>
       <?php 
        include "phpFiles/nav.inc.php"
        ;?> 
         <header id="Content">
            <div class="jumbotron jumbotron-fluid text-center bg-cover" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.15),rgba(255,255,255,0.7)), url(images/sliced.png)">
                    <h1 class="display-4">Tarts N' Cakes</h1>
                    <hr class="lead">
                    <p>Best Thing Since Sliced Bread!</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Baked!</a>
            </div>
        </header>
       
        
    <main class="container">        
        <hr>
        <?php
             authenticateUser();
             if ($success)
             {
             
        $userid = $_SESSION['userid'];
       
        $sql = "SELECT * FROM cake_member where userID ='$userid'";
        $selectduser = mysqli_query($conn, $sql);
        $userinfo = mysqli_fetch_assoc($selectduser);
        
                 echo "<div id=\"boxes\">";
                 echo "<div id=\"dialog\" class=\"window\">";

                 echo "<h2>Login is success!</h2>";
                 echo "<h4>Welcome back, " . $fname . " " . $lname . ".</h4>";
                 echo "<img id=\"profileimg\" alt=\"profilepicture\" src=\"" . $userinfo['profilepic']. "\">";
                 echo "<br>";
                 echo "<a href='index.php' class='btn btn-danger'>Return to home</a>";
                 
                 echo '</div>';
                 echo '<div id="mask">';
                 echo '</div>';
                 echo '</div>';
             }
             else
             {
                 echo "<div id=\"boxes\">";
                 echo "<div id=\"dialog\" class=\"window\">";
                 echo "<h2>Oops</h2>";
                 echo "<h4>The following error were detected:</h4>";
                 echo "<p>" . $errorMsg . "</p>";
                 echo "<a href='Login.php' class='btn btn-danger'>Return to Login page</a>";
                 echo '</div>';
                 echo '<div id="mask">';
                 echo '</div>';
                 echo '</div>';
             }
        
        
        ?>
                   
    </main>
    <br>
     <?php    include "phpFiles/footer.inc.php";?>       
</body>
</html>
