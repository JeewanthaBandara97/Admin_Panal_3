<?php
session_start();
include('include/config.php');


if(isset($_POST['signup']))
{

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	
	$sql = "INSERT INTO admin(FirstName,LastName,Email,Password) VALUES(:fname,:lname,:email,:password)";	
	 
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':fname',$fname, PDO::PARAM_STR);
	$query-> bindParam(':lname',$lname, PDO::PARAM_STR);	
	$query-> bindParam(':email',$email, PDO::PARAM_STR);
	$query-> bindParam(':password',$password, PDO::PARAM_STR);
	$query-> execute();

	if($query)
	{
	header('Location: index.php?success');
	}
	else 
	{
	echo "<script>alert('Invalid Details');</script>";
	header('Location: index.php?error');

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
       <font size="6" color="#ff1a1a">ADMIN Sign Up</font>
  </div> 
  <div class="form">     
		<form name="insert-form" id="contact-form"  method="POST">     
			<br>
			<div class="inputfield">
			  <label>First Name</label>
			  <input type="text" name="fname" class="input" placeholder="" required aria-describedby="emailHelp">
			</div> 
			<div class="inputfield">
			  <label>Last Name</label>
			  <input type="text" name="lname" class="input" placeholder="" required aria-describedby="emailHelp">
			</div>   			
			<div class="inputfield">
			  <label>Email address</label>
			  <input type="text" name="email" class="input" placeholder="" required aria-describedby="emailHelp">
			</div>    
			<div class="inputfield">
			  <label>Password</label>
			  <input type="password" name="password" class="input" placeholder="" required>
			</div>  
			<div class="inputfield">
			<input type="submit" name="signup" value="Signup" class="btn" >
			</div>
			<div class="inputfield">    
			<input type="button" value="Back To Login" class="btn" onclick="window.location.href = 'index.php';">   
			</div>
			<p>Not a Member? <a href="#.php">Sign up</a></p>
		</form>
    </div>
</div>
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