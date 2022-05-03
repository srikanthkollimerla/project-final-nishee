<?php
$tab=$_POST['tab'];
$db1=$tab;
$name=$_POST['phasename'];
require("DB_connect.php");

$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$time=$date->format('Y-m-d H:i:s');


if(isset($_POST['create']))
{
echo $sql="insert into ".$tab."_stage1 values('','$name','$time','',0)";
$res=mysqli_query($con1,$sql);
 if(!$res)
	 echo "error:";
 else{
	 echo "success";
 }
}

 //to close the status
if(isset($_POST['close']))
{
$sql="update ".$tab."_stage1 set status=1 where name='$name'";
$res=mysqli_query($con1,$sql);
 if(!$res)
	 echo "error:";
}

//to insert data into a stage
if(isset($_POST['add']))
{
$sql="insert into ".$tab."_stage values('$name','$description',,$time')";

$res=mysqli_query($con1,$sql);
 if(!$res)
	 echo "error:";
}
?>