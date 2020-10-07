<?php 
session_start();
error_reporting(0);

include('../include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:../index.php');
}
else{

		if(isset($_POST['submit']))
		{ 

		$id=$_GET['id'];

		$vehiclebrand=$_POST['vehiclebrand'];     
		$vehiclemodel=$_POST['vehiclemodel'];
		$tansmission=$_POST['tansmission'];
		$fueltype=$_POST['fueltype'];
		$edition=$_POST['edition'];
		$modelyear=$_POST['modelyear'];
		$enginecapacity=$_POST['enginecapacity'];
		$mileage=$_POST['mileage'];
		$vowner=$_POST['vowner'];
		$price=$_POST['price'];
		$ac=$_POST['ac'];
		$wh=$_POST['wh'];
		$abs=$_POST['abs'];
		$airb=$_POST['airb'];
		$alloyw=$_POST['alloyw'];
		$cruisec=$_POST['cruisec'];
		$fogl=$_POST['fogl'];
		$powerm=$_POST['powerm'];
		$powers=$_POST['powers'];
		$powerw=$_POST['powerw'];
		$backc=$_POST['backc'];
		$navs=$_POST['navs'];
        $Other=$_POST['Other'];

		  $sql = "UPDATE vehicles SET 
		  VehicleBrand='$vehiclebrand',    VehicleModel='$vehiclemodel',  Tansmission='$tansmission',         FuelType='$fueltype',
		  Edition='$edition',              ModelYear='$modelyear',        EngineCapacity='$enginecapacity',   Mileage='$mileage',
		  VOwner='$vowner',                Price='$price',
		  
		  AC='$ac',                        Wheels='$wh',                  ABS='$abs',                          AirBag='$airb',
		  AlloyWhells='$alloyw',           CruiseControl='$cruisec',      FogLamp='$fogl',                     PowerMirror='$powerm',
		  PowerSteering='$powers',         BackCamera='$backc',           PowerWindows='$powerw',              Navigation='$navs',
		  Other='$Other'

          WHERE id='$id' ";
		  

					
		$query = $dbh->prepare($sql);

		$query->bindParam(':vehiclebrand',$vehiclebrand,PDO::PARAM_STR);
		$query->bindParam(':vehiclemodel',$vehiclemodel,PDO::PARAM_STR);
		$query->bindParam(':tansmission',$tansmission,PDO::PARAM_STR);
		$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
		$query->bindParam(':edition',$edition,PDO::PARAM_STR);
		$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
		$query->bindParam(':enginecapacity',$enginecapacity,PDO::PARAM_STR);
		$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
		$query->bindParam(':vowner',$vowner,PDO::PARAM_STR);
		$query->bindParam(':price',$price,PDO::PARAM_STR);
		$query->bindParam(':ac',$ac,PDO::PARAM_STR);
		$query->bindParam(':wh',$wh,PDO::PARAM_STR);
		$query->bindParam(':abs',$abs,PDO::PARAM_STR);
		$query->bindParam(':airb',$airb,PDO::PARAM_STR);
		$query->bindParam(':alloyw',$alloyw,PDO::PARAM_STR);
		$query->bindParam(':cruisec',$cruisec,PDO::PARAM_STR);
		$query->bindParam(':fogl',$fogl,PDO::PARAM_STR);
		$query->bindParam(':powerm',$powerm,PDO::PARAM_STR);
		$query->bindParam(':powers',$powers,PDO::PARAM_STR);
		$query->bindParam(':powerw',$powerw,PDO::PARAM_STR);
		$query->bindParam(':backc',$backc,PDO::PARAM_STR);
		$query->bindParam(':navs',$navs,PDO::PARAM_STR);
		$query->bindParam(':Other',$Other,PDO::PARAM_STR);

		
		$query->bindParam(':id',$id,PDO::PARAM_STR);	
		$query->execute();

		header('Location: ../Posted-Vehicles.php?success');

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
          <a class="dropdown-item active"  href="../Posted-Vehicles.php">Posted Vehicles</a>
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
<div class="container">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="../Posted-Vehicles.php">Vehicles</a></li>
		<li class="breadcrumb-item active" aria-current="page">Update Vehicle Details</li>
	  </ol>
	</nav>
</div>

<body>

<style>
	 #2 .2 .container #2 .2{
        background: #d5dbd9;
        margin: 20px auto;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.125);
        padding: 30px;
		        max-width: 1000px;
      }
      .container #2 .2 .title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #fec107;

        text-align: center;
      }	  
