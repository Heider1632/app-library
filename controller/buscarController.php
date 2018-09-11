<?php
if (isset($_POST['codigobarra'])) {
   # Leemos las variables enviadas mediante Ajax
    $codigobarra = $_POST['codigobarra'];
    $libro = null;

    if(empty($codigobarra)){

        echo 'error_1';

    }else{
    # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo libro para validar los datos en la base de datos
        $usuario -> buscarLibro($codigobarra, $libro);
    }   

        $registro = ($usuario->buscarLibro($codigobarra, $libro));

        $libro = array();
            
        $libro[] = $registro;

        require("../seem/home.php");
}
?>