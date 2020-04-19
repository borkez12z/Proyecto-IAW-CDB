<?php
 class Date_f {
    public static function getFecha(){
       $anio = date('Y');
       $mes = date('m');
       $dia = date('d');
       return $dia . '/' . $mes . '/' . $anio;
    } 
    public static function getHora(){
       $hora = date('H');
       $minutos = date('i');
       $segundos = date('s');
       return $hora . ':' . $minutos . ':' . $segundos;
    } 
 } 
?>