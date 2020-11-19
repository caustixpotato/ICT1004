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
<header id="Content">
            <div class="jumbotron jumbotron-fluid text-center bg-cover" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.15),rgba(255,255,255,0.7)), url(images/sliced.png)">
                    <h1 class="display-4">Tarts N' Cakes</h1>
                    <hr class="lead">
                    <p>Best Thing Since Sliced Bread!</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Baked!</a>
            </div>
        </header>
<body>
            <?php
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
    
    echo "<table border='1'>

    <tr>
    <th>Img</th>
    </tr>";
    
    while ($rows= mysql_fetch_array($result))
    {
            echo "<td>" .$rows['Img']. "</td>";    
    }
    echo "</table>";
    mysql_close($conn);
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

