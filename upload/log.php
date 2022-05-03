<?php session_start();
ob_start();
function show($empid,$timestamp)
	{
		$notifyc=0;
	/*$date_locationch = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $current_datech=$date_locationch->format('Y-m-d');
	$specific_datech=date('Y-m-d', strtotime($current_datech. ' + 3 days'));*/
		
	$empid=$empid;
$project_name=$_SESSION['pname'];
$db1=$project_name;
require ("DB_connect.php");
$tab=$project_name;

//$login_user="insert into ".$project_name."_activity_log values('','$empid','$timestamp','logged in','')";
//mysqli_query($con1,$login_user);


$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
$user_name=$rname[0];

$ac=0;
$sql_acc="select * from ".$project_name."_access_rights where eid=$empid and rights=1";
$q_acc=mysqli_query($con1,$sql_acc);
if(mysqli_num_rows($q_acc)>0)
{
	$ac=1;
}

/*
$sql_cc="select action from ".$project_name."_activity_log where reason='ControlCopy' order by time";
$q_cc=mysqli_query($con1,$sql_cc);
$row_cc=mysqli_fetch_array($q_cc);
$cc_action=$row_cc[0];
*/

if($rname[1]=="Manager")
{
	$ac=1;
}

?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="description">
  <meta name="keywords" content="HTML,CSS,JavaScript,Php">
  
<title><?php  echo $project_name; ?></title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-chosen.css">

<style>
element {
}
.modal-header{
background-color:#5f5f5f;
	color:white;

}
.chosen-container-single .chosen-single div b {
    background:  no-repeat 0 7px;
    display: block;
    height: 100%;
    width: 100%;
}

.btn-blue{
	background-color:blue;
	color:white;
}
.btn-blue:hover {
    color: white;
    background-color:#1345ce;
    border-color: #1345ce;
}
.bg-pur {
    background-color: #494c4e !important;
}
.navbar {
    padding-bottom: 0rem;
}
.navbar-brand {
    display: inline-block;
    padding-top: 0rem;
    padding-bottom: 0rem;
	margin-top:-10px;
    margin-right: 1rem;
   font-size:23px ;
    line-height: inherit;
    white-space: nowrap;
}
dl, ol, ul {
    margin-top: -10px;
   
}


.navbar-light .navbar-brand {
    color: rgba(255, 255, 255, 0.9);
}
.navbar-light .navbar-brand:focus, .navbar-light .navbar-brand:hover {
    color: rgb(252, 247, 247);
}
.nav-item .nav-link{
	
	font-size:20px;
	color:rgb(46, 252, 23) !important;
}
.navbar-light .navbar-nav .active > .nav-link, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .nav-link.show, .navbar-light .navbar-nav .show > .nav-link {
    color: rgb(46, 252, 23);
}
.nav-item .active{
	color:rgb(252, 251, 23) !important;
}
.side{
  position:fixed;
  top:0;
  left:0;
  height:100%;
  padding:0;
}

.scroll-area{
  width:100%;
  height:calc(100% - 200px);
  margin-top:100px;
  background-color:green;
  float:left;
  overflow-y:scroll;
}
#fab_dir{
	    min-height:93.99vh;
	    max-height:94vh;
	    overflow-y: auto;
		
}
#directory_sub
{
	    
	    max-height:93vh;
	    overflow-y: auto;	
}
.p1{
	cursor:pointer;
}
.p1 >p{
	font-size:13.5px;
	text-wrap:normal;
	cursor:pointer;
}

#userNav {
	position:fixed;
	top:30%;
	right:0;
    width: 180px;
    height: 372px;
    display: none;
    background: #111;
}
#userNav > button{
	width: 100%;	
}
.cb_size{
	display:none;
}
.img_data{
	cursor:pointer;
}
/*
.custom-menu{
	position:absolute;
	display:none;
	width:300px;
	background-color:black;
}
.custom-menu>button{
	text-align:left;
	width:100%;
}*/
.custom-menu{
	            
				width: 200px;
				height: auto;
				box-shadow: 0 0 20px 0 #ccc;
				position: absolute;
				display: none;
				background-color:white;
			}

			.custom-menu ul{
				list-style: none;
				padding: 5px 0px 5px 0px;
			}

			.custom-menu ul li:not(.separator){
				padding: 10px 5px 10px 5px;
				border-left: 4px solid transparent;
			}
			.custom-menu ul li:not(.disabled){
				
				cursor: pointer;
			}

			.custom-menu ul li:hover{
				background: #eee;
				border-left: 4px solid #666;
			}
.watch{
	display:none !important;
}
			
.disabled{
    pointer-events:none;
    opacity:0.7;
	background-color:#ede8e8;
}
.disabled:hover{
	cursor: none;
}
.stick1{
	position:absolute;
	width:100%;
	display:inline-block;
	background-color:#5f5f5f;
	z-index:102;
	
}
.modal{
	z-index:10003;
}
.stick1 >button{
	margin-top:7px;
}
.bg-dark1{
	background-color:#5f5f5f;
	color:white;
}
.bg-tansparent{
	background-color:transparent;
	color:white;
}
.loader {
	position: relative;
	top:40%;
	left:50%;
	display: grid;
	grid-template-columns: 33% 33% 33%;
	grid-gap: 2px;
	width: 80px;
	height: 80px;
	
	
}
.loader div{
		position: relative;
		display: inline-block;
		width: 100%;
		height: 100%;
		background: tomato;
		transform: scale(0.0);
		transform-origin: center center;
		animation: loader 2s infinite linear;
		
		
	
}
.loader div:nth-child(7) {}
.loader >div:nth-child(1){
			animation-delay: 0.4s;
		}
.loader >div:nth-child(5){
			animation-delay: 0.4s;
		}
.loader >div:nth-child(9){
			animation-delay: 0.4s;
		}		
.loader >div:nth-child(4){
			animation-delay: 0.2s;
		}
.loader >div:nth-child(8){
			animation-delay: 0.2s;
		}
.loader >div:nth-child(2){
			animation-delay: 0.6s;
		}
.loader >div:nth-child(6){
			animation-delay: 0.6s;
		}
.loader >div:nth-child(3){
			animation-delay: 0.8s;
		}
@keyframes loader {
	0%   { transform: scale(0.0); }
	40%  { transform: scale(1.0); }
	80%  { transform: scale(1.0); }
	100% { transform: scale(0.0); }
}
.total_web{
	width:100%;
	position:fixed;
	height:99vh;
	background-color:#a6a1a166;
	z-index:99999;
}
.top1{
	margin-top:60px;
}
.list-group{
	margin-top:10px;
}



.dropbtn {
    background-color: transparent;
    color: white;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: transparent;
}

.dropdown {
    float: right;
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    right: 0;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: transparent;}

.show {display: block;}
.icon{
	margin-top:5px;
}
.treestruct ul{
	overflow: scroll;
	margin-top:20px;
	width:100%;
	min-height:90vh;
	    max-height:95vh;
		display: -webkit-box;
display: -ms-flexbox;
display: block;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-direction: column;
flex-direction: column;
padding-left: 0;
margin-bottom: 0;
}
.treestruct ul li{
	list-style:none;
	width:100%;
    padding: .35rem .25rem;
	white-space: nowrap;
	
    
}
.treestruct ul li {
	cursor:pointer;  
}

.treestruct{
	    min-height:91vh;
	    max-height:98vh;		
}
#modelno_chosen {
    margin-top: 10px;
}
.btnp0{
	padding:0px;
}
.akm >.col-sm-4.selected {

    background-color: #ffeb9c;
    font-weight: 600;
 
}
.akm > .col-sm-4:hover{

    background-color: #ffeb9c;
    font-weight: 600;

}
body{
	line-height:1.18 !important;
}
.kvi:focus,.kvi:hover{
	color:#0ef31a !important;
}

