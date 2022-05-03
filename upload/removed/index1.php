<?php session_start();
//require_once("base_connect.php");
if(isset($_SESSION['empid']))
{
	unset($_SESSION['empid']) ;
}
if(isset($_SESSION['pname']))
{
	unset($_SESSION['pname']) ;
}
?>
<!doctype html>
<html lang="en">
  <head>
  <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
	*{
		font-family:"TIMES NEW ROMAN";
	}
	 nav .nav-link:hover {
    color: rgb(250, 10, 7) !important;
      }
	   nav .nav-link{
			color: rgb(7, 72, 250) !important;
			font-weight:bold;
			font-size:30px;
		}
		#newp{
			color:red;
		}
		#newp:hover{
			color:green;
			cursor:pointer;
		}
	
	</style>
  </head>
  <body>
     
    <!--navbar start -->
	<nav class="navbar navbar-expand-md navbar-fixed-top navbar-dark bg-light main-nav">
    <div class="container">
        <ul class="nav navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link brand text-uppercase" href="#">HEMAIR</a></li>
        </ul>
    </div>
</nav>
	<!-- navbar close -->
	<!-- login / registration  start-->
	    <div class="container mt-5">
           <div class="row mt-4">
		     <div class="col-md-12">
		     <h2 class="text-center text-uppercase">LOGIN</h2>
		     </div>
		     <div class="col-md-4 offset-md-4 mt-4">
			        <form method="post" action="projectslist.php">
				         
                          <div class="form-group">
                          <label class="text-uppercase">ID:</label>
                          <input type="text" name="id" required class="form-control">
                          </div>
						
                          <div class="form-group">
                          <label class="text-uppercase">Password:</label>
                          <input type="password" required name="pass" class="form-control" >
                          </div>
                          <center>
						  
						  </center>
						  <center>
                          <button type="submit" name="log" class="btn btn-success btn-md">Login</button>
						  </center>
						   
                    </form>
			 </div>
		   </div>
        </div>		
	<!-- login / registration  end-->
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
    
