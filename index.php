<?php
session_start();
include('include/config.php');
if(isset($_POST['login']))
{

	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$sql ="SELECT Email,Password FROM admin WHERE Email=:email and Password=:password";
	

	$query= $dbh -> prepare($sql);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> execute();

	$results=$query->fetchAll(PDO::FETCH_OBJ);
	
		if($query->rowCount() > 0)
		{
			
		$_SESSION['alogin']=$_POST['email'];

		echo "<script type='text/javascript'> document.location = 'Home.php'; </script>";
		} else{
				$date=date('Y-m-d H:i:s');
				$time=date('H:i:s');
				
				$sql1 = "INSERT INTO logindetails(LoginDate,LoginTime) 
				VALUES(:date,:time)";
				
				$query1= $dbh -> prepare($sql1);
				$query1->bindParam(':date',$date,PDO::PARAM_STR);
				$query1->bindParam(':time',$time,PDO::PARAM_STR);		
							
				$query1->execute();
				
    echo "	
    <center>	
	<div class=\"spinner-border text-primary\" role=\"status\">
	  <span class=\"sr-only\">Loading...</span>
	</div></center>
	";
				
		  echo "<script>alert('Invalid Login Details');</script>";

		}

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
	<link rel="stylesheet" href="assets/css/form.css"> 
	

</head>

<nav class="navbar navbar-dark navbar-expand-lg bg-dark fixed-top">
  <a class="navbar-brand" href="#"><font color="#ff3333">SI</font>GIRI</a>
</nav>

<body>

<div class="wrapper">
  <div class="title">
       <font size="6" color="#ff1a1a">ADMIN LOGIN</font>
  </div> 
  <div class="form">     
		<form name="insert-form" id="contact-form"  method="POST">     
			<br>
			<div class="inputfield">
			  <label>Email address</label>
			  <input type="text" name="email" class="input" placeholder="example@gmail.com" required aria-describedby="emailHelp">
			</div>    
			<div class="inputfield">
			  <label>Password</label>
			  <input type="password" name="password" class="input" placeholder="" required>
			</div>  
			<div class="inputfield">
			<input type="submit" name="login" value="Login" class="btn" >
			</div>
			<div class="inputfield">    
			<input type="button" value="Cancel" class="btn" onclick="window.location.href = '../index.php';">   
			</div>
			<p>Not a admin? <a href="Signup.php">Sign up</a></p>
		</form>
    </div>
</div>
	

	
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
	
 
</body>