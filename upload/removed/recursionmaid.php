<?php

function makeMaid($pid,$maid,$project_name)
{
	$sql13="select id from ".$project_name."_parts where pid=$pid";
	$q13=mysqli_query($con1,$sql13);
	if(mysqli_num_rows($q13)>0)
{
	while($row13=mysqli_fetch_array($q13))
	{
		$id=$row13['id'];
		$sql12="update ".$project_name."_parts set maid='".$maid."' where id=$id";
		mysqli_query($con1,$sql12);
		makeMaid($id,$maid,$project_name);
	}
}
else{
	return ;
}
}
$sql12="select id,p_type from ".$project_name."_parts where pid=0";
$q12=mysqli_query($con1,$sql12);
if(mysqli_num_rows($q12)>0)
{
	while($row12=mysqli_fetch_array($q12))
	{
		$maid=$row12['p_type'];
		$id=$row12['id'];
		makeMaid($id,$maid,$project_name);
	}
}


?>