<?php
    include('conexionBD.php');
    class posicion {
        private $pk_posicion;
        private $nombre;
        const TABLA='posicion';

        public function buscar($posicion){
            include('conexionBD.php');
            //$sql="SELECT * FROM posicion WHERE NOMBRE='" .$posicion."'";
            $sql="SELECT * FROM jugador JOIN posicion JOIN estadistica WHERE jugador.CODIGO_POSICION=posicion.PK_POSICION AND jugador.CODIGO_JUGADOR=estadistica.PK_FK_ESTADISTICAS_JUGADOR AND posicion.nombre='" .$posicion."'";
            $busca=$base->query($sql);
            #$respuesta=$busca->fetch_all(MYSQLI_ASSOC);
            while ($fila=$busca->fetch()) {
                echo "Codigo Jugador: " .$fila[1];
                echo "<br>";
                echo "Nombre: " .$fila[2];
                echo "<br>";
                echo "Edad: " .$fila[3];
                echo "<br>";
                echo "Nacionalidad: " .$fila[4];
                echo "<br>";
                echo "Codigo Posicion: " .$fila[6];
                echo "<br>";
                echo "Nombre Posicion: " .$fila[7];
                echo "<br>";
                echo "Puntos Ultimo Partido: " .$fila[9];
                echo "<br>";
                echo "Minutos Ultimo Partido: " .$fila[10];
                echo "<br>";
                echo "Faltas Ultimo Partido: " .$fila[11];
                echo "<br>";
                echo "------------------------------";
            }
        }
    }
?>