li .door:hover{
	font-weight:bold;
	margin-left:4px;
}
</style>
</head>
<body id="exampleImage">
<button id="btnFullscreen" hidden type="button">Toggle Fullscreen</button>
<div class="total_web">
<div class="loader">
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
	<div></div>
</div>
</div>

<nav class="navbar fixed-top navbar-light bg-dark1 navbar-expand-lg" style="border-bottom:2px solid white;">
  <a class="navbar-brand " href="log.php">
    <?php  echo str_replace("_"," ",$project_name); ?>
  </a>
  <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbar">
        <i class="fa fa-bars fa-2x " style="margin-top:-5px;"></i>
      </button>
  <div class="collapse navbar-collapse flex-column" id="navbar">
    <!--<ul class="navbar-nav nav  w-100">
	
     <li class="nav-item  pr-4">
        <a class="nav-link active" id="ascl" href="log.php">Assembly<span class="sr-only">(current)</span></a>
      </li>
	  
      <li class="nav-item pr-4">
        <a class="nav-link" href="log1.php">Bought-Out</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="log2.php">Fabricated</a>
      </li>
	  <li class="nav-item ml-auto">
       
	   <div class="nav-item h5 mt-2 mr-3"><?php if($ac==1){  ?> <button onclick="genp()" class="btn btn-md btn-warning" style="padding-top:0px;padding-bottom:0px">Generate PartNo</button><?php } ?></div>
      </li>
	  
	  <li class="nav-item ">
       
	   <div class="nav-item h5 mt-2 mr-3"><?php if($ac==1){ ?> <input <?php echo $cc_action; ?> type="checkbox" id="control_copy" class=""> Control Copy <?php } ?></div>
      </li>
		
	  <li class="nav-item  dropdown" hidden><a href="javascript:myFunction2()" class="nav-link " ><i class="fa fa-bell text-warning"></i><sup id="notifyc" class="text-light font-weight-bold"></sup></a>
	
	  <div id="myDropdown1" class="dropdown-content" style="min-width:350px;">-->
	  <!--
	  <?php
	  $sqlnotify="select * from po_response p,vendor_details v where pname='$db1' and delivery between '$current_datech' and '$specific_datech' and v.vid=p.vid order by p.delivery";
	  $qnotify=mysqli_query($con,$sqlnotify);
	  if(($notifyc=mysqli_num_rows($qnotify))>0)
	  {
		  while($row=mysqli_fetch_array($qnotify))
		  {
			  
			  
			  echo '<a href="#">'.$row['vname'].'<br> Delivery Date : '.date_format(date_create($row['delivery']),"d-m-Y").'</a>';
		  }
	  }
	  ?>-->
	  
    
    
  </div>
  </li>
	  <li class="nav-item dropdown ">
          <a href="javascript:myFunction1()" class="nav-link dropbtn">USER : <?php echo strtoupper($user_name)."/".strtoupper($rname[1]); ?> </a>
  <div id="myDropdown" class="dropdown-content">
    <a href="projectslist.php">All Projects </a>
	<a href="logout.php">Logout</a>
  </div>
  </li>
    </ul>
  </div>
</nav>

<!--<nav class="navbar navbar-expand-lg navbar-light bg-pur fixed-top">
  <a class="navbar-brand text-uppercase" href="#"><?php  //echo $project_name; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="text-light"><i class="fa fa-2x fa-bars"></i></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" id="ascl" href="javascript:active_status('assemble')">Assembly<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="log1.php">Bought-Out</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="log2.php">Fabricated</a>
      </li>
    
    </ul>
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item ">
        <a class="nav-link" href="#" style="color:white;!important"><?php echo strtoupper($user_name); ?></a>
      </li>
	 </ul>
  </div>
  </nav>-->	
<div class="container-fluid " style="margin-top: 45px;">
<div class="row assemble">
<div class="col-md-1 bg-dark1" style="padding:0px">
                   <a href="documents.php" style="position:fixed;left:0px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-files-o "></i><br class="h6" style="margin-bottom:0rem;">Documents</br></button></a>
                   <a href="log.php" style="position:fixed;left:0px;top:145px;min-width:8.33333%;"> <button class="btn bg-light btnp0"style="width:100%;height:100px; border-radius:0rem;border-left:4px solid tomato;"><i class="fa fa-2x fa-list"></i><br class="h6" style="margin-bottom:0rem;">Assemblies </br></button></a>
					<!--<a href="../vendor/vmview.php" style="position:fixed;left:0px;top:250px;min-width:8.33333%;"> <button class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-users"></i><br class="h6" style="margin-bottom:0rem;">Vendor<br>Management</br></button></a>
					<a href="../vendor/inputfeed.php" style="position:fixed;left:0px;top:350px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-info-circle "></i><br class="h6" style="margin-bottom:0rem;">INPUT FEED</br></button></a>
					<a href="stats.php" style="position:fixed;left:0px;top:435px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-pie-chart"></i><br class="h6" style="margin-bottom:0rem;">Statistics</br></button></a>
					<a href="feedback.php" style="position:fixed;left:0px;top:520px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-text-width"></i><br class="h6" style="margin-bottom:0rem;">Ticket System</br></button></a>
					-->
                 
</div>
<div class="col-md-3 bg-light" style="border-right:2px solid black" >
<div class="treestruct">
<ul style="">
<li value="0"><rock class="door"><span class="fa fa-folder" level="0" id="home_click" onclick="treextract(this,'n0')"></span> <span onclick="assem_c(0)">&nbsp;<?php  echo $project_name; ?></span></rock></li>
<!--<li value="0"><span class="fa fa-trash" level="0" id="recycle_click" ></span> <span onclick="r">&nbsp;Recycle Bin</span></li>-->
</ul>
</div>
</div>
<div class="col-md-7 pst bg-light">
<div class="w-100">
<div class="row bg-light akm" id="directory_sub">









</div>
</div>
</div>
<div class="col-md-1 bg-dark1" style="padding:2px;">
                   <button  class="btn bg-light <?php if($ac!=1){ echo "disabled";  }  ?>" style="width:100%;height:100px; border-radius:0rem;margin-top:1px;" data-toggle="modal" onclick="side_close()" data-target="#add"><i class="fa fa-2x fa-plus"></i><br class="h6" style="margin-bottom:0rem;" >ADD</br></button>
					<button class="btn  bg-light mt-1  <?php if($ac!=1){ echo "disabled";  }  ?>"  onclick="show_check(this)" style="width:100%;height:100px;"><i class="fa fa-2x fa-trash-o"></i><br class="h6" style="margin-bottom:0rem;border-radius:0rem;">DELETE</br></button>
					<!--<button class="btn bg-light mt-1   <?php if($ac!=1){ echo "disabled";  }  ?>" style="width:100%;height:100px;border-radius:0rem;" data-toggle="modal" onclick="side_close();upload_dt()" data-target="#excel_upload"><i class="fa fa-2x fa-upload"></i><br class="h6" style="margin-bottom:0rem;">Upload Excel</br></button>
					<button class="btn bg-light mt-1   <?php if($ac!=1){ echo "disabled";  }  ?>" style="width:100%;height:100px;border-radius:0rem;" data-toggle="modal" onclick="side_close();upload_dt()" data-target="#files_upload"><i class="fa fa-2x fa-upload"></i><br class="h6" style="margin-bottom:0rem;">Upload Files</br></button>
					-->
