

<?php
$db1="hemair";
require "DB_connect.php";


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
   
   for($row=2; $row<$highestRow; $row++)
   {
	  
			//$ptype=$worksheet->getCellByColumnAndRow(0, $row)->getValue();
	 
			$mno= mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(9, $row)->getValue());
			
			if($mno!=NULL)
			{
			$des = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
			$spec1 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(4 $row)->getValue());
			$spec2 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(5, $row)->getValue());
			$spec3 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(6, $row)->getValue());
			$make = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(7, $row)->getValue());
			$quantity = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(8, $row)->getValue());
			
			$spec=$spec1.",".$spec2.",".$spec3;
	
			
		
			$query1="select * from component where modelno='$mno'";
			$p=mysqli_query($con,$query1);
			if(mysqli_num_rows($p)>0)
			{
				
				$sql1="update component set r_quantity=r_quantity+$quantity where modelno='$mno'";
			}
			else 
			{
			
			
			$query = "INSERT INTO component VALUES ('".$mno."','".$make."','".$des."','0','".$quantity."','".$spec."','0')";
			if(mysqli_query($con1,$query))
			{
			echo $id;
			}
			}
	   
	  
	
	   
	   
	  
	   $p++;
   }
  } 
  

 
 
 


}
}
	
	
?>