<?php
$db1="main";
require "DB_connect.php";

$modelno=$_POST['modelno'];
$sql="select name from component where modelno like '$modelno'";
$q=mysqli_query($con,$sql);
if($q && mysqli_num_rows($q)>0)
{
$r=mysqli_fetch_array($q);
echo $r[0];
}


?>