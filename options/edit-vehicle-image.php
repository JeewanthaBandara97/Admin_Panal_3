<?php 
session_start();
error_reporting(0);

include('../include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:../index.php');
}
else{

		if(isset($_POST['update']))
		{
			
		$id=intval($_GET['id']);

		$vimage1= time() . '-' . $_FILES["img1"]["name"];
		$newfilename = round(microtime(true)) . '.' . end($temp);
		move_uploaded_file($_FILES["img1"]["tmp_name"],"../Uploads/vehicles/" .time() . '-'.$_FILES["img1"]["name"]);

		$sql="update vehicles set Image1=:vimage1 where id=:id";

		$query = $dbh->prepare($sql);
		$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_STR);
		$query->execute();

		$msg="Image updated successfully";

		header('Location: ../Posted-Vehicles.php?Image-updated-successfully ');

		}

				if(isset($_POST['update2']))
				{
					
				$id=intval($_GET['id']);

				$vimage1= time() . '-' . $_FILES["img2"]["name"];
				$newfilename = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES["img2"]["tmp_name"],"../Uploads/vehicles/" .time() . '-'.$_FILES["img2"]["name"]);

				$sql="update vehicles set Image2=:vimage1 where id=:id";

				$query = $dbh->prepare($sql);
				$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
				$query->bindParam(':id',$id,PDO::PARAM_STR);
				$query->execute();

				$msg="Image updated successfully";

				header('Location: ../Posted-Vehicles.php?Image-updated-successfully ');

				}
if(isset($_POST['update3']))
{
	
$id=intval($_GET['id']);

$vimage1= time() . '-' . $_FILES["img3"]["name"];
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["img3"]["tmp_name"],"../Uploads/vehicles/" .time() . '-'.$_FILES["img3"]["name"]);

$sql="update vehicles set Image3=:vimage1 where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Image updated successfully";

header('Location: ../Posted-Vehicles.php?Image-updated-successfully ');

}
				if(isset($_POST['update4']))
				{
					
				$id=intval($_GET['id']);

				$vimage1= time() . '-' . $_FILES["img4"]["name"];
				$newfilename = round(microtime(true)) . '.' . end($temp);
				move_uploaded_file($_FILES["img4"]["tmp_name"],"../Uploads/vehicles/" .time() . '-'.$_FILES["img4"]["name"]);

				$sql="update vehicles set Image4=:vimage1 where id=:id";

				$query = $dbh->prepare($sql);
				$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
				$query->bindParam(':id',$id,PDO::PARAM_STR);
				$query->execute();

				$msg="Image updated successfully";

				header('Location: ../Posted-Vehicles.php?Image-updated-successfully ');

				}
if(isset($_POST['update5']))
{
	
$id=intval($_GET['id']);

$vimage1= time() . '-' . $_FILES["img5"]["name"];
$newfilename = round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["img5"]["tmp_name"],"../Uploads/vehicles/" .time() . '-'.$_FILES["img5"]["name"]);

$sql="update vehicles set Image5=:vimage1 where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Image updated successfully";

header('Location: ../Posted-Vehicles.php?Image-updated-successfully ');
}
?>

	
	
	
	
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGIRI</title>	
	<!--Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/bootstrap/css/stylee.css">		

    <!-- Font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

	
	<link rel="stylesheet" href="../assets/css/stylee.css">
	
</head>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top">
  <a class="navbar-brand" href="Home.php"><font color="#ff3333">SI</font>GIRI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
  
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0" class="nav nav-pills">
	
      <li class="nav-item ">
        <a class="nav-link" href="../Home.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>
	  
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Motors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item active" href="../Posted-Vehicles.php">Posted Vehicles</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../Vehicle-Brands.php">Vehicle Brands</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="Insert-Vehicle.php">Insert Vehicle</a>
        </div>
      </li>
	  
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Design
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Posted-Design.php">Posted Designs</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="Insert-Design.php">Insert Design</a>
        </div>
      </li>	  

      <li class="nav-item">
        <a class="nav-link" href="../Messages.php">Messages <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="../Other.php">Other <span class="sr-only"></span></a>
      </li>	 	  
    </ul>
	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="../Settings.php" class="dropdown-item">Settings</a>
				<div class="dropdown-divider"></div>
				<a href="../include/logout.php"class="dropdown-item">Logout</a>
			</div>
		</li>
	</ul>
  </div>
</nav>

<br><br><br>

<body>

<div class="container">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="../Posted-Vehicles.php">Vehicles</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Pictures</li>
	  </ol>
	</nav>
</div>

<div class="container">
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles where vehicles.id=:id";

				$query = $dbh -> prepare($sql);
				$query-> bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
			 <fieldset disabled>
				<div class="form-row form-group  col-md-12 ">				  
                      <input type="text" id="disabledTextInput" class="form-control text-white bg-info " value="  <?php echo htmlentities($result->VehicleBrand);?> <?php echo htmlentities($result->VehicleModel);?> || Vehicle ID - <?php echo htmlentities($result->VehicleID);?>" >					  
				</div>
			 </fieldset>
			  <?php }} ?>	
</div>	
		 
<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
	
