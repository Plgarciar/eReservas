<?php ob_start(); ?>


<h2>Gestion Usuarios</h2>
<?php if(count($datos) < 1){ ?>
        <p>No existen usuarios registrados</p>
    <?php }else { ?>
<table id="gestionarUsuarios">
    <th>DNI</th>
    <th>Nombre</th>
    <th>Email</th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["dni"]?></td> 
        <td><?= $datos[$indice]["nombre"]?></td>
        <td><?= $datos[$indice]["email"]?></td>
    </tr>
    <?php }?>
</table>
<?php } ?>
<a class="enlaceP" href="index.php?ctl=operaciones"> &larr; Volver a operaciones</a>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>