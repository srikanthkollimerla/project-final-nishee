<?php

function rec($id,$apfilter,$columnval,$tab)
{
	$db1=$tab;
    require 'DB_connect.php';
	$sql="select * from ".$tab."_parts where $columnval and p_type like '$apfilter' and pid like '$id'";
    $q=mysqli_query($con1,$sql);
	if(mysqli_num_rows($q)>0)
	{
		while($row=mysqli_fetch_array($q))
		{
			$pid=$row['id'];
			$partnumber=$row['partnumber'];
		$md="MD_".$row['id'];
		if($row['p_type']=="FA")
		{
			$md="MA_".$row['id'];
		}
		$quantity=$row["quantity"];
		if($row["quantity"]=="")
		{
			$quantity="0";
		}
			echo '<tr><td>'.$row["p_type"].'</td><td>0</td><td>'.$row['description'].'</td><td>'.$partnumber.'</td><td><a href="errordraw.php" target="_blank">'.$md.'</a></td><td><a href="errordraw.php" target="_blank">MA_'.$row["pid"].'</a></td><td><a href="errordraw.php" target="_blank" >QC_'.$partnumber.'</a></td><td><a href="errordraw.php" target="_blank" >RC_'.$partnumber.'</a></td><td>'.$quantity.' </td><td>'.$row['material'].'</td></tr>';
			
			rec($pid,$apfilter,$columnval,$tab);
		}
	}
	else{
		
		return ;
	}
}
$tab=$_POST['tab'];
$db1=$tab;
require 'DB_connect.php';
$apfilter=$_POST['apfilter'];//fp or fa or %

$fp=$_POST['fp'];// assembly id

$columnname=$_POST['column'];//name

$value=$_POST['searchval'];//column value

//echo $apfilter."  -> ".$fp." -> ".$columnname." -> ".$value."  ";

$val="";
if(strtoupper(getType($value))=="ARRAY")
{
	$e="'".implode("','",$value)."'";
	$val="$columnname in (".$e.")";
}
else{
if($value=="")
{
	$val="$columnname like '%'";
}
else{
	$val ="$columnname like '".$value."%'";
}
}
$sql="select * from ".$tab."_parts where pid like '".$fp."' and del_status=0";
$rr=mysqli_query($con1,$sql);
if(mysqli_num_rows($rr)>0)
{
	while($row=mysqli_fetch_assoc($rr))
	{

       $id=$row['id'];
	   rec($id,$apfilter,$val,$tab);//pid,fp/fa,columnname,projectname
//echo '<tr><td>'.$row["type"].'</td><td>0</td><td>'.$row['Description'].'</td><td><a href="errordraw.php" target="_blank">'.$row["MD"].'</a></td><td><a href="errordraw.php" target="_blank">'.$row["NHA"].'</a></td><td><a href="errordraw.php" target="_blank" >QC</a></td><td><a href="errordraw.php" target="_blank" >RC</a></td><td>'.$row["quantity"].' </td><td>'.$row['materials'].'</td></tr>';
	}
}
?>