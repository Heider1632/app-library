<?php
session_start();

if(!empty($_POST)){
          if(isset($_POST['id']) && isset($_POST['cantidad'])){
            // si es el primer producto simplemente lo agregamos
            if(empty($_SESSION['carrito'])){
             $_SESSION["carrito"]=array( array('libro_id'=>$_POST['id'], 'nombre' => $_POST['nombre'], 'precio' => $_POST['precio'], 'cantidad'=> $_POST['cantidad']));
            }else{
            // apartie del segundo producto:
            $carrito = $_SESSION['carrito'];
            $repeated = false;
            // recorremos el carrito en busqueda de producto repetido
            foreach ($carrito as $c) {
            // si el producto esta repetido rompemos el ciclo
            if($c['libro_id']==$_POST['id']){
              $repeated=true;
              break;
            }
          }
          // si el producto es repetido no hacemos nada, simplemente redirigimos
          if($repeated){
          print "<script>
                alert('libro repetido');
                </script>";
          }else{
          // si el producto no esta repetido entonces lo agregamos a la variable cart y despues asignamos la variable cart a la variable de sesion
          array_push($carrito, array(
                'libro_id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'cantidad' => $_POST['cantidad']
              ));
          $_SESSION['carrito'] = $carrito;
              }
            }
          }
          print "<script>window.location='../seem/home.php';</script>";
        }
?>