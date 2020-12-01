<!DOCTYPE html>
<html>
    <head>
        <title>Table with database</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                color: #588c7e;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
            }
            th {
                background-color: #588c7e;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
        </style>
    </head>
    <body>
        <?php
        include "phpFiles/nav.inc.php";
        ?> 
        <main>
            <table>
                <tr>
                    <th>Item No.</th>
                    <th>Item Name.</th>
                    <th>Date</th>
                </tr>
                <?php
                session_start();
                $userid = $_SESSION['userid'];
                //$config = parse_ini_file('../../private/db1-config.ini');
                $conn = new mysqli($config['servername'], $config['username'],
                        $config['password'], $config['dbname']);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $getOrderHistory = "SELECT itemID, date, Name FROM order_history WHERE userID = '$userid'";
                $history = mysqli_query($conn, $getOrderHistory);

                if ($history->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["itemID"] . "</td><td>" . $row["Name"] . "</td><td>"
                        . $row["date"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </table>
        </main>
        <?php include "phpFiles/footer.inc.php"; ?> 
    </body>
</html>