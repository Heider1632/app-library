<?php
  session_start();

  if(!isset($_SESSION['id'])){
    session_destroy();
    header('location: ../index.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-nav.css">
</head>
<body>
<header>
        <div class="wrapper">
            <div class="logo">Libreria Notch</div>
            <nav>
                <a href="../seem/home.php">Inicio</a>
                <a href="../controller/verRegistro.php">Registro compras</a>
            </nav>
        </div>
</header>

<div class="container-fluid">
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
            foreach ($registro as $libro){
            ?>
              <tr>
                <td><?php echo $libro['nombre']; ?></td>
                <td><?php echo $libro['precio']; ?></td>
                <td><?php echo $libro['cantidad']; ?></td>
                <td><?php echo $libro['genero']; ?></td>
                <td><span>Editar</span></td>
              </tr>
              <?php
              }
            ?>
            </tbody>
          </table>
        </div>
    </div>
</div>

<section>
    <h1>Insertar Libro</h1>

<form action="controller/libroController.php" method="POST">
    <!--Body-->
    <div class="">
        <input type="text" name="nombre" id="" class="form-control white-text">
        <label for="">Nombre</label>
    </div>

    <div class="">
        <input type="num" name="codigobarra" class="form-control white-text">
    </div>

    <div class="">
        <input type="num" minlenght="0" maxlenght="200000" name="precio" id="" class="form-control white-text">
        <label for="">Precio</label>
    </div>

    <div class="">
        <input type="num" name="cantidad" id="" class="form-control white-text">
        <label for="">Cantidad</label>
    </div>

    <div class="">
        <select type="text" name="categoria" id="" class="form-control white-text">
            <option></option>
            <option value="1">Obra</option>
            <option value="2">Texto</option>
        </select>
        <label for="">Categoria</label>
    </div>

    <button type="submit" class="btn btn-success btn-block btn-rounded z-depth-1">Hecho</button>
</form>
</section>
    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <!-- SweetAlert js -->
<script src="js/sweetalert.min.js"></script>
</html>