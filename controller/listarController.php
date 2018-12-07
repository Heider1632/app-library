<?php
# Incluimos la clase usuario
    require_once('../model/usuario.php');

    # Creamos un objeto de la clase usuario
    $usuario = new Usuario();

	$registro = $usuario->verInventario();

	require_once('../seem/listar_inventario.php');
?>