<html>
    <head></head>
    <body>
    <?php
    require_once('conexionBD.php');
    require_once('posicion.php');
    if (isset($_POST['buscar'])) {
        $posicion= $_POST['radio'];
        #echo $posicion;
        $busca= new posicion();
        $resp=$busca->buscar($posicion);
        //$resultado->asignarvalor($posicion);
        //echo "</br>";
        #$resultado->buscarporposicion($posicion);
        ?>
        <br>
        <!--<a href="./buscarposicion.php"><input type="button" name="Volver" value="Volver Atras"/></a>-->
    <?php
    }else{}
    ?>
    <form method="POST" action="">
    <label>POSICION</label>
    <?php
        $conexion=new conexion();
        $datos=$conexion->prepare('SELECT CODIGO_POSICION, NOMBRE FROM POSICION');
        $datos->execute();
        while( $filas = $datos->fetch()){
    ?>
        <br>
        <label><?php echo $filas[1] ?></label>
        <input type="radio" name="radio" value="<?php echo $filas[1] ?>"/>
    <?php
        }
    ?>
    <br>
    <input type="submit" name="buscar" value="BUSCAR"/>
    <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
    </form>
    <?php
    //}
    ?>
    </body>
</html>