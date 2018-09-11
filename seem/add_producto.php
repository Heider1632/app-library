<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Categoria</th>
            <th scope="col">Accion</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $sum = 0;
              $cant = 0;
              foreach ($_SESSION['carrito'] as $c):
              $producto = $con->query("SELECT * FROM libros WHERE id = $id[id]");
              $r = $producto->fetch_object();
            ?>
            <form action="#" method="POST">
              <tr>
                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                <td scope="col"><?php echo $r['nombre']; ?></td>
                <td scope="col"><?php echo $r['precio']; ?></td>
                <td scope="col"><input type="num" style="width: 60px;" name="cantidad" value="<?php echo $r['cantidad']?>"></td>
                <td scope="col"><?php echo $r['genero']; ?></td>
                <td scope="col">
                  <?php
                  $found = false;
                  foreach ($_SESSION["carrito"] as $c) { if($c['id']==$reg['id']){ $found=true; break; }}
                  ?>
                  <a href="../controller/deleteController.php?id=<?php echo $c['id'];?>" class="btn btn-danger">Eliminar</a>
                </td>
              </tr>
            </form>
              <?php
              endforeach;

              foreach ($r as $precio => $values) {
                $sum += $r['precio'];
              }

              foreach ($r as $cantidad => $values) {
                $cant += $r['cantidad'];
              }

              $total = $sum * $cant;
              ?>  
            </tbody>
          </table>
          </div>