<?php
    require_once 'conexionBD.php';
    class jugador{
        private $codigo_jugador;
        private $nombrejug;
        private $anonaci;
        private $nacionalidad;
        private $codigo_posicion;
        const TABLA = 'jugador';

        public function jugador_construct() {
            $this->codigo_jugador=$codigo_jugador;
            $this->nombrejug=$nombrejug;
            $this->anonaci=$anonaci;
            $this->nacionalidad=$nacionalidad;
            $this->codigo_posicion=$codigo_posicion;
        }
        
        public function borrar($codigo_jugador){
            $conexion=new conexion;
            $eliminar= $conexion->prepare("DELETE FROM jugador where id_jugador='" .$codigo_jugador. "'");
            $eliminar->bindParam("")
            $eliminar->execute();
        }

    }
?>