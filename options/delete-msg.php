<?php 
session_start();
error_reporting(0);

include('../include/config.php');

if(strlen($_SESSION['alogin'])==0)
{	
header('location:../index.php');
}
else{

	if(isset($_GET['del']))
	{
	$id=$_GET['del'];
	$sql = "DELETE FROM msg  WHERE id ='$id' ";
	$query = $dbh->prepare($sql);
	$query -> bindParam(':id',$id, PDO::PARAM_STR);
	$query -> execute();
	
	header('Location: ../Messages.php?msg_delete');
	}
}
 ?>
