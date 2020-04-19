<html>
    <head>
        <meta CHARSET="UTF-8">
        <style>
            body {
                margin: 0 auto;
            }

            #contenedor {
                margin: 0 auto;
                width: 50%;
                /*border: 3px solid #73AD21;*/
                background-color: lightgreen;
                height: 40%;
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

            label{
                
            }

            #botones{
                width: 55%;
                margin-left: 200px;
                padding-bottom: 40px;
                margin-top: -30px;
            }

            button{
                width: 35%;
                margin-left: 300px;
            }

            h3 {
                text-align: center;
            }

            #lab{
                width: 40%;
                !border: 3px solid #73AD21;
                margin-left: 300px;
            }
        </style>
    </head>
    <body>
    <div id="contenedor">
        <?php
        require_once 'conexionBD.php';
        require_once 'jugador.php';
        require_once 'estadistica.php';
        require_once 'jugador_posicion.php';
        /*if (isset($_POST['inscribir'])) {
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
        }*/

        if (isset($_POST['inscribir'])) {
            $codigo= $_POST['codigo'];
            $conexion= new conexion;
            $consulta=$conexion->prepare("SELECT * from jugador where id_jugador=$codigo");
            $consulta-> execute();
            $res=$consulta->rowCount();

            if($res !=0){
            ?>
                <h1>Ya hay un jugador registrado con dicho Codigo</h1>
            <?php
            }else{
                $codigo= $_POST['codigo'];
                $nombre=$_POST['nombre'];
                $anio=$_POST['anyo'];
                $nacionalidad=$_POST['nacionalidad'];
                $posi=$_POST['chex'];
                $inserta= new jugador($codigo,$nombre,$anio,$nacionalidad,$posi);
                //$inserta= new jugador(23422,'rafael',1998,'macedonia',120);
                $inserta->insertar();

                $inserta2 = new estadistica($codigo,0,0,0);
                $inserta2->insertar2();

                $inserta3 = new jugpos($codigo,$posi);
                $inserta3->insertar3();
            ?>
                <h3>Nuevo Fichaje</h3>
                <div id="lab">
                <label><b>Nombre:</b><?php echo "$nombre"?></label>
                <br>
                <label><b>Año Nacimiento:</b><?php echo "$anio"?></label>
                <br>
                <label><b>Nacionalidad:</b><?php echo "$nacionalidad"?></label>
                <br>
                </div>
            <?php
            }
            ?>
            <br>
            <a href="./inscribirjugador.php"><button>Atrás</button></a>
        <?php
        }else{
        ?>
        <h1>INSCRIBIR JUGADOR</h1>
        <div id=formulario>
        <form action="" method="POST">
            <label><b>Código Jugador:</b> </label>
            <input type="number" name="codigo" min="19999" max="99999" required/>
            <br><br>
            <label><b>Nombre:</b> </label>
            <input type="text" name="nombre"/>
            <br><br>
            <label><b>Nacionalidad:</b> </label>
            <input type="text" name="nacionalidad"/>
            <br><br>
            <label><b>Año Nacimiento:</b> </label>
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
            <br><br>
            <label><b>Posición:</b> </label>
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
            </div>
            <br><br>
            <div id="botones">
            <input type="submit" name="inscribir" value="Inscribir Jugador"/>
            <a href="./otraPosicion.php"><input type="button" name="nuevapos" value="Añadir Otra Posicion Jugador"/></a>
            <input type="reset" name="limpiar" value="Limpiar"/>
            <a href="./index.php"><input type="button" name="Volver" value="Volver a inicio"/></a>
            </div>
        </form>
        <?php
        }
        ?>
        </div>
    </body>
</html>