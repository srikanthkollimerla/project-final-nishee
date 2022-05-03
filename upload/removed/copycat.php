<?php
 
 
function copyc($tab,$last_id,$id){
    $date1 = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
    $day1=$date1->format('Y-m-d H:i:s');
	$db1=$tab;
	require("DB_connect.php");
	 $sqlp="select * from ".$tab."_parts where pid=$id";
	
	$resultp=mysqli_query($con1,$sqlp);
	
	if(mysqli_num_rows($resultp)>0)
	{
		
	    while($row=mysqli_fetch_array($resultp))
		{
           $sql13="select maid from ".$tab."_parts where id=$last_id";
		$result13=mysqli_query($con1,$sql13);
		$row13=mysqli_fetch_array($result13);
		$maid=$row13['maid'];
		
			$sql1="insert into ".$tab."_parts values($last_id,'','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$day1','$maid','$row[12]','$row[13]','$row[14]')";
   $result1=mysqli_query($con1,$sql1);
  $last_id1=mysqli_insert_id($con1);
   
   $id1=$row[1];
   if($result1)
   {
	   copyc($tab,$last_id1,$id1);
	   echo "success";
   }
		}	
	}
	else{
		return ;
	}
}
 
function cutc($tab,$maid,$id){
    $date1 = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
    $day1=$date1->format('Y-m-d H:i:s');
	$db1=$tab;
	require("DB_connect.php");
	 $sqlp="select * from ".$tab."_parts where pid=$id";
	
	$resultp=mysqli_query($con1,$sqlp);
	
	if(mysqli_num_rows($resultp)>0)
	{
		
	    while($row=mysqli_fetch_array($resultp))
		{
           $sql13="update ".$tab."_parts set maid='$maid' where id=".$row['id'];
		$result13=mysqli_query($con1,$sql13);		   
          if($result1)
          {
	          cutc($tab,$maid,$row['id']);
          }
		}	
	}
	else{
		return ;
	}
}

 $date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
 $day1=$date->format('Y-m-d H:i:s');
 
 if(isset($_POST["paste"]) && $_POST["action"]=="paste"){
   $pid=$_POST["pid"];//paste section
   $id=$_POST["id"];//copy section
   $tab=$_POST["tab"];
   $db1=$tab;
   require("DB_connect.php");
   
   $sql="select * from ".$tab."_parts where id=$id";
   $result=mysqli_query($con1,$sql);
   $row=mysqli_fetch_array($result);
   $sql13="select maid from ".$tab."_parts where id=$pid";
		$result13=mysqli_query($con1,$sql13);
		$row13=mysqli_fetch_array($result13);
		$maid=$row13['maid'];
   $sql1="insert into ".$tab."_parts values($pid,'','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$day1','$maid','$row[12]','$row[13]','$row[14]')";
   $result1=mysqli_query($con1,$sql1);
   $last_id=mysqli_insert_id($con1);
   if($result1)
   {
	   copyc($tab,$last_id,$id);
	   echo "success";
   }
 }
 if(isset($_POST["paste"]) && $_POST["action"]=="cut"){
   $pid=$_POST["pid"];
   $id=$_POST["id"];
   $tab=$_POST["tab"];
   $db1=$tab;
   $maidg="";
   require("DB_connect.php");
   if($pid!=0)
   {
   $sqlg="select * from ".$tab."_parts where id=$pid";
   $qg=mysqli_query($con1,$sqlg);
   if(mysqli_num_rows($qg)>0)
   {
	   $rg=mysqli_fetch_array($qg);
	   $maidg=$rg['maid'];
   }
   $sql1="update ".$tab."_parts set pid=$pid,maid='$maidg',last_edited='$day1' where id=$id";
   $result1=mysqli_query($con1,$sql1);
   if($result1)
   {	 
	   echo "success";
   }
   cutc($tab,$maidg,$id);
   }
   /*else{
	   $sqlcn="select * from ".$tab."_parts where p_type like 'A%'";
	   $qcn=mysqli_query($con1,$sqlcn);
	   $maidg='A'.(1+mysqli_num_rows($qcn));
   $sql1="update ".$tab."_parts set pid=$pid,maid='$maidg',p_type='$maidg',last_edited='$day1' where id=$id";
   $result1=mysqli_query($con1,$sql1);
   if($result1)
   {	 
	   echo "success";
   }
   cutc($tab,$maidg,$id);
   }
   */
 }
?>