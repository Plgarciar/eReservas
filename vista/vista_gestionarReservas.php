<?php ob_start();  ?>

<h2>Gestión Reservas</h2>
<?php if(count($datos) < 1){ ?>
        <p>No existe ninguna reserva</p>
    <?php }else { ?>
        <form action="index.php?ctl=generarInforme" method="post" id="formInf">
        <label >Ver informe de las reservas de:</label>
        <select name="seleInst" id="seleInst">
            <option>Selecciona instalación</option>
            <?php for($i=0;$i<count($datos2);$i++){ ?>
                <option value="<?= $datos2[$i]['id']?>"><?= $datos2[$i]['nombre']?></option>
            <?php } ?>
        </select>
        <button type="submit" class="botonP" id="informe" name="informe" value="" >Generar informe</button>
        </form>
  <table id="reservasUsuario">
    <th>#Reserva</th>
    <th>Usuario</th>
    <th>Instalacion</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Estado</th>
    <th></th>
    <th></th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["idReserva"]?></td> 
        <td><?= $datos[$indice]["usuario"]?></td> 
        <td><?= $datos[$indice]["instalacion"]?></td> 
        <td><?= $datos[$indice]["fecha"]?></td> 
        <td><?= $datos[$indice]["horas"]?></td> 
        <td class="estado"><?= $datos[$indice]["estado"]?></td> 
        <?php if($datos[$indice]["estado"]=="pendiente"){ ?>
        <form action="index.php?ctl=gestionarReservas" method="post" id="formEstado">
            <td><button type="submit" class="botonG" id="aceptarR" name="aceptarR" value="<?=$datos[$indice]["idReserva"]?>">Aceptar</button></td>
            <td><button type="submit" class="botonE" id="rechazarR" name="rechazarR" value="<?=$datos[$indice]["idReserva"]?>">Rechazar</button></td>
        </form>
        <?php }else{ ?>
            <td><button type="submit" class="botonG esconderBoton" id="aceptarR" name="aceptarR" value="">Aceptar</button></td>
            <td><button type="submit" class="botonE esconderBoton" id="rechazarR" name="rechazarR" value="">Rechazar</button></td>
        <?php } ?>
    </tr>
    <?php }?>
</table>
<?php } ?>
<a class="enlaceP" href="index.php?ctl=operaciones"> &larr; Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>