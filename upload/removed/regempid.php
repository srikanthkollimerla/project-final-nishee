<?php
$db1="hemair";
require "DB_connect.php";

if(isset($_POST['register']))
{
$ename=$_POST['ename'];
$pwd=$_POST['password'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$designation=$_POST['designation'];

$sql="insert into emp values('','$ename','$pwd','$email','$mobile','$designation')";
$res=mysqli_query($con,$sql);
if(!$res)
{
	echo "<script>alert('Some of details already exists');window.location.href='registereid.php';</script>";
}
else{
	echo "<script>alert('Successfully added');window.location.href='registereid.php';</script>";
}
}

?>