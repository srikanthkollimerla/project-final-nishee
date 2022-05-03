<?php

$Main_table=$_POST['tab'];
$db1=$Main_table;
require_once("DB_connect.php");

$phase=$_POST['phasename'];
$issued=$_POST['issued'];

$sql = "SELECT * FROM ".$Main_table."_stage WHERE stage='$phase' and issued='$issued'";

$re=mysqli_query($con1,$sql);

if(mysqli_num_rows($re)>0)
{
$i=1;
while($r=mysqli_fetch_array($re))
{

$sname="select ename from emp where eid='".$r[3]."'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
$user_name=$rname[0];	

echo "<tr><td>".$i."</td><td><a href='".$r[1]."' target='_BLANK'>".$r[0]."</a></td><td>".$r[4]."</td><td>".$r[5]."</td><td>".$user_name."</td><td><button class='btn btn-danger' onclick='delsstage(\"".$phase."\",\"".$r[0]."\")'><i class='fa fa-close' ></i></button></td></tr>";

$i++;
	
}

}



?>