<html>
    <head>
        <meta Charsert="UTF-8">
        <link rel="StyleSheet" href="./css/estilo.css" type="text/css" />
    </head>
    <body>
        <div id="contenedoractu">
        <?php
            session_start();
            require_once 'conexionBD.php';
            require_once 'estadistica.php';
            if (isset($_POST['actualizar'])) {
                $codigo= $_POST['act'];
                $conexion= new conexion;
                $consulta=$conexion->prepare("SELECT * from estadisticas_jugador_up where id_jugador=$codigo");
                $consulta-> execute();
                $res=$consulta->rowCount();

                if ($res != 0){
                    $codigo= $_POST['act'];
                    $puntos= $_POST['puntos'];
                    $minutos= $_POST['minutos'];
                    $faltas= $_POST['faltas'];
                    //echo $codigo, $puntos, $minutos, $faltas;
                    $actualiza= new estadistica($codigo,$puntos,$minutos,$faltas);
                    $actualiza->actualizado();  
                }else{
                    $codigo= $_POST['act'];
                    $puntos= $_POST['puntos'];
                    $minutos= $_POST['minutos'];
                    $faltas= $_POST['faltas'];
                    $inserta2 = new estadistica($codigo,$puntos,$minutos,$faltas);
                    $inserta2->insertar2();
                }
        ?>
                <p> El jugador de Codigo <?php echo $codigo ?>, ha conseguido en el ultimo partido <?php echo $puntos ?> puntos, ha jugado <?php echo $minutos ?> minutos y ha cometido <?php echo $faltas ?> faltas.</p>
                <br>
                <a href="./actualizarjugador.php"><button>Atras</button></a>
        <?php
            }else{
        ?>
        <h1>ACTUALIZAR ESTADISTICAS ULTIMO PARTIDO</h1>
        <br>
        <div id="formularioactu">
        <form action="" method="post">
            <label><b>Seleccionar Jugador a Actualizar</b></label>
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
            <label><b>PUNTOS ULTIMO PARTIDO:</b> </label>
            <input type="number" name="puntos" min="0" max="200" required/>
            <br><br>
            <label><b>MINUTOS ULTIMO PARTIDO:</b> </label>
            <input type="number" name="minutos" min="0" max="40" required/>
            <br><br>
            <label><b>FALTAS ULTIMO PARTIDO:</b> </label>
            <input type="number" name="faltas" min="0" max="6" required/>
            <br>
        </div>
        <div id="botonesactu">
            <input type="submit" name="actualizar" value="Actualizar Estadisticas"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </div>
        </form>  
        <?php
        }
        ?> 
        </div>
    </body>
</html>