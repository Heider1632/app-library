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
    <title>Document</title>
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
<header>
        <div class="wrapper">
            <div class="logo">Libreria Notch</div>
            <nav>
                <a href="home.php">Inicio</a>
                <a href="../controller/verInventario.php">Inventario</a>
            </nav>
        </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <table class="table">
              <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre Comprador</th>
                <th scope="col">Telefono</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha</th>
              </tr>
            </thead>
            <tbody>
            <?php
            foreach ($registro as $registroVentas){
            ?>
              <tr>
                <td><?php echo $registroVentas['nombre']; ?></td>
                <td><?php echo $registroVentas['precio']; ?></td>
                <td><?php echo $registroVentas['cantidad']; ?></td>
                <td><?php echo $registroVentas['genero']; ?></td>
              </tr>
              <?php
              }
            ?>
            </tbody>
          </table>
        </div>
    </div>
</div>

    
</body>
</html>