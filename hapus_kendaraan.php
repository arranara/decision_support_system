<?php
	include('configdb.php');
	$id = $_GET['id'];
	$result = $mysqli->query("delete from kendaraan where alternatif='$id'");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location:kendaraan.php');
	}
?>