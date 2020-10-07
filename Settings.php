<?php 
session_start();
error_reporting(0);

include('include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:index.php');
}
else{
   if(isset($_POST['updatedetails']))
    { 	
		$lemail=$_SESSION['alogin'];
		
		$select_stmt= $dbh->prepare("SELECT id FROM admin WHERE Email ='$lemail' ");
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
		$id =$row['id'];	
		$uname=$_POST['uname'];
		$fname=$_POST['fname'];     
		$lname=$_POST['lname'];

		$sql = "UPDATE admin SET UserName='$uname',FirstName='$fname',LastName='$lname' WHERE id='$id' ";
					
		$query = $dbh->prepare($sql);
		
		$query->bindParam(':uname',$uname,PDO::PARAM_STR);
		$query->bindParam(':fname',$fname,PDO::PARAM_STR);
		$query->bindParam(':lname',$lname,PDO::PARAM_STR);		
		$query->bindParam(':id',$id,PDO::PARAM_STR);	
		$query->execute();

		header('Location: Settings.php?mtype=success&msg=User Details Updated');
		
     }	
	 
   if(isset($_POST['updatepassword']))
    { 	
		$lemail=$_SESSION['alogin'];
		
		$select_stmt= $dbh->prepare("SELECT id FROM admin WHERE Email ='$lemail' ");
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute();
		$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
		
		$id =$row['id'];	
		$opwd=$_POST['opwd'];
		$npwd=$_POST['npwd'];     

		$sql ="SELECT Password FROM admin WHERE Password='$opwd' AND id='$id' ";
		$query= $dbh -> prepare($sql);

		$query-> bindParam(':opwd', $opwd, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		
		if($query -> rowCount() > 0)
		{      
			$sql = "UPDATE admin SET Password='$npwd' WHERE id='$id'";
						
			$query = $dbh->prepare($sql);		
			$query->bindParam(':opwd',$opwd,PDO::PARAM_STR);
			$query->bindParam(':npwd',$npwd,PDO::PARAM_STR);		
			$query->bindParam(':id',$id,PDO::PARAM_STR);	
			$query->execute();
			header('Location: Settings.php?mtype=success&msg=Your Password is Updated');
		}	
		else {
		header('Location: Settings.php?mtype=error&msg=Your old password is not match');	
		}		
     }		 
		
   if(isset($_POST['cleanvehicles']))
    { 	
        $sql="TRUNCATE TABLE vehicles";		         
        $query = $dbh->prepare($sql);       
		$query->execute();
		array_map( 'unlink', array_filter((array) glob("Uploads/vehicles/*") ) );
        header('Location: Settings.php?mtype=success&msg=Vehicle Database Cleaned');
     }
   if(isset($_POST['cleanproducts']))
    { 

		$sql="TRUNCATE TABLE design";		    
        $query = $dbh->prepare($sql);      		 
		$query->execute();
		array_map( 'unlink', array_filter((array) glob("Uploads/disigns/*") ) );
        header('Location: Settings.php?mtype=success&msg=Product Database Cleaned');
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
      <li class="nav-item ">
        <a class="nav-link" href="Other.php">Other <span class="sr-only"></span></a>
      </li>	  		  
    </ul>	
	<ul class="nav navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users" aria-hidden="true"></i></a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="Settings.php" class="dropdown-item active">Settings</a>
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

	 <?php
	 $mtype=$_GET['mtype'];
	 $msg=$_GET['msg'];
	 
	 if($mtype == 'success'){
	?>
		<div class="alert alert-info alert-dismissible fade show" role="alert">
		  <strong>Notification</strong> <?php $msg=$_GET['msg']; echo $msg;?>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
	 <?php	
	}elseif($mtype == 'error'){
	?>	
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
	  <strong>Notification</strong> <?php $msg=$_GET['msg']; echo $msg;?>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<?php
	} 
	?>

		
<br>

	<div class="card w-60">
	  <div class="card-body">
         <h5 class="card-title"><b>Account Settings</b></h5>		  
			<div class="row">
			  <div class="col-sm-6 mb-3">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title">User Details</h5>	

							<?php 
                            $Lemail=$_SESSION['alogin'];
							
							$sql ="SELECT * from admin where Email='$Lemail'";

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
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" class="form-control" id="myText" name="fname" placeholder="<?php echo htmlentities($result->FirstName);?>" value="" required>
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail1">Last Name</label>
							<input type="text" class="form-control" id="myText2" name="lname"  placeholder="<?php echo htmlentities($result->LastName);?>" value="" required>
						  </div>					  
						  <div class="form-group">
							<label for="exampleInputEmail1">User Name</label>
							<input type="text" class="form-control" id="myText3" name="uname" placeholder="<?php echo htmlentities($result->UserName);?>" value="" required>
						  </div>
                          <button type="submit" name="updatedetails" id="ubtn" class="btn btn-primary btn-sm">Update</button>							  
					  </form>
					  
					        
							
					      <button type="" name="" class="btn btn-success btn-sm" id="cbtn" onclick="myFunction1()">Change Details</button>
						  <button type="" name="" class="btn btn-warning btn-sm" id="cnbtn" onclick="myFunction2()">Cancle</button>
				  </div>
				</div>
			  </div>
			  <div class="col-sm-6 mb-3">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title">Change Password</h5>
					  <form action="" method="POST">
					      <input type="hidden" id="TextInput" class="form-control" value="<?php echo htmlentities($result->id);?>"  name="id" >
						  <div class="form-group">
							<label for="exampleInputEmail1">Old Password</label>
							<input type="password" class="form-control" id="" name="opwd" placeholder="" value="" required>
						  </div>					  
						  <div class="form-group">
							<label for="exampleInputEmail1">New Password</label>
							<input type="password" class="form-control" id="" name="npwd" placeholder="" value="" required>
						  </div>
                          <button type="submit" name="updatepassword" class="btn btn-primary btn-sm">Update Password</button>						  
					  </form>
					  
					    <?php }} ?>
				  </div>
				</div>
			  </div>
			</div>
	  </div>
	</div>
<br>
<br>
	<div class="card w-60">
	  <div class="card-body">
         <h5 class="card-title"><b>Other Admin Accounts </b></h5>		  
			<div class="card">
					<table class="table table-striped">
						  <thead>
							<tr>
							  <th scope="col">ID</th>
							  <th scope="col">First Name</th>
							  <th scope="col">Last Name</th>
							  <th scope="col">User Name</th>
							  <th scope="col">Email</th>
							  <th scope="col">Status</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
                            $name=$_SESSION['alogin'];
							
							$sql ="SELECT * from admin";

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
									<tr>
									  <th scope="row"><?php echo htmlentities($result->id);?></th>
									  <td><?php echo htmlentities($result->FirstName);?></td>
									  <td><?php echo htmlentities($result->LastName);?></td>
									  <td><?php echo $name; ?></td>
									  <td><?php echo htmlentities($result->Email);?></td>
									  <td><button type="" name="" id="" class="btn btn-primary btn-sm">Enable</button></td>
									</tr>
				            <?php }} ?>					
						  </tbody>
						</table>
			</div>
	  </div>
	</div>
