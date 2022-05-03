<?php
$tab=$_POST['tab'];
$db1=$tab;
require_once("DB_connect.php");
$stage=$_POST['stage'];
$date = new DateTime("now", new DateTimeZone('Asia/Kolkata') );
$time=$date->format('Y-m-d H:i:s');

echo $sql="update ".$tab."_stage1 set ended='$time',status=1 where name='$stage'";
$query=mysqli_query($con1,$sql);

?>