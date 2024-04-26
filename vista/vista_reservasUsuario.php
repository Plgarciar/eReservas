<?php ob_start(); ?>

<h2>Mis reservas</h2>
<?php if(count($datos) < 1){ ?>
        <p>No has realizado ninguna reserva</p>
    <?php }else { ?>
<table id="reservasUsuario">
    <th>Instalacion</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th></th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["instalacion"]?></td> 
        <td><?= $datos[$indice]["fecha"]?></td> 
        <td><?= $datos[$indice]["horas"]?></td> 
        <!-- <td><a >Ver detalle</a></td> -->
        <td><input type="submit" class="botonP" value="Ver detalle" id="detalle" name="detalle"></td>
    </tr>
    <?php }?>
</table>
<?php } ?>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>