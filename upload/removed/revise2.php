<?php
$date1 = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$time=$date1->format('Y-m-d H:i:s');


$name=$_POST['name'];



function rev($pid,$time,$con1,$tab,$it,$user_id,$var,$reason)
{
	
	if($it==0)
	{
	$sql1="update ".$tab."_parts set revision=revision+1,last_edited='$time' where id=$pid";
	$q1=mysqli_query($con1,$sql1);
	}
	else{
		$sql1="update ".$tab."_parts set revision=revision+0.1,last_edited='$time' where id=$pid";
	$q1=mysqli_query($con1,$sql1);
	}
	
	$sql23="select revision from  ".$tab."_parts where id=$pid";
	$q23=mysqli_query($con1,$sql23);
	$row23=mysqli_fetch_array($q23);
	
$sql="insert into ".$tab."_activity_log values('','$user_id','$time','$var ".$row23[0]."','$reason',$pid)";
$q=mysqli_query($con1,$sql);


	$sql2="select pid from  ".$tab."_parts where id=$pid";
	$q2=mysqli_query($con1,$sql2);
	$row=mysqli_fetch_array($q2);
	
	if($row[0]!=0)
	{
		
	
		rev($row[0],$time,$con1,$tab,1,$user_id,$var,$reason);
	}
	return;
	
}

		rev($pid1,$time,$con1,$tab,0,$user_id,$var,$reason);
?>