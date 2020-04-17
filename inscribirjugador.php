<html>
    <head>
        <meta CHARSET="UTF-8">
    </head>
    <body>
        <h1>INSCRIBIR JUGADOR</h1>
        <form action="" method="POST">
            <label>Código Jugador: </label>
            <input type="number" name="codigo" min="19999" max="99999"/>
            <br>
            <label>Nombre: </label>
            <input type="text" name="nombre"/>
            <br>
            <label>Nacionalidad: </label>
            <input type="text" name="nacionalidad"/>
            <br>
            <label>Año Nacimiento: </label>
            <select name="anyo">
                <option value=""></option>
                <?php
                    for ($a=1980; $a<=2004; $a++){
                ?>
                <option value="<?php echo $a ?>"><?php echo $a ?></option> 
                <?php
                }
                ?>
            </select>
            <br>
            <label>Posición: </label>
            <?php
                include('conexionBD.php');
                $datos=$base->prepare('SELECT CODIGO_POSICION, NOMBRE FROM POSICION');
                $datos->execute();
                while( $filas = $datos->fetch()){
            ?>
                <label><?php echo $filas[1] ?></label>
                <input type="checkbox" name="chex" value="<?php echo $filas[0] ?>"/>
            <?php
                }
            ?>
            <br><br>
            <input type="submit" name="inscribir" value="Inscribir Jugador"/>
            <input type="reset" name="limpiar" value="Limpiar"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </form>
    </body>
</html>