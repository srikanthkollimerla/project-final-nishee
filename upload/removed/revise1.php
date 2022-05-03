<?php
$date1 = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$time=$date1->format('Y-m-d H:i:s');
//required $tab,$user_id,$id1,$reason
$db1=$tab;
require "DB_connect.php";

$sql="insert into ".$tab."_activity_log values('','$user_id','$time','Revision starts from $id1 ','$reason')";
$q=mysqli_query($con1,$sql);


function rev($pid1,$time,$con1,$tab)
{
	
	$sql1="update ".$tab."_parts set revision=revision+1,last_edited='$time' where id=$pid1";
	$q1=mysqli_query($con1,$sql1);
		
	$sql2="select pid from  ".$tab."_parts where id=$pid1";
	$q2=mysqli_query($con1,$sql2);
	$row=mysqli_fetch_array($q2);
	
	if($row[0]!=0)
	{
		
	
		rev($row[0],$time,$con1,$tab);
	}
	return;
	
}
if($q)
{
	
	$sql1="update ".$tab."_parts set revision=revision+1,last_edited='$time' where id=$id1";
	$q1=mysqli_query($con1,$sql1);
	
	$sql2="select pid from  ".$tab."_parts where id=$id1";
	$q2=mysqli_query($con1,$sql2);
	$row=mysqli_fetch_array($q2);
	
	if($row[0]!=0)
	{
		rev($row[0],$time,$con1,$tab);
	}
	
}






?>