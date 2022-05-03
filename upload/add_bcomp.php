<?php session_start();
$project_name="";
$empid="";
$date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_time=$date_location->format('H:i:s');
$current_date=$date_location->format('Y-m-d');
$timestamp= $current_date." ".$current_time;
if(isset($_SESSION['empid']))
{
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	if(isset($_SESSION['pname']))
{
	$project_name=$_SESSION['pname'];
	$_SESSION['pname']=$project_name;
}
$db1=$project_name;
require "DB_connect.php";
if(isset($_POST['submit']))
{
	$pid=$_POST['pid'];
	$modelno=$_POST['modelno'];
	$make=$_POST['make'];
	$quantity=$_POST['quantity'];
	$description=$_POST['description'];
	$specification=$_POST['specification'];
	$infantmortality=$_POST['infantmortality'];
	
	$sql1="select maid from ".$db1."_parts  where id=$pid";
	$q1=mysqli_query($con1,$sql1);
	$maid="";
	if(mysqli_num_rows($q1)>0)
	{
		$row1=mysqli_fetch_array($q1);
		$maid=$row1[0];
	}
	$sql="insert into component values('$modelno','$make','$description','0','$quantity','$specification','$infantmortality','0')";
	
	$q=mysqli_query($con,$sql);
	
	if($q)
	{
	
	echo '<script>alert("Successfully Added redirecting to '.$db1.' page");window.location.href="log.php";</script>';
	exit();
	}
	else{
		echo "Already Exists";
	}
	
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="HTML,CSS,JavaScript,Php">
  
<title><?php  echo $project_name; ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-chosen.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6 offset-md-3">
<form method="post" action="">
<table class="table table-hover">
<thead>
<tr ><th colspan="2" class="h3 text-center">Enter the Details</th></tr>
</thead>
<tbody>
<tr hidden ><th>Pid :</th><td><input type="text" class="form-control" required name="pid" value="<?php echo $_GET['pid']; ?>"></td></tr>
<tr><th>Model No :</th><td><input type="text" class="form-control" required name="modelno"></td></tr>
<tr><th>Quantity :</th><td><input type="text" pattern="[0-9]{1,*}" class="form-control" name="quantity"></td></tr>
<tr><th>Make :</th><td><input type="text" class="form-control" name="make"></td></tr>
<tr><th>Description :</th><td><input type="text" class="form-control" name="description"></td></tr>
<tr><th>Specification :</th><td><textarea class="form-control" name="specification"></textarea></td></tr>
<tr><th>Infant Mortality :</th><td><input type="text"  class="form-control" name="infantmortality"></td></tr>
<tr><td colspan="2"><center><input type="submit" value="Submit" class="btn btn-success" name="submit"></center></td></tr>
</tbody>
</table>
</form>
</div>
</div>
</div>




<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script src="js/bootstrap-treeview.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script src="js/jquery-ui.js"></script>
</body>
</html>
<?php
}
?>