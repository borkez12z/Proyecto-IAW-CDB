<?php

    //try{
        //$base=new PDO('mysql:host=localhost; dbname=cdb_arahal', 'root', '2asir');
    //    $base=new PDO('mysql:host=localhost; dbname=baloncesto_arahal', 'root', '2asir');
        //echo 'Conexion OK';
    //}catch(Exception $e){
    //    die('Error: ' . $e->GetMessage());
    //}finally{
        //$base=null; 
        //echo "Cierra la conexión";
    //}

    class Conexion extends PDO { 
        private $tipo_de_base = 'mysql';
        private $host = 'localhost';
        private $nombre_de_base = 'baloncesto_arahal';
        private $usuario = 'root';
        private $contrasena = '2asir'; 
        public function __construct() {
           //Sobreescribo el método constructor de la clase PDO.
           try{
              parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8", $this->usuario, $this->contrasena);
           }catch(PDOException $e){
              echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
              exit;
           }
        } 
      }


?>