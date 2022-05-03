<?php session_start();
$variable="";
if(isset($_SESSION['variable']))
{
$variable = $_SESSION['variable'];

//echo $variable;
$_SESSION['variable'] = $variable;

}
$db1=$variable;
try{
require_once("DB_connect.php");
}
catch(Exception $e)
{
	echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";
	exit();
}
function makeMaid($pid,$maid,$project_name,$con1)
{
	
	$sql13="select id from ".$project_name."_parts where pid=$pid";
	$q13=mysqli_query($con1,$sql13);
	if(mysqli_num_rows($q13)>0)
{
	while($row13=mysqli_fetch_array($q13))
	{
		$id=$row13['id'];
		$sql12="update ".$project_name."_parts set maid='".$maid."' where id=$id";
		mysqli_query($con1,$sql12);
		makeMaid($id,$maid,$project_name,$con1);
	}
}
else{
	return ;
}
}
if(isset($_SESSION['empid']))
{
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
if($rname[1]=="Manager")
{
$project_name=$db1;
$sql12="select id,p_type from ".$project_name."_parts where pid=0";
$q12=mysqli_query($con1,$sql12);
if(mysqli_num_rows($q12)>0)
{
	while($row12=mysqli_fetch_array($q12))
	{
		$maid=$row12['p_type'];
		$id=$row12['id'];
		makeMaid($id,$maid,$project_name,$con1);
	}
}
$qcr="CREATE TABLE ".$db1."_access_rights (
 eid varchar(25) NOT NULL,
 rights varchar(3) NOT NULL DEFAULT '0',
 PRIMARY KEY (eid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
mysqli_query($con1,$qcr);

$q="insert into ".$db1.".".$db1."_access_rights (eid) select eid from main.emp";
mysqli_query($con1,$q);
?>

 


<!doctype html>
<html>
<head>
<title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </head>
  
  <body>
  
  <div class="col-md-12">
		
	<center><h1> Access Rights</h1></center>
  </div>
  
  <div class="col-md-12">
  
  <form method="post" name="dis"   class="gm" action="accesspage1.php">

  <?php
  //$sql= "select * from emp where project_name like '";
  $sql="select * from emp";
	$res=mysqli_query($con,$sql);
	
	//$row=mysqli_fetch_array($res);
	
	 echo"<div class='container'>";
	
	// echo "<h1>LIST</h1>";
	
		echo"<table class='table table-hover'>";
			echo"<thead>";
				echo"<tr> <th>Eid</th> <th>Ename</th><th>Edit Access </th></tr>";
			echo"</thead>";
		
			echo "<tbody>";
				
			while($r=mysqli_fetch_array($res))
			{
				
					
			echo "<tr> <th>".$r['eid']."</th> <th>".$r['ename']."</th>";
			
			echo'<td> <input name="acb[]" type="checkbox" value=  "'.$r['eid'].'" > </td>';		
			}
	
		
			echo "</tbody>";
		
			echo "</table>";
	 echo "</div>";
  
  
  
  
  
  
  ?>
<center>
<input class="btn-lg btn-success" type="submit" name="submit" value="Submit" />
</center>
</form>
</div>
  </body>
  </html>
  <?php
}
else{
	echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";

}
}
  ?>
  

  
  

