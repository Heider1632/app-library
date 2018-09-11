<?php 
	# Incluimos la clase usuario
    require_once('../model/usuario.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

	$registro = $usuario->verInventario();

	if ($_POST) {

		$buscar = $_POST['buscar'];

		$registro = $usuario->buscarLibroRegistro($buscar);

	}

	require_once('../seem/inventario.php');

?>