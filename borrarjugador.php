<html>
    <head>
        <meta Charsert="UTF-8">
        <link rel="StyleSheet" href="./css/estilo.css" type="text/css" />
    </head>
    <body>
        <div id="contenedorborrar">
        <?php
            require_once 'conexionBD.php';
            require_once 'jugador.php';
            if (isset($_POST['borrar'])) {
                $codigo= $_POST['borrar_jug'];
                //$elimina= new jugador(0,0,0,0,0);
                //$elimina->borrar($codigo);
                jugador::borrar($codigo);
        ?>
                <h2>El Jugador de codigo <?php echo $codigo ?> ha sido eliminado correctamente</h2>
                <br>
                <a href="./borrarjugador.php"><button>Atrás</button></a>
        <?php
            }else{
        ?>
        <h1>Borrar Jugador</h1>
        <div id="formularioborrar">
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
        <div id="botonesborrar">
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