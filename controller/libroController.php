<?php
    # Leemos las variables enviadas mediante Ajax
    $nombre = $_POST['nombre'];
    $codigobarra = $_POST['codigobarra'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];

    if (empty($codigobarra)){
         echo 'error_1';
    }else{
        # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo libro para validar los datos en la base de datos
        $usuario -> RegistrarLibro($nombre, $codigobarra, $precio, $cantidad, $categoria);
     }
?>