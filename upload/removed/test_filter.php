<?php

function rec($apfilter,$val,$maid,$tab)
{
	$db1=$tab;
    require 'DB_connect.php';
	$sql="select * from ".$db1."_parts where maid='$maid' and  p_type like '$apfilter' and $val and p_type not like 'BP' and del_status!=-1";
	$q=mysqli_query($con1,$sql);
	if(mysqli_num_rows($q)>0)
	{
		while($row=mysqli_fetch_array($q))
		{
			$partnumber=$row['partnumber'];
			$md="MD_".$partnumber;
		
		if($row['p_type']=="FA" || $row['p_type'][0]=="A")
		{
			$md="MA_".$partnumber;
		}
			$quantity=$row['quantity'];
			if($quantity=="")
			{
				$quantity="0";
			}
			
			$sqlpno="select partnumber from ".$db1."_parts where id=".$row['pid'];
			$qpno=mysqli_query($con1,$sqlpno);
			$pi_partno='0';
			if(mysqli_num_rows($qpno)>0)
			{
				$rpno=mysqli_fetch_array($qpno);
				$pi_partno=$rpno[0];
			}
			
			
		echo '<tr><td>'.$row["p_type"].'</td><td>'.$row["revision"].'</td><td>'.$row['description'].'</td><td>'.$partnumber.'</td><td><a href="'.$db1.'_files/'.$md.'.pdf" target="_blank">'.$md.'</a></td><td><a href="'.$db1.'_files/MA_'.$pi_partno.'.pdf" target="_blank">MA_'.$pi_partno.'</a></td><td><a href="'.$db1.'_files/QC_'.$pi_partno.'.pdf" target="_blank" >QC_'.$partnumber.'</a></td><td><a href="'.$db1.'_files/RC_'.$pi_partno.'.pdf" target="_blank" >RC_'.$partnumber.'</a></td><td>'.$quantity.' </td><td>'.$row['material'].'</td></tr>';	
		}
	}	
}


$tab=$_POST['tab'];
$db1=$tab;
require 'DB_connect.php';
$apfilter=$_POST['apfilter'];//fp or fa or %

$fp=$_POST['fp'];// assembly id

$columnname=$_POST['column'];//name

$value=$_POST['searchval'];//column value

if($_POST['column']=="MD" || $_POST['column']=="NHA")
{
	$columnname="partnumber";
}
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
	$val ="$columnname like '%".$value."%'";
}
}

$sql="select maid,id from ".$tab."_parts where id in ($fp) and del_status=0";

$rr=mysqli_query($con1,$sql);
if(mysqli_num_rows($rr)>0)
{
	 
	while($row=mysqli_fetch_array($rr))
	{

      $maid=$row[0];
	  rec($apfilter,$val,$maid,$tab);

	}
}
?>