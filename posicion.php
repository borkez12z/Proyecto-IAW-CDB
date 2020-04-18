<?php
    require_once 'conexionBD.php';
    class posicion {
        private $codigo_posicion;
        private $nombre;
        //public $base;
        const TABLA='posicion';

        public function posicion__construct(){
            $this->codigo_posicion=$codigo_posicion;
            $this->nombre=$nombre;
        }

        public function buscar($codigo_posicion){
            $conexion = new conexion();
            //include('conexionBD.php');
            //$sql="SELECT * FROM posicion WHERE NOMBRE='" .$posicion."'";
            $sql=$conexion->prepare('SELECT * FROM jugador JOIN posicion JOIN estadisticas_jugador_up WHERE jugador.CODIGO_POSICION=posicion.CODIGO_POSICION AND jugador.ID_JUGADOR=estadisticas_jugador_up.ID_JUGADOR AND posicion.nombre= :codigo_posicion');
            $sql->bindParam(":codigo_posicion", $codigo_posicion);
            $sql->execute();
            //$sql=execute();
            //$busca=$base->query($sql);
            #$respuesta=$busca->fetch_all(MYSQLI_ASSOC);
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
            }
        }

        public function posicion_destruct(){
        //    include('conexionBD.php');
            mysqli::close($conexion);
        }
    }
?>