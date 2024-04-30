<?php ob_start(); ?>

<h2>Mis reservas</h2>
<?php if(count($datos) < 1){ ?>
        <p>No has realizado ninguna reserva</p>
    <?php }else { ?>
<table id="reservasUsuario">
    <th>Instalacion</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Estado</th>
    <th></th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["instalacion"]?></td> 
        <td><?= $datos[$indice]["fecha"]?></td> 
        <td><?= $datos[$indice]["horas"]?></td> 
        <td class="estado"><?= $datos[$indice]["estado"]?></td> 
        <form action="index.php?ctl=reservasUsuario" method="post">
            <td><button type="submit" class="botonE" value="<?= $datos[$indice]["idReserva"] ?>" id="anular" name="anular">Anular</button></td>
        </form>
    <?php }?>
</table>
<?php } ?>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>