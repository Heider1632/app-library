<?php
date_default_timezone_set('America/Bogota');

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=reporte_compras" . date('Y-m-d') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

require_once '../model/conexion.php';

$db = new Conexion();

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte Inventario Excel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
	 <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre Comprador</th>
                <th scope="col">Nombre Libro</th>
                <th scope="col">Unidades</th>
                <th scope="col">Precio Libro</th>
                <th scope="col">Total Compra</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $registros = $db->query('SELECT id_cliente, cliente.nombre, libros.nombre, cant, libros.precio, total cliente.telefono, fecha 
                    FROM transaccion 
                    INNER JOIN cliente ON cliente.id = transaccion.id_cliente
                    INNER JOIN libros ON libros.id = transaccion.id_libro');
            while ($r = mysqli_fetch_array($registros)) { ?>
              <tr>
                <td><?php echo $r['nombre']; ?></td>
                <td><?php echo $r[1]; ?></td>
                <td><?php echo $r['cant']; ?></td>
                <td><?php echo $r['precio']; ?></td>
                <td><?php echo $r['total']; ?></td>
                <td><?php echo $r['telefono']; ?></td>
                <td><?php echo $r['fecha']; ?></td>
              </tr>
            <?php } ?>
            </tbody>
         </table>
         </div>
  </div>
  </body>
  </html>
  <?php
    $db->close();
  ?>