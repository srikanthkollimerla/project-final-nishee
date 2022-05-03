<!doctype html>
<html lang="en">
  <head>
  <title>Register</title>
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
            <li class="nav-item"><a class="nav-link brand text-uppercase" href="#">PROJECT</a></li>
        </ul>
    </div>
</nav>
	<!-- navbar close -->
	<!-- login / registration  start-->
	    <div class="container mt-5">
           <div class="row mt-4">
		     <div class="col-md-12">
		     <h2 class="text-center text-uppercase">Register</h2>
		     </div>
		     <div class="col-md-4 offset-md-4 ">
			        <form method="post" action="regempid.php">
				         
                          <div class="form-group">
                          <label class="text-uppercase">Name:</label>
                          <input type="text" name="ename" required class="form-control">
                          </div>
						
                          <div class="form-group">
                          <label class="text-uppercase">Password:</label>
                          <input type="password" required name="password" class="form-control" >
                          </div>
						  
						  <div class="form-group">
                          <label class="text-uppercase">Email:</label>
                          <input type="email" required name="email" class="form-control" >
                          </div>
						  
						  <div class="form-group">
                          <label class="text-uppercase">Mobile:</label>
                          <input type="text" required name="mobile" pattern="[0-9]{10,10}" class="form-control" >
                          </div>
						  
						  <div class="form-group">
                          <label class="text-uppercase">Designation:</label>
                          <input type="text" required name="designation"  class="form-control" >
                          </div>
                          <center>
						  
						  </center>
						  <center>
                          <button type="submit" name="register" class="btn btn-success btn-md">Register</button>
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
    
