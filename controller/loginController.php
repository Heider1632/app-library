<?php

	$clave = $_POST['clave_php'];

	if(empty($clave)){

			echo 'error_1';

      }else{

      		# Incluimos la clase usuario
    		require_once('../model/usuario.php');

            $usuario = new Usuario();

            $usuario->Login($clave);

        }

    ?>