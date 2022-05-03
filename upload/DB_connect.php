<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 

$servername = "localhost";
$username = "root";
$password = "";
$db="main";


// Create connection
$con = mysqli_connect($servername, $username, $password,$db,3307);
$con1 = mysqli_connect($servername, $username, $password,$db1,3307);

// Check connection
if (!$con) {
	
    die("Connection failed: " . $con->connect_error);
}
?>