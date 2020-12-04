<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "phpFiles/headcontents.inc.php";
        ?> 
        <title>Cart</title>
    </head>
    <body>
        <?php
        include "phpFiles/nav.inc.php";
        include "phpFiles/banner.php";
        session_start();
        if (!isset($_SESSION['admin'])) { //check if there is an session
            header("Location:Login.php");
        }
        // Open session connection
        session_start();
        $userid = $_SESSION['userid'];
         $email = $_SESSION['admin'] ;
        $lastName = $_SESSION['username'];
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
                $config['password'], $config['dbname']);
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        ?> 

        <div class="container">
            <div class="col-xl" style="overflow-x:auto;">
                <h1 id="cartName"><?php echo $lastName ?>'s ADMINISTRATOR</h1>
                <table id="orderhistory">
                    <tr>
                        <th>Num</th>
                        <th>first name</th>
                        <th>last name</th>
                        <th>email</th>                 
                        <th>Edit MEMBER</th>
                    </tr>
                    <?php
                    // Get the cartinformation from the db
                    $getCurrentmem = "SELECT fname,lname,email,userID from cake_member WHERE  Mem ='user' ";
                    $currentMEM = mysqli_query($conn, $getCurrentmem);

                    //$numberOfRows = mysql_num_rows($currentCart);

                    if ($currentMEM->num_rows > 0) {
                        // output data of each row
                       
                        $rowcounter = 1;
                        while ($row = $currentMEM->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $rowcounter . "</td>";
                            echo "<td>" . $row["fname"] . "</td>";
                            echo "<td>" . $row["lname"] . "</td>";
                             echo "<td>" . $row["email"] . "</td>";
                       
                           
                          
                            echo "<td>";
                            echo "<form  id=\"form2\" action=\"Deletemem.php\" method=\"post\">";
                            echo "<input type=\"submit\" name=\"submit\" value=\"Delete\">" ;
                            echo "<input type=\"hidden\" name=\"deletemem\" value=\"".$row['email']."\">";
                            echo "</form>";     
                            echo "</td>";
                            echo "</tr>";
                         
                            $rowcounter++;
                            
                            
                        }
                          echo "<tr>";
                       
                        
                       
                        echo "</tr>";
                        echo "<tr>";
                   
                       
                       
                        echo "</tr>";
                        echo "</table>";
                    } else {
                        
                        echo "</table>";
                        echo "No Member yet!!";
                    }
                    $conn->close();
                    ?>
            </div>
        </div>
         <div class="row">
            <div class="col-9"></div>
          
        <?php include "phpFiles/footer.inc.php"; ?> 
    </body>
</html>