 <?php session_start();
 $project_name="";
 $db1="main";
 $date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
 $current_time=$date_location->format('H:i:s');
 $current_date=$date_location->format('Y-m-d');
 $timestamp= $current_date." ".$current_time;
 $response =array();
require "DB_connect.php";
if(isset($_POST['project_name']) && isset($_SESSION['empid']))
{
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
if($rname[1]=="Manager")
{
	$project_name=str_replace(" ","_",trim($_POST['project_name']));
	$_SESSION['variable']=$project_name;
    $noofa = $_POST['noofa'];
	$nick_name=$_POST['nick_name'];
	$sql= "select * from projects where name='".$project_name."'";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
	//project name already exists
	$code = 101;
	array_push($response,array("code"=>$code));
	echo json_encode($response);
	die();
		}
		$host = "localhost";
		$port = 3307;
        $db_c=mysqli_connect($host.':'.$port,"root","");
		$db_create="create database $project_name";
        $db_check=mysqli_query($db_c,$db_create);
        if(!$db_check)
        {
           
            die();
        }


/*
if(isset($_FILES['excel']) && $_FILES['excel']['size']>0)
{
	$con1 = mysqli_connect($servername, $username, $password,$project_name);		
	//to create a unique project table	
	$sql = "CREATE TABLE  ".$project_name."_parts(
 pid int(11) NOT NULL,
 id int(11) NOT NULL AUTO_INCREMENT,
 p_type varchar(40) NOT NULL,
 description text NOT NULL,
 partnumber varchar(50) NOT NULL,
 revision varchar(20) NOT NULL DEFAULT '0',
 quantity varchar(5) NOT NULL,
 del_status varchar(2) NOT NULL DEFAULT '0',
 model_no varchar(50) DEFAULT NULL,
 material text,
 md varchar(50),
 nha varchar(50),
 last_edited varchar(50),
 maid varchar(11),
 error varchar(2),
 make varchar(100),
 thickness varchar(300),
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if (mysqli_query($con1, $sql)) {
    echo "Table '$project_name' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
	
$sql1234="CREATE TABLE `vendor_enquiry` (
 `make` varchar(200) NOT NULL,
 `vid` varchar(100) NOT NULL,
 `model_no` varchar(100) NOT NULL,
 `description` varchar(100) NOT NULL,
 `quantity` varchar(50) NOT NULL,
 `price` int(30) NOT NULL,
 `delivery_date` varchar(50) NOT NULL,
 `status` varchar(20) NOT NULL,
 `selection` varchar(20) NOT NULL,
 `color` varchar(15) NOT NULL,
 `locker` varchar(10) NOT NULL,
 PRIMARY KEY (`make`,`vid`,`model_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	
if (mysqli_query($con1, $sql1234)) {
    echo "Table 'Vendor _ details' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
 
$sql12345="CREATE TABLE matrix (
 make varchar(100) NOT NULL,
 vid varchar(10) NOT NULL,
 cost varchar(10) NOT NULL,
 transport varchar(10) NOT NULL,
 rating varchar(10) NOT NULL,
 ref_date varchar(10) NOT NULL,
 subject_c varchar(200) NOT NULL,
 delivery_addr text NOT NULL,
 top varchar(100) NOT NULL,
 ppt varchar(100) NOT NULL,
 bank text NOT NULL,
 pno varchar(10) NOT NULL,
 idle varchar(1) NOT NULL,
 referenceno varchar(250) NOT NULL,
 PRIMARY KEY (make,vid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	
if (mysqli_query($con1, $sql12345)) {
    echo "Table 'matrix' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}	

$sql54321="CREATE TABLE po_log (
 sno varchar(10) NOT NULL,
 pno varchar(3) NOT NULL,
 vid varchar(20) NOT NULL,
 acy varchar(5) NOT NULL,
 url varchar(300) NOT NULL,
 PRIMARY KEY (vid,acy)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sql54321)) {
    echo "Table 'po_log' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}	
	
$sql1="CREATE TABLE ".$project_name."_activity_log (
 id int(11) NOT NULL AUTO_INCREMENT,
 eid varchar(50) NOT NULL,
 time varchar(50) NOT NULL,
 action text NOT NULL,
 reason text NOT NULL,
 part_id int (11),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sql1)) {
    echo "Table '$project_name' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
	
$sqlnep="CREATE TABLE po_chat (
 sno int(11) NOT NULL AUTO_INCREMENT,
 vid varchar(6) NOT NULL,
 msg text NOT NULL,
 empid varchar(10) NOT NULL,
 seen_stat text NOT NULL,
 del_status int(1) NOT NULL,
 timestamp varchar(25) NOT NULL,
 PRIMARY KEY (sno)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sqlnep)) {
    echo "Table 'po_chat' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}	

$sqlstage1="CREATE TABLE ".$project_name."_stage1 (
 phaseno int(11) NOT NULL AUTO_INCREMENT,
 name varchar(200) NOT NULL,
 started varchar(20) NOT NULL,
 ended varchar(20) NOT NULL,
 status int(2) NOT NULL,
 PRIMARY KEY (phaseno)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1";

if (mysqli_query($con1, $sqlstage1)) {
    echo "Table '$project_name'stage created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}

$sqlstage="CREATE TABLE ".$project_name."_stage (
 name varchar(300) NOT NULL,
 url varchar(200) NOT NULL,
 stage varchar(50) NOT NULL,
 eid int(11) NOT NULL,
 description text NOT NULL,
 time varchar(50) NOT NULL,
 issued varchar(10) NOT NULL,
 PRIMARY KEY (name,stage),
 UNIQUE KEY url (url)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sqlstage)) {
    echo "Table '$project_name'stage created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con);
	}
	
	$sql1="CREATE TABLE ".$project_name."_msg_log (
 id int(11) NOT NULL AUTO_INCREMENT,
 timestamp varchar(100) NOT NULL,
 vid varchar(100),
 vname varchar(100) NOT NULL,
 make varchar(100) NOT NULL,
 msg_det mediumtext NOT NULL,
 components mediumtext NOT NULL,
 status varchar(10) NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1";

if (mysqli_query($con1, $sql1)) {
    echo "Table '$project_name' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
	
	
	//to insert into projects table
	$time=$current_date." ".$current_time;
	$sql="INSERT INTO projects VALUES('','$project_name','$time','0','','$nick_name')";
	if (mysqli_query($con, $sql)) {
    echo "Inserted into Table projects ";

	} else {
	echo "Error creating table: " . mysqli_error($con);
	}
   $sql="select pid from projects where name='$project_name'";
   $q_pid=mysqli_query($con, $sql);
   $r=mysqli_fetch_array($q_pid);
   $pid=$r[0];


	
	$sql="insert into activity_log values('',$pid,'admin','$time','admin created Project using Excel Upload','New Project')";
	$q_a=mysqli_query($con, $sql);

include_once("excelupload.php");  // to upload data
include_once("new3.php"); // to generate the pids


echo $del_col="alter table ".$project_name."_parts drop md,drop nha";
mysqli_query($con1,$del_col);





}
*/
/*
else
{
*/
		$con1 = mysqli_connect($servername, $username, $password,$project_name,3307);		
	//to create a unique project table	
	$sql = "CREATE TABLE  ".$project_name."_parts(
 pid int(11) NOT NULL,
 id int(11) NOT NULL AUTO_INCREMENT,
 p_type varchar(40) NOT NULL,
 description text NOT NULL,
 partnumber varchar(50) NOT NULL,
 revision varchar(20) NOT NULL DEFAULT '0',
 quantity varchar(5) NOT NULL,
 del_status varchar(2) NOT NULL DEFAULT '0',
 model_no varchar(50) DEFAULT NULL,
 material text,
 last_edited varchar(50),
 maid varchar(11),
 error varchar(2),
 make varchar(100),
 thickness varchar(300),
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	if (mysqli_query($con1, $sql)) {
    echo "Table '$project_name' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
	
$sqlstage1="CREATE TABLE ".$project_name."_stage1 (
 phaseno int(11) NOT NULL AUTO_INCREMENT,
 name varchar(200) NOT NULL,
 started varchar(20) NOT NULL,
 ended varchar(20) NOT NULL,
 status int(2) NOT NULL,
 PRIMARY KEY (phaseno)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1";

if (mysqli_query($con1, $sqlstage1)) {
    echo "Table '$project_name'stage created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
/*
$sql1234="CREATE TABLE `vendor_enquiry` (
 `make` varchar(200) NOT NULL,
 `vid` varchar(100) NOT NULL,
 `model_no` varchar(100) NOT NULL,
 `description` varchar(100) NOT NULL,
 `quantity` varchar(50) NOT NULL,
 `price` int(30) NOT NULL,
 `delivery_date` varchar(50) NOT NULL,
 `status` varchar(20) NOT NULL,
 `selection` varchar(20) NOT NULL,
 `color` varchar(15) NOT NULL,
 `locker` varchar(10) NOT NULL,
 PRIMARY KEY (`make`,`vid`,`model_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	
if (mysqli_query($con1, $sql1234)) {
    echo "Table 'Vendor _ details' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}


$sql12345="CREATE TABLE matrix (
 make varchar(100) NOT NULL,
 vid varchar(10) NOT NULL,
 cost varchar(10) NOT NULL,
 transport varchar(10) NOT NULL,
 rating varchar(10) NOT NULL,
 ref_date varchar(10) NOT NULL,
 subject_c varchar(200) NOT NULL,
 delivery_addr text NOT NULL,
 top varchar(100) NOT NULL,
 ppt varchar(100) NOT NULL,
 bank text NOT NULL,
 pno varchar(10) NOT NULL,
 idle varchar(1) NOT NULL,
 referenceno varchar(250) NOT NULL,
 PRIMARY KEY (make,vid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
	
if (mysqli_query($con1, $sql12345)) {
    echo "Table 'matrix' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}	
$sql54321="CREATE TABLE po_log (
 sno varchar(10) NOT NULL,
 pno varchar(3) NOT NULL,
 vid varchar(20) NOT NULL,
 acy varchar(5) NOT NULL,
 url varchar(300) NOT NULL,
 PRIMARY KEY (vid,acy)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sql54321)) {
    echo "Table 'po_log' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
*/
$sqlstage="CREATE TABLE ".$project_name."_stage (
 name varchar(300) NOT NULL,
 url varchar(200) NOT NULL,
 stage varchar(50) NOT NULL,
 eid int(11) NOT NULL,
 description text NOT NULL,
 time varchar(50) NOT NULL,
 issued varchar(10) NOT NULL,
 PRIMARY KEY (name,stage),
 UNIQUE KEY url (url)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sqlstage)) {
    echo "Table '$project_name'stage created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
/*	
$sql="CREATE TABLE ".$project_name."_activity_log (
 id int(11) NOT NULL AUTO_INCREMENT,
 eid varchar(50) NOT NULL,
 time varchar(50) NOT NULL,
 action text NOT NULL,
 reason text NOT NULL,
 part_id int (11),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";

if (mysqli_query($con1, $sql)) {
    echo "Table '$project_name' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}

	$sql1="CREATE TABLE ".$project_name."_msg_log (
 id int(11) NOT NULL AUTO_INCREMENT,
 timestamp varchar(100) NOT NULL,
 vid varchar(100),
 vname varchar(100) NOT NULL,
 make varchar(100) NOT NULL,
 msg_det mediumtext NOT NULL,
 components mediumtext NOT NULL,
 status varchar(10) NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1";

if (mysqli_query($con1, $sql1)) {
    echo "Table '$project_name' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}
	
	$sqlnep="CREATE TABLE po_chat (
 sno int(11) NOT NULL AUTO_INCREMENT,
 vid varchar(6) NOT NULL,
 msg text NOT NULL,
 empid varchar(10) NOT NULL,
 seen_stat text NOT NULL,
 del_status int(1) NOT NULL,
 timestamp varchar(25) NOT NULL,
 PRIMARY KEY (sno)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1";
if (mysqli_query($con1, $sqlnep)) {
    echo "Table 'po_chat' created successfully";
	} else {
   echo "Error creating table: " . mysqli_error($con1);
	}	
	
*/
	
	//to insert into projects table
	$time=$current_date." ".$current_time;
	$sql="INSERT INTO projects VALUES('','$project_name','$time','0','','$nick_name')";
	if (mysqli_query($con, $sql)) {
    echo "Inserted into Table projects ";

	} else {
	echo "Error creating table: " . mysqli_error($con);
	}
   $sql="select pid from projects where name='$project_name'";
   $q_pid=mysqli_query($con, $sql);
   $r=mysqli_fetch_array($q_pid);
   $pid=$r[0];


	/*
	$sql="insert into activity_log values('',$pid,'admin','$time','admin created $noofa assemblies','New Project')";
	$q_a=mysqli_query($con, $sql);
	*/

   for($i=1;$i<=$noofa;$i++)
   {
   	$sql="insert into ".$project_name."_parts values(0,'','A".$i."','Assembly".$i."','','0','1','0','','','$time','A".$i."','0','','')";
	$q_parts=mysqli_query($con1, $sql);
	
   }

  /* 
$sql_status_check="insert into  ".$project_name."_activity_log values('','0','$time','','ControlCopy')";
mysqli_query($con1,$sql_status_check);*/

		
/*}*/
$a1=$project_name."_files";
$a2=$project_name."_documents";
if (!file_exists($a1)) {
    mkdir($a1, 0777, true);
}
if (!file_exists($a2)) {
    mkdir($a2, 0777, true);
}
echo"<script>alert('successfully created');window.location.href='accesspage.php';</script>";
}
else{
	
echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";

}
}
else{
	echo "hi";
}

?>
		
	

 