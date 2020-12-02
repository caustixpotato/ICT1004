<!DOCTYPE html>
<html>
    <head>
        <?php
        include "phpFiles/headcontents.inc.php";
        ?> 
                <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
        <title>Table with database</title>
    </head>
    <body>
        <?php
        include "phpFiles/nav.inc.php";
        include "php.Files/banner.php";
        ?> 
        <table>
            <tr>
                <th>Item no.</th>
                <th>Item Description</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php
            session_start();
            $userid = $_SESSION['userid'];
            $config = parse_ini_file('../../private/db1-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);
            if ($conn->connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                exit();
            }

            // Get the cartinformation from the db
            $getCurrentCart = "SELECT shopping_cart.itemID, shopping_cart.itemQuantity, Items.Name, Items.Pricing FROM shopping_cart, Items WHERE shopping_cart.userID = '$userid' AND shopping_cart.itemID = Items.ItemID;";
            $currentCart = mysqli_query($conn, $getCurrentCart);

            //$numberOfRows = mysql_num_rows($currentCart);

            if ($currentCart->num_rows > 0) {
                // output data of each row
                alert("Worked");
                $rowcounter = 1;
                echo "<table>";
                while ($row = $currentCart->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $rowcounter . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["itemQuantity"] . "</td>";
                    echo "<td>" . $row["Pricing"] . "</td>";
                    echo "</tr>";
                    
                    $rowcounter++;
                    //$numberOfRows--;
                }

                echo "</table>";
            } else {
                alert("0 results");
                echo "0 results";
                //echo "</table>";
            }
            $conn->close();
            ?>
        </table>
        <?php include "phpFiles/footer.inc.php"; ?> 
    </body>
</html>