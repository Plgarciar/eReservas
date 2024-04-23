<?php ob_start(); ?>

<h2>Gestión Reservas</h2>

<table id="reservasUsuario">
    <th>Usuario</th>
    <th>Instalacion</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th></th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["usuario"]?></td> 
        <td><?= $datos[$indice]["instalacion"]?></td> 
        <td><?= $datos[$indice]["fecha"]?></td> 
        <td><?= $datos[$indice]["horas"]?></td> 
    </tr>
    <?php }?>
</table>
<a class="enlaceP" href="index.php?ctl=operaciones"> &larr; Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>