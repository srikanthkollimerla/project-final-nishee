
<?php
$db1="Srikanth1";
$maid="A5";
$pid=5;
require "DB_connect.php";


$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$day=$date->format('Y-m-d H:i:s');
$last_edited=$day;

if(isset($_FILES['excel']))
{

	
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   
   for($row=1; $row<=$highestRow; $row++)
   {
			$name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0, $row)->getValue());
			$quantity = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1, $row)->getValue());
			$make = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
			$modelno = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(3, $row)->getValue());
		
			$query = "INSERT INTO ".$db1."_parts VALUES ('".$pid."','','BP','".$name."','-','0','".$quantity."','0','".$modelno."','','".$day."','".$maid."','0','".$make."')";
			if(mysqli_query($con1,$query))
			{
			echo "done";
			}
   
	   
   }
  } 
}
	
	
?>