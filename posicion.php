<?php
    include('conexionBD.php');
    class posicion {
        private $pk_posicion;
        private $nombre;
        const TABLA='posicion';

        public function asignarvalor($Posicion){
            $this->nombre=$posicion;
            echo "La posicion es ".$this->nombre;
        }

        //public function buscarporposicion($nombre){
        //    include('conexionBD.php');
        //    $consulta=$base->prepare("SELECT * FROM  POSICION where nombre like'".$nombre."'");
            //$consulta->bindParam(':nombre', $nombre);
        //    $consulta->execute();
            //$resultado=$consulta->fetch();
            //while($fila=$consulta->fetch()){
            //echo "<br>";
            //echo "**********************Información de la Categoría ".$fila[0]."**********************";
            //echo "<br>";
            //echo " La Categoría ".$fila[0]." para edades ".$fila[1]. "años ".$fila[2];        
         //}
        //    echo $consulta;
        //}
        public function buscar($posicion){
            include('conexionBD.php');
            //$sql="SELECT * FROM posicion WHERE NOMBRE='" .$posicion."'";
            $sql="SELECT * FROM jugador JOIN posicion WHERE jugador.CODIGO_POSICION=posicion.PK_POSICION AND posicion.nombre='" .$posicion."'";
            $busca=$base->query($sql);
            #$respuesta=$busca->fetch_all(MYSQLI_ASSOC);
            while ($fila=$busca->fetch()) {
                echo "Codigo Jugador:" .$fila[0];
                echo "<br>";
                echo "Nombre: " .$fila[1];
                echo "<br>";
                echo "Edad: " .$fila[2];
                echo "<br>";
                echo "Nacionalidad: " .$fila[3];
                echo "<br>";
                echo "Codigo Posicion: " .$fila[4];
                echo "<br>";
                echo "Nombre Posicion: " .$fila[6];
                echo "<br>";
                echo "------------------------------";
            }
        }
    }
?>