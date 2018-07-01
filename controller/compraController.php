<?php
    # Leemos las variables enviadas mediante Ajax
    $codigobarra = $_POST['codigobarra'];
    $libro = null;
    $x = 20;

    for ($i=0; $i < $x; $i++) { 
         # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo libro para validar los datos en la base de datos
        $usuario -> buscarLibro($codigobarra, $libro);
        
        $registro = ($usuario->buscarLibro($codigobarra, $libro));

        require_once("../seem/home.php");

    }

?>