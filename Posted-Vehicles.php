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
			
			  <li class="nav-item ">
				<a class="nav-link" href="Home.php">Dashboard <span class="sr-only">(current)</span></a>
			  </li>
			  
			  <li class="nav-item dropdown active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Motors
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item active " href="Posted-Vehicles.php">Posted Vehicles</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="Vehicle-Brands.php">Vehicle Brands</a>	
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="options/Insert-Vehicle.php">Insert Vehicle</a>
				</div>
			  </li>
			  
			  <li class="nav-item dropdown">
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
				<a class="nav-link" href="Messages.php">Messages <span class="sr-only">(current)</span></a>
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

<!-- ############################################## Start search ################################-->
<div class="container">

	<div class="alert alert-info alert-dismissible fade show" role="alert">
	  <strong>Notification</strong> You should check in on some of those fields below.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
				<script>
					$('#myAlert').on('close.bs.alert', function () {
					  // do something…
					})
				</script>
	
	<form action="Posted-Vehicles.php" method="POST">
			<div class="input-group md-form form-sm form-2 pl-0">
			 
				  <input class="form-control my-0 py-1 amber-border" id="search" name="keyword" type="text" placeholder="Search" aria-label="Search">
				  <div class="input-group-append">
					<button class="input-group-text amber lighten-3"  type="submit"  name="search" id="basic-text1"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
				  </div>
			  
			</div>
	</form>
</div>
<!-- ############################################## End search ##################################-->
	
<br>

<!-- ############################################## Start Fetch Data ############################-->
<?php  
if(isset($_POST['search'])){
	?>	
<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
	
					<?php					

					$keyword = $_POST['keyword'];
					
					$query = $dbh->prepare("SELECT * FROM vehicles WHERE VehicleBrand LIKE '%$keyword%' OR VehicleModel LIKE '%$keyword%' OR VehicleID LIKE '%$keyword%'ORDER BY id DESC ");
					$query->execute();
					 
					while($row = $query->fetch()) {
					?>	

						  <div class="col mb-4">
							<div class="card h-100">
							  <img src="Uploads/vehicles/<?php echo $row['Image1']; ?>" class="card-img-top" alt="" width="310" height="195" >
							  <div class="card-body">
								<h5 class="card-title"><b><?php echo $row['VehicleBrand']; ?> <?php echo $row['VehicleModel']; ?></b></h5>
								<h6>Vehicle Code: <?php echo $row['VehicleID']; ?></h6>
								
									<p class="card-text"><font color="#b3b3b3">
									<?php echo $row['Tansmission']; ?>.
									<?php echo $row['FuelType']; ?>.
									<?php echo $row['ModelYear']; ?>.
									<?php echo $row['Edition']; ?>.			
									<?php echo $row['EngineCapacity']; ?>. 
									<?php echo $row['Mileage']; ?>.
									<?php echo $row['VOwner']; ?>.
									<?php echo $row['Wheels']; ?>.
									<?php echo $row['CruiseControl']; ?>.
									<?php echo $row['Navigation']; ?>.
									<?php echo $row['PowerSteering']; ?>.
									
									</font></p>
									<center>
								<a href="options/edit-vehicle.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"> Details</a>  
								<a href="options/edit-vehicle-image.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"> Images</a> 						
								<a href="options/delete-vehicle.php?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this vehicle?');">Delete</a>
								</center>
							  </div>
							</div>
						  </div>
               <?php } ?>	 
    </div>
</div>
<?php
}else{
?>	

<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
	
					<?php					
					
					$query = $dbh->prepare("SELECT * FROM vehicles ORDER BY id DESC ");
					$query->execute();
					
					while($row = $query->fetch()) {
					?>	

							  <div class="col mb-4">
								<div class="card h-100">
								  <img src="Uploads/vehicles/<?php echo $row['Image1']; ?>" class="card-img-top" alt="" width="310" height="195">
								  <div class="card-body">
									<h5 class="card-title"><b><?php echo $row['VehicleBrand']; ?> <?php echo $row['VehicleModel']; ?></b></h5>
									<h6>Vehicle Code: <?php echo $row['VehicleID']; ?></h6>
									
										<p class="card-text"><font color="#b3b3b3">
										<?php echo $row['Tansmission']; ?>.
										<?php echo $row['FuelType']; ?>.
										<?php echo $row['ModelYear']; ?>.
										<?php echo $row['Edition']; ?>.			
										<?php echo $row['EngineCapacity']; ?>. 
										<?php echo $row['Mileage']; ?>.
										<?php echo $row['VOwner']; ?>.
										<?php echo $row['Wheels']; ?>.
										<?php echo $row['CruiseControl']; ?>.
										<?php echo $row['Navigation']; ?>.
										<?php echo $row['PowerSteering']; ?>.
										
										</font></p>
										<center>
									<a href="options/edit-vehicle.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"> Details</a>  
									<a href="options/edit-vehicle-image.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Images</a> 						
									<a href="options/delete-vehicle.php?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete this vehicle?');">Delete</a>
									</center>
								  </div>
								</div>
							  </div>
               <?php } ?>	 
    </div>
</div>

<?php
}
?>
<!-- ############################################## End Fetch Data ##########################-->


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