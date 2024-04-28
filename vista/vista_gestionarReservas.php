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
        <td><?= $datos[$indice]["estado"]?></td> 
        <td><button type="submit" class="botonG" id="informe" name="informe" value="">Aceptar</button></td>
        <td><button type="submit" class="botonE" id="informe" name="informe" value="">Rechazar</button></td>
    </tr>
    <?php }?>
</table>
<?php } ?>
<a class="enlaceP" href="index.php?ctl=operaciones"> &larr; Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>