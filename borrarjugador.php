<html>
    <head>
        <meta Charsert="UTF-8">
    </head>
    <body>
        <?php
            require_once 'conexionBD.php';
            require_once 'jugador.php';
            if (isset($_POST['borrar'])) {
                $codigo= $_POST['borrar_jug'];
                $elimina= new jugador(0,0,0,0,0);
                $elimina->borrar($codigo);
            }
        ?>
        <form action="" method="post">
            <label>Selecciona Jugador a Borrar</label>
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
            <br><br>
            <input type="submit" name="borrar" value="Borrar Jugador"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </form>
    <body>
</html>