<br>
<br>
	<div class="card w-60">
	  <div class="card-body">
         <h5 class="card-title"><b>Database Settings</b></h5>		  
			<div class="row">
			  <div class="col-sm-6 mb-3">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title">Vehicle Database</h5>
					<p class="card-text"><center><center></p>
					
					<form action=""  method="POST">
					  <button class="btn btn-warning btn-sm" name="cleanvehicles"  type="submit" onclick="return confirm('Are you sure, you want to clean Vehicle Database?');" >Clean Database</button>
					</form> 
					
				  </div>
				</div>
			  </div>
			  <div class="col-sm-6 mb-3">
				<div class="card">
				  <div class="card-body">
					<h5 class="card-title">Product Database</h5>
					<p class="card-text"><center><center></p>
					
					<form action=""  method="POST">
					  <button class="btn btn-warning btn-sm" name="cleanproducts" type="submit" onclick="return confirm('Are you sure, you want to clean Product Database?');" >Clean Database</button>
					</form>  
					
				  </div>
				</div>
			  </div>
			</div>
	  </div>
	</div>
<br>

</div>

	<script>
		$('#myAlert').on('close.bs.alert', function () {
		  // do something…
		})
	</script>	

	<script>	
		document.getElementById("myText").disabled = true;
		document.getElementById("myText2").disabled = true;
		document.getElementById("myText3").disabled = true;	
		document.getElementById("ubtn").disabled = true;
		document.getElementById("cnbtn").disabled = true;		
	function myFunction1() {
		document.getElementById("myText").disabled = false;
		document.getElementById("myText2").disabled = false;
		document.getElementById("myText3").disabled = false;
		document.getElementById("ubtn").disabled = false;
		document.getElementById("cbtn").disabled = true;
		document.getElementById("cnbtn").disabled = false;			
	}
	function myFunction2() {
		document.getElementById("myText").disabled = true;
		document.getElementById("myText2").disabled = true;
		document.getElementById("myText3").disabled = true;
		document.getElementById("ubtn").disabled = true;
		document.getElementById("cbtn").disabled = false;	
		document.getElementById("cnbtn").disabled = true;		
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