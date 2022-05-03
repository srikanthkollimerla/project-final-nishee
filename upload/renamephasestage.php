<?php
$db1=$_POST['tab'];
require "DB_connect.php";
if(isset($_POST['phaseno']))
{
	$phaseno=$_POST['phaseno'];
	$phasename=$_POST['phasename'];
	$prevphase=$_POST['prevphase'];
	$sql="update ".$db1."_stage1 set name='$phasename' where phaseno=$phaseno";
	$q=mysqli_query($con1,$sql);
	if($q)
	{
		$sql1="update ".$db1."_stage set stage='$phasename' where stage='$prevphase'";
	$q1=mysqli_query($con1,$sql1);
	}
	echo "success";
}
?>