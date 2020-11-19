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
    $stmt = $conn->prepare("SELECT * FROM cake_member WHERE
    email=?");
    // Bind & execute the query statement:
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0)
    {
    // Note that email field is unique, so should only have
    // one row in the result set.
    session_start();
    $row = $result->fetch_assoc();
    $fname = $row["fname"];
    $lname = $row["lname"];
    $email = $row["email"];
    $_SESSION['whoami'] = $email;
    $_SESSION['username'] = $lname;
    $pwd_hashed = $row["password"];
    // Check if the password matches:
    if (!password_verify($_POST["pwd"], $pwd_hashed))
    {
   // Don't be too specific with the error message - hackers don't
   // need to know which one they got right or wrong. :)
    $errorMsg = "Email not found or password doesn't match...";
    $success = false;
   }
   }
 else
 {
 $errorMsg = "Email not found or password doesn't match...";
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
      include "nav.inc.php" //add/include the content from nav.inc.php
     ?>
        <header class="jumbotron text-center">
            <h1 class="display-4">Welcome to World of Pets!</h1>
            <h2>Home of Singapore's Pet Lovers</h2>
        </header>
       
        
    <main class="container">        
        <hr>
        <?php
             authenticateUser();
             if ($success)
             {
                 echo "<h2>Login is success!</h2>";
                 echo "<h4>Welcome back, " . $fname . " " . $lname . ".</h4>";
                 echo "<a href='index.php' class='btn btn-danger'>Return to home</a>";
             }
             else
             {
                 echo "<h2>Oops</h2>";
                 echo "<h4>The following error were detected:</h4>";
                 echo "<p>" . $errorMsg . "</p>";
                 echo "<a href='Login.php' class='btn btn-danger'>Return to Login page</a>";
             }
        
        
        ?>
                   
    </main>
    <br>
    <?php
          include "footer.inc.php"; //add/include the content from footer.inc.php
    ?>       
</body>
</html>
