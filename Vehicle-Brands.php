<?php 
session_start();
error_reporting(0);

include('include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:index.php');
}
else{

   if(isset($_POST['enable']))
    { 
         
        $id=$_POST['id'];
        $status=$_POST['status'];
        
        $sql="UPDATE brands SET Status='$status' WHERE id='$id' ";		    
        
        $query = $dbh->prepare($sql);       
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();      
        
        header('Location: Vehicle-Brands.php?success');
     }
   if(isset($_POST['disable']))
    { 
         
        $id=$_POST['id']; 
        $status=$_POST['status'];		
             
        $sql="UPDATE brands SET Status='$status' WHERE id='$id' ";		    
        
        $query = $dbh->prepare($sql);      
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->bindParam(':id',$id,PDO::PARAM_STR);
        $query->execute();
             
        header('Location: Vehicle-Brands.php?success');
     }

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
          <a class="dropdown-item" href="Posted-Vehicles.php">Posted Vehicles</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item active" href="Vehicle-Brands.php">Vehicle Brands</a>	
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

      <li class="nav-item ">
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

<div class="container">
		<div class="row row-cols-1 row-cols-md-3">
		
				<?php $sql = "SELECT * FROM brands ORDER BY id ASC";
				$query = $dbh -> prepare($sql);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{
				?>			
				  <div class="col mb-4">
					<div class="card h-100 border-primary">
					  <img src="Uploads/brands/<?php echo htmlentities($result->Image);?>" class="card-img-top" alt="" width="310" height="195">
					  <div class="card-body">
						<h5 class="card-title"><?php echo htmlentities($result->Name);?></h5>
						
						
							<div class="alert alert-primary" role="alert">
							  <center><?php echo htmlentities($result->Status);?><center>
							</div>	
                <!--    <center>
						<a href="options/enable.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-success btn-sm">Enable</a>  
						<a href="options/disable.php?id=<?php echo htmlentities($result->id);?>" class="btn btn-warning btn-sm">Disable</a> 						
						<a href="options/#.php?del=<?php echo htmlentities($result->id);?>" class="btn btn-danger btn-sm disabled">Delete</a>
					</center>-->                                                                                            
					<center>
						<table>
						   <tr>
							   <th>        
								  <center>						
										<form action="" method="POST" >
											<input type="hidden" id="TextInput" class="form-control" value="<?php echo htmlentities($result->id);?>"  name="id" >
											<input type="hidden" id="TextInput" class="form-control" value="Enable"  name="status" >			
											<button type="submit" name="enable" class="btn btn-success btn-sm">Enable</button>
										</form>
								  </center>
							  </th>
							  <th>
								  <center>
										<form action="" method="POST" >
											<input type="hidden" id="TextInput" class="form-control" value="<?php echo htmlentities($result->id);?>"  name="id" >
											<input type="hidden" id="TextInput" class="form-control" value="Disable"  name="status" >				
											<button type="submit" name="disable" class="btn btn-warning btn-sm">Disable</button>
										</form>	
								  </center>
							 </th>
						   </tr>
						</table>
					</center>		
					  </div>
					</div>
				  </div>
		  		<?php }} ?>	
				
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