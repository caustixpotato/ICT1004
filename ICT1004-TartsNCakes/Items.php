<html lang="en">
<head>
    <?php
      include "cssandjava.inc.php" //add/include the content from nav.inc.php
     ?>
    <link rel="stylesheet"  href="css/login.css">
     
        <link rel="stylesheet" href="css/main.css" />
<?php
      include "nav.inc.php" //add/include the content from nav.inc.php
     ?>
<body>
 <?php
    $success = true;
    
function Display_Img(){
    $config = parse_ini_file('../../private/db1-config.ini');
     $conn = new mysqli($config['servername'], $config['username'],
     $config['password'], $config['dbname']);
    
    $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
     
     //Bind & exec the query statement
    $stmt->execute();
    $result = $stmt->get_result();
    if ($conn->connect_error)
    {
     $errorMsg = "Connection failed: " . $conn->connect_error;
     $success = false;
    }
     else
    {
    // Prepare the statement:
    $stmt = $conn->prepare("SELECT * FROM Items");
    // Bind & execute the query statement:
    $stmt->execute();
    $result = $stmt->get_result();
    }
    $stmt->close();
    mysql_close($conn);
 }
    
if ($success){
     echo "<table border='1'>

    <tr>
    <th>Img</th>
    </tr>";
    
    while ($rows= mysql_fetch_array($result))
        {
            echo "<td>" .$rows['Img']. "</td>";    
        }
    echo "</table>";
}
else{
    include "nav.inc.php";
    echo "<p>";
    echo "<main class ='container'";
    echo "<h2>Oops!</h2>";
    echo "<h3>The following input errors were detected:</h3>";
    echo "<p>" . $errorMsg . "</p>";
    echo "<p> <a class='btn btn-danger' href='login.php'>Return to Login</a>";
    echo "</main>";
    echo "<p>";
    include "footer.inc.php";
}
?>
</body>
        <?php
               include "footer.inc.php"; //add/include the content from footer.inc.php
            ?>
</html>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

