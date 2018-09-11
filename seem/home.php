<?php
  session_start();

  if(!isset($_SESSION['id'])){
    session_destroy();
    header('location: ../index.php');
  }

  setlocale (LC_ALL, 'es_CO');

  require_once '../model/conexion.php';

  $db = new Conexion();

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Library Notch</title>
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
    background: url('../images/logo-02-navbar.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  th{
    font-size: 20px;
  }

  td{
    font-size: 15px;
  }

  div .table-responsive{
    border-radius: 20px;
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
          <li class="active"><a href="home.php">Inicio</a></li>
          <li><a href="../controller/verInventario.php">Inventario</a></li>
          <li><a href="../controller/verRegCompra.php">Registro de Compras</a></li>
          <li><a href="../controller/cerrarSesion.php">Salir</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </header>
  </div>
  <br>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h1 align="center">Buscar</h1>
        <div class="row">
          <div class="col-md-12">
            <form class="form-inline" action="../controller/buscarController.php" method="POST">
              <style type="text/css">
                .buscar{

                  position: relative;
                  left: 800px;
                    
                }

                .buscar input{

                  height: 50px;
                }

                .buscar button{

                  position: relative;
                  top: 4px;
                }

                @media screen and (max-width:1100px) {
                  
                  .buscar{
                    left: 400px;
                  }
                }

                @media screen and (max-width:750px) {
                  
                  .buscar{
                    left: 200px;
                  }
                }

                @media screen and (max-width:430px) {
                  
                  .buscar{
                    left: 50px;
                  }
                }
                
              </style>
            <div class="buscar">
                <label for="cb" class="sr-only">Codigo Barras</label>
                <input type="text" name="codigobarra" autofocus="true" class="form-control" id="cb" placeholder="codigo de barra">
                <button type="submit" name="buscar" class="btn btn-primary mb-2"><i class="material-icons">search</i></button>
            </div>
            </form>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php
            if (isset($_POST['codigobarra'])){
              include '../seem/verProducto.php';
            }
          ?>
        </div>
        </div>
        <div class="row">
          <?php
          include '../seem/carrito.php';
          ?>
        </div>
      </div>
    </div>
  </div>
        

  <style type="text/css">

    .footer-distributed{
      position: relative;
      top: 280px;
    }

    .logo-footer{
      width: 120px;
      height: 120px;
      background: url('../images/logo-02.png');
      background-position: center;
      background-size: cover;
      border-radius: 50%;
      margin-bottom: 20px;
    }
  </style>
  <!-- The content of your page would go here. -->
  <footer class="footer-distributed">
      <div class="footer-left">
        <div class="logo-footer"></div>

        <p class="footer-company-name">Academic Language Institute Store &copy; 2018</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Cra 11B N°54-79</span> Montería, Córdoba</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>795 12 89</p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>Sobre nosotros</span>
          Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

      </div>

    </footer>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
<script src="../layout/scripts/jquery.flexslider-min.js"></script>
 <!-- SweetAlert js -->
<script src="../js/sweetalert.min.js"></script>
</html>