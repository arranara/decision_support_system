<?php
	include('configdb.php');
	
	$result = $mysqli->query("delete from tb_admin where id_admin = ".$_GET['id'].";");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: admin.php');
	}
?>