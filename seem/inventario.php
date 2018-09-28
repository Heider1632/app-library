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
         <form class="form-inline" action="#" method="POST">
            <input class="form-control mr-sm-2" type="search" name="buscar" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
        <table class="table">
              <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Categoria</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if(!isset($_POST)):

            $registro = ($usuario->buscarLibroRegistro($buscar));

            foreach ($registro as $l): ?>
              <tr>
                <td><?php echo $l['nombre']; ?></td>
                <td><?php echo "$" . $l['precio']; ?></td>
                <td><?php echo $l['cantidad']; ?></td>
                <td><?php echo $l['genero']; ?></td>
              </tr>
              <?php
            endforeach;
            else:

            $suma = 0;
            $cantidad = 0;

            foreach ($registro as $libro){
            ?>
              <tr>
                <td><?php echo $libro['nombre']; ?></td>
                <td><?php echo "$" . $libro['precio']; ?></td>
                <td><?php echo $libro['cantidad']; ?></td>
                <td><?php echo $libro['genero']; ?></td>
                <td><a href="../seem/editLibro.php?id=<?php echo $libro['id']; ?>"><i class="material-icons md-24">edit</i></a></td>
              </tr>
              <?php

            }

            foreach ($registro as $num => $values) {

                $suma += $values['precio'];
            }

            foreach ($registro as $cant => $values) {
                
                $cantidad += $values['cantidad'];
            }

              $total = $suma * $cantidad;

            ?>
            </tbody>
          </table>
        </div>
    </div>
    <footer class="footer-distributed">
      <div class="footer-left">
            <h1>Cantidad Libro</h1>
            <input type="num" name="" readonly="" value="<?php echo $cantidad ?> Libros">
      </div>

      <div class="footer-center" align="left">
            <p align="justify-left">Esta cantidad varia pese a la actualizacion de precios y cantidad de libros dispuestos en el inventario</p>
      </div>

      <div class="footer-right" align="center">
            <h1>Total</h1>
            <input type="num" name="" readonly="" value="$<?php echo $total ?>">
      </div>
     </footer>
   <?php endif; ?>
    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <!-- SweetAlert js -->
<script src="../js/sweetalert.min.js"></script>
</html>