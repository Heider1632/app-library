<?php

session_start();

$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$telefono = $_POST['telefono'];
$institucion = $_POST['institucion'];
$total = $_POST['total'];
$descuento = $_POST['descuento'];
$pago_comprador = $_POST['pago_comprador'];
$cambio = $_POST['cambio'];
$inputValue = $_POST['inputValue'];

if ($inputValue < $total) {
	
	echo 2;
	
}else{

require '../model/usuario.php';

$usuario = new Usuario();

$usuario -> transaccion($nombre, $identificacion, $telefono, $institucion, $total);

include '../ticket.php';

}

