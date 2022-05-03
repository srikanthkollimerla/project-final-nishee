<?php

$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$time=$date->format('Y-m-d H:i:s');

if(isset($_POST['assem']))
{
	$name=ucfirst($_POST['name']);
	$pid=(int)$_POST['pid'];
	$tab=$_POST['tab'];
	$materials=$_POST['materials'];
	$thickness=$_POST['thickness'];
	$db1=$tab;
	require_once("DB_connect.php");
	
	if($pid==0)
	{
		$s="select * from ".$tab."_parts where p_type like 'A%'";
		$r=mysqli_query($con1,$s);
		$count=mysqli_num_rows($r)+1;
		$ptype="A".$count;
		 $sql="insert into ".$tab."_parts values(0,'','$ptype','$name', '','0','1','0','','$materials','$time','$ptype','0','','$thickness')";
	$result=mysqli_query($con1,$sql);
	if($result)
	{
		echo "169";		
	}
	else{
		echo "404";
	}
	}	
	/*
	else
	{
		
	if($_POST['check_status']=="checked")
{
	
	$pid1=$pid;
	if($pid1!=0)
	{
		$nameid=$name;
	
$id1=$pid1;
$var="Revision is done due to adding Fabricated Assembly named $nameid . revised to : ";
$reason="Adding the Assembly named $nameid "; 
$user_id=$_POST['user_id'];
include "revise2.php";

	}	
}
	
		$sql13="select maid from ".$tab."_parts where id=$pid";
		$result13=mysqli_query($con1,$sql13);
		$row13=mysqli_fetch_array($result13);
		$maid=$row13['maid'];
	$sql="insert into ".$tab."_parts values($pid,'','FA','$name', '','0','1','0','','$materials','$time','$maid','0','','$thickness')";
	$result=mysqli_query($con1,$sql);
	if($result)
	{
		echo "169";		
	}
	else{
		echo "404";
	}
	}*/
}
?>