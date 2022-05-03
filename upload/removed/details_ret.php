<?php 
require_once("DB_connect.php");
$id=$_POST['id'];
$tab=$_POST['tab'];
$sql="select * from ".$tab."revision where APid=$id ";
$result=mysqli_query($con,$sql);
$response=array();
if(mysqli_num_rows($result)>0)
{
   while($row=mysqli_fetch_array($result))
   {
     $md=$row[3];
     $qc=$row[4];
     $rc=$row[5];
	 $rno=$row[6];
	 $context=$row[2];
	 array_push($response,array("md"=>$md,"qc"=>$qc,"rc"=>$rc,"rno"=>$rno,"context"=>$context));
   }
}
echo json_encode($response);
?>