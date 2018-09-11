<?php
session_start();
if(!empty($_SESSION['carrito'])){
	$carrito  = $_SESSION['carrito'];
	if(count($carrito)==1){ unset($_SESSION['carrito']); }
	else{
		$newcart = array();
		foreach($carrito as $c){
			if($c['libro_id']!=$_GET['id']){
				$newcart[] = $c;
			}
		}
		$_SESSION['carrito'] = $newcart;
	}
}
print "<script>window.location='../seem/home.php';</script>";
?>