</div>
</div>






<input type="text" id="cnt" hidden>
<input type="text" id="parent_i" hidden>
<input type="text" id="id" hidden>
<input type="text" id="action_data" hidden>
<div id="userNav"><button class="btn btn-success mt-2 mr-2 text-center"  data-toggle="modal" onclick="side_close()" data-target="#add" style="display:block;width:100%;"><i class="fa fa-plus "></i> Add</button>
<button class="btn btn-danger mt-2 mr-2 text-center"  onclick="show_check(this)" style="display:block;width:100%;"><i class="fa fa-trash " ></i> Delete</button><button class="btn btn-warning mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-pencil"></i> Edit</button><button class="btn btn-blue mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-arrows"></i> Move</button><button class="btn btn-blue mt-2 mr-2 text-center" style="display:block;width:100%;"   data-toggle="modal" onclick="side_close();upload_dt()" data-target="#excel_upload"><i class="fa fa-upload"></i> Upload</button><button class="btn btn-warning mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-th-list"></i> Report Progress</button><button class="btn btn-danger mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-users"></i> Audit Trail</button><button class="btn btn-success mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-history"></i> Revision History</button>
</div>

<!--
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle1">Project Name : <?php echo $project_name ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	    <div class="w-100">
		 <div class="row">
			<div class="col-sm-12"> <p class="h3 text-center font-weight-bold" id="descript">Name</p></div>
		 </div>
		 <div class="row" id="details_all">
			 <div class="col-sm-8">
			      <table class="table table-bordered">
				   <tbody >
				     <tr>
					   <th>Model No</th>
					   <td>1234</td>
					 </tr>
					 <tr>
					   <th>Make</th>
					   <td>1234</td>
					 </tr>
					 <tr>
					   <th>Description</th>
					   <td>bfhdfchkvjkskbvfdn</td>
					 </tr>
					 <tr>
					   <th>PartNo</th>
					   <td>fdfbhndfhbhjv</td>
					 </tr>
					 <tr>
					   <th>Revision</th>
					   <td>0</td>
					 </tr>
					 <tr>
					   <th>Quantity</th>
					   <td>0</td>
					 </tr>
					 <tr>
					   <th>Available Quantity</th>
					   <td>16</td>
					 </tr>
					 <tr>
					   <th>Infant Mortality</th>
					   <td>0</td>
					 </tr>
				   </tbody>
				  </table>
			 </div>
			 <div class="col-sm-4">
			 <p class="h5 text-left font-weight-bold">Specifications</p>
			 <table class="table">
			 <tr>
			 vfhdbjvbhdfbhvh<br>
			 <b class="mt-5">Links</b><br>
			 <a class="float-left">link1</a><br>
			 <a class="float-left">link2</a><br>
			 <a class="float-left">link3</a>
			 </tr>
			 </table>
			 </div>
			 </div>
		 </div>
      </div>
    </div>
  </div>
</div>
	-->

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add New Assembly or Part</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
		<div class="col-3"><label class="mt-1" >Type</label></div><div class="col-9"><select class="form-control" id="type"><option value="00A" selected>Assembly</option><option value="00P">Part</option></select></div>
		<div class="col-3 mt-2"><label class="mt-1">Name</label></div><div class="col-9 mt-2" id="suby"><input id="nameap" type="text" class="form-control"></div>
		<div class="col-3 mt-2 add_mdl"><label class="mt-1">Model No /<br>Name </label></div><div class="col-9 mt-2 add_mdl" id="sub_model">
		<select  class="chosen-select"  id="modelno"><option value=""></option><?php  $sql123="select * from component order by modelno"; $q123=mysqli_query($con,$sql123);if(mysqli_num_rows($q123)>0){ while($row123=mysqli_fetch_array($q123) ){ echo "<option value='".$row123['modelno']."'>".$row123['modelno']."</option>";   } } ?><?php  $sql1234="select modelno,name from component order by modelno"; $q1234=mysqli_query($con,$sql1234);if(mysqli_num_rows($q1234)>0){ 
		while($row1234=mysqli_fetch_array($q1234) ){ 
            $name_dir=explode(",",$row1234['name']);
			$i=0;
			while($i<count($name_dir))
			{
				echo "<option value='".$row1234['modelno']."'>".$name_dir[$i]."</option>";
				$i++;
			}

		} } ?></select>
		</div>
		</div>
		<div class="form-row mt-1" id="ptw">
		
		</div>
		<div class="form-row mt-1" id="data_pt">
			
		</div>
		<div class="form-row mt-1" id="data_thick">
		<div class="col-3 mt-2 "><label class="mt-1">Thickness </label></div><div class="col-9 mt-2" ><input type="text" id="thickness" class="form-control"></div>
			
		</div>
		<div class="form-row mt-1" id="err">
		
		</div>
      </div>
      <div class="modal-body">
        <a class="float-left mt-2" id="new_comp" hidden onclick="add_bcomp()" href="#">Add New Boughtout Component</a>
        <button type="button" class="btn btn-primary float-right" onclick="add_new()">ADD</button>
      </div>
    </div>
  </div>
</div>


<!--
<div class="modal fade" id="excel_upload" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload Excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post"  action="excelall.php" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-row">
		<input type="text" id="pt_id" name='ptid' hidden class="form-control">
		<div class="col-4"><label class="mt-2">Select Excel</label></div>
		<div class="col-8"><input type="file" required name='excel' class="form-control"></div>
		</div>
      </div>
	  <div class="">
	  <p class="text-center font-weight-bold">Format Of Excel</p>
	  <img src="img/capture.png" class="img-fluid ">
	  </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary" >Upload</button>
      </div>
	  </form>
    </div>
  </div>
</div>

	
 
<div class="modal fade" id="files_upload" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload files</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form method="post"  action="filesall.php" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-row">
		<input type="text" id="pt_id" name='ptid' hidden class="form-control">
		<div class="col-4"><label class="mt-2">Select files</label></div>
		<div class="col-8"><input type="file" multiple required name='upload[]' class="form-control"></div>
		</div>
      </div>
	  
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary" name="submit1">Upload</button>
      </div>
	  </form>
    </div>
  </div>
</div>


 
 
<div class="modal fade" id="revision_hist" tabindex="-1" role="dialog" aria-labelledby="addTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="revision_nm"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	 
      <div class="modal-body">
        <div class="table-responsive" id="revision_tab">
		
		
		
		</div>
      </div>
	 
    </div>
  </div>
</div>
	-->
<div class='custom-menu'>
  <ul style="margin-bottom:1px;">
  
   <li  data-id="0"  id="modify" class="dbled" <?php if($ac!=1){ echo "hidden";  }  ?>>Modify Quantiity</li>
   <li  data-pid="0" data-name="something" class="dbled" id="editval" <?php if($ac!=1){ echo "hidden";  }  ?>> Rename</li>
 <!-- <li  data-id="0" data-name="" class="dbled" id="cut" <?php if($ac!=1){ echo "hidden";  }  ?>>Cut</li>
  <li  data-id="0"  id="copy"  class="dbled" <?php if($ac!=1){ echo "hidden";  }  ?>>Copy</li>
  <li  data-id="0" data-name="" class="disabled dbled" id="paste"  <?php if($ac!=1){ echo "hidden";  }  ?>>Paste</li>
  
  <li  data-id="0" data-name="something" class="dbled" id="revise" <?php if($ac!=1){ echo "hidden";  }  ?>>Revise</li>
  <li  data-id="0" data-name="something" class="dbled" id="revisionhistory" data-toggle="modal" data-target="#revision_hist" onclick="revision_hshow(this)">Revision History</li>
  <li  data-id="0" data-pid="0" data-name="something" data-toggle="modal"  data-target="#details" id="details_show"  class="dbled">Details</li>
	-->
