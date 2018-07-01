<?php

  # Incluimos la clase conexion para poder heredar los metodos de ella.
  require_once('conexion.php');
  require_once('encrypt.php');

  class Usuario 
  {

    private $libro;

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

      }
    }

    public function RegistrarLibro($nombre, $codigobarra, $precio, $cantidad, $categoria)
    {
      $db = new Conexion();

      $consulta = $db->query('select id from libros where codigobarra="'.$codigobarra.'"');

      $verificar_libro = $db->rows($consulta);

      // si la consulta es mayor a 0 el libro existe
      if($verificar_libro > 0){

        echo "el libro ya existe";

      }else{

        $db->query('INSERT INTO libros(nombre, codigobarra, precio, cantidad, idcategoria) VALUES ("'.$nombre.'", "'.$codigobarra.'", "'.$precio.'", "'.$cantidad.'", "'.$categoria.'")');

        echo "libro insertado";
        // u.u finalizamos aqui :v
      }

      # Cerramos la conexion
      $db->close();
    }


    public function RegistrarCliente($nombre, $identificacion, $telefono){
      # Nos conectamos a la base de datos
      $db = new Conexion();

      $consulta = $db->query("SELECT id FROM cliente WHERE identificacion = '$identificacion'");

      $verificar_cliente = parent::verificarRegistros($consulta);

      if($verificar_cliente > 0){

        echo "el cliente ya existe";

      }else{

        $db->query("INSERT INTO cliente(nombre, identificacion, telefono) VALUES ('$nombre', '$identificacion', '$telefono')");

        echo "cliente registrado";
      }

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

        $libro[] = array(

            'id' => $registro['id'],
            'nombre' => $registro['nombre'],
            'precio' => $registro['precio'],
            'genero' => $registro['genero']
        );

          }

        return $libro;

      }else{

      echo 'error_3';

      }

      $db->close();
      }

    public function transaccion($libro, $nombre, $identificacion, $telefono){


    }

    public function verInventario(){
       # Nos conectamos a la base de datos
        $db = new Conexion();

       $sql = $db->query("SELECT libros.id, nombre, precio, cantidad, categorias.genero FROM libros INNER JOIN categorias ON libros.idcategoria = categorias.id GROUP by libros.nombre");
        while($registro = $db->consultaArreglo($sql)){

        $libro[] = array(

            'id' => $registro['id'],
            'nombre' => $registro['nombre'],
            'precio' => $registro['precio'],
            'cantidad' => $registro['cantidad'],
            'genero' => $registro['genero']
        );
          }

        return $libro;

    }

    public function verRegCompra(){
      # Nos conectamos a la base de datos
      $db = new Conexion();

       $sql = $db->query("");
        while($registro = $db->consultaArreglo($sql)){

        $transaccion[] = array(

            'id' => $registro['id'],
            'nombre' => $registro['nombre'],
            'telefono' => $registro['telefono'],
            'libros' => $registro['libros'],
            'total' => $registro['total'],
            'genero' => $registro['fecha']
        );
          }

        return $transaccion;

    }
  }

?>
