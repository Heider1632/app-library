<?php
  session_start();

  if(!isset($_SESSION['id'])){
    session_destroy();
    header('location: ../../index.php');
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
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/estilos-nav.css">
  <link rel="stylesheet" href="../css/footer.css">

</head>

<body>
  <header>
    <div class="wrapper">
      <div class="logo">Libreria Notch</div>
      <nav>
        <a href="../controller/verRegCompra.php">Registro compras</a>
        <a href="../controller/verInventario.php">Inventario</a>
        <a href="../controller/cerrarSesion.php">Cerrar sesion</a>
      </nav>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <h1 align="center">Compra</h1>
        <div class="row">
          <div class="col-md-12">
            <center>
            <form action="../controller/compraController.php" method="POST">
              <input type="text" name="codigobarra" autofocus="true">
              <button type="submit" name="buscar">Buscar</button>
            </form>
            <br>
            </center>
          </div>
        </div>
        <form action="compraController.php" method="POST">
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
            if(isset($_POST['codigobarra'])){
            foreach ($registro as $reg){
            ?>
              <tr>
                <td scope="col"><?php echo $reg['nombre']; ?></td>
                <td scope="col"><?php echo $reg['precio']; ?></td>
                <td scope="col"><input type="num" name="cantidad" style="width: 80px;" value="1"></td>
                <td scope="col"><?php echo $reg['genero']; ?></td>
              </tr>
              <?php
              }
            }
            ?>
            </tbody>
          </table>
        </div>
        <div class="col-md-6">
                <h1 align="center">Datos Persona</h1>
                <br>
                <hr>
                <label>Nombre</label>
                <input type="text" name="nombre">
                <label>Idenitificacion</label>
                <input type="num" maxlength="12" name="identificacion">
                <label>Telefono</label>
                <input type="text" maxlength="15" name="telefono">
        </div>
      </div>
      </div>
  </div>

        <div align="center" class="spell">
          <button type="submit" class="btn btn-success">Confirmar</button>       <button type="button" class="btn btn-danger">Cancelar</button>
          </form> 
        </div>

  <style type="text/css">
    .spell{
      position: relative;
        top: 200px;
    }

    .footer-distributed{
      position: relative;
      top: 140px;
    }
  </style>
  <!-- The content of your page would go here. -->
  <footer class="footer-distributed">
      <div class="footer-left">
        <h3>Company<span>logo</span></h3>
        <p class="footer-links">
          <a href="#">Home</a>
          ·
          <a href="#">Blog</a>
          ·
          <a href="#">Pricing</a>
          ·
          <a href="#">About</a>
          ·
          <a href="#">Faq</a>
          ·
          <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">Company Name &copy; 2015</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>21 Revolution Street</span> Paris, France</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+1 555 123456</p>
        </div>

      </div>

      <div class="footer-right">

        <p class="footer-company-about">
          <span>About the company</span>
          Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-linkedin"></i></a>
          <a href="#"><i class="fa fa-github"></i></a>

        </div>

      </div>

    </footer>


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <!-- SweetAlert js -->
<script src="js/sweetalert.min.js"></script>
</html>