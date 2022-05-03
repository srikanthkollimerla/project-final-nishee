<?php
$db1=$_POST['tab'];	
$name=$_POST['name'];
require_once("DB_connect.php");
$query="select * from ".$db1."_parts where description LIKE '".$name."' and del_status=0";
$res=mysqli_query($con1,$query); 
echo mysqli_num_rows($res);	  
?>