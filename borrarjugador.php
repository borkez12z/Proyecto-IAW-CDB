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
                background-color: #FC9A85;
                !height: 40%;
            }

            h1 {
                text-align: center;
            }

            #formulario{
                margin: auto;
                width: 40%;
                padding: 10px;
                border: solid 1px grey;
                text-align: center;
            }

            #botones{
                width: 22%;
                margin-left: 370px;
                padding-bottom: 40px;
                !margin-top: 10px;
                !border: solid 1px grey;
            }

            h2 {
                text-align: center;
            }

            button {
                width: 35%;
                margin-left: 300px;
            }
        </style>
    </head>
    <body>
        <div id="contenedor">
        <?php
            require_once 'conexionBD.php';
            require_once 'jugador.php';
            if (isset($_POST['borrar'])) {
                $codigo= $_POST['borrar_jug'];
                $elimina= new jugador(0,0,0,0,0);
                $elimina->borrar($codigo);
        ?>
                <h2>El Jugador de codigo <?php echo $codigo ?> ha sido eliminado correctamente</h2>
                <br>
                <a href="./borrarjugador.php"><button>Atrás</button></a>
        <?php
            }else{
        ?>
        <h1>Borrar Jugador</h1>
        <div id="formulario">
        <form action="" method="post">
            <label><b>Selecciona Jugador a Borrar:</b></label>
            <select name="borrar_jug">
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
        </div>
            <br><br>
        <div id="botones">
            <input type="submit" name="borrar" value="Borrar Jugador"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </div>
        </form>
        </div>
    <body>
        <?php
            }
        ?>
</html>