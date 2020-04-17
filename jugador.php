<?php
    require_once 'conexionBD.php';
    class jugador{
        private $codigo_jugador;
        private $nombrejug;
        private $anonaci;
        private $nacionalidad;
        private $codigo_posicion;
        const TABLA = 'jugador';

        public function getCodigo() {
            return $this->codigo_jugador;
        }

        public function getNombre() {
            return $this->nombrejug;
        }

        public function getano() {
            return $this->anonaci;
        }
        
        public function getNacionalidad(){
            return $this->nacionalidad;
        }

        public function getCodigoPosi(){
            return $this->codigo_posicion;
        }

        public function setCodigo($codigo_jugador) {
            $this->codigo_jugador=$codigo_jugador;
        }

        public function setNombre($nombrejug){
            $this->nombrejug=$nombrejug;
        }

        public function setano($anonaci){
            $this->anonaci=$anonaci;
        }

        public function setNacionalidad($nacionalidad){
            $this->nacionalidad=$nacionalidad;
        }

        public function setCodigoPosi($codigo_posicion){
            $this->codigo_posicion=$codigo_posicion;
        }

        public function jugador_construct($codigo_jugador,$nombrejug,$anonaci,$nacionalidad,$codigo_posicion) {
            $this->codigo_jugador=$codigo_jugador;
            $this->nombrejug=$nombrejug;
            $this->anonaci=$anonaci;
            $this->nacionalidad=$nacionalidad;
            $this->codigo_posicion=$codigo_posicion;
        }

        public function borrar($codigo_jugador){
            $conexion=new conexion;
            $eliminar= $conexion->prepare('DELETE FROM jugador where id_jugador= :codigo_jugador');
            $eliminar->bindParam(":codigo_jugador", $codigo_jugador);
            $eliminar->execute();
        }

        public function insertar(){
            $conexion=new conexion();
            //$insert=$conexion->prepare('INSERT INTO jugador (ID_JUGADOR,NOMBRE,FECHA_NAC,NACIONALIDAD,CODIGO_POSICION) values(:codigo_jugador, :nombrejug, :anonaci, :nacionalidad, :codigo_posicion)');
            $insert=$conexion->prepare('INSERT INTO jugador (ID_JUGADOR,NOMBRE,FECHA_NAC,NACIONALIDAD,CODIGO_POSICION) values(:codigo_jugador, :nombrejug, :anonaci, :nacionalidad, :codigo_posicion)');
            $insert->bindParam(':codigo_jugador', $this->codigo_jugador);
            $insert->bindParam(':nombrejug', $this->nombrejug);
            $insert->bindParam(':anonaci', $this->anonaci);
            $insert->bindParam(':nacionalidad', $this->nacionalidad);
            $insert->bindParam(':codigo_posicion', $this->codigo_posicion);
            $insert->execute();
        }

        public function posicion_destruct(){
            //    include('conexionBD.php');
                mysqli::close($conexion);
        }
    }
?>