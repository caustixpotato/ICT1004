

<?php
    
session_start();

$config = parse_ini_file('../../private/db1-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

  
  $cke_id = $_POST['itemID'];
  
  $u_id=$_SESSION['userid'] ;   //show login user id
  

 
$sql = "INSERT INTO shopping_cart (userID, itemID, itemQuantity) VALUES('$u_id','$cke_id' ,1)";
  
  $itemfound = mysqli_query($conn , $sql);  //code to allow insert data into database
  
  if($itemfound == true)    
    {
         header("Location:Store.php");  	
    }
  else
  {
      alert("Insert to cart unsuccesfully");
  }

?> 

