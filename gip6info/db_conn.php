<?php  

$sname = "83.217.67.11";
$uname = "06InfoObe";
$password = "Konikm@@rzw1jgen";

$db_name = "GIP4_webshop";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}