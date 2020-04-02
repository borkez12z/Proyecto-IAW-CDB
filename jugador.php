<?php
    include('conexionBD.php');
    class jugador{
        private $codigo_jugador;
        private $nombrejug;
        private $añonaci;
        private $nacionalidad;
        private $codigo_posicion;

        
        public function borrar($codigo_jugador){
            include('conexionBD.php');
            $eliminar="DELETE FROM jugador where codigo_jugador='" .$codigo_jugador. "'";
            $elimina=$base->query($eliminar);
        }
    }
?>