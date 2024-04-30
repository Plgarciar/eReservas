<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Informe reservas de instalaciones</title>
        <style>
            h1{
                text-align: center;
            }

            div{
                text-align: center;
                border: 2px solid darkblue;
                width: 60%;
                margin: 2em auto;
                padding: 0;
                page-break-inside: avoid;
            }

            div h3{
                padding: .5em 0;
                margin: 0;
                background-color: darkblue;
                color: white;
            }        
        </style>
    </head>

    <body>
        <main>
            <h1>Informe de las reservas de la instalacion: <br>
            <?php if(count($datosR) < 1){ ?>
                <p>No existen reservas para la instalación</p>
            <?php }else { ?>
            <?= $datosR[0]['instalacion'] ?>
            </h1>
            
            <?php foreach($datosR as $indice=>$contenido){?>
            <div id="reservasUsuario">
                <h3>#Reserva <?= $datosR[$indice]['idReserva']?></h3>
                <p>Usuario: <?= $datosR[$indice]["usuario"]?></p> 
                <p>Fecha: <?= $datosR[$indice]["fecha"]?></p> 
                <p>Hora: <?= $datosR[$indice]["horas"]?></p> 
                <p>Estado: <?= $datosR[$indice]["estado"]?></p> 
            </div>
            <?php } }?>
        </main>
    </body>
</html>