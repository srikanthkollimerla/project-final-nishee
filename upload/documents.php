<?php session_start();
$project_name="";
$empid="";
 
if(isset($_SESSION['empid']) && (isset($_SESSION['pname']) || isset($_POST['se'])))
{
	if(isset($_POST['se']))
   {
	if(strlen($_POST['se'])>0)
	{
	$project_name=$_POST['se'];
	$_SESSION['pname']=$project_name;
	}
	
    }
	
	$notifyc=0;
	$date_locationch = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    $current_datech=$date_locationch->format('Y-m-d');
	$specific_datech=date('Y-m-d', strtotime($current_datech. ' + 3 days'));
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;

	$project_name=$_SESSION['pname'];
	$_SESSION['pname']=$project_name;
$db1=$project_name;
require_once("DB_connect.php");
$tab=$project_name;


$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
$user_name=$rname[0]."/".$rname[1];
?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="HTML,CSS,JavaScript,Php">
  
<title><?php  echo str_replace("_"," ",$project_name); ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style>
.bg-dark1{
	background-color:#5f5f5f;
	color:white;
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
    background-color: #285d91 !important;
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
    font-size:23px;
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
	    min-height:87vh;
	    max-height:88vh;
	    overflow-y: auto;
		
}
#directory_sub
{
	    
	    max-height:88vh;
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
	cursor:not-allowed;
}
.stick1{
	position:absolute;
	width:97%;
	display:inline-block;
	background-color:tomato;
	z-index:102;
	
}
.modal{
	z-index:10003;
}
.stick1 >button{
	margin-top:7px;
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
	height:89vh;
	background-color:#a6a1a166;
	z-index:9999999;
}
.top1{
	margin-top:60px;
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
.col-md-1
{
	min-height:96vh;
}
.btnp0{
	padding:0px;
}
</style>
</head>
<body>

<nav class="navbar fixed-top navbar-light bg-dark1 navbar-expand-sm">
  <a class="navbar-brand " href="#">
    <?php  echo str_replace("_"," ",$project_name); ?>
  </a>
  <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbar">
        <i class="fa fa-bars fa-2x " style="margin-top:-5px;"></i>
      </button>
  <div class="collapse navbar-collapse flex-column" id="navbar">
    <ul class="navbar-nav nav  w-100">
	<li class="nav-item ml-auto dropdown"><a href="javascript:myFunction2()" class="nav-link " ><i class="fa fa-bell text-warning"></i><sup id="notifyc" class="text-light font-weight-bold"></sup></a>
	  <div id="myDropdown1" class="dropdown-content " style="min-width:350px;">
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
	  ?>
    
    
  </div>
  </li>
	  	  <li class="nav-item dropdown">
          <a href="javascript:myFunction1()" class="nav-link dropbtn">USER : <?php echo strtoupper($user_name); ?> </a>
  <div id="myDropdown" class="dropdown-content">
  <a href="projectslist.php">All Projects </a>
    <a href="logout.php">Logout</a>
    
  </div>
  </li>
    </ul>
  </div>
</nav>
<div class="container-fluid" style="margin-top: 45px;">
<div class="row">
<div class="col-md-1 bg-dark1" style="padding:0px">
                   <a href="documents.php" style="position:fixed;top:45px;left:0px;min-width:8.33333%;"><button  class="btn bg-light btn1"style="width:100%;height:100px;border-radius:0rem;border-left:4px solid tomato;border-top:4px solid tomato;"><i class="fa fa-2x fa-files-o "></i><br class="h6" style="margin-bottom:0rem;">Documents</br></button></a>
                   <a href="log.php" style="position:fixed;top:150px;left:0px;min-width:8.33333%"> <button class="btn bg-dark1 btnp0" style="width:100%;height:100px; border-radius:0rem;"><i class="fa fa-2x fa-list"></i><br class="h6" style="margin-bottom:0rem;">Assemblies </br></button></a>
					<!--<a href="../vendor/vmview.php" style="position:fixed;top:245px;left:0px;min-width:8.33333%;"> <button class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-users"></i><br class="h6" style="margin-bottom:0rem;">Vendor<br>Management</br></button></a>
					<a href="../vendor/inputfeed.php" style="position:fixed;top:340px;left:0px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-info-circle "></i><br class="h6" style="margin-bottom:0rem;">INPUT FEED</br></button></a>
					<a href="stats.php" style="position:fixed;top:435px;left:0px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-pie-chart"></i><br class="h6" style="margin-bottom:0rem;">Statistics</br></button></a>
					<a href="feedback.php" style="position:fixed;left:0px;top:520px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-text-width"></i><br class="h6" style="margin-bottom:0rem;">Ticket System</br></button></a>
					-->
</div>

<div class="col-md-11" style="min-height:93vh;">
<div class="container-fluid " style="padding:0px;">
<div class="row">
<div class="col-md-12">
<div class="card w-3">
<div class="card-header h2 text-center bg-dark1">
Documents
</div>
<div class="card-body">
<?php
$sqlc="select * from ".$tab."_stage1 ";
$qc=mysqli_query($con1,$sqlc);
$j=0;
if(mysqli_num_rows($qc)>0)
{
	$cnt=mysqli_num_rows($qc);
?>
<table class="table ">
<thead><tr><th>Slno</th><th>Name</th><th>Started </th><th>Ended </th><th>Status </th><th>Action</th></tr></thead>
<tbody>
<?php
$i=0;
while($rowc=mysqli_fetch_array($qc))
	{
$i++;
        $cclass="";
		$st="<button class='btn btn-danger' onclick='end(\"".$rowc['name']."\")'>End</button>";
		if($rowc['status']==1)
		{
			$st="Finshed";
			$cclass="text-success";
		}
		else{
			$cclass="text-danger";
			$j++;
		}
		?>
<tr><th class="align-middle"><?php echo $i;?></th><th class="align-middle"><span class="phasenames" phaseno="<?php echo $rowc['phaseno'];?>"><?php echo $rowc['name'];?></span>&nbsp;&nbsp;<a class="text-info" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter" onclick="javascript:popup('<?php echo $rowc['name'];?>','Company')">Company</a>&nbsp;&nbsp;<a class="text-info" style="cursor:pointer;" data-toggle="modal" data-target="#exampleModalCenter" onclick="javascript:popup('<?php echo $rowc['name'];?>','Customer')">Customer</a></th><th class="align-middle"><?php echo $rowc['started'];?></th><th class="align-middle"><?php echo $rowc['ended'];?></th><th class="align-middle <?php echo $cclass; ?>"><?php echo $st;?></th><th class="align-middle"><button class='btn btn-danger' onclick="delfstage('<?php echo $rowc['name'];?>')"><i class="fa fa-close"></i></button></th><tr>
<?php
	}
?>
</tbody>
</table>
<?php
}
?>

</div>
<?php

if($j==0)
{
?>
<div class="card-footer">
<center><button class="btn btn-success" onclick="stageentry()" >Create Stage</button></center>
</div>
<?php
}

?>
</div>
</div>
</div>

</div>
</div>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark1">
        <h5 class="modal-title" id="exampleModalLongTitle">Documents</h5>
        <button id="cl" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table">
	  <thead>
	     <tr><th>Slno</th><th>Name</th><th>Description</th><th>Date</th><th>Edited By</th><th>Action</th></tr>
	  </thead>
	  <tbody id="doctby">
	  
	  </tbody>
	  <tbody>
	  <tr><td colspan="5"><button id="adding" class="btn btn-success float-right" issued="Company" data-toggle="modal" data-target="#exampleModalCenter1" onclick="javascript:document.getElementById('cl').click();var st=document.getElementById('psnamemain').value;document.getElementById('psname').value=st;sel(this);">Add</button></td></tr>
	  </tbody>
	  </table>
	  
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark1">
        <h5 class="modal-title" id="exampleModalLongTitle1">New Doc's</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" method="post" enctype="multipart/form-data" action="docupload.php">
      <table class="table">
	  <tbody>
	   <tr><td class="align-middle">Phase Name</td><td class="align-middle"><input type="text" required  readonly class="form-control-plaintext font-weight-bold" name="phasename" id="psname" ></td></tr>
	   <tr><td>Name</td><td><input type="text" required class="form-control" name="name"></td></tr>
	   <tr hidden><td>Issued By</td><td><input type="text" id="isby" class="form-control" name="isdby"></td></tr>
	   <tr><td>Description</td><td><textarea required rows="4" name="description" class="form-control"></textarea></td></tr>
	   <tr><td>Upload</td><td><input required type="file" name="fileToUpload" class="form-control" ></td></tr>
	   <tr><td></td><td ><button type="submit" class="btn btn-success float-right">Submit <i class="fa fa-arrow-right"></i></button></td></tr>
	  </tbody>
	  </table>
	  
      </form>
    </div>
  </div>
</div>
<input type="text" id="psnamemain" hidden>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script src="js/bootstrap-treeview.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
var tab="<?php echo $project_name; ?>";
$('.phasenames').on('click',function(e)
{
	var phaseno=e.target.attributes.phaseno.value;
	var prevphase=e.target.textContent;
	var k=prompt("Do you want to change the Phase Name",e.target.textContent);
	if(k.trim()!="" && k!==e.target.textContent )
	{
		if(confirm("Do you want to change the Phase Name "+e.target.textContent+" to "+k)){
		$.ajax({
		url:'renamephasestage.php',
		type:'post',
		dataType:'text',
		data:{tab:tab,phaseno:phaseno,phasename:k,prevphase:prevphase},
		success:function(d)
		{
			 console.log(d);
			 if(d==="success")
			 {
				 window.location.href="";
			 }
		}
	    });
		}
	}
});
function delsstage(phasename,stagename)
{
  if(confirm("Are you sure want to delete "+stagename)==true)
  {
	$.ajax({
		url:'deletestages.php',
		type:'post',
		dataType:'text',
		data:{name:phasename,tab:tab,posting:'some',stagename:stagename},
		success:function(d)
		{
			 console.log(d);
			 if(d==="success")
			 {
				 window.location.href="";
			 }
			 else{
				alert("error");				
			 }
		}
	});	
  }
}
function delfstage(phasename)
{
	if(confirm("Are you sure want to delete complete "+"phasename"+" data")==true)
  {
	$.ajax({
		url:'deletestages.php',
		type:'post',
		dataType:'text',
		data:{name:phasename,tab:tab,posting:'full'},
		success:function(d)
		{
			 console.log(d);
			 if(d==="success")
			 {
				 window.location.href="";
			 }
			 else{
				alert("error");				
			 }
		}
	});
  }
}
function sel(e)
{
	var a=$(e).attr('issued');
    $('#isby').val(a);
}
function end(s)
{
	var tab="<?php echo $project_name; ?>";
	
	if(confirm("Are you sure want to end "+s+"  Phase")==true)
  {
	$.ajax({
		url:'endstage.php',
		type:'post',
		dataType:'text',
		data:{tab:tab,stage:s},
		success:function(d)
		{
			
			console.log(d);
			window.location.href="";
		}
	});
  }
}
function popup(s,issued)
{
	var tab="<?php echo $project_name; ?>";
	var str="";
	$('#psnamemain').val(s);
	$.ajax({
		url:'docdisplay.php',
		type:'post',
		dataType:'text',
		data:{tab:tab,phasename:s,issued:issued},
		success:function(d)
		{
			
			//console.log(d);
			$('#adding').attr('issued',issued);
			$('#doctby').empty();
			$('#doctby').append(d);
			
			
		}
	});
}
function stageentry()
{
	var tab="<?php echo $project_name; ?>";
	var a=prompt("Enter the  Stage Name","");
	if(a.trim()!="")
	{
	$.ajax({
		url:'docop.php',
		type:'post',
		dataType:'text',
		data:{tab:tab,phasename:a,create:'c'},
		success:function(d)
		{
			
			//console.log(d);
			window.location.href="";
		}
	});
	}
}

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
else{
	header("Location:index.php");
}
?>