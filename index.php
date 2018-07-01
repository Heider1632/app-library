<?php
  session_start();

  // isset verifica si existe una variable o eso creo xd
  if(isset($_SESSION['id'])){
    header('location: controller/redirec.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Library Notch</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <link rel="stylesheet" href="css/estilos-nav.css">

</head>

<body>
  <div class="contanier">
    <fieldset>
    <legend>Ingresar al sistema</legend>
        <input type="password" class="form-control" id="clave" required>
        <button class=="btn btn-sm" id="login">Ingresar</button>
    </fieldset>
     <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Procesando</strong> porfavor espere
            </div>
            </div>
      <!-- Fin load -->
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <!-- SweetAlert js -->
<script src="js/sweetalert.min.js"></script>
<!-- Js personalizado -->
<script src="js/operaciones.js"></script>
</html>

            