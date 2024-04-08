<?php ob_start(); ?>

<h2>Mis reservas</h2>

<table id="reservasUsuario">
    <th>Instalacion</th>
    <th>Fecha</th>
    <th>Hora</th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["instalacion"]?></td> 
        <td><?= $datos[$indice]["fecha"]?></td> 
        <td><?= $datos[$indice]["horas"]?></td> 
    </tr>
    <?php }?>
</table>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>