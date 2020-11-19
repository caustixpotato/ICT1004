<?php
session_start();

$config = parse_ini_file('../../private/db1-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

$useremail = $_SESSION['whoami'];
$userid = $_SESSION['userid'];
$newvaluefname = $_POST['newfname'];
$newvaluelname = $_POST['newlname'];
$newvalueemail = $_POST['newemail'];
$newvaluephoneno = $_POST['newphoneno'];
$newvalueaddress = $_POST['newaddress'];


$newfname ="UPDATE cake_member SET fname = '$newvaluefname', lname = '$newvaluelname', email = '$newvalueemail', phoneno = '$newvaluephoneno', address = '$newvalueaddress'  WHERE userID = '$userid'";

$Updateuser = mysqli_query($conn,$newfname);

if($Updateuser >0)
{
    header("Location:profile.php");
}
else
{
    header("Location:index.php");
}
?>
