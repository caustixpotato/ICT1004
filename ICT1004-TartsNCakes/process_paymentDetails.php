
<?php

// Open Connection
session_start();
$config = parse_ini_file('../../private/db1-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
        $config['password'], $config['dbname']);


$u_id = $_SESSION['userid'];   //show login user id


$RetrieveCartSQL = "SELECT shopping_cart.itemID, shopping_cart.itemQuantity, Items.Name, Items.Pricing FROM shopping_cart, Items WHERE shopping_cart.userID = '$u_id' AND shopping_cart.itemID = Items.ItemID;";
$RetrieveCartTable = mysqli_query($conn, $RetrieveCartSQL);

if ($RetrieveCartTable->num_rows > 0) {
    
    // Insert into orderHistory
    while ($currentRow = $RetrieveCartTable->fetch_assoc()) {
        
        // Prepare statement
        $orderHistorySQL = "INSERT INTO order_history (itemID, userID, Date, Quantity) VALUES (" . $currentRow['itemID'] . ",  " . $u_id . ",  " . "CURDATE() + 1, " . $currentRow['itemQuantity'] . ");";
          
        mysqli_query($conn, $orderHistorySQL);
    }
    
    // Delete from cart
    // Prepare deletaion statement
    $deleteCartSQL = "DELETE FROM shopping_cart WHERE userID = '$u_id';";
    
    mysqli_query($conn, $deleteCartSQL);
    $itemfound = true;
    
} else {
    $itemfound = false;
}

if ($itemfound == true) {
    header("Location:index.php");
} else {
    alert("Purchase unsuccesful");
}
?> 

