<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Insert Records</title>

<?php
    
session_start();

  //open connection and select database
  $conn = mysqli_connect("localhost", "root", "","db_154247j");
    
    if (!isset($_SESSION['whoami']))
{
    header("Location:Login.php");
}
  
  $cke_i = $_POST['cke'];
  $cost_i = $_POST['cost'];
  $imgfile_i = $_POST['imgfile'];
  $uname_i=$_SESSION['whoami'];   //show login useremail
  
  $sql = "INSERT INTO cart(Item,Price,cimage,UserName) VALUES('$cke_i','$cost_i','$imgfile_i','$uname_i')";
  
  $userfound = mysqli_query($conn , $sql);  //code to allow insert data into database
  
  if($userfound >0)    
    {
		 header("Location:cart.php");  	
	}


?> 
</head>

<body>
</body>
</html>
