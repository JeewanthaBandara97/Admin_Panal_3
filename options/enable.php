<?php

include('../include/config.php');


$id=intval($_GET['id']);
 

$option='Enable';

$sql="update brands set Option=:option where id=:id";		    

$query = $dbh->prepare($sql);

$query->bindParam(':option',$option,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();


header('Location: ../Vehicle-Brands.php?success');



?>
