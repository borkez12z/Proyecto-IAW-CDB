<html>
    <head>
        <meta CHARSET="UTF-8">
        <style>
            body {
                background-color: lightyellow;
                margin: 0 auto;
            }

            h1 {
                text-align: center;
            }

            form{
                margin: auto;
                width: 40%;
                border: 3px solid #73AD21;
                padding: 10px;
            }

            label{
                border: 3px solid red;
            }

            input{
                border: 3px solid green;
            }
        </style>
    </head>
    <body>
        <?php
        require_once 'conexionBD.php';
        require_once 'jugador.php';
        require_once 'estadistica.php';
        require_once 'jugador_posicion.php';
        if (isset($_POST['inscribir'])) {
            $codigo= $_POST['codigo'];
            //echo $codigo;
            $nombre=$_POST['nombre'];
            //echo $nombre;
            $anio=$_POST['anyo'];
            //echo $anio;
            $nacionalidad=$_POST['nacionalidad'];
            //echo $nacionalidad;
            $posi=$_POST['chex'];
            //echo $posi;
            $inserta= new jugador($codigo,$nombre,$anio,$nacionalidad,$posi);
            //$inserta= new jugador(23422,'rafael',1998,'macedonia',120);
            $inserta->insertar();
            
            $inserta2 = new estadistica($codigo,0,0,0);
            $inserta2->insertar2();

            $inserta3 = new jugpos($codigo,$posi);
            $inserta3->insertar3();
        }
        ?>
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
                $conexion= new conexion();
                $datos=$conexion->prepare('SELECT CODIGO_POSICION, NOMBRE FROM POSICION');
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
            <a href="./otraPosicion.php"><input type="button" name="nuevapos" value="Añadir Otra Posicion Jugador"/></a>
            <input type="reset" name="limpiar" value="Limpiar"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
        </form>
    </body>
</html>