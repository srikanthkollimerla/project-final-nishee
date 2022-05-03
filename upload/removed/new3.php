<?php

$sqll="select id,p_type from ".$project_name."_parts where p_type like 'A%'"; 
$q1=mysqli_query($con1,$sqll);
if(mysqli_num_rows($q1)>0)
{
	while($row1=mysqli_fetch_array($q1))
	{
		$p_type1=$row1[1][1];
		$p="P".$p_type1;
		$pp="A".$p_type1;
		$pid=$row1[0];
	    $a="update ".$project_name."_parts set pid=$pid where partnumber like '$pp%'";
		mysqli_query($con1,$a);
		$a="update ".$project_name."_parts set pid=$pid where partnumber like '$p%'";
		mysqli_query($con1,$a);
	}
}


$sql="select id,md from ".$project_name."_parts where p_type='FA'";
$q=mysqli_query($con1,$sql);
if(mysqli_num_rows($q)>0)
{
	while($row=mysqli_fetch_array($q))
	{
		
		$sql12="update ".$project_name."_parts set pid=$row[0] where nha like '".$row[1]."'";
		mysqli_query($con1,$sql12);
		
	}
}




?>