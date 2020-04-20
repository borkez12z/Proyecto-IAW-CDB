<html>
    <head>
        <meta charset="UTF-8">
        <link rel="StyleSheet" href="./css/estilo.css" type="text/css" />
    </head>
    <body>
        <div id="contenedor">
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
    <h1>BUSCAR POR POSICION</h1>
    <div id="formulario">
    <form method="POST" action="">
    <?php
        $conexion=new conexion();
        $datos=$conexion->prepare('SELECT CODIGO_POSICION, NOMBRE FROM POSICION');
        $datos->execute();
        while( $filas = $datos->fetch()){
    ?>
        <br>
        <label><b><?php echo $filas[1] ?></b></label>
        <input type="radio" name="radio" value="<?php echo $filas[1] ?>"/>
    <?php
        }
    ?>
    <br>
    </div>
    <div id="botones">
    <input type="submit" name="buscar" value="BUSCAR"/>
    <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
    </div>
    </form>
    <?php
    //}
    ?>
    </div>
    </body>
</html>