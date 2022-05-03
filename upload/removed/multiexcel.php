
<?php
 session_start();
 $ar="";
 $pid="";
 if(ISSET($_SESSION['variable']))
{
$ar = $_SESSION['variable'];
$pid=$_POST['ptid'];
echo $ar."<br>";
}
else{
	die();
}
 
 $db1=$ar;
require_once("DB_connect.php");
$maid="";
if($pid!=0)
{
$s="select maid from ".$db1."_parts where id=$pid";
$q=mysqli_query($con1,$s);
while($rows=mysqli_fetch_array($q))
{
   $maid=$rows[0];
} 	
}


$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
 $day=$date->format('Y-m-d H:i:s');
 $last_edited=$day;

$p=2;
if(isset($_FILES['excel']))
{

	
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   
   for($row=1; $row<$highestRow; $row++)
   {
	   $error=0;
	   $ptype=$worksheet->getCellByColumnAndRow(0, $row)->getValue();

	   if( strlen($type_tmp)>1 && $ptype=="BP")
			{
			$name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0, $row)->getValue());
			$quantity = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1, $row)->getValue());
	
			$modelno = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
		
			$query1="select * from component where modelno='$modelno'";
			$p=mysqli_query($con,$query1);
			if(mysqli_num_rows($p)>0)
			{
				$sql1="update component set r_quantity=r_quantity+$quantity where modelno='$modelno'";
			}
			else 
			{
				$error=-1;
			}
			$query = "INSERT INTO ".$project_name."_parts VALUES ('".$pid."','','".$p_type."','".$name."','".$pno."','0','".$quantity."','0','".$modelno."','','".$day."','$maid','".$error."','')";
			if(mysqli_query($con1,$query))
			{
			echo $id;
			}
   
	   }
	   else if($ptype=="FA" || $ptype=="FP" )
	   {
			$name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1, $row)->getValue());
			$quantity = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
	
			$material = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(4, $row)->getValue());
			
			$query = "INSERT INTO ".$project_name."_parts VALUES ('".$pid."','','".$p_type."','".$name."','".$pno."','0','".$quantity."','0','','".$material."','".$day."','$maid','".$error."','')";
			if(mysqli_query($con1,$query))
			{
			echo $id;
			}
	   }
	
	   
	   
	   echo "<br>";
	   $p++;
   }
  } 
  

 
 
 


}
	
	
?>