  <?php
  if (!empty($libro)):
    foreach ($libro as $reg):
            ?>
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
            <form action="addController.php" method="POST">
              <tr>
                <input type="hidden" name="id" value="<?php echo $reg['id'] ?>">
                <input type="hidden" name="nombre" value="<?php echo $reg['nombre'] ?>">
                <input type="hidden" name="precio" value="<?php echo $reg['precio']; ?>">
                <td scope="col"><?php echo $reg['nombre']; ?></td>
                <td scope="col"><?php echo "$" . $reg['precio']; ?></td>
                <td scope="col"><input type="num" style="width: 60px;" name="cantidad" value="1"></td>
                <td scope="col" name="genero"><?php echo $reg['genero']; ?></td>
                <td scope="col">
                  <button type="submit" class="btn btn-success"><i class="material-icons">add</i></button>
                </td>
              </tr>
            </form>
              
            </tbody>
          </table>
          </div>
  <?php 
  endforeach;
  else:
  ?>
  <p class="alert alert-warning">Busqueda no encontrada.</p> 
  <?php
  endif;
?>