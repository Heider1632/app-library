<?php

$id = $_POST['id'];
$codigobarra = $_POST['codigobarra'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

if (empty($id)) {
	
	echo 'error_1';
	
}else if(empty($codigobarra)){

	echo 'error_2';
}else{

	require '../model/usuario.php';

	$usuario = new Usuario();

	$ediLibro = $usuario->editLibro($id,  $codigobarra, $nombre, $cantidad, $precio);
}
?>