<?php
require_once 'conexionBD.php';
class jugpos{
    private $id_jugador;
    private $codigo_posicion;

    public function getIDJUG(){
        return $this->$id_jugador;
    }

    public function getCODPOSI(){
        return $this->$codigo_posicion;
    }

    public function setIDJUG(){
        return $this->id_jugador=$id_jugador;
    }

    public function setCODPOSI(){
        return $this->codigo_posicion=$codigo_posicion;
    }

    public function __construct($id_jugador,$codigo_posicion){
        $this->id_jugador=$id_jugador;
        $this->codigo_posicion=$codigo_posicion;
    }

    public function insertar3(){
        $conexion=new conexion();
        //$insert=$conexion->prepare('INSERT INTO jugador (ID_JUGADOR,NOMBRE,FECHA_NAC,NACIONALIDAD,CODIGO_POSICION) values(:codigo_jugador, :nombrejug, :anonaci, :nacionalidad, :codigo_posicion)');
        $insert3=$conexion->prepare('INSERT INTO jugador_posicion (ID_JUGADOR,CODIGO_POSICION) values(:id_jugador, :codigo_posicion)');
        $insert3->bindParam(':id_jugador', $this->id_jugador);
        $insert3->bindParam(':codigo_posicion', $this->codigo_posicion);
        $insert3->execute();
    }
}
?>