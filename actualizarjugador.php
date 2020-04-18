<html>
    <head>
        <meta Charsert="UTF-8">
    </head>
    <body>
        <?php
            session_start();
            require_once 'conexionBD.php';
            require_once 'estadistica.php';
            if (isset($_POST['actualizar'])) {
                $codigo= $_POST['act'];
                $puntos= $_POST['puntos'];
                $minutos= $_POST['minutos'];
                $faltas= $_POST['faltas'];
                //$_SESSION['codigo']=$_POST['act'];
                //$_SESSION['puntos']=$_POST['puntos'];
                //$_SESSION['minutos']=$_POST['minutos'];
                //$_SESSION['faltas']=$_POST['faltas'];
                $actualiza= new estadistica($codigo,$puntos,$minutos,$faltas);
                $actualiza->actualizado();
            }
        ?>
    <form action="" method="post">
            <label>Selecciona Jugador a Borrar</label>
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
            <br>
            <label>PUNTOS ULTIMO PARTIDO: </label>
            <input type="text" name="puntos"/>
            <br>
            <label>MINUTOS ULTIMO PARTIDO: </label>
            <input type="text" name="minutos"/>
            <br>
            <label>FALTAS ULTIMO PARTIDO: </label>
            <input type="text" name="faltas"/>
            <br>
            <input type="submit" name="actualizar" value="Actualizar Estadisticas"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </form>   
    </body>
</html>