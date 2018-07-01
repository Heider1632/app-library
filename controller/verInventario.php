<?php 
	# Incluimos la clase usuario
    require_once('../model/usuario.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

	$registro = $usuario->verRegCompra();

	require_once('../seem/registro_compra.php');



?>