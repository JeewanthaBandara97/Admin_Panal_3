<?php 
session_start();
error_reporting(0);

include('../include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:../index.php');
}
else{

		$id=$_GET['id'];

		if(isset($_POST['submit']))
		{ 

		$id=$_GET['id'];

		$productname=$_POST['productname'];     
		$discription=$_POST['discription'];


		$sql = "UPDATE design SET  ProductName='$productname',Discription='$discription' WHERE id='$id' ";
					
		$query = $dbh->prepare($sql);

		$query->bindParam(':productname',$productname,PDO::PARAM_STR);
		$query->bindParam(':discription',$discription,PDO::PARAM_STR);
		$query->bindParam(':id',$id,PDO::PARAM_STR);	
		$query->execute();

		header('Location: ../Posted-Design.php?success');

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
	  
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Motors
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Posted-Vehicles.php">Posted Vehicles</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../Vehicle-Brands.php">Vehicle Brands</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="../Insert-Vehicle.php">Insert Vehicle</a>
        </div>
      </li>
	  
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Design
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../Posted-Design.php">Posted Designs</a>
		  <div class="dropdown-divider"></div>
          <a class="dropdown-item active" href="../Insert-Design.php">Insert Design</a>
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
<div class="container" id="1">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="../Posted-Design.php">Designs</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Design Details </li>
	  </ol>
	</nav>
</div>



<body>

<style>
	 .container #2 {
        background: #d5dbd9;
        margin: 20px auto;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.125);
        padding: 30px;
		        max-width: 500px;
      }
      .container .title #2 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #fec107;

        text-align: center;
      }	  
</style>

<div class="container" id="2">
	  <div class="title">
		   <font size="6" color="#ff1a1a">Edit  Details</font>
	  </div> 
	  
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from design where design.id=:id";

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
	 <form action="" method="POST" >
	 
         <fieldset disabled>
                <div class="form-row form-group  col-md-12 ">				  
                <input type="text" id="disabledTextInput" class="form-control text-white bg-info " value=" <?php echo htmlentities($result->ProductName);?> || Product ID - <?php echo htmlentities($result->ProductID);?>" >					  
                </div>
         </fieldset>	  

			<div class="form-group col-md-12">
			  <label for="">Product Name</label>
			  <input type="text" class="form-control" value="<?php echo htmlentities($result->ProductName);?>" name="productname" >
			</div> 
			
			<div class="form-group col-md-12">
			  <label for="">Discription </label>
			  <input type="text" class="form-control" value="<?php echo htmlentities($result->Discription);?>" name="discription" >
			</div>  
	  
	  <button type="submit" name="submit" class="btn btn-primary">Update</button>

	</form>
	            <?php }} ?>	
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