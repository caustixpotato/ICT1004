<?php
session_start();
$userIDING = $_SESSION['userid'];

$config = parse_ini_file('../../private/db1-config.ini');
$conn = new mysqli($config['servername'], $config['username'],
$config['password'], $config['dbname']);

$cidToDeletemem = $_POST["deletemem"];

$sql ="DELETE FROM cake_member WHERE email = '$cidToDeletemem' ";

$Deletedmem = mysqli_query($conn,$sql);

if($Deletedmem >0)
{
	header("Location:member.php");
}

?>
