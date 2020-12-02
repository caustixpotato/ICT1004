<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'phpFiles/headcontents.inc.php';
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
    </style>
</head>
<body>
    <?php
    include "phpFiles/nav.inc.php";
    include "phpFiles/banner.php";
    ?>
    <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <table>
            <tr>
                <th>Date</th>
                <th>Item Name.</th>
                <th>Pricing</th>
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
            $getOrderHistory = "SELECT O.Date, I.Name, I.Pricing FROM order_history O, Items I WHERE O.userID = '$userid' AND I.ItemID = O.itemID;";
            $history = mysqli_query($conn, $getOrderHistory);
            if ($history->num_rows > 0) {
                // output data of each row
                while ($row = $history->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["Date"]."</td>";
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["Pricing"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "</table>";
                echo "No results";
            }
            $conn->close();
            ?>
    </div>
    <div class="col-2"></div>
    </div>
    <?php
    include "phpFiles/footer.inc.php";
    ?> 
</body>
</html>