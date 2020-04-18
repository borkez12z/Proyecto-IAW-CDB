<?php
    require_once 'conexionBD.php';
    class estadistica{
        private $id_jugador;
        private $puntosultimopartido;
        private $minutosultimopartido;
        private $faltasultimopartido;
        const estadist = 'estadisticas_jugador_up';

        public function __construct($id_jugador,$puntosultimopartido,$minutosultimopartido,$faltasultimopartido){
            $this->id_jugador=$id_jugador;
            $this->puntosultimopartido=$puntosultimopartido;
            $this->minutosultimopartido=$minutosultimopartido;
            $this->faltasultimopartido=$faltasultimopartido;
        }

        public function insertar2(){
            $conexion=new conexion();
            //$insert=$conexion->prepare('INSERT INTO jugador (ID_JUGADOR,NOMBRE,FECHA_NAC,NACIONALIDAD,CODIGO_POSICION) values(:codigo_jugador, :nombrejug, :anonaci, :nacionalidad, :codigo_posicion)');
            $insert2=$conexion->prepare('INSERT INTO '. self::estadist .' (ID_JUGADOR,PUNTOS_ULTIMO_PARTIDO,MINUTOS_ULTIMO_PARTIDO,FALTAS_ULTIMO_PARTIDO) values(:id_jugador, :puntosultimopartido, :minutosultimopartido, :faltasultimopartido)');
            $insert2->bindParam(':id_jugador', $this->id_jugador);
            $insert2->bindParam(':puntosultimopartido', $this->puntosultimopartido);
            $insert2->bindParam(':minutosultimopartido', $this->minutosultimopartido);
            $insert2->bindParam(':faltasultimopartido', $this->faltasultimopartido);
            $insert2->execute();
        }        

        public function actualizado(){
            $conexion= new conexion();
            $actualizare= $conexion->prepare('UPDATE '. self::estadist .' SET PUNTOS_ULTIMO_PARTIDO = :puntosultimopartido, MINUTOS_ULTIMO_PARTIDO = :minutosultimopartido, FALTAS_ULTIMO_PARTIDO = :faltasultimopartido where id_jugador = :id_jugador');
            $actualizare->bindParam(':puntosultimopartido',$this->puntosultimopartido);
            $actualizare->bindParam(':minutosultimopartido',$this->minutosultimopartido);
            $actualizare->bindParam(':faltasultimopartido',$this->faltasultimopartido);
            $actualizare->bindParam(':id_jugador',$this->id_jugador);
            //$result=mysqli_query($conexion,"UPDATE estadisticas_jugador_up set puntosultimopartido =  $puntosultimopartido,  minutosultimopartido=$minutosultimopartido , faltasultimopartido=$faltasultimopartido where id_jugador=$id_jugador");
            $actualizare->execute();
        }
    }
?>