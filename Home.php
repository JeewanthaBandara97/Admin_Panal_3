<?php 
session_start();
error_reporting(0);

include('include/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
    header('location:index.php');
    }
    else{

?>


<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGIRI</title>
	<!--Bootstrap CSS -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="assets/bootstrap/css/stylee.css">		

    <!-- Font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

	
	<link rel="stylesheet" href="assets/css/stylee.css">
	
</head>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top">
  <a class="navbar-brand" href="Home.php"><font color="#ff3333">SI</font>GIRI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
  
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" class="nav nav-pills">
	
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
	  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Motors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="Posted-Vehicles.php">Posted Vehicles</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Vehicle-Brands.php">Vehicle Brands</a>	
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="options/Insert-Vehicle.php">Insert Vehicle</a>
        </div>
      </li>
	  
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Design
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="Posted-Design.php">Posted Designs</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="options/Insert-Design.php">Insert Design</a>
        </div>
      </li>	  

      <li class="nav-item">
        <a class="nav-link" href="Messages.php">Messages <span class="sr-only"></span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="Other.php">Other <span class="sr-only"></span></a>
      </li>	  
    </ul>	
	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="Settings.php" class="dropdown-item">Settings</a>
				<div class="dropdown-divider"></div>
				<a href="include/logout.php"class="dropdown-item">Logout</a>
			</div>
		</li>
	</ul>
  </div>
</nav>

<br><br><br>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

<!-- ############################################################################### -->

<div class="container">
	<div class="accordion" id="accordionExample">


			<div class="card">
				<div class="card-header bg-light " id="headingOne">
				  <h2 class="mb-0">
				  
					<div class="alert alert-success  text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<center><h5>TOTAL SUMMERY </h5></center>
					</div> 
					
				  </h2>
				</div>
				<div id="collapseOne" class="collapse show bg-light" aria-labelledby="headingOne" data-parent="#accordionExample">
				     <div class="card-body">
				  
							 <div class="row">				 
            
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Admins </h5>
									<div class="alert alert-warning text-center">
										<i class="fa fa-users fa-5x"></i>
										<h3>							
										  <?php								  
												$query	= "SELECT * FROM admin";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>								  
										</h3>
										 
									</div>
									
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Vehicles </h5>
									<div class="alert alert-warning text-center">
										<i class="fa fa-car fa-5x"></i>
										<h3>							
										  <?php								  
												$query	= "SELECT * FROM vehicles";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>								  
										</h3>
										 
									</div>
									
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Vehicle Brands</h5>
									<div class="alert alert-warning text-center">
										<i class="fa fa-anchor fa-5x"></i>
										<h3>							
										  <?php								  
												$query	= "SELECT * FROM brands";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>								  
										</h3>
										 
									</div>
									
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Products </h5>
									<div class="alert alert-warning text-center">
										<i class="fa fa-certificate fa-5x"></i>
										<h3>							
										  <?php								  
												$query	= "SELECT * FROM design";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>								  
										</h3>
										 
									</div>
									
								</div>							
							 </div> 
				    </div>
			     </div>
			</div>
			  
			  
<!-- ###################################################################################### -->			  
			  
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h2 class="mb-0">
				  
					<div class="alert alert-primary btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<center><h5>SIGIRI MORTORS</h5></center>
					</div> 	
					
				  </h2>
				</div>

				<div id="collapseTwo" class="collapse bg-light" aria-labelledby="headingTwo" data-parent="#accordionExample">
				     <div class="card-body">
				  
						<div class="row">				 

								
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Toyota </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Toyota' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>	
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Nissan </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Nissan' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>						
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Honda </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Honda' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Suzuki </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Suzuki' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Mitsubishi </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Mitsubishi' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Maruti-Suzuki </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Maruti-Suzuki' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>BMW </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='BMW' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Audi </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Audi' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Kia </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Kia' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Micro </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Micro' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>	
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Landrover </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Landrover' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Mercedes-Bens </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Mercedes-Bens' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Mazda </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Mazda' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<h5>Hyundai </h5>						
									<div class="alert alert-dark text-center">
										<div class="panel-body">
											<i class="fa fa-taxi  fa-5x"></i>
											<h3>
										  <?php								  
												$query	= "SELECT * FROM vehicles  WHERE VehicleBrand='Hyundai' ";
												$query_run = $dbh->query($query);
												$query_exec = $query_run->rowCount();
												echo "$query_exec ";						  			  
										  ?>
											</h3>
										</div>
										<div class="panel-footer back-footer-blue">                    
										</div>
									</div>						
								</div>                             
						   </div> 
				    </div>
				</div>
			    </div>
			  
<!-- ###################################################################################### -->
			  
				  <div class="card">
					<div class="card-header" id="headingThree">
					  <h2 class="mb-0">
						
						<div class="alert alert-primary  text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
							<center><h5>SIGIRI DESIGN </h5></center>
						</div> 
					
					  </h2>
					</div>
					<div id="collapseThree" class="collapse bg-light" aria-labelledby="headingThree" data-parent="#accordionExample">
					  <div class="card-body">
					  
							   <div class="row">				 

									
									<div class="col-md-3 col-sm-3 col-xs-6">
										<h5>Granite Items</h5>						
										<div class="alert alert-dark text-center">
											<div class="panel-body">
												<i class="fa fa-university fa-5x"></i>
												<h3>
											  <?php								  
													$query	= "SELECT * FROM design  WHERE Type='GI' ";
													$query_run = $dbh->query($query);
													$query_exec = $query_run->rowCount();
													echo "$query_exec ";						  			  
											  ?>	
												</h3>
											</div>
											<div class="panel-footer back-footer-blue">                    
											</div>
										</div>						
									</div>	
									<div class="col-md-3 col-sm-3 col-xs-6">
										<h5>Other Items </h5>						
										<div class="alert alert-dark text-center">
											<div class="panel-body">
												<i class="fa fa-university  fa-5x"></i>
												<h3>
											  <?php								  
													$query	= "SELECT * FROM design  WHERE Type='OI' ";
													$query_run = $dbh->query($query);
													$query_exec = $query_run->rowCount();
													echo "$query_exec ";						  			  
											  ?>	
												</h3>
											</div>
											<div class="panel-footer back-footer-blue">                    
											</div>
										</div>						
									</div>			
							 </div>
					  </div>
				     </div>
			  
				 </div>
	</div>
</div>

<?php
include ("include/footer.php");
?>
	
</body>

	
    <!-- JavaScript -->		
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!--Bootstrap JS -->
	<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>	

    <!-- Jquery core JavaScript -->
    <script src="assets/bootstrap/jquery/jquery.min.js"></script>
	<script src="assets/bootstrap/jquery/jquery.js"></script>
    <script src="assets/bootstrap/jquery/jquery.slim.min.js"></script>
	<script src="assets/bootstrap/jquery/jquery.slim.js"></script>
	
    <script src="assets/js/right-click-dissable.js"></script>
</html>
 <?php } ?>