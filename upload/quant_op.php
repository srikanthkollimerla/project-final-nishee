<?php
$db1=$_POST['tab'];
require "DB_connect.php";
if(isset($_POST['quantget']))
{
$id=$_POST['id'];
$que="select quantity from ".$db1."_parts where id=$id";
$resultp=mysqli_query($con1,$que);

	
	if(mysqli_num_rows($resultp)>0)
	{
		$r11=mysqli_fetch_array($resultp);
		
			if($r11[0]=="")
				$r11[0]="0";
			echo $r11[0];
	}	
}
if(isset($_POST['quantup']))
{
$id=$_POST['id'];
$new_v=$_POST['new_v'];
$pre_v=$_POST['pre_v'];
$diff=(int)$new_v-(int)$pre_v;
$sql="select p_type,model_no from ".$db1."_parts where id=$id";
$q=mysqli_query($con1,$sql);
$row=mysqli_fetch_array($q);
$tp=$row[0];
if(strcmp($tp,"BP")==0)
{
	$modelno=$row[1];
	$sql1="update component set r_quantity=r_quantity+$diff where modelno='$modelno'";
if(mysqli_query($con,$sql1))
{
	echo "success1";
}

}

$sql2="update ".$db1."_parts set quantity='$new_v' where id=$id";
if(mysqli_query($con1,$sql2))
{
	echo "success2";
}
}	
	
?>


