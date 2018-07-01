<?php
	
	session_start();
	
	if($_SESSION['id'] == 1){
		header('location: ../seem/home.php');
	} else {
		header('location: ../index.php');
	}
?>