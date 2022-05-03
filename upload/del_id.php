<?php

$id=$_POST['id'];
$tab =$_POST['tab'];
$db1=$tab;
$user_id=$_POST['user_id'];
require_once("DB_connect.php");

function del_child($pid,$tab)
{
	$db1=$tab;
	require("DB_connect.php");
    $sql="select id from ".$tab."_parts where pid=$pid";

    $result1=mysqli_query($con1,$sql);
	if(mysqli_num_rows($result1)<1)
		return;
    else{
		while($ar=mysqli_fetch_array($result1))
			{
				$id1=$ar[0];
	$sql2="update ".$tab."_parts set del_status=-1 where id=$id1";
				$result2=mysqli_query($con1,$sql2);
				
				del_child($id1,$tab);
				
			}
	}	
	
	
}

for($p=0;$p<count($id);$p++)
{
$sql="update ".$tab."_parts set del_status=-1 where id=".$id[$p];

$result=mysqli_query($con1,$sql);

del_child($id[$p],$tab);

if($p==0){
if($_POST['check_status']=="checked")
{
	$sql_pid="select pid,description from ".$tab."_parts where id=".$id[$p];
	$q_pid=mysqli_query($con1,$sql_pid);
	$row_pid=mysqli_fetch_array($q_pid);
	$pid1=$row_pid[0];
	if($pid1!=0)
	{
		$nameid=$row_pid[1];
	
$id1=$pid1;
$reason="Deleting the $nameid having id : ".$id[$p]; 
$user_id=$user_id;
include "revise1.php";

	}
	
}
$stat=$_POST['check_status'];
$sql_status_check="update  ".$tab."_activity_log set action='$stat' where reason='ControlCopy'";
mysqli_query($con1,$sql_status_check);
}
}

$ab =array();
array_push($ab,array("text","success"));
echo json_encode($ab);
?>