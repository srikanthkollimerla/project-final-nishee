<?php session_start();

function show($empid,$timestamp)
	{
		$empid=$empid;
$project_name=$_SESSION['pname'];
$db1=$project_name;
require ("DB_connect.php");
$tab=$project_name;

$login_user="insert into ".$project_name."_activity_log values('','$empid','$timestamp','logged in','')";
mysqli_query($con1,$login_user);


$sname="select ename from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
$user_name=$rname[0];


$sql_cc="select action from ".$project_name."_activity_log where reason='ControlCopy' order by time";
$q_cc=mysqli_query($con1,$sql_cc);
$row_cc=mysqli_fetch_array($q_cc);
$cc_action=$row_cc[0];
?><!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="description" content="Hemair">
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
    font-size:30px;
    line-height: inherit;
    white-space: nowrap;
}
dl, ol, ul {
    margin-top: -10px;
   
}

.navbar-brand{
	font-size:30px;
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
	color:rgb(252, 255, 255,255) !important;
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
	height:89vh;
	background-color:#a6a1a166;
	z-index:9999999;
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
.list-group-item{
	display:inherit;
}
.treeview {
	overflow: auto;
}
.treeview ul li{
	list-style:none;
	width:100%;
	white-space: nowrap;
    
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
  <a class="navbar-brand " href="#">
    <?php  echo strtoupper($project_name); ?>
  </a>
  <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbar">
        <i class="fa fa-bars fa-2x " style="margin-top:-5px;"></i>
      </button>
  <div class="collapse navbar-collapse flex-column" id="navbar">
    <ul class="navbar-nav nav  w-100">
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
       
	   <div class="nav-item h5 mt-2 mr-3"> <button onclick="genp()" class="btn btn-md btn-warning" style="padding-top:0px;padding-bottom:0px">Generate PartNo</button></div>
      </li>
	  <li class="nav-item ">
       
	   <div class="nav-item h5 mt-2 mr-3"> <input <?php echo $cc_action; ?> type="checkbox" id="control_copy" class=""> Control Copy</div>
      </li>
	  <li class="nav-item dropdown ">
          <a href="javascript:myFunction1()" class="nav-link dropbtn">USER : <?php echo strtoupper($user_name); ?> </a>
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
                   <a href="log.php"> <button class="btn bg-light "style="width:100%;height:100px; border-radius:0rem;border-left:4px solid tomato;"><i class="fa fa-2x fa-list"></i><br class="h6" style="margin-bottom:0rem;">BOM </br></button></a>
					<a href="../vendor/vmview.php"> <button class="btn bg-dark1 "style="width:100%;height:100px;"><i class="fa fa-2x fa-users"></i><br class="h6" style="margin-bottom:0rem;border-radius:0rem;">Vendor<br>Management</br></button></a>
					<a href="stats.php" style="position:fixed;left:0px;min-width:8.33333%;top:250px;"><button  class="btn bg-dark1 "style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-pie-chart"></i><br class="h6" style="margin-bottom:0rem;">Statistics</br></button></a>
                 
</div>
<div class="col-md-3 bg-light" style="border-right:2px solid black" >
<div  id="fab_dir" >


</div>
</div>
<div class="col-md-7 pst bg-light">
<div class="w-100">
<div class="row bg-light " id="directory_sub">









</div>
</div>
</div>
<div class="col-md-1 bg-dark1" style="padding:2px;">
                   <button class="btn bg-light " style="width:100%;height:100px; border-radius:0rem;margin-top:1px;" data-toggle="modal" onclick="side_close()" data-target="#add"><i class="fa fa-2x fa-plus"></i><br class="h6" style="margin-bottom:0rem;" >ADD</br></button>
					<button class="btn  bg-light mt-1 "  onclick="show_check(this)" style="width:100%;height:100px;"><i class="fa fa-2x fa-trash-o"></i><br class="h6" style="margin-bottom:0rem;border-radius:0rem;">DELETE</br></button>
					<button class="btn bg-light mt-1" style="width:100%;height:100px;border-radius:0rem;" data-toggle="modal" onclick="side_close();upload_dt()" data-target="#excel_upload"><i class="fa fa-2x fa-upload"></i><br class="h6" style="margin-bottom:0rem;">Upload</br></button>
                 
</div>
</div>






<input type="text" id="cnt" hidden>
<input type="text" id="parent_i" hidden>
<input type="text" id="id" hidden>
<input type="text" id="action_data" hidden>
<div id="userNav"><button class="btn btn-success mt-2 mr-2 text-center"  data-toggle="modal" onclick="side_close()" data-target="#add" style="display:block;width:100%;"><i class="fa fa-plus "></i> Add</button>
<button class="btn btn-danger mt-2 mr-2 text-center"  onclick="show_check(this)" style="display:block;width:100%;"><i class="fa fa-trash " ></i> Delete</button><button class="btn btn-warning mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-pencil"></i> Edit</button><button class="btn btn-blue mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-arrows"></i> Move</button><button class="btn btn-blue mt-2 mr-2 text-center" style="display:block;width:100%;"   data-toggle="modal" onclick="side_close();upload_dt()" data-target="#excel_upload"><i class="fa fa-upload"></i> Upload</button><button class="btn btn-warning mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-th-list"></i> Report Progress</button><button class="btn btn-danger mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-users"></i> Audit Trail</button><button class="btn btn-success mt-2 mr-2 text-center" style="display:block;width:100%;"><i class="fa fa-history"></i> Revision History</button>
</div>

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
		<div class="col-3 mt-2 add_mdl"><label class="mt-1">ModelNo /Description </label></div><div class="col-9 mt-2 add_mdl" id="sub_model">
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

<div class='custom-menu'>
  <ul>
  
  <li  data-id="0" data-pid="0" data-name="something" data-toggle="modal"  data-target="#details" id="details_show" >Details</li>
  <li  data-id="0"  id="modify" >Modify Quantiity</li>
  <li  data-id="0" data-name="" id="cut" >Cut</li>
  <li  data-id="0"  id="copy">Copy</li>
  <li  data-id="0" data-name="" class="disabled" id="paste"  >Paste</li>
  <li  data-pid="0" data-name="something" id="editval" > Rename</li>
  <li  data-id="0" data-name="something" id="revise" >Revise</li>
  <li  data-id="0" data-name="something" id="revisionhistory" data-toggle="modal" data-target="#revision_hist" onclick="revision_hshow(this)">Revision History</li>
 </ul>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script src="js/bootstrap-treeview.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
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
	
	
}
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
		    getdata('directory_sub','<?php  echo $project_name; ?>',pid);
			
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
			
			if(name.length>0){
			if(isNumeric(quant))
			{
				
				 $('#err').empty();
                 $.ajax({
					url:'add_component.php',
                    type:'post',
                    dataType:'text',
                    data:{compo:'component',pid:pid,tab:'<?php  echo $project_name; ?>',quantity:quant,modelno:modelno,name:name,user_id:user_id,check_status:check_status,thickness:thickness},
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
function app1(a)
{
	var s2='<input id="nameap" type="text" class="form-control">';
	var s1='<select  class="chosen-select"  id="nameap"><option value=""></option><?php  $sql123="select * from component"; $q123=mysqli_query($con,$sql123);if(mysqli_num_rows($q123)>0){ while($row123=mysqli_fetch_array($q123)){ echo "<option value=\'".$row123['modelno']."\'>".$row123['modelno']."</option>";   } } ?></select>';
	if(a=="0BP")
	{
		$('#data_thick').attr('hidden','');
		$('#new_comp').removeAttr("hidden");
		$('#suby').empty();
		$('#suby').append(s2);
		$('.add_mdl').removeAttr("hidden");
	}
	else
	{
		$('#data_thick').removeAttr('hidden');
		$('#new_comp').attr("hidden","");
		$('#suby').empty();
		$('#suby').append(s2);
		$('.add_mdl').attr("hidden","");
	}
	$('.chosen-select').chosen();
	str='';
	var str_cut='<div class="col-3 mt-2"><label class="mt-1">Specification 1</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="spec1"></div><div class="col-3 mt-2"><label class="mt-1">Specification 2</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="spec2"></div><div class="col-3 mt-2"><label class="mt-1">Specification 3</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="spec3"></div>';
	
	//str+='<div class="col-3 mt-2"><label class="mt-1">Make</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="make"></div><div class="col-3 mt-2"><label class="mt-1">Model</label></div><div class="col-9 mt-2"><input type="text" class="form-control" id="model"></div>';
	var strcut='<div class="col-3 mt-2">MD</div><div class="col-9 mt-2"><input id="dno" type="text" class="form-control"></div><div class="col-3 mt-2">NHA Drawing </div><div class="col-9 mt-2"><input id="nhadno" type="text" class="form-control"></div>';
	str1='<div class="col-3 mt-2">Materials</div><div class="col-9 mt-2"><input id="materials" type="text" class="form-control"></div>';
	if(a=="0BP")
	{
	$('#data_pt').empty();
	$('#data_pt').append(str);	
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
function load1()
	{
   $.ajax({ 
   url: "fetch.php",
   method:"POST",
   dataType: "json",
   data:{tab:'<?php  echo $project_name; ?>'},   
   success: function(data)  
   {
	   var search = function(e) {
          var pattern = $('#input-search').val();
          var options = {
            ignoreCase: $('#chk-ignore-case').is(':checked'),
            exactMatch: $('#chk-exact-match').is(':checked'),
            revealResults: $('#chk-reveal-results').is(':checked')
          };
          var results = $searchableTree.treeview('search', [ pattern, options ]);

          var output = '<p>' + results.length + ' matches found</p>';
          $.each(results, function (index, result) {
            output += '<p>- ' + result.text + '</p>';
          });
          $('#search-output').html(output);
        }

        $('#btn-search').on('click', search);
        $('#input-search').on('keyup', search);

        $('#btn-clear-search').on('click', function (e) {
          $searchableTree.treeview('clearSearch');
          $('#input-search').val('');
          $('#search-output').html('');
        });
	    var initSelectableTree = function() {
          return $('#fab_dir').treeview({
			  expandIcon:'fa fa-plus',
			  collapseIcon:'fa fa-minus',
			  emptyIcon:'fa fa-file',
			  showBorder:false,
			  backColor:'#f8f9fa',
			  color:'#111',
            data: data,
            onNodeSelected: function(event, node) {
				//here
				
				getdata('directory_sub','<?php  echo $project_name; ?>',node.id);
              //$('#selectable-output').prepend('<p>' + node.id + ' was selected</p>');
            }
          });
        };
        var $selectableTree = initSelectableTree();
        $('#fab_dir').treeview('collapseAll', { silent: true });
		//getdata('directory_sub','<?php  echo $project_name; ?>','0');
      
 }   
 });
	}
	
	
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
	 success:function(d)
	 {
		 console.log(d);
		 
		load1();
		getdata('directory_sub','<?php  echo $project_name; ?>',b);
       $('.total_web').attr('hidden',"");		
	 }
		});		
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
				str+='<div class="col-sm-12 stick1"><button class="btn bg-transparent text-light mb-2" onclick="getdata(\'directory_sub\',\'<?php  echo $project_name; ?>\',\''+d[d.length-1].back_id+'\')"><i class="fa fa-arrow-left"></i> &nbsp;'+d[d.length-1].des+'</button></div><div class="col-sm-12"><p class="text-center text-danger">Neighter Assembly nor Component is Found</p></div>';
			}
			for(i=0;i<d.length-1;i++)
			{
	         
			 if(i==0)
			 {
				 //str +='<div class="col-sm-6"><div class="cb_size"><input type="checkbox"></div><div class="img+data"><img src="img/folder.png" class="img-fluid rounded-circle float-left" style="width:55px;height:55px;"><p class="ml-1">&nbsp;&nbsp;&nbsp;&nbsp;<span class="font-weight-bold">hello project name</span><br>&nbsp;&nbsp;&nbsp;&nbsp;0 files<br>&nbsp;&nbsp;&nbsp;&nbsp;last edited date</p></div></div>';
				 
				str+='<div class="col-sm-12 stick1"><button class="btn bg-tansparent text-light mb-2" onclick="getdata(\'directory_sub\',\'<?php  echo $project_name; ?>\',\''+d[d.length-1].back_id+'\')"><i class="fa fa-arrow-left"></i>  &nbsp;'+d[d.length-1].des+'</button></div>';
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
			
			$('#'+place).empty();
			$('#'+place).append(str);
			$('.total_web').attr('hidden',"");
			
			$("[data-bd=0]").addClass("top1");
			$("[data-bd=1]").addClass("top1");
			$("[data-bd=2]").addClass("top1");
		}
		
	});
	}
function load()
	{
		
$.ajax({ 
   url: "fetch.php",
   method:"POST",
   dataType: "json", 
   data:{tab:'<?php  echo $project_name; ?>'},     
   success: function(data)  
   {
	   
	   var search = function(e) {
          var pattern = $('#input-search').val();
          var options = {
            ignoreCase: $('#chk-ignore-case').is(':checked'),
            exactMatch: $('#chk-exact-match').is(':checked'),
            revealResults: $('#chk-reveal-results').is(':checked')
          };
          var results = $searchableTree.treeview('search', [ pattern, options ]);

          var output = '<p>' + results.length + ' matches found</p>';
          $.each(results, function (index, result) {
            output += '<p>- ' + result.text + '</p>';
          });
          $('#search-output').html(output);
        }

        $('#btn-search').on('click', search);
        $('#input-search').on('keyup', search);

        $('#btn-clear-search').on('click', function (e) {
          $searchableTree.treeview('clearSearch');
          $('#input-search').val('');
          $('#search-output').html('');
        });
	   var initSelectableTree = function() {
          return $('#fab_dir').treeview({
			  expandIcon:'fa fa-plus',
			  collapseIcon:'fa fa-minus',
			  emptyIcon:'fa fa-file',
			  showBorder:false,
			  backColor:'#f8f9fa',
			  color:'#111',
            data: data,
            onNodeSelected: function(event, node) {
				//here
				
				getdata('directory_sub','<?php  echo $project_name; ?>',node.id);
              //$('#selectable-output').prepend('<p>' + node.id + ' was selected</p>');
            }
          });
        };
        var $selectableTree = initSelectableTree();
        $('#fab_dir').treeview('collapseAll', { silent: true });
		getdata('directory_sub','<?php  echo $project_name; ?>','0');
        
 }   
 });
 load1();
	}
  	load();
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

$(document).on("rightclick", ".img_data", function(event) {
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
    $('.custom-menu').css({"top":event.pageY,"display":"block","left":event.pageX});
    return false;
});

$(document).on("rightclick", ".pst", function(event) {
    $('#editval').attr('data-pid',$(this).attr('data-v'));
	$('#revise').attr('data-id',$(this).attr('data-v'));
	$('#revise').attr('data-name',$(this).attr('data-n'));
    $('#editval').attr('data-name',$(this).attr('data-n'));
	$('#cut').attr('data-id',$(this).attr('data-v'));
	$('#copy').attr('data-id',$(this).attr('data-v'));
	$('#paste').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-id',$(this).attr('data-v'));
	$('#revisionhistory').attr('data-name',$(this).attr('data-n'));
	$('#details_show').attr('data-id',$(this).attr('data-v'));
	$('#details_show').attr('data-name',$(this).attr('data-n'));
    $('.custom-menu').css({"top":event.pageY,"display":"block","left":event.pageX});
    return false;
});
$("body").on("click",function() {
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

function active_status(id)
{
	
	$('.fabricated').addClass("watch");
	$('.boughtout').addClass("watch");
	$('.assemble').addClass("watch");
	$('.'+id).removeClass("watch");
	
	$('.'+id).delay(5000).fadeIn();
	
	
}
function genp()
{
	var tab="<?php  echo $project_name; ?>";
	$.ajax({
		url:'gpn1.php',
		dataType:'text',
		type:'post',
		data:{tab:tab},
		success:function(d)
		{
			console.log(d);
			alert("genereated partnumbers");
		}
	});
}
$('#details_show').click(function(){
	var id = $(this).attr("data-id");
	var tab='<?php  echo $project_name; ?>';
	var pid=$('#parent_i').val();
	var name=$(this).attr("data-name");
  
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
				for(var i=0;i<components[0].specification.length;i++)
				{
					str1+=components[0].specification[i]+"<br>";
				}
				var str='<div class="col-sm-8"><table class="table table-bordered"><tbody><tr><th>Model No</th>   <td>'+parts[0].modelno+'</td></tr><tr><th>Make</th><td>'+components[0].make+'</td></tr><tr><th>Description</th>	   <td>'+parts[0].description+'</td></tr><tr><th>PartNo</th><td>'+parts[0].partnumber+'</td></tr><tr>	   <th>Revision</th><td>'+parts[0].revision+'</td></tr><tr><th>Quantity</th><td>'+parts[0].quantity+'</td></tr><tr><th>Available Quantity</th><td>'+components[0].a_q+'</td></tr><tr><th>Infant Mortality</th><td>'+components[0].i_m+'</td></tr></tbody></table></div><div class="col-sm-4"><p class="h5 text-left font-weight-bold">Specifications</p><table class="table"><tr>'+str1+'<br><b class="mt-5">Links</b><br><a class="float-left" href="http://www.google.com" target="_blank">link1</a><br><a class="float-left" target="_blank" href="http://www.google.com">link2</a><br><a class="float-left" target="_blank" href="http://www.google.com">link3</a></tr></table></div>';
				$('#details_all').empty();
				$('#details_all').append(str);
				console.log(str);
				}
				else{
					var str='<div class="col-sm-8"><table class="table table-bordered"><tbody><tr><th>Materials</th>   <td>'+parts[0].material+'</td></tr><tr><th>Description</th>	   <td>'+parts[0].description+'</td></tr><tr><th>PartNo</th><td>'+parts[0].partnumber+'</td></tr><tr>	   <th>Revision</th><td>'+parts[0].revision+'</td></tr><tr><th>Quantity</th><td>'+parts[0].quantity+'</td></tr></tbody></table></div><div class="col-sm-4"><p class="h5 text-left font-weight-bold">Drawings</p><table class="table"><tbody><tr><td><a href="www.google.com" target="_blank" class="float-left">QC_'+parts[0].partnumber+'</a><br><a class="float-left" href="http://www.google.com" target="_blank">RC_'+parts[0].partnumber+'</a><br><a class="float-left" href="http://www.google.com" target="_blank">MD_'+parts[0].partnumber+'</a><br><a class="float-left" href="http://www.google.com" target="_blank">NHA_'+parts[0].pid_partno+'</a></td></tr></tbody></table></div>';
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


$('.total_web').removeAttr('hidden');
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
	
	
}
else{
	header("Location:index.php");
}

?>