</ul>

</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script src="js/bootstrap-treeview.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">

console.log(screen.height+ "  "+screen.width+" "+$('.custom-menu').height());

/*
function revision_hshow(e)
{
	var tab='<?php  echo $project_name; ?>';
	var id=$(e).attr("data-id");
	var name=$(e).attr("data-name");
	$('#revision_nm').text(name+' Revision History');
	$.ajax({
		url:'revision_hist.php',
		type:'post',
		dataType:'html',
		data:{tab:tab,id:id},
		success:function(d)
		{
			console.log(d);
			$('#revision_tab').empty();
			$('#revision_tab').append(d);
		}
	});
	
	
}*/
function add_bcomp()
{
	var pid=$('#parent_i').val();
	window.location.href="add_bcomp.php?pid="+pid;
}
function upload_dt()
{
	$('#pt_id').val($('#parent_i').val());
}
function check_ext(e)
{
	
    var fileName = e.value;
    var fileExtension = fileName.substr(fileName.length - 4);

    console.log(fileExtension);
    if (fileExtension != ".xls") {
        alert("That ain't no .xls file!");
    }
return false;
}
function change_rev_data()
{
	$('#br').removeClass("btn-danger");
	$('#br').addClass("btn-success");
	$('#ba').removeClass("btn-success");
	$('#ba').addClass("btn-danger");
	$('#revision_display').removeAttr("hidden");
	$('#revision_entry').attr("hidden","");
}
function change_rev_data1()
{
	$('#ba').removeClass("btn-danger");
	$('#ba').addClass("btn-success");
	$('#br').removeClass("btn-success");
	$('#br').addClass("btn-danger");
	$('#revision_entry').removeAttr("hidden");
	$('#revision_display').attr("hidden","");
}

/*
$('#cut').click(function()
{
	$('#action_data').val('cut');
	var copyid=$('#id').val();
	var pid=$('#parent_i').val();
	$('#id').val($(this).attr("data-id"));
   $('#paste').removeClass("disabled");
	
});
$('#paste').click(function()
{
	$('.total_web').removeAttr('hidden');
	
	var action_data=$('#action_data').val();
	var copyid=$('#id').val();
	var pid=$('#parent_i').val();
	var tab='<?php echo $project_name; ?>';
	
	$.ajax({
		url:'copycat.php',
		type:'post',
		dataType:'text',
		data:{tab:tab,paste:'paste',pid:pid,id:copyid,action:action_data},
		success:function(d)
		{
			console.log(d);
			load1();
		    if(!getdata('directory_sub','<?php  echo $project_name; ?>',pid))
			$('.total_web').attr('hidden','');
		}
	});
	if(action_data=="cut")
	{
		$('#paste').addClass("disabled");
	}
	
	
	
});
$('#copy').click(function()
{
   $('#action_data').val('paste');
   $('#id').val($(this).attr("data-id"));
   $('#paste').removeClass("disabled");
});

*/
function side_close()
{
	//$('#btn-op').click();
}
 function isNumeric(n)
  {
	  return !isNaN(parseFloat(n)) && isFinite(n);
  }
  
  function checker(name,tab)
  {
	  var a=0;
	  $.ajax({
		 url:'checker_desc.php', 
		 type:'post',
		 dataType:'text',
		 data:{name:name,tab:tab},
		 success:function(d){
			 console.log(d);
			if(parseInt(d))
            {
              a=1;
			}
            	
		 }
	  });
	  return a;
  }
function add_new()
{
	var user_id='<?php  echo $empid; ?>';
	var cc=$('#control_copy').is(':checked');
	var check_status="";
	if(cc==true)
	{
	   check_status="checked";	
	}
	var a=$('#type').val();
	//alert(a);
	
	if(!checker($('#nameap').val(),'<?php echo $project_name; ?>'))
	{
		
		$('#err').empty();
		
	if(a=="00A")
	{
		
		$('#err').empty();
		var name=$('#nameap').val();
		var pid=$('#parent_i').val();
		var materials=$('#materials').val();
		var thickness =$('#thickness').val();
		$.ajax({
			url:'add_new.php',
			type:'post',
			dataType:'text',
			data:{materials:materials,assem:'assembly',name:name,pid:pid,tab:'<?php echo $project_name; ?>',user_id:user_id,check_status:check_status,thickness:thickness},
			success:function(d)
			{
				console.log(d);
				if(d=="169")
				{
					$('.close').click();
					
					load1();
		            getdata('directory_sub','<?php  echo $project_name; ?>',pid); 
				}
			}
		});
	}
	else{
		var b=$('#ptype').val();
		//alert(b);
		if(b=="0BP")
		{
			
			var quant=$('#quant').val();
			var name=$('#nameap').val();			
			var pid=$('#parent_i').val();
			var modelno=$('#modelno :selected').val();
			var thickness =$('#thickness').val();
			var materials1 =$('#materials').val();
			
			if(name.length>0){
			if(isNumeric(quant))
			{
				
				 $('#err').empty();
                 $.ajax({
					url:'add_component.php',
                    type:'post',
                    dataType:'text',
                    data:{compo:'component',pid:pid,tab:'<?php  echo $project_name; ?>',quantity:quant,modelno:modelno,name:name,user_id:user_id,check_status:check_status,thickness:thickness,materials:materials1},
                    success:function(d)
					{

                    console.log(d);
					$('.close').click();
							load1();
		getdata('directory_sub','<?php  echo $project_name; ?>',pid);
					}					
					 
				 });
				
				
				   
				
			}
			else{
				
				var s='<p class="text-center text-danger">Please Enter a Valid Quantity</p>';
				$('#err').empty();
				$('#err').append(s);
			}
			}
			else{
				var s='<p class="text-center text-danger">Please Enter a Name</p>';
				$('#err').empty();
				$('#err').append(s);
				
			}
		}
		else{
			
			
			
			
			$('#err').empty();
		    var name=$('#nameap').val();
		    var pid=$('#parent_i').val();
		    var quant=$('#quant').val();
		    var materials=$('#materials').val();
			var thickness =$('#thickness').val();
			if(name.length>0){
			if(isNumeric(quant))
			{
				
					if(materials.length>0)
						{
				 $('#err').empty();
                 $.ajax({
					url:'add_component.php',
                    type:'post',
                    dataType:'text',
                    data:{compofab:'component',pid:pid,tab:'<?php  echo $project_name; ?>',quantity:quant,name:name,materials:materials,user_id:user_id,check_status:check_status,thickness:thickness},
                    success:function(d)
					{

                    console.log(d);
					$('.close').click();
							load1();
		getdata('directory_sub','<?php  echo $project_name; ?>',pid);
					}					
					 
				 });
				
				
				    }
					else{
						
					var s='<p class="text-center text-danger">Please Fill the Materials</p>';
				$('#err').empty();
				$('#err').append(s); 
				
					}
				
				
			}
			else{
				var s='<p class="text-center text-danger">Please Enter a Valid Quantity</p>';
				$('#err').empty();
				$('#err').append(s);
			}
			}
			else{
				var s='<p class="text-center text-danger">Please Enter a Name</p>';
				$('#err').empty();
				$('#err').append(s);
				
			}
			
			
			
			
			
		}
	}
	}
	else{
		var s='<p class="text-center text-danger">Description Already Exists</p>';
				$('#err').empty();
				$('#err').append(s);
	}
}
function app(a)
{
	$('.add_mdl').attr("hidden","");
	$('#data_thick').removeAttr('hidden');
	if(a=="00P")
	{
	str='<div class="col-3"><label class="mt-1">Part Type</label></div><div class="col-9"><select id="ptype" onchange="app1(this.value)" class="form-control"><option value="0FP">Fabricated</option><option value="0BP" selected>Bought Out</option></select></div><div class="col-3 mt-2"><label class="mt-1">Quantity</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="quant"></div>';
	$('#ptw').append(str);
	$('#data_pt').empty();
	var b=$('#ptype').val();
	app1(b);
	}
	else{
		$('#new_comp').attr("hidden","");
		var s2='<input id="nameap" type="text" class="form-control">';
		
		$('#suby').empty();
		$('#suby').append(s2);
		$('#ptw').empty();
		$('#data_pt').empty();
		str1='<div class="col-3 mt-2">Materials</div><div class="col-9 mt-2"><input id="materials" type="text" class="form-control"></div>';
		$('#data_pt').append(str1);
	}
	
}
function getdesc(modelno)
{
	
	$.ajax({
		url:'getnamemodel.php',
		data:{modelno:modelno},
		type:'post',
		dataType:'text',
		success:function(d)
		{
			console.log(d);
			$('#nameap').val(d);
		},
		error:function(e)
		{
			console.log(e);
		}
	});
	
}

