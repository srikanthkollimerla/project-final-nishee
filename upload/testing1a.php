<?php
$db1=$_POST['tab'];
require("DB_connect.php");
$pid=$_POST['pid'];
$sql="select id,pid,description,p_type from ".$db1."_parts where pid=$pid  and del_status=0 order by description";
$q=mysqli_query($con1,$sql);
$result=array();
if(mysqli_num_rows($q)>0)
{
  while($row=mysqli_fetch_array($q))
  {
	  array_push($result,array("id"=>$row[0],"pid"=>$row[1],"description"=>$row[2],"p_type"=>$row[3]));
  }
}
echo json_encode($result);
?>