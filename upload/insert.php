<?php session_start();
if(isset($_SESSION['empid']))
{
	
$db1="main";
require "DB_connect.php";
$empid="";
$date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_time=$date_location->format('H:i:s');
$current_date=$date_location->format('Y-m-d');
$timestamp= $current_date." ".$current_time;
	$empid=$_SESSION['empid'];
	$_SESSION['empid']=$empid;
$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
$user_name=$rname[0]."/".$rname[1];
if($rname[1]=="Manager")
{
	?>
<!doctype html>
<html>
<head>
<title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
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
	min-height:97vh;
}
.btnp0{
	padding:0px;
}
  </style>
  <script src="jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar fixed-top navbar-light bg-dark1 navbar-expand-sm">
  <a class="navbar-brand " href="#">
    <?php  echo strtoupper("PROJECT"); ?>
  </a>
  <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbar">
        <i class="fa fa-bars fa-2x " style="margin-top:-5px;"></i>
      </button>
  <div class="collapse navbar-collapse flex-column" id="navbar">
    <ul class="navbar-nav nav  w-100">
	      
	  	  <li class="nav-item ml-auto dropdown">
          <a href="javascript:myFunction1()" class="nav-link dropbtn">USER : <?php echo strtoupper($user_name); ?> </a>
  <div id="myDropdown" class="dropdown-content">
  <a href="projectslist.php">All Projects </a>
    <a href="logout.php">Logout</a>
    
  </div>
  </li>
    </ul>
  </div>
</nav>
<div class="container mt-5"> 
<div class="row">
<div class="col-md-12   ">
<p  class="text-center h1 font-weight-bold"><u>New Project<u></p>
</div>
</div>
</div>
<div class="container">
<form method="post" name="dis"  enctype="multipart/form-data" class="frmImageUpload" action="newproject12.php">
<div class="row mt-5">
<div class="col-md-3 offset-md-2">
<strong class="h3 ">Project name</strong>
</div>
<div class="col-md-4  ">
<input type="text" name='project_name' required placeholder="Project name" class="form-control"/>
</div>
</div>
<div class="row mt-2">
<div class="col-md-3 offset-md-2">
<strong class="h3 ">Alias</strong>
</div>
<div class="col-md-4  ">
<input type="text" name='nick_name' required placeholder="Alias"  pattern="[0-9a-zA-z]{1,5}" class="form-control"/>
</div>
</div>
<div class="row mt-2">
<div class="col-md-3 offset-md-2">
<strong class="h3 ">Number Of Main Assemblies</strong>
</div>
<div class="col-md-4 ">
<input type="text" class="form-control" placeholder="Number" name='noofa'  value="0" />
</div> 
</div>




<!--

<div class="row mt-2">
<div class="col-md-3 offset-md-2">
<strong class="h3 ">Upload File(Only excel format)</strong>
</div>
<div class="col-md-4  ">
<input name="excel"  type="file"  class="inputFile " />
</div>
</div>

-->

<div class="row mt-2">
<div class="col-md-12 ">
<center>
<input class="btn-lg btn-success" type="submit" name="i6" value="Register" />
</center>
</div>
</div>
</form>
</div>
</body>
</html>
<script>
function myFunction1() {
    document.getElementById("myDropdown").classList.toggle("show");
}
</script>
	<?php	
}
else{
	
echo "<script>alert('you are not authenticated user please contact manager');window.location.href='projectslist.php';</script>";

}
}
else{
	header("Location:index.php");
}
?>