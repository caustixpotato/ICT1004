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

 $sql = "select * from cake_member where email = '$newvalueemail' ";
 $search_result = mysqli_query($conn, $sql);
 $emailfound = mysqli_num_rows($search_result);
if($emailfound >= 1)
   {
     //fail
   echo "<script>
   alert('Email already been use try other email');
   window.location.href='index.php';
   </script>";
    $success = false;
     $newfname->close();
   }
   

$Updateuser = mysqli_query($conn,$newfname);



if($Updateuser >0)
{
    echo "<script>
   alert('Profile Update Successfully');
  window.location.href='profile.php';
   </script>";
}
else
{
    header("Location:index.php");
}
?>
