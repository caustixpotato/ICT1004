<?php
session_start();

$config = parse_ini_file('../../private/db1-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

$useremail = $_SESSION['whoami'];
$newvaluefname = $_POST['newfname'];
$newvaluelname = $_POST['newlname'];
$newvalueemail = $_POST['newemail'];
$newvaluephoneno = $_POST['newphoneno'];
$newvalueaddress = $_POST['newaddress'];


$newfname ="UPDATE cake_member SET fname = '$newvaluefname', lname = '$newvaluelname', email = '$newvalueemail', phoneno = '$newvaluephoneno', address = '$newvalueaddress'  WHERE email = '$useremail'";

$Updateuser = mysqli_query($conn,$newfname);

if($Updateuser >0)
{
    echo "<script>
   alert('Successfully edit the profile');
  window.location.href='profile.php';
   </script>";
}
else
{
   echo "<script>
   alert('Fail to update profile');
  window.location.href='profile.php';
   </script>";
}

?>
