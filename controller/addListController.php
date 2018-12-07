<?php
	if($_POST){
		# Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        $inv = $usuario->verInventario();

        $precio = $_POST['precio'];

        $list = array();

       	foreach ($inv as $i) {
       		$id = $i['id'];

       		foreach($_POST['precio'][$id] as $value) {
				$precio = array(
					'precio' => $value
				);
			}
       	}

       	var_dump($precio);

			

			foreach ($_POST['nombre'] as $key => $value) {
				$nombre = array(
					'nombre' => $value
				);
			}

			foreach ($_POST['cantidad'] as $key => $value) {
				$cantidad = array(
					'cantidad' => $value
				);
			}

			foreach ($_POST['genero'] as $key => $value) {
				if($value == 'obra'){
					$genero = 1;
				}else{
					$genero = 2;
				}
				$genero = array(
					'genero' => $genero
				);
			}


	}else{
		header('location: verInventario.php');
	} 
?>