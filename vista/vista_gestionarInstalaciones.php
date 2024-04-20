<?php ob_start(); ?>


<h2>Gestion Instalaciones</h2>

<form action="index.php?ctl=gestionarInstalaciones" method="post">
    <?php if(!isset($_REQUEST['anadirInstalacion'])){ 
            if(!isset($_REQUEST['modificarIns'])){?>
                <td><input class="botonP" type="submit" name="anadirInstalacion" id="anadirInstalacion" value="Añadir" ></td>
                <?php } else {?>
                    <td><input class="botonP" type="submit" name="anadirInstalacion" id="anadirInstalacion" value="Añadir" style="visibility: hidden;"></td>
                    <?php }?>   
    <?php } else { ?>
        <td>Nombre:<input type="text" name="nomInstalacion" id="nomInstalacion" value=<?= isset($_REQUEST['nomInstalacion']) ? $_REQUEST['nomInstalacion'] : "" ?>></td> 
        <td>Dirección: <input type="text" name="dirInstalacion" id="dirInstalacion" value=<?= isset($_REQUEST['dirInstalacion']) ? $_REQUEST['dirInstalacion'] : "" ?>></td>
        <td>Horario: <input type="text" name="horInstalacion" id="horInstalacion" value=<?= isset($_REQUEST['horInstalacion']) ? $_REQUEST['horInstalacion'] : "" ?>></td>
        <td>Imagen: <input type="file" name="imgInstalacion" id="imgInstalacion" value=<?= isset($_REQUEST['imgInstalacion']) ? $_REQUEST['imgInstalacion'] : "" ?>></td>
        <td><input class="botonP" type="submit" name="nuevaInst" id="nuevaInst" value="Guardar" ></td>
        <td><button class="botonP" type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button></td>
    <?php }?>
    <table id="gestionarInstalaciones">
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Horario</th>
        <th>Imagen</th>
        <th colspan="2"></th>
    <?php foreach($datos as $indice=>$contenido){?>
        <tr>
        <?php if(!isset($_REQUEST['modificarIns'])){ ?>
            <td><?= $datos[$indice]["nombre"]?></td> 
            <td><?= $datos[$indice]["direccion"]?></td>
            <td><?= $datos[$indice]["horario"]?></td>
            <td><img src="<?=$rutaImagen.$datos[$indice]['imagen']?>"></td>
        <td><button class="botonP" type="submit" name="modificarIns" id="modificarIns" value="<?= $datos[$indice]["id"]?>">Modificar</button>
            <button class="botonP" type="submit" name="eliminarIns" id="eliminarIns" value="<?= $datos[$indice]["id"]?>">Eliminar</button>
        </td>
        <?php } else if (($_REQUEST['modificarIns'])==$datos[$indice]["id"]){ ?>
        <td><input class="botonP" type="submit" name="anadirInstalacion" id="anadirInstalacion" value="Añadir" style="visibility: hidden;"></td>
        <td><input type="text" name="nuevoNom" id="nuevoNom" value=<?= $datos[$indice]["nombre"]?>></td> 
        <td><input type="text" name="nuevoDir" id="nuevoDir" value=<?= $datos[$indice]["direccion"]?>></td>
        <td><input type="text" name="nuevoHor" id="nuevoHor" value=<?= $datos[$indice]["horario"]?>></td>
        <td><input type="file" name="nuevoImg" id="nuevoImg" value=<?= $datos[$indice]["imagen"]?>></td>
        <td><button class="botonP" type="submit" name="guardarMod" id="guardarMod" value="<?= $datos[$indice]["id"]?>">Guardar</button></td>
        <td><button class="botonP" type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button></td>
        <?php } ?>   
        <?php }?>
    </tr>
</form>
</table>
<a class="enlaceP" href="index.php?ctl=operaciones">Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>