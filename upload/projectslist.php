<?php session_start();
$db1="main";
$date_location = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$current_time=$date_location->format('H:i:s');
$current_date=$date_location->format('Y-m-d');
$timestamp= $current_date." ".$current_time;


function username1($con,$empid)
{
$sname="select ename,designation from emp where eid='$empid'";
$qname=mysqli_query($con,$sname);
$rname=mysqli_fetch_array($qname);
$sqp="";
if($rname[1]=="Manager")
$sqp="$('#newpro').append('<a href=\"insert.php\" class=\"nav-link  text-light font-weight-bold\" >New Project</a>')";
echo "<script>$('#user_nameh').text('USER : ".strtoupper($rname[0])."/".strtoupper($rname[1])." ');".$sqp."</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
<title>Project List</title>
<meta charset="UTF-8">
  <meta name="description" content="">
  <meta name="keywords" content="HTML,CSS,JavaScript,Php">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap-chosen.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<style>
.chosen-container-single .chosen-single div b {
    background: url("") no-repeat 0 7px;
    display: block;
    height: 100%;
    width: 100%;
}
.chosen-container-multi .chosen-choices .search-choice .search-choice-close:hover {
    background-position: right 0px;
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
.bg-dark1{
	background-color:#5f5f5f;
	color:white;
}

</style>
</head>
<body>
<nav class="navbar fixed-top navbar-light bg-dark1 navbar-expand-sm">
  <a class="navbar-brand text-light font-weight-bold" href="">
    Projects List  
  </a>
  <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbar">
        <i class="fa fa-bars fa-2x " style="margin-top:-5px;"></i>
      </button>
  <div class="collapse navbar-collapse flex-column" id="navbar">
    <ul class="navbar-nav nav  w-100">
     
	  <li class="nav-item  ml-auto " id="newpro">
          
  </li>
	  <li class="nav-item dropdown   ">
          <a href="javascript:myFunction1()" class="nav-link dropbtn text-light font-weight-bold" id="user_nameh"> </a>
  <div id="myDropdown" class="dropdown-content">
    <a href="projectslist.php">All Projects </a>
    <a href="logout.php">Logout</a>
    
  </div>
  </li>
  </ul>
</div>

      
    </li>
	  
	  
	  </ul>
  </div>
</nav>


<div class="container mt-5">
<div class="row mt-5">

<div class="offset-md-4 col-md-2 mt-5 h5">
Select a Project
</div>
<div class="col-md-2 mt-5">
<form method="post" action="documents.php">
<?php
require_once("DB_connect.php");
if(isset($_SESSION['empid']))
 {
	 unset($_SESSION['pname']) ;
	// unset($_SESSION['pname']);
	 echo"<script>	
					</script><select required  name='se' class='chosen-select '><option  ></option>";
$sqlps="select * from projects where progress!=100";
$qps=mysqli_query($con,$sqlps);
$pj="";
if(mysqli_num_rows($qps)>0)
{
while($rowps=mysqli_fetch_array($qps))
{
   
     echo '<option value="'.$rowps["name"].'">'.$rowps["name"].'</option>';
   
}
echo '</select>';
 }
 username1($con,$_SESSION['empid']);
}
else if(isset($_POST['log']))
 {
	 unset($_SESSION['pname']) ;
	 $name=$_POST['id'];
	 $pass=$_POST['pass'];
	 $sql="select password,eid from emp where eid='$name' or email='$name'";
			
			$res=mysqli_query($con,$sql);
			$r=mysqli_fetch_array($res);
			//echo $r[0];
			if(strcmp($pass,$r[0])==0)
			{
				/*$str="";
				$time=$current_date." ".$current_time;
				//echo "login successfully <br>";
				$login_user="insert into activity_log values('','','$name','$time','Login in','') ";
				mysqli_query($con,$login_user);
				*/
					echo"<script>	
					alert('loggedin successfully');
					window.location.href='';
					</script><select required  name='se' class='chosen-select '><option  ></option>";
          
$sqlps="select * from projects where progress!=100";
$qps=mysqli_query($con,$sqlps);
if(mysqli_num_rows($qps)>0)
{
while($rowps=mysqli_fetch_array($qps))
{
   
     echo '<option value="'.$rowps["name"].'">'.$rowps["name"].'</option>';
   
}
echo '</select>';


}
$_SESSION['empid']=$r[1];

					
			}
			else
			{
				echo"<script>	
	alert('invalid credentials');
	window.location.href='index.php';	
	
	</script>";
				
			}
	username1($con,$name);			
	 
	 
 }
 
else{
	header("Location:index.php");
}
?>
</select>
<input type="submit" class="mt-4 btn btn-success" value="Submit">
</form>
</div>
</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min1.js"></script>
<script type="text/javascript" src="js/chosen.jquery.js"></script>
<script>
$('.chosen-select').chosen();
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
</body>
</html>