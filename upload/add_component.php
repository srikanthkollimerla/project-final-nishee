<?php

$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$user_id="";
$time=$date->format('Y-m-d H:i:s');
if(isset($_POST['compo']))
{
	
	$id_temp=0;
	$tab=$_POST['tab'];
	$pid=$_POST['pid'];
	$db1=$tab;
	require_once("DB_connect.php");
	
	$quantity=$_POST['quantity'];
	$name=$_POST['name'];
	$modelno=$_POST['modelno'];
	$thickness=$_POST['thickness'];
	$materials=$_POST['materials'];
	$sql13="select maid from ".$tab."_parts where id=$pid";
		$result13=mysqli_query($con1,$sql13);
		$row13=mysqli_fetch_array($result13);
		$maid=$row13['maid'];
	$sql4="select make,name from component where modelno='$modelno'";
	$result14=mysqli_query($con,$sql4);
		$row14=mysqli_fetch_array($result14);
		$make=$row14[0];
		if(strpos(trim($row14[1]),trim($name)) === false){
		$com_bp12="update component set name=concat(name,',$name') where modelno='$modelno'";
		mysqli_query($con,$com_bp12);
		}
    $q="insert into ".$tab."_parts values($pid,'','BP','$name','','0','$quantity','0','$modelno','$materials','$time','$maid','0','$make','$thickness')";
       if(mysqli_query($con1,$q))
	   {
		   $q="update component set r_quantity=r_quantity+$quantity where modelno='$modelno'";
		   mysqli_query($con,$q);
       echo "success";
	   }
        else{
       echo "error1";
		}
$id_temp=mysqli_insert_id($con1);
if($pid!=0)
{
if($_POST['check_status']=="checked")
{
	
	$pid1=$pid;
	if($pid1!=0)
	{
		$nameid=$name;
	

        $var="Revision is done due to adding Brought out part $nameid revised to : ";
$reason="Adding the Brought out part having model no $modelno and id : $id_temp "; 
$user_id=$_POST['user_id'];
//include "revise2.php";

	}	
}
}
$stat=$_POST['check_status'];
$sql_status_check="update  ".$tab."_activity_log set action='$stat' where reason='ControlCopy'";
mysqli_query($con1,$sql_status_check);	
	
}
	
if(isset($_POST['compofab']))
{
	$id_temp=0;
	$tab=$_POST['tab'];
	$db1=$tab;
	require_once("DB_connect.php");
	$pid=$_POST['pid'];
	$quantity=$_POST['quantity'];
	$name=$_POST['name'];
	$materials=$_POST['materials'];
	    $sql13="select maid from ".$tab."_parts where id=$pid";
		$result13=mysqli_query($con1,$sql13);
		$row13=mysqli_fetch_array($result13);
		$maid=$row13['maid'];
		$thickness=$_POST['thickness'];
		$q="insert into ".$tab."_parts values($pid,'','FP','$name','','0','$quantity','0','','$materials','$time','$maid','0','','$thickness')";
       if(mysqli_query($con1,$q))
	   {
       echo "success";
	   }
        else{
       echo "error1";
		}		
	$id_temp=mysqli_insert_id($con1);
if($pid!=0)
{
if($_POST['check_status']=="checked")
{
	$pid1=$pid;
	if($pid1!=0)
	{
		$nameid=$name;
	
$id1=$pid1;
$var="Revision is done due to adding Fabricated part $nameid. revised to : ";
$reason="Adding the Fabricated Part having name => $name and id : $id_temp "; 
$user_id=$_POST['user_id'];
//include "revise2.php";

	}	
}
}	
	$stat=$_POST['check_status'];
$sql_status_check="update  ".$tab."_activity_log set action='$stat' where reason='ControlCopy'";
mysqli_query($con1,$sql_status_check);
     }
	
	
	
	
	
	
?>