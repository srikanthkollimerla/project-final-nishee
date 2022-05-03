<?php
$date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_time=$date_location->format('H:i:s');
$current_date=$date_location->format('Y-m-d');
$timestamp= $current_date." ".$current_time;
$id=$_POST['id'];
$pid=$_POST['pid'];
$db1=$_POST['tab'];
require ("DB_connect.php");
$ptype="";
$q="select * from ".$db1."_parts where id=$id ";
$resultp=mysqli_query($con1,$q);
	$ar=array();
	$ar1=array();
	$response=array();
	if(mysqli_num_rows($resultp)>0)
	{
		$rr=mysqli_fetch_array($resultp);
		$specs35="";
		if($rr[2]=="BP")
		{
		$ss35="select specification from component where modelno='".$rr[8]."'";
		$qq35=mysqli_query($con,$ss35);
		$rr35=mysqli_fetch_array($qq35);
		$specs35=$rr35[0];
		}
		
			if($rr[6]=="")
			$rr[6]="0";
		$qa1="select partnumber from ".$db1."_parts where id=$pid";
$resultpa1=mysqli_query($con1,$qa1);
$rra1=mysqli_fetch_array($resultpa1);
		
		
		
		array_push($ar,array("p_type"=>$rr[2],"pid"=>$rr[0],"description"=>$rr[3],"partnumber"=>$rr[4],"revision"=>$rr[5],"quantity"=>$rr[6],"modelno"=>$rr[8],"material"=>$rr[9],"pid_partno"=>$rra1[0],"specs"=>$specs35));//data from tablename_parts
		
	}
	
	array_push($response,$ar);
	$model=$rr[8];
	if($model!="")
	{
 $q1="select * from  component where modelno='$model'";
$resultp1=mysqli_query($con,$q1);
	
	if(mysqli_num_rows($resultp1)>0)
	{
		$rr1=mysqli_fetch_array($resultp1);
		
		if($rr1[3]=="")
		$rr1[3]="0";
	    $arr2=explode(",",$rr1[5]);
		array_push($ar1,array("make"=>$rr1[1],"name"=>$rr1[2],"a_q"=>$rr1[3],"specification"=>$arr2,"i_m"=>$rr1[6]));//data from components
		
	}
	
	array_push($response,$ar1);
	}

echo json_encode($response);	
?>