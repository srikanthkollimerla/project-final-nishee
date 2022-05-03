<?php


$tab=$_POST['tab'];
$db1=$tab;
require_once("DB_connect.php");
$attributes=$_POST['attributes'];
if($attributes=="MD" || $attributes=="NHA")
{
	$attributes="partnumber";
}


$value=$_POST['att'];


$query="select * from ".$tab."_parts where $attributes like '%$value%'  and del_status!=-1 ";

$q=mysqli_query($con1,$query);
if(mysqli_num_rows($q)>0)
{
 while($row=mysqli_fetch_array($q))
 {
	 $sqlpid="select partnumber from ".$tab."_parts where id=".$row['pid']." and  del_status!=-1";
	 echo '<tr><td>'.$row["p_type"].'</td><td>0</td><td>'.$row['description'].'</td>
	 <td><a href="#" >'.$row["partnumber"].'</a></td><td><a href="'.$tab.'_files/MD_'.$row["partnumber"].'.pdf" target="_blank" >MD_'.$row["partnumber"].'</a></td><td><a href="'.$tab.'_files/MD_'.$row["partnumber"].'.pdf" target="_blank">NHA_'.$row["partnumber"].'</a></td><td><a href="'.$tab.'_files/QC_'.$row["partnumber"].'.pdf" target="_blank" >QC_'.$row["partnumber"].'</a></td><td><a href="'.$tab.'_files/RC_'.$row["partnumber"].'.pdf" target="_blank" >RC_'.$row["partnumber"].'</a></td><td>'.$row["quantity"].' </td><td>'.$row['material'].'</td></tr>';
 }
}

?>