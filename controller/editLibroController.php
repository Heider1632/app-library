<?php

$id = $_POST['id'];
$codigobarra = $_POST['codigobarra'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

if (empty($id)) {
	
	echo 'error';
}else{

	require '../model/usuario';

	$usuario = new Usuario();

	$ediLibro = $usuario->editLibro($id,  $codigobarra, $nombre, $cantidad, $precio);
}
?>