function app1(a)
{
	//$('#nameap').attr("readonly","");
	var s2='<input id="nameap" type="text" class="form-control">';
	var s1='<select  class="chosen-select"  id="nameap" ><option value=""></option><?php  $sql123="select * from component"; $q123=mysqli_query($con,$sql123);if(mysqli_num_rows($q123)>0){ while($row123=mysqli_fetch_array($q123)){ echo "<option value=\'".$row123['modelno']."\'>".$row123['modelno']."</option>";   } } ?></select>';
	if(a=="0BP")
	{
		$('#data_thick').attr('hidden','');
		$('#new_comp').removeAttr("hidden");
		$('#suby').empty();
		$('#suby').append(s2);
		$('.add_mdl').removeAttr("hidden");
		$('#nameap').attr("readonly"," ");
	}
	else
	{
		$('#data_thick').removeAttr('hidden');
		$('#new_comp').attr("hidden","");
		$('#suby').empty();
		$('#suby').append(s2);
		$('.add_mdl').attr("hidden","");
		$('#nameap').removeAttr("readonly");
	}
	
	$('.chosen-select').chosen().change(function()
	{
		getdesc(this.value);
	});
	$('.chosen-single span:first-child').text("");
	str='';
	var str_cut='<div class="col-3 mt-2"><label class="mt-1">Specification 1</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="spec1"></div><div class="col-3 mt-2"><label class="mt-1">Specification 2</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="spec2"></div><div class="col-3 mt-2"><label class="mt-1">Specification 3</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="spec3"></div>';
	
	//str+='<div class="col-3 mt-2"><label class="mt-1">Make</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="make"></div><div class="col-3 mt-2"><label class="mt-1">Model</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="model"></div>';
	var strcut='<div class="col-3 mt-2">MD</div><div class="col-9 mt-2"><input id="dno" type="text" class="form-control"></div><div class="col-3 mt-2">NHA Drawing </div><div class="col-9 mt-2"><input id="nhadno" type="text" class="form-control"></div>';
	str1='<div class="col-3 mt-2">Materials/<br>Description</div><div class="col-9 mt-2"><input id="materials" type="text" class="form-control"></div>';
	if(a=="0BP")
	{
	$('#data_pt').empty();
	$('#data_pt').append(str+str1);	
	}
	else{
		$('#data_pt').empty();
		$('#data_pt').append(str1);	
	}
	
}

$('#type').on('change',function()
{
	 var a=$('#type').val();
	 $('#ptw').empty();
		 app(a);
});
function del_id()
{
	var user_id='<?php  echo $empid; ?>';
	var cc=$('#control_copy').is(':checked');
	var check_status="";
	if(cc==true)
	{
	   check_status="checked";	
	}
	var b=$('#parent_i').val();
	var a=Array();
	var count=parseInt($('#cnt').val());
	var j=0;
	for(var i=0;i<count;i++)
	{
		if($('#ck'+i).prop("checked")==true)
		{
			a[j]=$('#ck'+i).val();
			j++;
		}
	}
	if(a.length==0)
	{
	alert("Select atleast 1 to Delete");	
	}
	else{
		if(confirm("are you sure want to delete"))
		{
			
			var tab='<?php  echo $project_name; ?>';
			$('.total_web').removeAttr('hidden');
		$.ajax({
     url:'del_id.php',
	 type:'post',
	 dataType:'json',
     data:{id:a,tab:tab,check_status:check_status,user_id:user_id},
	
		});
		console.log("here");
		window.location.reload(true);
		getdata('directory_sub','<?php  echo $project_name; ?>',b);
       $('.total_web').attr('hidden',"");			
	}
	else{
		
			getdata('directory_sub','<?php  echo $project_name; ?>',b);
	}
	}
	
}
function show_check(e)
{
	$(e).attr("onclick","hide_check(this)");
	$('.cb_size').css("display","inline","margin-left","100px;");
	var cc=$('#control_copy').is(':checked');
	$('input:checkbox').removeAttr('checked');
	
    var str='<button id="del_sel" onclick="del_id();" class="float-right btn btn-danger mr-4">Delete</button>';
	$('.stick1').append(str);
	if(cc==true)
	{
		$('#control_copy').prop('checked', true);	
	}
	//$('#btn-op').click();
}
function hide_check(e)
{
	$(e).attr("onclick","show_check(this)");
	$('.cb_size').css("display","none");
	$('#del_sel').remove();
	$('#btn-op').click();
}
function pc()
{
                if ($('#userNav').is(':hidden')) {
                   
                   $('#userNav').show('slide',{direction:'right'},1000);
                } else {
                   
                   $('#userNav').hide('slide',{direction:'right'},1000);
                }
}
function getdata(place,tab,id)
	{
		
	$.ajax({
		url:'retrival.php',
		type:'post',
		data:{Main_table:tab,parent_id:id},
		dataType:'json',
		success:function(d)
		{
			console.log(d);
			
			var str="";
			$('#cnt').val(d.length-1);
			$('#parent_i').val(id);
			if(d.length-1==0)
			{
				str+='<div class="col-sm-12 stick1"><button class="btn bg-transparent text-light mb-2 font-weight-bold" onclick="getdata(\'directory_sub\',\'<?php  echo $project_name; ?>\',\''+d[d.length-1].back_id+'\')"><i class="fa fa-arrow-left"></i> &nbsp;'+d[d.length-1].des+'</button></div><div class="col-sm-12 mt-5"><p class="text-center text-danger mt-2 font-weight-bold">Neighter Assembly nor Component is Found</p></div>';
			}
			for(i=0;i<d.length-1;i++)
			{
	         
			 if(i==0)
			 {
				 //str +='<div class="col-sm-6"><div class="cb_size"><input type="checkbox"></div><div class="img+data"><img src="img/folder.png" class="img-fluid rounded-circle float-left" style="width:55px;height:55px;"><p class="ml-1">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">hello project name</span><br>&nbsp;&nbsp;&nbsp;&nbsp;0 files<br>&nbsp;&nbsp;&nbsp;&nbsp;last edited date</p></div></div>';
				 var ogbk=(d[d.length-1].back_id==-1)?"<i class=\"fa fa-university\"></i>":"<i class=\"fa fa-arrow-left\"></i>";
				str+='<div class="col-sm-12 stick1 "><button class="btn bg-tansparent text-light mb-2 font-weight-bold kvi" onclick="getdata(\'directory_sub\',\'<?php  echo $project_name; ?>\',\''+d[d.length-1].back_id+'\')">'+ogbk+'  &nbsp;'+d[d.length-1].des+'</button></div>';
			 }
			 console.log(d[i].type);
                   var first_c=d[i].type;
				 if(first_c.charAt(0)=='A' || d[i].type=='FA')
				{
					
					str+='<div class="col-sm-4" data-bd="'+i+'" ><div class="cb_size"><input type="checkbox" id="ck'+i+'" value="'+d[i].pid+'"></div><div class="img_data"  data-v="'+d[i].pid+'" data-n="'+d[i].pname+'" onclick="getdata(\'directory_sub\',\'<?php  echo $project_name; ?>\',\''+d[i].pid+'\')"><img src="img/folder.png" class="img-fluid rounded-circle float-left" style="width:55px;height:55px;"><p class="ml-1">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">'+d[i].pname+' </span><br>&nbsp;&nbsp;&nbsp;&nbsp;FA : '+d[i].FA+' , FP : '+d[i].FP+' & BP : '+d[i].BP+'<br>&nbsp;&nbsp;&nbsp;&nbsp;last edited  '+d[i].last_edited+'</p></div></div>';
				//str+='<div class="col-sm-6 p1" onclick="getdata(\'directory_sub\',\'<?php  echo $project_name; ?>\',\''+d[i].pid+'\')"><img src="img/folder.png" class="img-fluid rounded-circle float-left" style="width:55px;height:55px;"><p class="ml-1">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">'+d[i].pname+'</span><br>&nbsp;&nbsp;&nbsp;&nbsp;'+d[i].count+' files<br>&nbsp;&nbsp;&nbsp;&nbsp;last edited '+d[i].last_edited+'</p></div>'; 
				}
				else
				{
					var imgpic;
					if(d[i].type=='FP')
					{
						imgpic='img/c.png';
					}
					else{
						imgpic='img/b.png';
					}
					str+='<div class="col-sm-4 " data-bd="'+i+'"  ><div class="cb_size"><input type="checkbox" id="ck'+i+'" value="'+d[i].pid+'"></div><div class="img_data" data-v="'+d[i].pid+'" data-n="'+d[i].pname+'" ><img src="'+imgpic+'" class="img-fluid rounded-circle float-left" style="width:55px;height:55px;"><p class="ml-1">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">'+d[i].pname+' </span><br>&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;last edited  '+d[i].last_edited+'</p></div></div>';
					
					//str+='<div class="col-sm-6 p1" onclick="rt(this)" ><img src="img/c.png" class="img-fluid rounded-circle float-left" style="width:55px;height:55px;"><p class="ml-1">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">'+d[i].pname+'</span><br>&nbsp;&nbsp;&nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;last edited '+d[i].last_edited+'</p></div>'; 
				}
				 
			 
			 
			}
			if(d[d.length-1].p_type !="BP" && d[d.length-1].p_type !="FP"){
			$('#'+place).empty();
			$('#'+place).append(str);
			}
			//$('.total_web').attr('hidden',"");
			
			$("[data-bd=0]").addClass("top1");
			$("[data-bd=1]").addClass("top1");
			$("[data-bd=2]").addClass("top1");
		}
		
	});
	}

	function rt(e)
	{
		//$('p').css('color','#111');
		//$('.p1').css('background-color','#f8f9fa');
		
		//$(e).css('background-color','blue');
		
		//$(e).css('color','red');
	}
	if($('#type').val()=="00A")
	{
	app("00A");
	}
	else{
		
	app("00P");	
	}
	
