<?php
    require_once 'conexionBD.php';
    class posicion {
        private $codigo_posicion;
        private $nombre;
        //public $base;
        const TABLA='posicion';

        public function getCodPosi(){
            return $this->codigo_posicion;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setCodPosi(){
            $this->codigo_posicion=$codigo_posicion;
        }

        public function setNombre(){
            $this->nombre=$nombre;
        }

        public function buscar($codigo_posicion){
            $conexion = new conexion();
            $sql=$conexion->prepare('SELECT * FROM jugador JOIN posicion JOIN estadisticas_jugador_up WHERE jugador.CODIGO_POSICION=posicion.CODIGO_POSICION AND jugador.ID_JUGADOR=estadisticas_jugador_up.ID_JUGADOR AND posicion.nombre= :codigo_posicion');
            //$sql='SELECT * FROM jugador JOIN posicion JOIN estadisticas_jugador_up WHERE jugador.CODIGO_POSICION=posicion.CODIGO_POSICION AND jugador.ID_JUGADOR=estadisticas_jugador_up.ID_JUGADOR AND posicion.nombre= $codigo_posicion';
            $sql->bindParam(":codigo_posicion", $codigo_posicion);
            $sql->execute();
            //$busca=$conexion->query($sql);
            while ($fila=$sql->fetch()) {
                echo "Codigo Jugador: " .$fila[0];
                echo "<br>";
                echo "Nombre: " .$fila[1];
                echo "<br>";
                echo "Año Naciomiento: " .$fila[2];
                echo "<br>";
                echo "Nacionalidad: " .$fila[3];
                echo "<br>";
                echo "Codigo Posicion: " .$fila[5];
                echo "<br>";
                echo "Nombre Posicion: " .$fila[6];
                echo "<br>";
                echo "Puntos Ultimo Partido: " .$fila[8];
                echo "<br>";
                echo "Minutos Ultimo Partido: " .$fila[9];
                echo "<br>";
                echo "Faltas Ultimo Partido: " .$fila[10];
                echo "<br>";
                echo "------------------------------";
                echo "<br>";
            }
        }

        public function posicion_destruct(){
        //    include('conexionBD.php');
            mysqli::close($conexion);
        }
    }
?>