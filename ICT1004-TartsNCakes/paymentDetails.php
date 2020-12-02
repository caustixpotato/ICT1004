<!DOCTYPE html>
<html>
    <head>
        <?php
        include "phpFiles/headcontents.inc.php";
        ?> 
        <title>Payment Details</title>
    </head>
    <body>
        <?php
        include "phpFiles/nav.inc.php";
        include "phpFiles/banner.php";
        
        // Open session connection
        session_start();
        $userid = $_SESSION['userid'];
        $lastName = $_SESSION['username'];
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
                $config['password'], $config['dbname']);
        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        ?> 
        
        <div class="row">           
            <div class="col-6">
                <h1><?php echo $lastName?>'s Shopping Cart</h1>
                <table id="orderhistory">
                    <tr>
                        <th>Item no.</th>
                        <th>Item Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
 

                    // Get the cartinformation from the db
                    $getCurrentCart = "SELECT shopping_cart.itemID, shopping_cart.itemQuantity, Items.Name, Items.Pricing FROM shopping_cart, Items WHERE shopping_cart.userID = '$userid' AND shopping_cart.itemID = Items.ItemID;";
                    $currentCart = mysqli_query($conn, $getCurrentCart);

                    //$numberOfRows = mysql_num_rows($currentCart);

                    if ($currentCart->num_rows > 0) {
                        // output data of each row
                        $totalCost = 0;
                        $rowcounter = 1;
                        while ($row = $currentCart->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $rowcounter . "</td>";
                            echo "<td>" . $row["Name"] . "</td>";
                            echo "<td>" . $row["itemQuantity"] . "</td>";
                            echo "<td>" . $row["Pricing"] . "</td>";
                            echo "</tr>";
                            $totalCost = $totalCost + $row["Pricing"];
                            $rowcounter++;
                        }
                        echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td>Total Cost</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td>" . $totalCost . "</td>";
                        echo "</tr>";
                        echo "</table>";
                    } else {
                        //alert("0 results");
                        echo "0 results";
                        echo "</table>";
                    }
                    $conn->close();
                    ?></table>
            </div>
        </div>
        <?php include "phpFiles/footer.inc.php"; ?> 
    </body>
</html>