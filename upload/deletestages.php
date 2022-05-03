<?php

$Main_table=$_POST['tab'];
$db1=$Main_table;
require_once("DB_connect.php");

if(isset($_POST['posting']) && $_POST['posting']==='full')
{
$name=$_POST['name'];

$sqldelstage="select url from ".$db1."_stage where stage='$name'";
$q1=mysqli_query($con1,$sqldelstage);
if($q1)
{
if(mysqli_num_rows($q1)>0)
{
	while($row=mysqli_fetch_array($q1))
	{
		unlink($row[0]);
	}
}
$sqldelstage1="delete from ".$db1."_stage1 where name='$name';delete from ".$db1."_stage where stage='$name'";
$q2=mysqli_multi_query($con1,$sqldelstage1);

if($q2)
{
	echo "success";
}
else{
   echo "error";	
}
}
else{
	echo "error1";
}
}

if(isset($_POST['posting']) && $_POST['posting']=="some" && isset($_POST['stagename']))
{
$name=$_POST['name'];
$stagename=$_POST['stagename'];

$sqldelstage="select url from ".$db1."_stage where stage='$name' and name='$stagename'";
$q1=mysqli_query($con1,$sqldelstage);
if($q1)
{
if(mysqli_num_rows($q1)>0)
{
	while($row=mysqli_fetch_array($q1))
	{
		unlink($row[0]);
	}
}


$sqldelstage1="delete from ".$db1."_stage where stage='$name' and name='$stagename'";
$q2=mysqli_query($con1,$sqldelstage1);

if($q2)
{
	echo "success";
}
else{
   echo "error";	
}
}
else{
	echo "error1";
}
}
?>