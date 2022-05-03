<?php
$db1=$_POST['tab'];
//$nname=$_POST['nname'];
require "DB_connect.php";
$sss="select nick from projects where name like '".$db1."'";
$aaa=mysqli_query($con,$sss);
$rrr=mysqli_fetch_array($aaa);
$nname=$rrr[0];

echo $sql="select p_type from ".$db1."_parts where pid=0 and del_status=0";
$q=mysqli_query($con1,$sql);
if(mysqli_num_rows($q)>0)
{
	$cnt123=mysqli_num_rows($q);
	
	while($row=mysqli_fetch_array($q))
	{
		$c1=1;
		$c2=1;
		$c3=1;
		$c4=1;
		$sql1="select id,p_type,revision from ".$db1."_parts where maid='".$row[0]."' and del_status=0  order by pid";
		$q1=mysqli_query($con1,$sql1);
		if(mysqli_num_rows($q1)>0)
            {
				
				
				
	          while($row1=mysqli_fetch_array($q1))
	           {
				   $number=substr($row[0],1);
				   
				   if($row1[1]=="BP")
				   {
					  // echo "BP".;
					echo   $sql2="update ".$db1."_parts set partnumber='BP-".trim($nname)."-".$number.".".$cnt123."-".$c1."-".$row1[2]."' where p_type='BP' and maid='".$row[0]."' and pid!=0 and del_status=0 and id=".$row1[0];
					   $q2=mysqli_query($con1,$sql2);
					   $c1++;
				   }
				   else if($row1[1]=="FP")
				   {
					  echo $sql2="update ".$db1."_parts set partnumber='FP-".trim($nname)."-".$number.".".$cnt123."-".$c2."-".$row1[2]."' where p_type='FP' and maid='".$row[0]."' and pid!=0 and del_status=0 and id=".$row1[0];
					   $q2=mysqli_query($con1,$sql2);
					   $c2++;
				   }
				   else if($row1[1]=="FA")
				   {
					 echo $sql2="update ".$db1."_parts set partnumber='FA-".trim($nname)."-".$number.".".$cnt123."-".$c3."-".$row1[2]."' where p_type='FA' and maid='".$row[0]."' and pid!=0 and del_status=0 and id=".$row1[0];
					   $q2=mysqli_query($con1,$sql2);
					   $c3++;
				   }
				   else
				   {
					  echo $sql2="update ".$db1."_parts set partnumber='MA-".trim($nname)."-".$number.".".$cnt123."-".$c4."-".$row1[2]."' where p_type='".$row[0]."' and maid='".$row[0]."' and pid=0 and del_status=0 and id=".$row1[0];
					   $q2=mysqli_query($con1,$sql2);
					   $c4++;
					   
				   }
	               
	           }
             }
	}
}

?>