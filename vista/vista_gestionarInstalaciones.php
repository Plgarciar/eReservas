<?php ob_start(); ?>


<h2>Gestion Instalaciones</h2>
<table id="gestionarInstalaciones">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><input type="submit" value="Añadir"></td>
    </tr>
    
    <th>Id</th>
    <th>Nombre</th>
    <th>Dirección</th>
    <th>Horario</th>
    <th>Imagen</th>
    <th></th>
    <?php foreach($datos as $indice=>$contenido){?>
    <tr>
        <td><?= $datos[$indice]["id"]?></td> 
        <td><?= $datos[$indice]["nombre"]?></td> 
        <td><?= $datos[$indice]["direccion"]?></td>
        <td><?= $datos[$indice]["horario"]?></td>
        <td><img src="<?=$rutaImagen.$datos[$indice]['imagen']?>"></td>
        <td><input type="submit" value="Modificar"></td>
        <td><input type="submit" value="Eliminar"></td>
    </tr>
    <?php }?>
    
</table>
<a href="index.php?ctl=operaciones">Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>