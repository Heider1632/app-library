<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Añadir Libro</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
  <link rel="stylesheet" href="../css/footer.css">
  <link href="../css/layout.css" rel="stylesheet" type="text/css" media="all">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>
<style type="text/css">
  .logo-navbar{
    width: 200px;
    height: 120px;
    background: url('../images/logo-ali.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 70% 70%;
  }
</style>

<body id="top">
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/01.png');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div id="logo" class="fl_left">
        <div class="logo-navbar"></div>
      </div>
      <nav id="mainav" class="fl_right">
        <ul class="clear">
          <li class="active"><a href="../seem/home.php">Inicio</a></li>
          <li><a href="../controller/verInventario.php">Inventario</a></li>
          <li><a href="../controller/verRegCompra.php">Registro de Compras</a></li>
          <li><a href="../controller/cerrarSesion.php">Salir</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>

  <br>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 align="center">Añadir un Libro</h1>
		</div>
	</div>
	<div class="row">
	<div class="col-md-8">
	 <form action="../controller/libroController.php" method="POST">
        <!--Body-->
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" id="nombre" class="form-control white-text">
        </div>
        
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="num" class="form-control" id="precio" class="form-control white-text">
            
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="num" class="form-control" id="cantidad" class="form-control white-text">
        </div>

        <div class="form-group">
        <label for="categoria">Categoria</label>
            <select type="text" id="categoria" class="form-control white-text">
                <option value="1">Obra</option>
                <option value="2">Texto</option>
        </select>
        
        </div>

        <div class="form-group">
            <label>Codigo Barra</label>
            <input type="num" class="form-control" id="codigobarra" class="form-control white-text">
        </div>

        <button type="button" id="sends" class="btn btn-success btn-block btn-rounded z-depth-1">Hecho</button>
       	</form>

      </div>
      <div class="col-md-2">
        <style type="text/css">
          .image{

            width: 400px;
            height: 500px;
            background: url('../images/logo-ali.png');
            background-size: 100% 100%;
            background-position: right;
            background-repeat: no-repeat;
            border-radius: 25px;
          }  
      </style>
        <div class="image">
        </div>
      </div>
  </div>
 </div>
</body>
<script src="../js/sweetalert.min.js"></script>
    <script type="text/javascript">
    $('#send').click(function(){

  var nombre = $('#nombre').val();
  var precio = $('#precio').val();
  var cantidad = $('#cantidad').val();
  var categoria = $('#categoria').val();
  var codigobarra = $('#codigobarra').val();

  // Envio de datos mediante Ajax
  $.ajax({
    method: 'POST',
    // Recuerda que la ruta se hace como si estuvieramos en el index y no en operaciones por esa razon no utilizamos ../ para ir a controller
    url: 'controller/libroController.php',
    // Recuerda el primer parametro es la variable de php y el segundo es el dato que enviamos
    data: {nombre: nombre, precio: precio, cantidad: cantidad, codigobarra: codigobarra},
    // el parametro res es la respuesta que da php mediante impresion de pantalla (echo)
    success: function(res){
      // Ahora validamos la respuesta de php, si es error_1 algun campo esta vacio de lo contrario todo salio bien y redireccionaremos a donde diga php
      if(res == 'error_1'){
        /*
        Para usar sweetalert es muy sencillo, has de cuenta que haces un alert
        solo que esta ves enviaras 3 parametros separados por comas, el primero
        es el titulo de la alerta, el segundo es la descripcion y el tercero es el tipo de alerta
        en el momento conozco tres tipos, entonces puedes variar entre success: Muestra animación de un check,
        warning: muestra icono de advertencia amarillo y error: muestra una animacion con una X muy chula :v
        */
        swal('Error', 'ocurrio algo inesperado', 'error');
      }else if(res == 'error_2'){

        swal('Exito', 'exito libro añadido', 'success');
      }else(res == 'error_3'){
        swal('error', 'libro repetido', 'error');
      }
    }
  });

});
  </script>
</html>