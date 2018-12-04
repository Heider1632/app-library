<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');
  require_once('encrypt.php');

  date_default_timezone_set('America/Bogota');

  class Usuario 
  {

    private $registro;

    private $libros;

    private $libro;

    private $count;

    public function Login($clave){

      $db = new Conexion();

      $clave = Encrypt($clave);

      $sql = $db->query("SELECT id FROM usuario WHERE clave = '$clave' LIMIT 1");

      if($db->rows($sql) > 0){

        $user = $db->consultaArreglo($sql);

        session_start();

        $_SESSION['id'] = $user['id'];

        if($_SESSION['id'] == 1){
          echo 'seem/home.php';
        }else {
          echo 'index.php';
        }

      }else{
        echo 'error_3';
      }

      $db->close();
    }

    public function RegistrarLibro($nombre, $codigobarra, $precio, $cantidad, $categoria, $institucion)
    {
      $db = new Conexion();

      $consulta = $db->query('select id from libros where codigobarra="'.$codigobarra.'"');

      $verificar_libro = $db->rows($consulta);

      // si la consulta es mayor a 0 el libro existe
      if($verificar_libro > 0){

        echo "error_3";

      }else{

        $db->query('INSERT INTO libros(nombre, codigobarra, precio, cantidad, idcategoria, idinstitucion) VALUES ("'.$nombre.'", "'.$codigobarra.'", "'.$precio.'", "'.$cantidad.'", "'.$categoria.'", "'.$institucion.'")');

        echo "error_2";
        // u.u finalizamos aqui :v
      }

      # Cerramos la conexion
      $db->close();
    }


    function buscarLibro($codigobarra, $libro){

    # Nos conectamos a la base de datos
    $db = new Conexion();

      $consulta = $db->query("SELECT id FROM libros WHERE codigobarra = '$codigobarra'");

      $verificar_libro = $db->rows($consulta);

      // si la consulta es mayor a 0 el registro existe
      if($verificar_libro > 0){

        $sql = $db->query("SELECT libros.id, nombre, precio, categorias.genero FROM libros INNER JOIN categorias ON libros.idcategoria = categorias.id WHERE libros.codigobarra = '$codigobarra' GROUP by libros.nombre");

        while($registro = $db->consultaArreglo($sql)){ 

          $libro = array(

            'id' => $registro['id'],
            'nombre' => $registro['nombre'],
            'precio' => $registro['precio'],
            'genero' => $registro['genero']

          );
        }

        return $libro;

      }

      $db->close();
      }

      public function transaccion($nombre, $identificacion, $telefono, $institucion, $total){

        $db = new Conexion();

        $cantidad = $db->query("SELECT cantidad FROM libros");

        if(empty($nombre) && empty($identificacion) && empty($telefono)){

        print "<script>
              alert('campos vacios');
              window.location='../seem/home.php';
              </script>";

        }else {

          if (empty($nombre)) {

            $db->query('INSERT INTO cliente (nombre, identificacion, telefono, instituto) VALUES ("N.N", "'. $identificacion.'", "'.$telefono.'", "'.$institucion.'")');

          } elseif(empty($identificacion)){

            $db->query('INSERT INTO cliente (nombre, identificacion, telefono, instituto) VALUES ("'. $nombre.'", "**********", "'.$telefono.'", "'.$institucion.'")');

          } elseif(empty($telefono)){

            $db->query('INSERT INTO cliente (nombre, identificacion, telefono, instituto) VALUES ("'. $nombre.'", "'.$identificacion.'", "##########", "'.$institucion.'")');

          }elseif(empty($institucion)){

          $db->query('INSERT INTO cliente (nombre, identificacion, telefono, instituto) VALUES ("'. $nombre.'", "'. $identificacion.'", "'.$telefono.'", "NO INSTITUCION")');

          }else{

          $db->query('INSERT INTO cliente (nombre, identificacion, telefono, instituto) VALUES ("'. $nombre.'", "'. $identificacion.'", "'.$telefono.'", "'.$institucion.'")');

          }

          if (isset($_SESSION['carrito'])) {

            $hora = date("Y-m-d H:i:s");

            foreach($_SESSION['carrito'] as $c) {

            $consulta = $db->query('SELECT id FROM cliente where nombre = "'.$nombre.'"');

            $id = $db->consultaArreglo($consulta);

            $db->query('INSERT INTO transaccion (id_cliente, id_libro, cant, total, fecha) VALUES ("'.$id['id'].'", "'.$c['libro_id'].'", "'.$c['cantidad'].'", "'.$total.'", "'. $hora .'")');

            $sql = $db->query('SELECT id FROM transaccion WHERE id_cliente = "'.$id['id'].'" and id_libro =  "'.$c['libro_id'].'" and fecha="'.$hora.'"');

            $id_transaccion = $db->consultaArreglo($sql);

            $db->query('UPDATE libros, 
             (SELECT libros.id, SUM(libros.cantidad - transaccion.cant) AS cantidad 
              FROM libros INNER JOIN transaccion ON libros.id = transaccion.id_libro WHERE transaccion.id = "'.$id_transaccion['id'].'") AS a 
              SET libros.cantidad = a.cantidad 
              WHERE libros.id = "'.$c['libro_id'].'"');
            }

            #Mando un numero de respuesta para saber que se conecto correctamente.
            echo 1;

            }else {

            echo 'error desde el usuario';

            }
        }

        $db->close();
      }

      public function verInventario(){
       # Nos conectamos a la base de datos
        $db = new Conexion();

       $sql = $db->query("SELECT libros.id, libros.nombre, precio, cantidad, categorias.genero, institucion.nombre FROM libros
                            INNER JOIN institucion ON libros.idinstitucion = institucion.id 
                            INNER JOIN categorias ON libros.idcategoria = categorias.id GROUP by libros.nombre");
        while($registro = $db->consultaArreglo($sql)){

        $libro[] = array(

            'id' => $registro['id'],
            'nombre' => $registro[1],
            'precio' => $registro['precio'],
            'cantidad' => $registro['cantidad'],
            'genero' => $registro['genero'],
            'ins' => $registro[5],
        );
      }

        return $libro;

        $db->close();

      }

      public function verRegCompra(){
      # Nos conectamos a la base de datos
      $db = new Conexion();

       $sql = $db->query("SELECT cliente.id, cliente.nombre, cliente.telefono, SUM(cant), total, fecha FROM transaccion INNER JOIN cliente ON cliente.id = transaccion.id_cliente GROUP BY cliente.id");

        while($registro = $db->consultaArreglo($sql)){

        $transaccion[] = array(

            'id' => $registro['id'],
            'nombre' => $registro[1],
            'cantidad' => $registro[3],
            'total' => $registro['total'],
            'telefono' => $registro[2],
            'fecha' => $registro['fecha']
        );

        }

        return $transaccion;

        $db->close();
    }

    public function editLibro($id, $codigobarra, $nombre, $cantidad, $precio){

      $db = new Conexion();

      $db->query('UPDATE libros SET codigobarra = "'.$codigobarra.'", nombre = "'.$nombre.'", cantidad = "'.$cantidad.'", precio = "'.$precio.'" WHERE id = "'.$id.'"');

      $db->close();

      echo 'error_3';
    }

    public function buscarLibroRegistro($buscar){

      $db = new Conexion();

      $sql = $db->query('SELECT libros.id, libros.nombre, precio, cantidad, categorias.genero, institucion.nombre 
                          FROM libros
                          INNER JOIN institucion ON libros.idinstitucion = institucion.id 
                          INNER JOIN categorias ON libros.idcategoria = categorias.id 
                          WHERE codigobarra = "'.$buscar.'" or libros.nombre = "'.$buscar.'"');

        while($registro = $db->consultaArreglo($sql)){

        $libro[] = array(

            'id' => $registro['id'],
            'nombre' => $registro[1],
            'precio' => $registro['precio'],
            'cantidad' => $registro['cantidad'],
            'genero' => $registro['genero'],
            'ins' => $registro[5],
        );
      }

      return $libro;

      $db->close();
    }

    public function VerInstitucion(){
       $db = new Conexion();

      $sql = $db->query('SELECT institucion.id,  institucion.nombre FROM institucion');

        while($f = $db->consultaArreglo($sql)){

        $institucion[] = array(

            'id' => $f['id'],
            'nombre' => $f['nombre']
        );
      }

      return $institucion;

      $db->close();
    }

  }

?>
