<?php session_start(); 

if(isset($_SESSION['empid']))
{
$project_name="";
$empid="";
$date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_time=$date_location->format('H:i:s');
$current_date=$date_location->format('Y-m-d');
$timestamp= $current_date." ".$current_time;
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	if(isset($_SESSION['pname']))
   {
	$project_name=$_SESSION['pname'];
	$_SESSION['pname']=$project_name;
	
    }
if(isset($_POST['submit1']))
{
$db1=$project_name;
require_once("DB_connect.php");

 $count=count($_FILES['upload']['name']);
for($i=0;$i<$count;$i++)
{
echo $target_file= $db1."_files/".$_FILES['upload']['name'][$i];

if (move_uploaded_file($_FILES["upload"]["tmp_name"][$i], $target_file)) {
       
    }
	else {
        echo "Sorry, there was an error uploading your file.";
    }

}

header("Location:log.php");
}
else
	echo "error";	
}
?>

