<?php session_start();
$project_name="";
$empid="";
if(isset($_SESSION['empid']) && isset($_SESSION['pname']))
{
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
  <meta name="description" content="Hemair">
  <meta name="keywords" content="HTML,CSS,JavaScript,Php">
  
<title><?php  echo str_replace("_"," ",$project_name); ?></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<style>
.bg-dark1{
	background-color:#5f5f5f;
	color:white;
}
.btn{
padding:0px;
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
    font-size:22px !important;
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
.canvasjs-chart-credit{
	display:none !important;
}
.btnp0{
	padding:0px;
}
</style>
</head>
<body>
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
<nav class="navbar fixed-top navbar-light bg-dark1 navbar-expand-sm">
  <a class="navbar-brand " href="#">
    <?php  echo str_replace("_"," ",$project_name);  ?>
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
	  	  <li class="nav-item  dropdown">
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
                   <a href="documents.php" style="position:fixed;top:45px;left:0px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-files-o "></i><br class="h6" style="margin-bottom:0rem;">Documents</br></button></a>
                   <a href="log.php" style="position:fixed;top:130px;left:0px;min-width:8.33333%"> <button class="btn bg-dark1" style="width:100%;height:100px; border-radius:0rem;"><i class="fa fa-2x fa-list"></i><br class="h6" style="margin-bottom:0rem;">BOM </br></button></a>
					<a href="../vendor/vmview.php" style="position:fixed;top:220px;left:0px;min-width:8.33333%;"> <button class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-users"></i><br class="h6" style="margin-bottom:0rem;">Vendor<br>Management</br></button></a>
					<a href="../vendor/inputfeed.php" style="position:fixed;top:320px;left:0px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-info-circle "></i><br class="h6" style="margin-bottom:0rem;">INPUT FEED</br></button></a>
					<a href="stats.php" style="position:fixed;top:410px;left:0px;min-width:8.33333%;"><button  class="btn bg-light btnp0"style="width:100%;height:100px;border-radius:0rem;border-left:4px solid tomato;"><i class="fa fa-2x fa-pie-chart"></i><br class="h6" style="margin-bottom:0rem;">Statistics</br></button></a>
					<a href="feedback.php" style="position:fixed;left:0px;top:510px;min-width:8.33333%;"><button  class="btn bg-dark1 btnp0"style="width:100%;height:100px;border-radius:0rem;"><i class="fa fa-2x fa-text-width"></i><br class="h6" style="margin-bottom:0rem;">Ticket System</br></button></a>
                 
</div>

<div class="col-md-11">
<div class="container-fluid " style="padding:0px;">
<div class="row">
<div class="col-md-4">
<div class="w-100" id="piechart"></div>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript">
<?php
	 
		$db1=$project_name;
		  require_once("DB_connect.php");

$query="select count(*) from ".$db1."_parts where p_type LIKE 'FP' and del_status='0'";

$query1="select count(*) from ".$db1."_parts where p_type LIKE 'BP' and del_status='0'";
	  $res=mysqli_query($con1,$query); 
	  $row=mysqli_fetch_array($res);
	  $drawarr=array();
	  array_push($drawarr,array("label"=>"Fabricated","y"=>$row[0]));
	  $res1=mysqli_query($con1,$query1); 
	  $row1=mysqli_fetch_array($res1);
	  array_push($drawarr,array("label"=>"Broughtout","y"=>number_format($row1[0],2)));  
      ?>
var chart = new CanvasJS.Chart("piechart", {
	theme: "dark2",
	backgroundColor: "#5f5f5f",
	animationEnabled: true,
	title: {
		text: "VIEW OF PARTS",
		fontSize: 25,
		fontColor:'#fff',
		fontWeight: "bolder",
	},
	data: [{
		type: "pie",
		indexLabel: "(#percent%)",//{y}
		yValueFormatString: "#,##,##,##0 parts",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#FFF",
		indexLabelFontSize: 18,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($drawarr, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
     


</script>
</div>
<div class="col-md-4">
<div class="w-100" id="piechart1"></div>
<?php
	 	$query="select p_type,description from ".$db1."_parts where pid LIKE 0 and del_status='0'";
		$res=mysqli_query($con1,$query); 
	  $drawarr1=array();
	  while($r=mysqli_fetch_array($res))
	  {

	  $query1="select * from ".$db1."_parts where maid LIKE '$r[0]' and maid!=p_type and del_status='0' and p_type!='FA'";
	  $res1=mysqli_query($con1,$query1); 
	  //$row=mysqli_fetch_array($res1);
	  array_push($drawarr1,array("label"=>$r[1],"y"=>number_format(mysqli_num_rows($res1),2)));  
      
	  //echo "['".$r[1]."', ".$row[0]."],";  
	 
	  }
      ?>
<script type="text/javascript">
    var chart1 = new CanvasJS.Chart("piechart1", {
	theme: "dark2",
	backgroundColor: "#5f5f5f",
	animationEnabled: true,
	title: {
		text: "PARTS IN % DIFFERENT ASSEMBLIES",
		fontSize: 25,
		fontColor:'#fff',
		fontWeight: "bolder",
	},
	data: [{
		type: "pie",
		indexLabel: "(#percent%)",//{y}
		yValueFormatString: "#,##,##,##0 parts",
		indexLabelPlacement: "inside",
		indexLabelFontColor: "#FFF",
		indexLabelFontSize: 16,
		indexLabelFontWeight: "bolder",
		showInLegend: true,
		legendText: "{label}",
		dataPoints: <?php echo json_encode($drawarr1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
</script>
</div>
</div>

</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script src="js/bootstrap-treeview.js"></script>
<script src="js/jquery-ui.js"></script>
<script type="text/javascript">
setTimeout(function(){ $('.total_web').attr('hidden',""); }, 1000);
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