<html>
    <head>
        <meta charset="UTF-8">
        <title>CDB ARAHAL</title>
        <style>
            body {
                /*background-color: lightblue;*/
                margin: 0 auto;
                width: 100%;
                
            }

            #contenedor {
                margin: 0 auto;
                width: 50%;
                /*border: 3px solid #73AD21;*/
                background-color: lightblue;
            }
            h1 {
                text-align: center;
                !border: 3px solid #73AD21;
                width: 40%;
                margin-left: 30%;
                margin-top: -5px;
            }

            .center {
                margin: auto;
                width: 60%;
                /*border: 3px solid #73AD21;*/
                padding: 10px;
            }
            
            button {
                margin-left: 15px;
                width: 90%;
                padding: 10px;
                margin-top: 10px;
                cursor: pointer;
            }
            
            #fecha {
                !border: 3px solid #73AD21;
                width: 20%;
                text-align: center;
                margin-left: 375px;
            }
        </style>
    </head>
    <body>
        <div id="contenedor">
        <div id="fecha">
        <?php
        require_once 'fecha.php';
        echo  Date_f::getFecha();
        ?>
        </div>
        <h1>CDB ARAHAL</h1>
        <hr></hr>
        <div class="center">
            <a href="./inscribirjugador.php"><button>INSCRIBIR JUGADOR</button></a>
            <a href="./actualizarjugador.php"><button>ACTUALIZAR ESTADISTICAS JUGADOR</button></a>
            <a href="./borrarjugador.php"><button>BORRAR JUGADOR</button></a>
            <a href="./buscarposicion.php"><button>BUSCAR JUGADOR</button></a>
        </div>
        </div>
    <body>
</html>