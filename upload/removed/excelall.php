<?php session_start();

$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$day=$date->format('Y-m-d H:i:s');
$last_edited=$day;
$project_name="";
$empid="";
if(isset($_SESSION['empid']))
{
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	if(isset($_SESSION['pname']))
{
	$project_name=$_SESSION['pname'];
	$_SESSION['pname']=$project_name;
}
$mate="";
$modelno="";
$name="";
$make="";
$maid="";
$db1=$project_name;
require 'DB_connect.php';

if(isset($_FILES['excel']) && isset($_POST['ptid']))
{
	$id=$_POST['ptid'];//pid
$q12="select maid from ".$project_name."_parts where id=$id";
$qr12=mysqli_query($con1,$q12);
$row12=mysqli_fetch_array($qr12);
$maid=$row12[0];
  $type="";
	
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
  $highestRow = $worksheet->getHighestRow();
   
   for($row=2; $row<=$highestRow; $row++)
   {
	  
	$type = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1, $row)->getValue());
	$name=trim($name);
	$quant = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
	$modelno=trim($modelno);
	$modelno = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(3, $row)->getValue());
	$mate = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(4, $row)->getValue());

	$specification=mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(5, $row)->getValue());
	$make=mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(6, $row)->getValue());
	$thickness=mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(7, $row)->getValue());
    if($quant==null)
	{
		$quant=0;
	}
	if($type=="BP")
	{
		$q2="select * from component where modelno like '$modelno'";
		$rrq=mysqli_query($con,$q2);
		
		if(mysqli_num_rows($rrq)>0)
		{
			$rowm=mysqli_fetch_array($rrq);
			$make=$rowm['make'];
		$query1="update component set r_quantity=r_quantity+$quant where modelno=$modelno";
		mysqli_query($con,$query1);
		}
		else
		{
			$query2="insert into component(modelno,r_quantity,make,specification,name)values('$modelno','$quant','$make','$specification','$name')";
			mysqli_query($con,$query2);
		}
	}
		
    $query = "INSERT INTO ".$project_name."_parts VALUES ('".$id."','','".$type."','$name','','0','$quant','0','$modelno','$mate','$last_edited','$maid','0','$make','$thickness')";
	echo "<br>";
   if(mysqli_query($con1,$query))
   {
	 //$id."<br>";
	 
   }
  
   
   }
  }
echo '<script>alert("successfully uploaded");window.location.href="log.php";</script>';  

}
}	
?>