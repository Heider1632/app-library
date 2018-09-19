<?php

    # Clase conexion: permite conectar a la base de datos y ejecutar consultas sql

    class Conexion extends mysqli
    {
        # Funcion que permite conectarnos a la base de datos
        public function __construct()
        {
          parent::__construct('localhost', 'id6640076_user', 'library-store', 'id6640076_library_store');
          $this->connect_errno ? die('ERROR: existe un problema al conectarse a la base de datos') : null;
          $this->set_charset("utf8");
        }

        # Funcion que retorna el numero de filas afectadas por una consulta sql
        public function rows($query)
        {
            # mysqli_num_rows: Obtiene el número de filas de un resultado de una consulta
            return mysqli_num_rows($query);
        }

        public function Liberar($query){

            return mysqli_free_results($query);
        }

        public function verificarFila($query)
        {
          # mysql: obtiene una fila de la consulta
          return mysqli_fetch_assoc($query);
        }

        # Funcion que retorna un arreglo con los registros de una consulta
        public function consultaArreglo($query)
        {
          # mysqli_fetch_array Obtiene una fila de resultados como un array asociativo, numérico, o ambos
          return mysqli_fetch_array($query);
        }
      }

?>
