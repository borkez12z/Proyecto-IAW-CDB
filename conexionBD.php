<?php

    try{
        $base=new PDO('mysql:host=localhost; dbname=cdb_arahal', 'root', '2asir');
        //echo 'Conexion OK';
    }catch(Exception $e){
        die('Error: ' . $e->GetMessage());
    }finally{
        //$base=null; Cierra la conexión
    }

?>