$.event.special.rightclick = {
    bindType: "contextmenu",
    delegateType: "contextmenu"
};

<?php
if($ac!=1){
	?>
	$(document).on("rightclick", ".img_data", function(event) {
	$('.col-sm-4').removeClass("selected");
	$(this).parent().addClass("selected");
	$('#editval').removeClass("disabled");
	$('#revise').removeClass("disabled");
	$('#modify').removeClass("disabled");
	$('#cut').removeClass("disabled");
	$('#copy').removeClass("disabled");
	$('#revisionhistory').removeClass("disabled");
	$('#details_show').removeClass("disabled");
    $('#editval').attr('data-pid',$(this).attr('data-v'));
	$('#revise').attr('data-id',$(this).attr('data-v'));
	$('#revise').attr('data-name',$(this).attr('data-n'));
    $('#editval').attr('data-name',$(this).attr('data-n'));
	$('#modify').attr('data-id',$(this).attr('data-v'));
	$('#cut').attr('data-id',$(this).attr('data-v'));
	$('#copy').attr('data-id',$(this).attr('data-v'));
	$('#paste').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-name',$(this).attr('data-n'));
	$('#revisionhistory').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-name',$(this).attr('data-n'));
    if((screen.height-200)>event.pageY)
	{
		$('.custom-menu').css({"top":event.pageY,"display":"block","left":event.pageX});
	}
	else{
		$('.custom-menu').css({"top":(screen.height-190),"display":"block","left":event.pageX});
		}
		return false;
});

$(document).on("rightclick", ".pst", function(event) {
	console.log(event);
   /*$('#editval').attr('data-pid',$(this).attr('data-v'));
	$('#revise').attr('data-id',$(this).attr('data-v'));
	$('#revise').attr('data-name',$(this).attr('data-n'));
    $('#editval').attr('data-name',$(this).attr('data-n'));
	$('#cut').attr('data-id',$(this).attr('data-v'));
	$('#copy').attr('data-id',$(this).attr('data-v'));
	$('#paste').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-name',$(this).attr('data-n'));
	$('#details_show').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-name',$(this).attr('data-n'));*/
	$('#editval').addClass("disabled");
	$('#revise').addClass("disabled");
	$('#modify').addClass("disabled");
	$('#cut').addClass("disabled");
	$('#copy').addClass("disabled");
	$('#revisionhistory').addClass("disabled");
	$('#details_show').addClass("disabled");
	//$('.dbled').addClass('disabled');
	
	if((screen.height-200)>event.pageY)
	{
		$('.custom-menu').css({"top":event.pageY,"display":"block","left":event.pageX});
	}
	else{
		$('.custom-menu').css({"top":(screen.height-190),"display":"block","left":event.pageX});
		}

    
    return false;
});
<?php
}
else{
?>

$(document).on("rightclick", ".img_data", function(event) {
	$('.col-sm-4').removeClass("selected");
	$(this).parent().addClass("selected");
	$('#editval').removeClass("disabled");
	$('#revise').removeClass("disabled");
	$('#modify').removeClass("disabled");
	$('#cut').removeClass("disabled");
	$('#copy').removeClass("disabled");
	$('#revisionhistory').removeClass("disabled");
	$('#details_show').removeClass("disabled");
    $('#editval').attr('data-pid',$(this).attr('data-v'));
	$('#revise').attr('data-id',$(this).attr('data-v'));
	$('#revise').attr('data-name',$(this).attr('data-n'));
    $('#editval').attr('data-name',$(this).attr('data-n'));
	$('#modify').attr('data-id',$(this).attr('data-v'));
	$('#cut').attr('data-id',$(this).attr('data-v'));
	$('#copy').attr('data-id',$(this).attr('data-v'));
	$('#paste').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-name',$(this).attr('data-n'));
	$('#revisionhistory').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-name',$(this).attr('data-n'));
    if((screen.height-420)>event.pageY)
	{
		$('.custom-menu').css({"top":event.pageY,"display":"block","left":event.pageX});
	}
	else{
		$('.custom-menu').css({"top":(screen.height-420),"display":"block","left":event.pageX});
		}
		return false;
});

$(document).on("rightclick", ".pst", function(event) {
	console.log(event);
   /*$('#editval').attr('data-pid',$(this).attr('data-v'));
	$('#revise').attr('data-id',$(this).attr('data-v'));
	$('#revise').attr('data-name',$(this).attr('data-n'));
    $('#editval').attr('data-name',$(this).attr('data-n'));
	$('#cut').attr('data-id',$(this).attr('data-v'));
	$('#copy').attr('data-id',$(this).attr('data-v'));
	$('#paste').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-name',$(this).attr('data-n'));
	$('#details_show').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-name',$(this).attr('data-n'));*/
	$('#editval').addClass("disabled");
	$('#revise').addClass("disabled");
	$('#modify').addClass("disabled");
	$('#cut').addClass("disabled");
	$('#copy').addClass("disabled");
	$('#revisionhistory').addClass("disabled");
	$('#details_show').addClass("disabled");
	//$('.dbled').addClass('disabled');
	
	if((screen.height-420)>event.pageY)
	{
		$('.custom-menu').css({"top":event.pageY,"display":"block","left":event.pageX});
	}
	else{
		$('.custom-menu').css({"top":(screen.height-420),"display":"block","left":event.pageX});
		}

    
    return false;
});

<?php
}
?>

