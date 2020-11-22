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
    //first name
    if (empty($_POST["fname"]))
    {
     $errorMsg .= "first name is needed.<br>";
     $success = false;
    }
    else 
    {
        $fname = sanitize_input($_POST["fname"]);
    }
    
    //last name
    if (empty($_POST["lname"]))
    {
    $errorMsg .= "Last name is needed.<br>";
    $success = false;
    }
    else 
    {
        $lname = sanitize_input($_POST["lname"]);
    }
    
    
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
   
    if (empty($_POST["phoneno"]))
    {
     $errorMsg .= "Phone number is needed.<br>";
     $success = false;
    }
    else 
    {
        $num = sanitize_input($_POST["phoneno"]);
    }
    
     if (empty($_POST["address"]))
    {
     $errorMsg .= "Address is needed.<br>";
     $success = false;
    }
    else 
    {
        $addr = sanitize_input($_POST["address"]);
    }
  
   
   //password validation
    if (empty($_POST["pwd"]) ||  empty($_POST["conconfirm"])) //if either password or confirm password is empty
    {
        $errorMsg = "Password and confirm password is needed!!!<br>";
        $success = false;
    }
    else
    {
    if ($_POST["pwd"] != $_POST["conconfirm"])  //if password is not the same as confirm password
        {
            $errorMsg = "Password and confirm password not match!!!<br>";
            $success = false;
        }
        else
        {   
            //HASH THE PASSWORD SO USER COULD NEVER SEE THE PLAINTEXT
            $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
           
        }
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
* Helper function to write the member data to the DB
*/
function saveMemberToDB()
{
   global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
   $num = $_POST['phoneno'];
   $addr = $_POST['address'];
   $bd = $_POST['birthdate'];
   
  // Create database connection.
   $config = parse_ini_file('../../private/db1-config.ini');
   $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
   // Check connection
   if ($conn->connect_error)
   {
   $errorMsg = "Connection failed: " . $conn->connect_error;
   $success = false;
   }
 else
 {
     
   
   // Prepare the statement:
   $stmt = $conn->prepare("INSERT INTO cake_member(fname, lname,
   email, password, phoneno, birthdate, address) VALUES (?, ?, ?, ?, '$num', '$bd', '$addr')");
   
   $sql = "select * from cake_member where email = '$email' ";
   $search_result = mysqli_query($conn, $sql);
   $emailfound = mysqli_num_rows($search_result);
   
   if($emailfound >= 1)
   {
     //fail
   echo "<script>
   alert('Email already been use try other email');
  window.location.href='register.php';
   </script>";
    $success = false;
     $stmt->close();
   }
   
   // Bind & execute the query statement:
   $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
   if (!$stmt->execute())
   {
      $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
      $success = false;
   }
     $stmt->close();
 }
 $conn->close();
}


?>




<html >
<head>
    <?php
      include "cssandjava.inc.php" //css and java
     ?>
<title>Register result</title>      
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
             if ($success)
             {
                 saveMemberToDB();
                 echo "<h2>Your registration is success!</h2>";
                 echo "<h4>Thank you for signing up, " . $fname . " " . $lname . ".</h4>";
                 echo "<a href='Login.php' class='btn btn-danger'>Log-in</a>";
                 
             }
             else
             {
                 echo "<h2>Oops</h2>";
                 echo "<h4>The following error were detected:</h4>";
                 echo "<p>" . $errorMsg . "</p>";
                 echo "<a href='register.php' class='btn btn-danger'>Return to Sign Up</a>";
             }
        
        
        ?>
                   
    </main>
    <br>
      <?php    include "phpFiles/footer.inc.php";?>      
</body>
</html>
