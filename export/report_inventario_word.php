<?php
 date_default_timezone_set('America/Bogota');

 header('Content-type: application/vnd.ms-word');
 header("Content-Disposition: attachment; filename=reporte_del_inventario" . date('Y-m-d') . ".doc");
 header("Pragma: no-cache");
 header("Expires: 0");

require_once '../model/usuario.php';

# Creamos un objeto de la clase usuario
$usuario = new Usuario();
$registro = $usuario->verInventario();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte Inventario Word</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
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
                 <th scope="col">Institucion</th>
              </tr>
            </thead>
            <tbody>
            <?php

            $suma = 0;
            $cantidad = 0;

            foreach ($registro as $libro){
            ?>
              <tr>
                <td scope="col"><?php echo $libro['nombre']; ?></td>
                <td scope="col"><?php echo $libro['precio']; ?></td>
                <td scope="col"><?php echo $libro['cantidad']; ?></td>
                <td scope="col"><?php echo $libro['genero']; ?></td>
                <td scope="col"><?php echo $libro['ins']; ?></td>
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
    <br>
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Cantidad Libros</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="col"><?php echo $cantidad; ?></td>
              <td scope="col"><?php echo $total; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</body>
</html>