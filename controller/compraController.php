<?php

session_start();

$nombre = $_POST['nombre'];
$identificacion = $_POST['identificacion'];
$telefono = $_POST['telefono'];
$total = $_POST['total'];
$descuento = $_POST['descuento'];
$pago_comprador = $_POST['pago_comprador'];
$cambio = $_POST['cambio'];

if ($pago_comprador < $total) {
	
	echo 'error desde el controlador';
	
}else{

require '../model/usuario.php';

$usuario = new Usuario();

$usuario -> transaccion($nombre, $identificacion, $telefono, $total);

}

include '../ticket.php';