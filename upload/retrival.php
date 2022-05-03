<?php

$Main_table=$_POST['Main_table'];
$db1=$Main_table;
require_once("DB_connect.php");
$parent_id=$_POST['parent_id'];
if($parent_id==-1)
{
  $parent_id=0;	
}
$sql = "SELECT description,id,last_edited,p_type FROM ".$Main_table."_parts WHERE pid=$parent_id and del_status!=-1  order by description";
$result = mysqli_query($con1, $sql);
$response=array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_array($result)) {
		$bb=$row['id'];
		$sql_assc="select * from ".$Main_table."_parts where pid =$bb and del_status=0 and p_type='FA'";
		$result_ass=mysqli_query($con1, $sql_assc);
		$ass_count=mysqli_num_rows($result_ass);
		
		$sql_fbc="select * from ".$Main_table."_parts where pid =$bb and del_status=0 and p_type='FP'";
		$result_fp=mysqli_query($con1, $sql_fbc);
		$fp_count=mysqli_num_rows($result_fp);
		
		$sql_boc="select * from ".$Main_table."_parts where pid =$bb and del_status=0 and p_type='BP'";
		$result_bp=mysqli_query($con1, $sql_boc);
		$bp_count=mysqli_num_rows($result_bp);
		
		$div= explode(" ",$row["last_edited"]);
		$str_date=date("jS M Y",strtotime($div[0]));
		$type_o=$row['p_type'];
		
		
		
		array_push($response,array("pname"=>$row["description"],"last_edited"=>$str_date,"pid"=>$bb,"type"=>$type_o,"FA"=>$ass_count,"FP"=>$fp_count,"BP"=>$bp_count));

   }
} else {
   
}
$id=-1;
$des=$Main_table;
$t_p="FA";
if($parent_id!=0)
{
$sql1 = "SELECT pid,Description,p_type FROM ".$Main_table."_parts WHERE id=$parent_id";
$result1 = mysqli_query($con1, $sql1);
$row1 = mysqli_fetch_array($result1);
$id=$row1[0];
$des=$row1[1];
$t_p=$row1[2];
}

array_push($response,array("back_id"=>$id,"des"=>ucfirst($des),"p_type"=>$t_p));
echo json_encode($response);

mysqli_close($con1);
?> 
