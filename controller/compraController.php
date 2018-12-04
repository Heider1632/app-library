<?php

session_start();

$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$telefono = $_POST['telefono'];
$institucion = $_POST['institucion'];
$metodo = $_POST['metodo'];
$total = $_POST['total'];
$descuento = $_POST['descuento'];
$pago_comprador = $_POST['pago_comprador'];
$cambio = $_POST['cambio'];

require '../model/usuario.php';
$usuario = new Usuario();

if($metodo == 'efectivo'){

	if ($inputValue < $total) {
	
		echo 2;
	
	}else{

	$usuario -> transaccion($nombre, $identificacion, $telefono, $institucion, $metodo, $total);

	}

}else{
	$usuario -> transaccion($nombre, $identificacion, $telefono, $institucion, $metodo, $total);
}

include '../ticket.php';


