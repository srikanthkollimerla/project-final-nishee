
<?php
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
	   $type_tmp=$worksheet->getCellByColumnAndRow(2, $row)->getValue();

	   if( strlen($type_tmp)>1 && $type_tmp[0]!="A")
	   {
		   
    $id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0, $row)->getValue());
	//$pid = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1, $row)->getValue());
	$type = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
	$p_type=$type[1].$type[2];
    $name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(3, $row)->getValue());
	$pno = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(4, $row)->getValue());
	$dn =mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(5, $row)->getValue());
	$nha = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(6, $row)->getValue());
	$quant = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(7, $row)->getValue());
	$mate = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(8, $row)->getValue());
	$make="";
   // 
    //mysql_query($query);
   //echo $date;
     $query = "INSERT INTO ".$project_name."_parts VALUES ('','','".$p_type."','".$name."','".$pno."','0','".$quant."','0','','$mate','".$dn."','".$nha."','$time','','0','$make','')";
   if(mysqli_query($con1,$query))
   {
	   echo $id;
   }
   
	   }
	   else if(strcmp($type_tmp[0],"A")==0){
		   
   // $id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0, $row)->getValue());
	//$pid = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(1, $row)->getValue());
	   	$type = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(3, $row)->getValue());
	echo $query = "INSERT INTO ".$project_name."_parts VALUES ('','','".$type."','".$name."','','0','1','0','','','','','".$last_edited."','$type','0','','')";
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