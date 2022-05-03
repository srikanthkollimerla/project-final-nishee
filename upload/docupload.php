<?php session_start();
$project_name="";
$empid="";
$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$time=$date->format('Y-m-d H:i:s');

if(isset($_SESSION['empid']) && isset($_SESSION['pname']))
{
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
    
	$project_name=$_SESSION['pname'];
	$_SESSION['pname']=$project_name;
$db1=$project_name;
require_once("DB_connect.php");
$tab=$project_name;

$target_dir = $tab."_documents/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


if(!file_exists($target_file))
{

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
$src=$target_dir.basename($_FILES["fileToUpload"]["name"]);
          $phasename=$_POST['phasename'];
		  $name=$_POST['name'];
		  $description=$_POST['description'];
		  $issued=$_POST['isdby'];

	 $sqld="insert into ".$tab."_stage values('$name','$target_file ','$phasename',$empid,'$description','$time','$issued')";
	$resd=mysqli_query($con1,$sqld);
	if(!$resd)
		echo "failed";

	echo"<script>alert('Sucessfully');window.location.href='documents.php';</script>";
}
else{
	
	echo"<script>alert('File already exists');window.location.href='documents.php';</script>";

}
}


else{
	header("Location:index.php");
}
?>