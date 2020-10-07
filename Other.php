<?php 
session_start();
error_reporting(0);

include('include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:index.php');
}
else{
	
   if(isset($_POST['About']))
    { 	

		$about=$_POST['about']; 
		
        $sql="UPDATE about SET about='$about' WHERE id='1'";		         
        $query = $dbh->prepare($sql);       
		$query->execute();

        header('Location: Other.php?success');
     }
   if(isset($_POST['Contact']))
    { 
         
		$Number1=$_POST['Number1'];
        $Number2=$_POST['Number2'];     
        $Number3=$_POST['Number3'];
		
		$sql="UPDATE contactnumber  SET Number1='$Number1',Number2='$Number2',Number3='$Number3' WHERE id='1'";		    
        $query = $dbh->prepare($sql);      		 
		$query->execute();

        header('Location: Other.php?success');
     }
   if(isset($_POST['Social']))
    { 

        $Link1=$_POST['Link1'];
		
		$sql="UPDATE sociallinks  SET links1='$Link1' WHERE id='1'";		    
        $query = $dbh->prepare($sql);      		 
		$query->execute();

        header('Location: Other.php?success');
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
      <li class="nav-item active">
        <a class="nav-link" href="Other.php">Other <span class="sr-only"></span></a>
      </li>
	  
    </ul>	
	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="Settings.php" class="dropdown-item ">Settings</a>
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
	
	<div class="alert alert-info alert-dismissible fade show" role="alert">
	  <strong>Notification</strong> You should check in on some of those fields below.
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
		
<br>

<div class="row">
    <div class="col-sm-6 mb-3">
			<div class="card">
			  <div class="card-body">
				 <h5 class="card-title"><b> About</b></h5>

						  <div class="card-body">
				<?php 

				$sql ="SELECT * from about";

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
							  <form action="" method="POST">
								 <input type="hidden" id="TextInput" class="form-control" value="" name="id" >
										<div class="input-group">
										  <textarea class="form-control" aria-label="With textarea"  name="about" placeholder="<?php echo htmlentities($result->about);?>" ></textarea>
										</div><br>
								  <button type="submit" name="About" id="UpdateAbout" class="btn btn-primary btn-sm">Update</button>							  
							  </form>
				<?php }} ?>				  
								  <button type="" name="" class="btn btn-success btn-sm" id="ChangeAbout" onclick="myFunction1()">Change About</button>
								  <button type="" name="" class="btn btn-warning btn-sm" id="CancleAbout" onclick="myFunction2()">Cancle</button>
						  </div>
					  
			  </div>
			</div>
	</div>		
    <div class="col-sm-6 mb-3">
			<div class="card">
			  <div class="card-body">
				 <h5 class="card-title"><b>Contact Numbers</b></h5>

						  <div class="card-body">
				<?php 

				$sql ="SELECT * from contactnumber";

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
							  <form action="" method="POST">
								 <input type="hidden" id="TextInput" class="form-control" value="<?php echo htmlentities($result->id);?>"  name="id" >
  	
								  <div class="form-group">
									<label for="exampleInputEmail1">Contact Number 1:</label>
									<input type="text" class="form-control" id="myText" name="Number1" placeholder="<?php echo htmlentities($result->Number1);?>" value="" required>
								  </div>
								  <div class="form-group">
									<label for="exampleInputEmail1">Contact Number 2:</label>
									<input type="text" class="form-control" id="myText2" name="Number2"  placeholder="<?php echo htmlentities($result->Number2);?>" value="" required>
								  </div>					  
								  <div class="form-group">
									<label for="exampleInputEmail1">Contact Number 3:</label>
									<input type="text" class="form-control" id="myText3" name="Number3" placeholder="<?php echo htmlentities($result->Number3);?>" value="" required>
								  </div>
								  <button type="submit" name="Contact" id="UpdateNumbers" class="btn btn-primary btn-sm">Update</button>							  
							  </form>
				<?php }} ?>				  
								  <button type="" name="" class="btn btn-success btn-sm" id="ChangeNumbers" onclick="myFunction3()">Change Numbers</button>
								  <button type="" name="" class="btn btn-warning btn-sm" id="CancleNumbers" onclick="myFunction4()">Cancle</button>
						  </div>
					  
			  </div>
			</div>
	</div>
    <div class="col-sm-6 mb-3">
			<div class="card">
			  <div class="card-body">
				 <h5 class="card-title"><b> Social Links</b></h5>

						  <div class="card-body">
				<?php 

				$sql ="SELECT * from sociallinks";

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
								 <input type="hidden" id="TextInput" class="form-control" value=""  name="id" >
								 
								  <div class="form-group">
									<label for="exampleInputEmail1">Facebook:</label>
									<input type="text" class="form-control" id="myText4" name="Link1" placeholder="<?php echo htmlentities($result->links1);?>" value="" required>
								  </div>
								  <button type="submit" name="Social" id="UpdateLinks" class="btn btn-primary btn-sm">Update</button>							  
							  </form>
				<?php }} ?>								  
								  <button type="" name="" class="btn btn-success btn-sm" id="ChangeLinks" onclick="myFunction5()">Change Links</button>
								  <button type="" name="" class="btn btn-warning btn-sm" id="CancleLinks" onclick="myFunction6()">Cancle</button>
						  </div>
					  
			  </div>
			</div>
	</div>	



	
</div>	
<br>

<br>

</div>



	<script>		
		document.getElementById("myText").disabled = true;
		document.getElementById("myText2").disabled = true;
		document.getElementById("myText3").disabled = true;	

		document.getElementById("myText4").disabled = true;
		
		document.getElementById("UpdateAbout").disabled = true;
		document.getElementById("UpdateNumbers").disabled = true;	
		document.getElementById("UpdateLinks").disabled = true;	
		
		document.getElementById("CancleAbout").disabled = true;	
		document.getElementById("CancleNumbers").disabled = true;	
		document.getElementById("CancleLinks").disabled = true;	

	function myFunction1() {

		document.getElementById("UpdateAbout").disabled = false;
		document.getElementById("CancleAbout").disabled = false;	
		document.getElementById("ChangeAbout").disabled = true;		
	}
	function myFunction2() {

		document.getElementById("UpdateAbout").disabled = true;	
		document.getElementById("CancleAbout").disabled = true;
		document.getElementById("ChangeAbout").disabled = false;			
	}

	
	function myFunction3() {
		document.getElementById("myText").disabled = false;
		document.getElementById("myText2").disabled = false;
		document.getElementById("myText3").disabled = false;
		document.getElementById("UpdateNumbers").disabled = false;
		document.getElementById("CancleNumbers").disabled = false;	
		document.getElementById("ChangeNumbers").disabled = true;		
	}
	function myFunction4() {
		document.getElementById("myText").disabled = true;
		document.getElementById("myText2").disabled = true;
		document.getElementById("myText3").disabled = true;
		document.getElementById("UpdateNumbers").disabled = true;	
		document.getElementById("CancleNumbers").disabled = true;
		document.getElementById("ChangeNumbers").disabled = false;			
	}
	
	
	
	function myFunction5() {
		document.getElementById("myText4").disabled = false;
		document.getElementById("UpdateLinks").disabled = false;
		document.getElementById("CancleLinks").disabled = false;	
		document.getElementById("ChangeLinks").disabled = true;		
	}
	function myFunction6() {
		document.getElementById("myText4").disabled = true;
		document.getElementById("UpdateLinks").disabled = true;	
		document.getElementById("CancleLinks").disabled = true;
		document.getElementById("ChangeLinks").disabled = false;			
	}		
	</script>





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