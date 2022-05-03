 <?php
 session_start();
 $ar="";
 if(ISSET($_SESSION['variable']))
{
$ar = $_SESSION['variable'];

echo $ar."<br>";
}
 
 $db1=$ar;

require_once("DB_connect.php");

	//echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";
	//exit();

// Check if delete button active, start this 
//$tt="fffff";
if(isset($_POST['submit']) && isset($_SESSION['empid']))
{
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
if($rname[1]=="Manager")
{
		if(isset($_POST['acb']))
	{
$checkbox1 = $_POST['acb'];
		

for($i=0;$i<count($checkbox1);$i++)
{

$v_id = $checkbox1[$i];
echo $v_id;

echo $sql="update ".$ar."_access_rights set rights='1' where eid=$v_id";

if (mysqli_query($con1, $sql)) {
    //echo "Table '$ar'_access_rights updated successully";
} else {
   // echo "Error creating: " . mysqli_error($con);
}



}
unset($_SESSION);
echo"<script>alert('successfully created acess rights');window.location.href='projectslist.php';</script>";

	}
 }
 else{
	echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";
 
 }

}
else{
	echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";
 
 }
?>