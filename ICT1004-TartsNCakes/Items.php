<html lang="en">
<head>
    
<?php
  include "phpFiles/nav.inc.php" //add/include the content from nav.inc.php
 ?>
<link rel="stylesheet" href="css/login.css" />    
<link rel="stylesheet" href="css/main.css" />
<body>
<Title>List Cake Images</Title>
 <?php
    $success = true;
    function Display_Img()
    {
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
        $config['password'], $config['dbname']);
        if ($conn->connect_error)
        {
            $errorMsg = "Connection failed: ".$conn -> connect_error;
            $success = false;
        }
        else {
//            $stmt = $conn->prepare("SELECT * FROM Items");
//            $stmt->execute();
//            $result = $stmt->get_result();
//            $stmt->close();
            $sql = "SELECT ItemID FROM Items ORDER BY ItemID DESC"; 
            $result = mysqli_query($conn, $sql);
        }
    }
    if ($success)
    {
     global $result;
     while($row = mysqli_fetch_array($result)) {
	?>
    <img src="ItemView.php?item_id=<?php echo $row["ItemID"]; ?>" /><br/>
     <?php		
	}
        mysqli_close($conn);
        }
    else
    {
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
<!--     
//    global $errorMsg, $success;
//    $success = true;
//    
//function Display_Img(){
//    $config = parse_ini_file('../../private/db1-config.ini');
//     $conn = new mysqli($config['servername'], $config['username'],
//     $config['password'], $config['dbname']);
//    
//     $stmt = $conn->prepare("SELECT * FROM Items");
//    // Bind & execute the query statement:
//    $stmt->execute();
//    $result = $stmt->get_result();
//    if ($conn->connect_error)
//    {
//     $errorMsg = "Connection failed: " . $conn->connect_error;
//     $success = false;
//    }
//     else
//    {
//    // Prepare the statement:
//   
//    }
//    $stmt->close();
//    
// }
//
//if ($success)
// {
//    Display_Img();
// } 
//if ($success)
//{
//    echo "<table border='1'>
//
//    <tr>
//    <th>Img</th>
//    </tr>";
//    
//    while ($rows= mysql_fetch_array($result))
//        {
//            echo "<td>" .$rows['Img']. "</td>";    
//        }
//    echo "</table>";
//}
//else{
//    include "nav.inc.php";
//    echo "<p>";
//    echo "<main class ='container'";
//    echo "<h2>Oops!</h2>";
//    echo "<h3>The following input errors were detected:</h3>";
//    echo "<p>" . $errorMsg . "</p>";
//    echo "<p> <a class='btn btn-danger' href='login.php'>Return to Login</a>";
//    echo "</main>";
//    echo "<p>";
//    include "footer.inc.php";
//}
//mysql_close($conn);-->

       
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

