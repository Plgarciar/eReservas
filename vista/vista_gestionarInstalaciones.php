<?php ob_start(); var_dump($_REQUEST)?>


<h2>Gestion Instalaciones</h2>

<form action="index.php?ctl=gestionarInstalaciones" method="post">
    <td><input type="submit" value="Añadir" id="anadirInstalacion"></td>
<table id="gestionarInstalaciones">
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <th>Nombre</th>
    <th>Dirección</th>
    <th>Horario</th>
    <th>Imagen</th>
    <th></th>
    <?php foreach($datos as $indice=>$contenido){?>
        <tr>
        <?php if(!isset($_REQUEST['modificarIns'])){ ?>
        <td><?= $datos[$indice]["nombre"]?></td> 
        <td><?= $datos[$indice]["direccion"]?></td>
        <td><?= $datos[$indice]["horario"]?></td>
        <td><img src="<?=$rutaImagen.$datos[$indice]['imagen']?>"></td>
        <td><button type="submit" name="modificarIns" id="modificarIns" value="<?= $datos[$indice]["id"]?>">Modificar</button></td>
        <?php } else { ?>
        <td><input type="text" value=<?= $datos[$indice]["nombre"]?>></td> 
        <td><?= $datos[$indice]["direccion"]?></td>
        <td><?= $datos[$indice]["horario"]?></td>
        <td><button type="submit" name="guardarMod" id="guardarMod" value="<?= $datos[$indice]["id"]?>">Guardar</button></td>
        <?php } ?>
        <td><button type="submit" name="eliminarIns" id="eliminarIns" value="<?= $datos[$indice]["id"]?>">Eliminar</button></td>
    </tr>
    <?php }?>
    </form>
</table>
<a href="index.php?ctl=operaciones">Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>