$("body").on("click",function() {
	$('.col-sm-4').removeClass("selected");
    $('.custom-menu').css({"display":"none"});
    
});



$('#modify').click(function()
{
	var tab='<?php  echo $project_name; ?>';
	var id=$(this).attr("data-id");
	$.ajax({
		url:'quant_op.php',
		type:'post',
		data:{quantget:"quant",id:id,tab:tab},
		dataType:'text',
		success:function(d)
		{
			console.log(d);
			var b=prompt("Edit the existing Quantity",d);
			var isnum = /^\d+$/.test(b);
			if(isnum)
			{
				
				$.ajax({
					url:'quant_op.php',
		            type:'post',
		            data:{quantup:"quantup",id:id,tab:tab,new_v:b,pre_v:d},
		            dataType:'text',
					success:function(d1)
					{
						console.log(d1);
					}
				});
			}
			else{
				alert("enter only digits");
			}
			
		}
		
	});
	
});

/*
$('#revise').click(function()
{
	 var b=$('#parent_i').val();
 var tab='<?php  echo $project_name; ?>';
 
 var id=$(this).attr("data-id");
 var user_id='<?php  echo $empid; ?>';
 var reason=prompt("Enter the Reason","");
 var pname=$(this).attr("data-name");
 if(reason!="")
 {
 $.ajax({
	url:'revise.php',
    type:'post',
    dataType:'text',
    data:{tab:tab,id:id,reason:reason,user_id:user_id,name:pname},
		 success:function(d)
		 {
			console.log(d); 
		 }
	 
 });
 }
});
*/

$('#editval').click(function()
{
 var b=$('#parent_i').val();
 var tab='<?php  echo $project_name; ?>';
 var pid=$(this).attr("data-pid");
 var pname=$(this).attr("data-name");
 var name1=prompt("Plese enter the name",pname);
 name1=name1.trim();

  if(name1.length>0 && name1!=pname.trim())
  {
	 
     $.ajax({
		 url:'rename.php', 
		 type:'post',
		 dataType:'text',
		 data:{tab:tab,rename:'rename',id:pid,name:name1},
		 success:function(d)
		 {
	    console.log(d); 
	    load1();
		getdata('directory_sub','<?php  echo $project_name; ?>',b);
		 }
	 });
  }
 
});

/*
function active_status(id)
{
	
	$('.fabricated').addClass("watch");
	$('.boughtout').addClass("watch");
	$('.assemble').addClass("watch");
	$('.'+id).removeClass("watch");
	
	$('.'+id).delay(5000).fadeIn();
	
	
}
*/

/*
function genp()
{
	if(confirm("do you want to generate partnumbers"))
	{
	$('.total_web').removeAttr('hidden','');
	var tab="<?php  echo $project_name; ?>";
	$.ajax({
		url:'gpn1.php',
		dataType:'text',
		type:'post',
		data:{tab:tab},
		success:function(d)
		{
			console.log(d);
			$('.total_web').attr('hidden','');
			alert("genereated partnumbers");
		}
	});
	}
}
*/


$('#details_show').click(function(){
	
	var id = $(this).attr("data-id");
	var tab='<?php  echo $project_name; ?>';
	var pid=$('#parent_i').val();
	var name=$(this).attr("data-name");
  $('#details_all').empty();
	$.ajax({
		url:'details_get.php',
		type:'post',
		data:{id:id,tab:tab,pid:pid},
		dataType:'json',
		success:function(d)
		{
			console.log(d);
		    if(d.length>0)
			{
				$('#descript').text(name);
				var parts=d[0];
				if(parts[0].p_type=="BP")
				{
				var components=d[1];
				
				var str1="";
				/*for(var i=0;i<components[0].specification.length;i++)
				{
					str1+=components[0].specification[i]+"<br>";
				}*/
				var str='<div class="col-sm-8"><table class="table table-bordered"><tbody><tr><th>Model No</th>   <td>'+parts[0].modelno+'</td></tr><tr><th>Make</th><td>'+components[0].make+'</td></tr><tr><th>Component Name</th>	   <td>'+parts[0].description+'</td></tr></tr><tr><th>Description</th>	   <td>'+parts[0].material+'</td></tr><tr><th>Specification</th>	   <td>'+parts[0].specs+'</td></tr><tr><th>PartNo</th><td>'+parts[0].partnumber+'</td></tr><tr>	   <th>Revision</th><td>'+parts[0].revision+'</td></tr><tr><th>Quantity</th><td>'+parts[0].quantity+'</td></tr><tr hidden ><th>Available Quantity</th><td>'+components[0].a_q+'</td></tr><tr><th>Infant Mortality</th><td>'+components[0].i_m+'</td></tr></tbody></table></div><div class="col-sm-4" style="overflow:hidden"><p class="h5 text-left font-weight-bold">Specifications</p><table class="table"><tr><td>'+str1+'<br><b class="mt-5">Links</b><br><a class="float-left" href="<?php echo $tab."_files/"; ?>'+parts[0].modelno+'_spec1.pdf" target="_blank">'+parts[0].modelno+'_spec1</a><br><a class="float-left" target="_blank" href="<?php echo $tab."_files/"; ?>'+parts[0].modelno+'_spec2.pdf">'+parts[0].modelno+'_spec2</a><br><a class="float-left" target="_blank" href="<?php echo $tab."_files/"; ?>'+parts[0].modelno+'_spec3.pdf">'+parts[0].modelno+'_spec3</a><br><br><br><form method="post" enctype="multipart/form-data" action=""><select name="modelname" required ><option value="">SELECT ONE</option><option value="'+parts[0].modelno+'_spec1">'+parts[0].modelno+'_spec1</option><option value="'+parts[0].modelno+'_spec2">'+parts[0].modelno+'_spec2</option><option value="'+parts[0].modelno+'_spec3">'+parts[0].modelno+'_spec3</option></select><br><br><input type="file"  required accept="application/pdf" name="modelfile" ><br><br><input type="submit" class="btn btn-dark" name="upmodel" value="upload"></form></td></tr></table></div>';
				$('#details_all').empty();
				$('#details_all').append(str);
				console.log(str);
				}
				else{
					var gp="";
					if(parts[0].partnumber!="")
					{
						 gp='<form method="post" enctype="multipart/form-data" action=""><select name="modelname" required ><option value="">SELECT ONE</option><option value="MD_'+parts[0].partnumber+'">MD_'+parts[0].partnumber+'</option><option value="QC_'+parts[0].partnumber+'">QC_'+parts[0].partnumber+'</option><option value="RC_'+parts[0].partnumber+'">RC_'+parts[0].partnumber+'</option></select><br><br><input type="file"  required accept="application/pdf" name="modelfile" ><br><br><input type="submit" class="btn btn-dark" name="upmodel" value="upload"></form>'
					}
					var nhaxe='';
					if(parts[0].pid!=0)
					{
						nhaxe+='<a class="float-left" href="<?php echo $tab."_files/"; ?>MD_'+parts[0].pid_partno+'.pdf" target="_blank">NHA_'+parts[0].pid_partno+'</a>';
					}
					var str='<div class="col-sm-8"><table class="table table-bordered"><tbody><tr><th>Materials</th>   <td>'+parts[0].material+'</td></tr><tr><th>Component Name</th>	   <td>'+parts[0].description+'</td></tr><tr><th>PartNo</th><td>'+parts[0].partnumber+'</td></tr><tr>	   <th>Revision</th><td>'+parts[0].revision+'</td></tr><tr><th>Quantity</th><td>'+parts[0].quantity+'</td></tr></tbody></table></div><div class="col-sm-4" style="overflow:hidden"><p class="h5 text-left font-weight-bold">Drawings</p><table class="table"><tbody><tr><td><a href="<?php echo $tab."_files/"; ?>QC_'+parts[0].partnumber+'.pdf" target="_blank" class="float-left">QC_'+parts[0].partnumber+'</a><br><a class="float-left" href="<?php echo $tab."_files/"; ?>RC_'+parts[0].partnumber+'.pdf" target="_blank">RC_'+parts[0].partnumber+'</a><br><a class="float-left" href="<?php echo $tab."_files/"; ?>MD_'+parts[0].partnumber+'.pdf" target="_blank">MD_'+parts[0].partnumber+'</a><br>'+nhaxe+'<br><br><br>'+gp+'					</td></tr></tbody></table></div>';
					$('#details_all').empty();
				$('#details_all').append(str);
					//console.log(str);
				}
			}
		}
	});
});