</style>

<div class="container" id="2">

	  
				<?php 
				$id=intval($_GET['id']);

				$sql ="SELECT * from vehicles WHERE id='$id' ";

				$query = $dbh -> prepare($sql);

				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{	
				?>	
				
	  <div class="title">
		   <font size="6" color="#ff1a1a">Edit Vehicle Details</font>
	  </div> <br>
	  
	 <fieldset disabled>
		<div class="form-row form-group  col-md-12 ">				  
			  <input type="text" id="disabledTextInput" class="form-control text-white bg-info " value="  <?php echo htmlentities($result->VehicleBrand);?> <?php echo htmlentities($result->VehicleModel);?> || Vehicle ID - <?php echo htmlentities($result->VehicleID);?>" >					  
		</div>
	 </fieldset>
			 
	 <form action="" method="POST" >
		 	  
	    <div class="form-row">	
	  
			<div class="form-group col-md-4">
			  <label for="inputState">Vehicle Brand </label>
			  <select id="select1" class="form-control" name="vehiclebrand" >
			  
                <option value="<?php echo htmlentities($result->VehicleBrand);?>"><?php echo htmlentities($result->VehicleBrand);?></option>
				<option>Toyota</option>
				
			  </select>
			</div>	  
			<div class="form-group col-md-4">
			  <label for="">Vehicle Model</label>
			  <input type="text" class="form-control" id="" name="vehiclemodel" value="<?php echo htmlentities($result->VehicleModel);?>" >
			</div>
			<div class="form-group col-md-4">
			  <label for="inputState">Transmission</label>
			  <select id="select2" class="form-control" name="tansmission">
			  
				  <option value="<?php echo htmlentities($result->Tansmission);?>"><?php echo htmlentities($result->Tansmission);?></option>
				  <option value="Manual">Manual</option>
				  <option value="Auto">Auto</option>
				
			  </select>
			</div>				
	  </div>
	  
	  <div class="form-row">	  
  
			<div class="form-group col-md-2">
			  <label for="inputState">Fuel Type</label>
			  <select id="select3" class="form-control" name="fueltype">
			  
				  <option value="<?php echo htmlentities($result->FuelType);?>"><?php echo htmlentities($result->FuelType);?></option>
				  <option value="Diesel">Diesel </option>
				  <option value="Petrol">Petrol </option>
				  <option value="Hybrid/Petrol">Hybrid/Petrol </option>	
			  </select>
			</div>
			<div class="form-group col-md-2">
			  <label for="">Edition</label>
			  <input type="text" class="form-control" id="" name="edition" value="<?php echo htmlentities($result->Edition);?>">
			</div>
			<div class="form-group col-md-2">
			  <label for="">Model Year</label>
			  <input type="text" class="form-control" id="" name="modelyear" value="<?php echo htmlentities($result->ModelYear);?>">
			</div>
			<div class="form-group col-md-2">
			  <label for="">Engine Capacity</label>
			  <input type="text" class="form-control" id="" name="enginecapacity" value="<?php echo htmlentities($result->EngineCapacity);?>">
			</div>
			<div class="form-group col-md-2">
			  <label for="">Mileage</label>
			  <input type="text" class="form-control" id="" name="mileage" value="<?php echo htmlentities($result->Mileage);?>">
			</div>
			<div class="form-group col-md-2">
			  <label for="">Condition</label>
			  <select id="select4" class="form-control" name="vowner">
			  
				  <option value="<?php echo htmlentities($result->VOwner);?>"><?php echo htmlentities($result->VOwner);?></option>
				  <option value="New">New</option>
				  <option value="Used">Used</option>
				  
			  </select>
			</div>
			<div class="form-group col-md-4">
			  <label for="">Price</label>
			  <input type="text" class="form-control" id="" name="price" value="<?php echo htmlentities($result->Price);?>">
			</div>
			
	  </div>
	  
<?php 
	 $A = $result->AC ;	 
	 $B = $result->Wheels ;
	 $C = $result->ABS ;	 
	 $D = $result->AirBag ;
	 $E = $result->AlloyWhells ;
	 $F = $result->CruiseControl ;
	 $G = $result->FogLamp ;
	 $H = $result->PowerMirror ;
	 $I = $result->PowerSteering ;
	 $J = $result->PowerWindows ;
	 $K = $result->BackCamera ;	 
	 $L = $result->Navigation ;
	 
	 if($A == 'AC'){$a = 'checked';}else{$a = '';} 	 
	 if($B == '4WD'){$b = 'checked';}else{$b = '';}
	 if($C == 'ABS'){$c = 'checked';}else{$c = '';}	 
	 if($D == 'AIR-BAG'){$d = 'checked';}else{$d = '';}
	 if($E == 'Alloy-Wheels'){$e = 'checked';}else{$e = '';}
	 if($F == 'Cruise-Control'){$f = 'checked';}else{$f = '';}
	 if($G == 'FOG-Lamp'){$g = 'checked';}else{$g = '';}
	 if($H == 'Power-Mirror'){$h = 'checked';}else{$h = '';}
	 if($I == 'Power-Steering'){$i = 'checked';}else{$i = '';}
	 if($J == 'Power-Windows'){$j = 'checked';}else{$j = '';}
	 if($K == 'Back-Camera'){$k = 'checked';}else{$k = '';}
	 if($L == 'Navigation-System'){$l = 'checked';}else{$l = '';}
?> 

	<div class="form-group">
		
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck1" name="ac" value="AC" <?php echo $a;?>>
		  <label class="form-check-label" for="gridCheck1">AC</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck2"   name="wh" value="4WD" <?php echo $b;?>>
		  <label class="form-check-label" for="gridCheck2">4WD</label>
		</div>			
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck3"  name="abs" value="ABS" <?php echo $c;?>>
		  <label class="form-check-label" for="gridCheck3">ABS</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck4" name="airb" value="AIR-BAG" <?php echo $d;?>>
		  <label class="form-check-label" for="gridCheck4">AIR BAG</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck5" name="alloyw" value="Alloy-Wheels" <?php echo $e;?>>
		  <label class="form-check-label" for="gridCheck5">Alloy Wheels</label>
		</div>
		
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck6" name="cruisec" value="Cruise-Control" <?php echo $f;?>>
		  <label class="form-check-label" for="gridCheck6">Cruise Control</label>
		</div>
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck7" name="fogl" value="FOG-Lamp" <?php echo $g;?>>
		  <label class="form-check-label" for="gridCheck7">FOG Lamp</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck8" name="powerm" value="Power-Mirror" <?php echo $h;?>>
		  <label class="form-check-label" for="gridCheck8">Power Mirror</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck9" name="powers" value="Power-Steering" <?php echo $i;?>>
		  <label class="form-check-label" for="gridCheck9">Power Steering</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck10" name="powerw" value="Power-Windows" <?php echo $j;?>>
		  <label class="form-check-label" for="gridCheck10">Power Windows</label>
		</div>	
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck11" name="backc" value="Back-Camera" <?php echo $k;?>>
		  <label class="form-check-label" for="gridCheck11">Back Camera</label>
		</div>			
		<div class="form-check custom-control-inline">
		  <input class="form-check-input" type="checkbox" id="gridCheck12" name="navs" value="Navigation-System" <?php echo $l;?>>
		  <label class="form-check-label" for="gridCheck12">Navigation System</label>
		</div>			
	</div>
	<div class="form-row">
	       <div class="form-group col-md-8">
				<label for="">Ex</label>
				<input type="text" class="form-control" id="" name="Other" value="<?php echo htmlentities($result->Other);?>">
     	  </div>
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