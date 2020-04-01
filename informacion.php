<html>
    <head></head>
    <body>
    <?php
    include('conexionBD.php');
    include('posicion.php');
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
        <a href="./informacion.php"><input type="button" name="Volver" value="Volver Atras"/></a>
    <?php
    }else{
    ?>
    <form method="POST" action="">
    <label>POSICION</label>
    <?php
        $datos=$base->prepare('SELECT PK_POSICION, NOMBRE FROM POSICION');
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
    }
    ?>
    </body>
</html>