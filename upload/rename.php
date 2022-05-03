<?php

if(isset($_POST['rename']))
{
	$tab=$_POST['tab'];
	$id=$_POST['id'];
	$db1=$tab;
	require_once("DB_connect.php");
	$name=ucfirst($_POST['name']);
	echo $q="update ".$tab."_parts set Description='$name' where id=$id ";
	$r=mysqli_query($con1,$q);
	if($r)
	{
		echo "success";
	}
	
}


?>