<!-- ################################################################################-->	
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles where vehicles.id=:id";

				$query = $dbh -> prepare($sql);
				$query-> bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
            <form action="" method="POST" enctype="multipart/form-data">			
			<div class="col mb-4 form-group">
				<div class="card h-100">
				  <img src="../Uploads/vehicles/<?php echo htmlentities($result->Image1);?>" class="card-img-top" width="310" height="195" style="z-index:1">
				  <div class="card-body">
					<h5 class="card-title"><b>Change Image 1</b></h5>
					<h6></h6>
					 <p class="card-text"><font color="#b3b3b3">
            <input type="file" name="img1" class="input" required >					 
					 </font></p>
					<center>
					<button type="submit" name="update" class="btn btn-primary">Upload</button>
					</center>
				  </div>
				</div>
			 </div>				
	         </form>
	             <?php }} ?>	
<!-- ################################################################################-->
<!-- ################################################################################-->	
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles where vehicles.id=:id";

				$query = $dbh -> prepare($sql);
				$query-> bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
            <form action="" method="POST" enctype="multipart/form-data">			
			<div class="col mb-4 form-group">
				<div class="card h-100">
				  <img src="../Uploads/vehicles/<?php echo htmlentities($result->Image2);?>" class="card-img-top" width="310" height="195" style="z-index:1">
				  <div class="card-body">
					<h5 class="card-title"><b>Change Image 2</b></h5>
					<h6></h6>
					 <p class="card-text"><font color="#b3b3b3">
            <input type="file" name="img2" class="input" required>					 
					 </font></p>
					<center>
					<button type="submit" name="update2" class="btn btn-primary">Upload</button>
					</center>
				  </div>
				</div>
			 </div>				
	         </form>
	             <?php }} ?>	
<!-- ################################################################################-->
<!-- ################################################################################-->	
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles where vehicles.id=:id";

				$query = $dbh -> prepare($sql);
				$query-> bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
            <form action="" method="POST" enctype="multipart/form-data">			
			<div class="col mb-4 form-group">
				<div class="card h-100">
				  <img src="../Uploads/vehicles/<?php echo htmlentities($result->Image3);?>" class="card-img-top"  width="310" height="195" style="z-index:1">
				  <div class="card-body">
					<h5 class="card-title"><b>Change Image 3</b></h5>
					<h6></h6>
					 <p class="card-text"><font color="#b3b3b3">
            <input type="file" name="img3" class="input" required >					 
					 </font></p>
					<center>
					<button type="submit" name="update3" class="btn btn-primary">Upload</button>
					</center>
				  </div>
				</div>
			 </div>				
	         </form>
	             <?php }} ?>	
<!-- ################################################################################-->
<!-- ################################################################################-->	
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles where vehicles.id=:id";

				$query = $dbh -> prepare($sql);
				$query-> bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
            <form action="" method="POST" enctype="multipart/form-data">			
			<div class="col mb-4 form-group">
				<div class="card h-100">
				  <img src="../Uploads/vehicles/<?php echo htmlentities($result->Image4);?>" class="card-img-top"  width="310" height="195" style="z-index:1">
				  <div class="card-body">
					<h5 class="card-title"><b>Change Image 4</b></h5>
					<h6></h6>
					 <p class="card-text"><font color="#b3b3b3">
            <input type="file" name="img4" class="input" required>					 
					 </font></p>
					<center>
					<button type="submit" name="update4" class="btn btn-primary">Upload</button>
					</center>
				  </div>
				</div>
			 </div>				
	         </form>
	             <?php }} ?>	
<!-- ################################################################################-->
<!-- ################################################################################-->	
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles where vehicles.id=:id";

				$query = $dbh -> prepare($sql);
				$query-> bindParam(':id', $id, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
            <form action="" method="POST" enctype="multipart/form-data">			
			<div class="col mb-4 form-group">
				<div class="card h-100">
				  <img src="../Uploads/vehicles/<?php echo htmlentities($result->Image5);?>" class="card-img-top" width="310" height="195"  style="z-index:1">
				  <div class="card-body">
					<h5 class="card-title"><b>Change Image 5</b></h5>
					<h6></h6>
					 <p class="card-text"><font color="#b3b3b3">
            <input type="file" name="img5" class="input" required >					 
					 </font></p>
					<center>
					<button type="submit" name="update5" class="btn btn-primary">Upload</button>
					</center>
				  </div>
				</div>
			 </div>				
	         </form>
	             <?php }} ?>	
<!-- ################################################################################-->
     </div>	 
</div>


<?php
include ("../include/footer.php");
?>


</body>

	
    <!-- JavaScript -->		
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!--Bootstrap JS -->
	<script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>	

    <!-- Jquery core JavaScript -->
    <script src="../assets/bootstrap/jquery/jquery.min.js"></script>
	<script src="../assets/bootstrap/jquery/jquery.js"></script>
    <script src="../assets/bootstrap/jquery/jquery.slim.min.js"></script>
	<script src="../assets/bootstrap/jquery/jquery.slim.js"></script>
	
    <script src="../assets/js/right-click-dissable.js"></script>
</html>
 <?php } ?>