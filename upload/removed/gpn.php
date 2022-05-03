<?php
$db1=$_POST['tab'];
require "DB_connect.php";
$sql="select p_type from ".$db1."_parts where pid=0";
$q=mysqli_query($con1,$sql);
if(mysqli_num_rows($q)>0)
{
	while($row=mysqli_fetch_array($q))
	{
		$c1=1;
		$c2=1;
		$c3=1;
		$sql1="select id,p_type from ".$db1."_parts where maid='".$row[0]."'  order by pid";
		$q1=mysqli_query($con1,$sql1);
		if(mysqli_num_rows($q1)>0)
            {
				
				
				
	          while($row1=mysqli_fetch_array($q1))
	           {
				   if($row1[1]=="BP")
				   {
					  // echo "BP".;
					   $sql2="update ".$db1."_parts set partnumber='BP-".$row[0]."-".$c1."' where p_type='BP' and maid='".$row[0]."' and pid!=0";
					   $q2=mysqli_query($con1,$sql2);
					   $c1++;
				   }
				   else if($row1[1]=="FP")
				   {
					   $sql2="update ".$db1."_parts set partnumber='FP-".$row[0]."-".$c2."' where p_type='FP' and maid='".$row[0]."' and pid!=0";
					   $q2=mysqli_query($con1,$sql2);
					   $c2++;
				   }
				   else if($row1[1]=="FA")
				   {
					   $sql2="update ".$db1."_parts set partnumber='FA-".$row[0]."-".$c2."' where p_type='FA' and maid='".$row[0]."' and pid!=0";
					   $q2=mysqli_query($con1,$sql2);
					   $c3++;
				   }
				   else
				   {
					   $sql2="update ".$db1."_parts set partnumber='".$row[0]."' where p_type='".$row[0]."' and maid='".$row[0]."' and pid=0";
					   $q2=mysqli_query($con1,$sql2);
					   
				   }
	               
	           }
             }
	}
}

?>