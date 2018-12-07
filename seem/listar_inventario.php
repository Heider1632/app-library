<?php
  session_start();

  if(!isset($_SESSION['id'])){
    session_destroy();
    header('location: ../index.php');
  }

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Library Notch</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css">
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
<div class="bgded overlay" style="background: #2E86C1;">
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
          <li><a class="drop" href="#">Exportar</a>
            <ul>
              <li><a href="../export/report_inventario_word.php">Word</a></li>
              <li><a href="../export/report_inventario_excel.php">Excel</a></li>
            </ul>
          </li>
          <li><a href="../controller/verInventario.php">Inventario</a></li>
          <li><a href="../controller/verRegCompra.php">Registro de Compras</a></li>
          <li><a href="../seem/addLibro.php">Añadir Libro</a></li>
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
        <form action="../controller/addListController.php" method="POST">
        <table class="table">
              <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Categoria</th>
              </tr>
            </thead>
            <tbody>
            <?php

            foreach ($registro as $libro){
            ?>
              <tr>
                <td>
                  <input type="text" name="nombre[<?php echo $libro['id']; ?>]" value="<?php echo $libro['nombre']; ?>">
                </td>
                <td>
                  <input type="text" name="precio[<?php echo $libro['id']; ?>]" value="<?php echo $libro['precio']; ?>">
                </td>
                <td>
                  <input type="text" name="cantidad[<?php echo $libro['id']; ?>]" value="<?php echo $libro['cantidad']; ?>">
                </td>
                <td>
                  <input type="text" name="genero[<?php echo $libro['id']; ?>]" value="<?php echo $libro['genero']; ?>"
                  ></td>
              </tr>
              <?php
            }
            ?>
            </tbody>
          </table>

          <button type="submit" class="btn btn-large btn-success mx-auto">Enviar</button>
        </form>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <!-- SweetAlert js -->
<script src="../js/sweetalert2.min.js"></script>
</html>