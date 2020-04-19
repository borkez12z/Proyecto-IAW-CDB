<html>
    <head>
        <style>
            body {
                margin: 0 auto;
            }

            #contenedor {
                margin: 0 auto;
                width: 50%;
                /*border: 3px solid #73AD21;*/
                background-color: lightgreen;
                !height: 25%;
            }

            h1 {
                text-align: center;
            }

            h2 {
                text-align: center;
            }

            #formulario{
                margin: auto;
                width: 70%;
                padding: 10px;
                border: solid 1px grey;
            }

            #botones{
                width: 55%;
                margin-left: 350px;
                padding-bottom: 40px;
                margin-top: -10px;
            }
        </style>
    </head>

    <body>
    <div id="contenedor">
    <?php
    require_once 'conexionBD.php';
    require_once 'jugador_posicion.php';
    if (isset($_POST['inscribir'])) {
        $jugador=$_POST['act'];
        $posicion=$_POST['radio'];

        $inserta3 = new jugpos($jugador,$posicion);
        $inserta3->insertar3();
    ?>
        <h2>El jugador con Codigo <?php echo $jugador?> se ha registrado en su nueva Posicion</h2>
    <?php
    }
    ?>
    <h1>NUEVA POSICION JUGADORES</h1>
    <div id="formulario">
    <form action="" method="post">
            <label><b>Selecciona jugador al que añadirle nueva posicion: </b></label>
            <select name="act" required>
            <?php
            $conexion=new conexion();
            $consul=$conexion->prepare('SELECT ID_JUGADOR,NOMBRE from JUGADOR');
            $consul->execute();
            while($fila=$consul->fetch()){
            ?>
            <option value="<?php echo $fila[0]?>"><?php echo $fila[0]." ".$fila[1] ?>
            <?php
            }
            ?>
            </select>
            <br><br>
            <label><b>Elegir nueva posicion Jugador: </b></label>
            <?php
                $conexion=new conexion();
                $datos=$conexion->prepare('SELECT CODIGO_POSICION, NOMBRE FROM POSICION');
                $datos->execute();
                while( $filas = $datos->fetch()){
            ?>
                <label><?php echo $filas[1] ?></label>
                <input type="radio" name="radio" value="<?php echo $filas[0] ?>"/>
            <?php
                 }
            ?>
    </div>
        <div id="botones">
            <br>
            <input type="submit" name="inscribir" value="Nueva Posicion"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </div>
    </form>
    </body>
</html>