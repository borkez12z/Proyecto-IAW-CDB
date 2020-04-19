<html>
    <head>
        <meta Charsert="UTF-8">
        <style>
            body {
                margin: 0 auto;
            }

            #contenedor {
                margin: 0 auto;
                width: 50%;
                /*border: 3px solid #73AD21;*/
                background-color: lightyellow;
                !height: 40%;
            }

            h1 {
                text-align: center;
            }

            #formulario{
                margin: auto;
                width: 60%;
                padding: 10px;
                border: solid 1px grey;
            }

            #botones{
                width: 55%;
                margin-left: 300px;
                padding-bottom: 40px;
                margin-top: 10px;
            }

            p{
                text-align: center;
            }

            button{
                width: 35%;
                margin-left: 300px;
            }
            
        </style>
    </head>
    <body>
        <div id="contenedor">
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
        ?>
                <p> El jugador de Codigo <?php echo $codigo ?>, ha conseguido en el ultimo partido <?php echo $puntos ?> puntos, ha jugado <?php echo $minutos ?> minutos y ha cometido <?php $faltas ?>faltas.</p>
                <br>
                <a href="./actualizarjugador.php"><button>Atras</button></a>
        <?php
            }else{
        ?>
        <h1>ACTUALIZAR ESTADISTICAS ULTIMO PARTIDO</h1>
        <br>
        <div id="formulario">
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
            <input type="text" name="puntos" required/>
            <br><br>
            <label><b>MINUTOS ULTIMO PARTIDO:</b> </label>
            <input type="text" name="minutos" required/>
            <br><br>
            <label><b>FALTAS ULTIMO PARTIDO:</b> </label>
            <input type="text" name="faltas" required/>
            <br>
        </div>
        <div id="botones">
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