var s1='<select class="chosen-select" mutiple><?php  $sql123="select * from component"; $q123=mysqli_query($con,$sql123);if(mysqli_num_rows($q123)>0){ while($row123=mysqli_fetch_array($q123)){ echo "<option value=\'".$row123['name']."\'>".$row123['name']."</option>";   } } ?></select>';
//console.log(s1);
/*
function toggleFullscreen(elem) {
  elem = elem || document.documentElement;
  if (!document.fullscreenElement && !document.mozFullScreenElement &&
    !document.webkitFullscreenElement && !document.msFullscreenElement) {
    if (elem.requestFullscreen) {
      elem.requestFullscreen();
    } else if (elem.msRequestFullscreen) {
      elem.msRequestFullscreen();
    } else if (elem.mozRequestFullScreen) {
      elem.mozRequestFullScreen();
    } else if (elem.webkitRequestFullscreen) {
      elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    }
  }
}

document.getElementById('exampleImage').addEventListener('click', function() {
  toggleFullscreen(this);
});*/


</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction1() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



</script>
<script type="text/javascript">

function hidelevels(cls)
{
	var x = document.getElementsByClassName('n'+cls);
    var i;
	var v="";
	
	
	//	$('.n'+cls).remove();
    for (i = 0; i < x.length; i++) {
    v=x[i].getAttribute("value");
	     hidelevels(v);
	  $('.n'+v).remove();
	  console.log('.n'+v);
	}
	$('.n'+cls).remove();
	
}

function treextract(e,cls){
	$(e).removeClass("fa-folder");
	$(e).addClass("fa-folder-open");
	$(e).attr("onclick","treecompress(this,'"+cls+"')");
	var level=1;
	level+=parseInt($(e).attr("level"));
	var delimit="";
	for(var j=0;j<(3*level);j++)
	{
		delimit+="&nbsp;";
	}
	var str="";
	var tab="<?php  echo $project_name; ?>";
	var pid=cls.substr(1);
		$.ajax({
		url:'testing1a.php',
		type:'post',
		dataType:'json',
		data:{pid:pid,tab:tab},
		success:function(d)
		{
			var fawe="";
			var caction="";
			for(var i=0;i<(d.length);i++)
			{	
		        if(d[i].p_type.substr(0,1)=="A")
				{
					fawe="fa fa-folder";
					caction='onclick="treextract(this,\'n'+d[i].id+'\')"';
				}
				else if(d[i].p_type=="FA"){
					fawe="fa fa-folder";
					caction='onclick="treextract(this,\'n'+d[i].id+'\')"';
				}
				else if(d[i].p_type=="FP"){
					fawe="fa fa-facebook";
				}
				else if(d[i].p_type=="BP"){
					fawe="fa fa-bold";
				}
			    str+='<li class="n'+d[i].pid+'" value="'+d[i].id+'" >'+delimit+'<rock class="door"><span level="'+level+'" class="'+fawe+'"    '+caction+'   ></span><span onclick="assem_c('+d[i].id+')">&nbsp;&nbsp;'+d[i].description+'<span></rock></li>';	
			}
			$(e).parent().after(str);
		}
		
		
	});
}

function treecompress(e,cls){
	$(e).removeClass("fa-folder-open");
	$(e).addClass("fa-folder");
	$(e).attr("onclick","treextract(this,'"+cls+"')");
	hidelevels($(e).parent().parent().attr("value"));

}
function assem_c(pid)
{
	getdata('directory_sub','<?php  echo $project_name; ?>',pid);
}
function load1()
{
	$('#home_click').click();
}
$('#home_click').click();
$('.total_web').attr('hidden','');
getdata('directory_sub','<?php  echo $project_name; ?>',0);

/*
var kg=0
function myFunction2() {
	
	if(kg%2==0)
	{
    document.getElementById("myDropdown1").classList.toggle("show");
	}
	else{
    document.getElementById("myDropdown1").classList.toggle("hide");	
	}
	kg++;
}
*/

<?php
if($notifyc>0){
	?>
$('#notifyc').append('<?php echo $notifyc; ?>');
<?php
}
?>
</script>
</body>
</html>
<?php
	}
	
if(isset($_SESSION['empid']))
{
	$project_name="";
$empid="";
$date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_time=$date_location->format('H:i:s');
$current_date=$date_location->format('Y-m-d');
$timestamp= $current_date." ".$current_time;
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
	if(isset($_SESSION['pname']))
   {
	$project_name=$_SESSION['pname'];
	$_SESSION['pname']=$project_name;
	show($empid,$timestamp);
    }
   else if(isset($_POST['se']))
   {
	if(strlen($_POST['se'])>0)
	{
	$project_name=$_POST['se'];
	$_SESSION['pname']=$project_name;
	show($empid,$timestamp);
	}
	
    }
	else {
		header("Location:index.php");
	}
	
	if(isset($_POST['upmodel']))
{
	$fname=$project_name."_files/".$_POST['modelname'];
    $fname.=".pdf";

$contents=$_FILES['modelfile']['tmp_name'];
//$name=$_FILES['modelfile']['name'];

move_uploaded_file($contents,$fname);
header("Location:");
}
	
	
}
else{
	header("Location:index.php");
}

?>