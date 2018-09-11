<?php
  session_start();

  if(!isset($_SESSION['id'])){
    session_destroy();
    header('location: ../index.php');
  }

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

  p{
    font-size: 22px;
    line-height: 40px;
  }

  th{
    font-size: 20px;
  }

  td{
    font-size: 15px;
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
              <li><a href="../export/report_compras_word.php">Word</a></li>
              <li><a href="../export/report_compras_excel.php">Excel</a></li>
            </ul>
          </li>
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
            <?php
            foreach ($registro as $registroVentas): ?>
            <p class="alert alert-warning" style="height: 70px;">Nombre: <?php echo $registroVentas['nombre']; ?> ||
                                          Telefono: <?php echo $registroVentas['telefono']; ?> ||
                                          Cantidad: <?php echo $registroVentas['cantidad']; ?> ||
                                          Total: <?php echo $registroVentas['total']; ?>  ||
                                          Fecha: <?php echo $registroVentas['fecha']; ?> 
            <a class="btn btn-primary" data-toggle="collapse" href="#<?php echo $registroVentas['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample" style="float: right;">
            Detalle Compra
            </a>  
            </p>
            <div class="collapse" id="<?php echo $registroVentas['id']; ?>">
              <div class="card card-body">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th>Nombre Libro</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   $consulta = $db->query('SELECT libros.nombre, cant, libros.precio FROM transaccion INNER JOIN libros ON libros.id = transaccion.id_libro WHERE id_cliente ="'.$registroVentas['id'].'"');
                   while ($fila = $db->consultaArreglo($consulta)) {
                    ?>

                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['cant']; ?></td>
                        <td><?php echo $fila['precio']; ?></td>
                    </tr>
                    <?php
                   }
                   ?>
                  </tbody>
                </table>
              </div>
          </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</html>