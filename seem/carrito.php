  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <h1 align="center">Carrito<i class="material-icons">shopping_cart</i></h1>
        <div class="row">
          <div class="col-md-12">
          <?php
          $db = new Conexion();
          $libro = $db->query("SELECT * FROM libros");
          if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])):
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
            <?php
              $sum = 0;
              $cant = 0;
              foreach ($_SESSION["carrito"] as $c):
              $libro = $db->query('SELECT libros.id, categorias.genero FROM libros 
                                    INNER JOIN categorias ON libros.idcategoria = categorias.id 
                                    WHERE libros.id = "'.$c['libro_id'].'"');
              $r = mysqli_fetch_array($libro);
            ?>
              <tr>
                <input type="hidden" name="id" value="<?php echo $c['libro_id'] ?>">
                <td scope="col"><?php echo $c['nombre']; ?></td>
                <td scope="col"><?php echo "$" . $c['precio']; ?></td>
                <td scope="col"><?php echo $c['cantidad']?></td>
                <td scope="col"><?php echo $r['genero']; ?></td>
                <td scope="col">
                  <?php
                  $found = false;
                  foreach ($_SESSION["carrito"] as $c) { if($c['libro_id']==$r['id']){ $found=true; break; }}
                  ?>
                  <a href="../controller/deleteController.php?id=<?php echo $c['libro_id'];?>" class="btn btn-danger">Eliminar</a>
                </td>
              </tr>
              <?php

              endforeach;

              for ($i=0; $i < count($_SESSION['carrito']); $i++) { 
                
                $total[$i] = $_SESSION['carrito'][$i]['precio'] * $_SESSION['carrito'][$i]['cantidad'];

              } 

              $_SESSION['total'] = array_sum($total);

              ?>  
            </tbody>
          </table>
          </div>
          <?php 
          else: ?>
            <br><br>
            <p class="alert alert-warning">El carrito esta vacio.</p> 
          <?php 
          endif;
          ?>
        </div>
       </div>
        </div>
        <style type="text/css">
          label{
            font-size: 22px;
          }
        </style>
        <div class="col-md-6">
                <h1 align="center">Datos Persona<i class="material-icons md-24">person_add</i></h1>
                <br>
                <hr>
                 <div class="form-group">
                    <label for="nombre" align="center">Nombre</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="nombre">
                    <small id="emailHelp" class="form-text text-muted">Puede escribir el nombre completo si lo desea!.</small>
                </div>
                <div class="form-group">
                    <label for="identificacion" align="center">identificacion</label>
                    <input type="num" maxlength="15" class="form-control" id="identificacion" placeholder="identificacion">
                </div>
                <div class="form-group">
                    <label for="telefono" align="center">Telefono</label>
                    <input type="num" maxlength="10" class="form-control" id="telefono" placeholder="telefono">
                </div>
                <div class="form-group">
                    <label for="telefono" align="center">Institución</label>
                    <select class="form-control" id="institucion" placeholder="Institución">
                      <option>La salle</option>
                      <option>G Recreo</option>
                      <option>G Campestre</option>
                      <option>Montessori</option>
                      <option>Colegio Latino</option>
                      <option>G Vallegrande</option>
                      <option>George Noble</option>
                    </select>
                </div>
        </div>
      </div>
      <?php
      if (isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])) {
      ?>
      <div class="row">
        <br>
          <div class="col-md-2">
              <label>Total</label>
              <input type="num" name="total" readonly="" id="total" value="<?php echo $_SESSION['total']; ?>">
          </div>
          <div class="col-md-2">
              <label>Desc</label>
              <select id="desc">
                <option value="0">Null</option>
                <option value="0.01">1%</option>
                <option value="0.015">1.5%</option>
                <option value="0.02">2%</option>
                <option value="0.025">2.5%</option>
                <option value="0.03">3%</option>
              </select>
            </div>
            <div class="col-md-2">
              <label>Pago comprador</label>
              <select id="pago_comprador" value="" required="">
                <option value="efectivo">Efectivo</option>
                <option value="electronico">Pago tarjeta</option>
              </select>
            </div>
            <div class="col-md-3">
          <button class="btn btn-success" type="button" id="success">Confirmar</button>
          <button class="btn btn-danger" id="failed">Cancelar</button>
          </div>
        <?php
        }
      ?>   
      </div>

<script>
      $(document).ready(function(){
        $('#success').click(function(){

          var nombre = $('#nombre').val(); 
          var identificacion = $('#identificacion').val(); 
          var telefono = $('#telefono').val();
          var institucion = $('#institucion').val(); 
          var total = $('#total').val(); 
          var descuento = $('#desc').val();
          var pago_comprador = $('#pago_comprador').val(); 

          if(pago_comprador == 'efectivo'){

            var metodo = 'efectivo';

            if (descuento !== 0) {

              var prize = total * descuento;

              }

              total = total - prize;

            swal({
              title: 'Ingrese la suma',
              type: "input",
              text: 'Total compra con descuento: ' + total,
              showCancelButton: true,
              closeOnConfirm: false
            },
              function(inputValue) {
              if (inputValue === false) return false;

              if(inputValue === ""){
                swal.showInputError("Necesitas colocal un pago");
                return false
              }

               var cambio = inputValue - total;
          
              $.ajax({
               url: '../controller/compraController.php',
               data: {nombre: nombre, identificacion: identificacion, telefono: telefono, institucion: institucion, metodo:metodo, total: total, descuento: descuento, pago_comprador: pago_comprador, cambio: cambio},
               type: 'POST',
               success: function(response){
                   if(response==1){

                      swal('Exito', "Tu cambio es: $" + cambio, 'success');

                      setTimeout("location.reload()", 5000);

                   }else if(response==2){
                      swal('Error', "Pago menor al total", 'error');
                   }else{
                      swal('Error', "Algo salio mal", 'error');
                      console.log(response);
                   }

               }
              }); 
            });
          }else{

            var nombre = $('#nombre').val(); 
            var identificacion = $('#identificacion').val(); 
            var telefono = $('#telefono').val();
            var institucion = $('#institucion').val(); 
            var total = $('#total').val(); 
            var descuento = $('#desc').val();
            var pago_comprador = $('#pago_comprador').val(); 

            if (descuento !== 0) {

              var prize = total * descuento;

              }

              total = total - prize;

              var metodo = 'tarjeta';

              swal({
                title: 'Esperando datafono',
                type: "warning",
                text: 'Total compra con descuento: ' + total,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                showCancelButton: true
              }).then (function(){

              var cambio = '0';

               $.ajax({
               url: '../controller/compraController.php',
               data: {nombre: nombre, identificacion: identificacion, telefono: telefono, institucion: institucion, metodo: metodo, total: total, descuento: descuento, pago_comprador: pago_comprador, cambio: cambio},
               type: 'POST',
               success: function(response){
                   if(response==1){

                      swal('Exito', "Tu cambio es: $" + cambio, 'success');

                      setTimeout("location.reload()", 5000);

                   }else if(response==2){
                      swal('Error', "Pago menor al total", 'error');
                   }else{
                      swal('Error', "Algo salio mal", 'error');
                      console.log(response);
                   }
                  }
                }); 

              });

          }

          
        });

        $('#failed').click(function(){

           $.ajax({
               url: '../controller/failedController.php',
               data: {},
               type: 'POST',
               success: function(response){
                   if(response==1){

                      swal('Oh Oh :(', "compra rechazada", 'warning');

                      setTimeout("location.reload()", 3000);

                   }else{
                      swal('Error', "Algo salio mal", 'error');
                      console.log(response);
                   }

               }
           }); 

        });
    });
</script>
