<?php ob_start();?>


<h2>Gestión Instalaciones</h2>
    <?php if(count($datos) < 1){ ?>
        <p>No existen instalaciones</p>
    <?php }else { ?>
<form action="index.php?ctl=gestionarInstalaciones" method="post" enctype="multipart/form-data">

    <?php if(!isset($_REQUEST['anadirInstalacion'])){ 
            if(!isset($_REQUEST['modificarIns'])){?>
                <td><input class="botonP botonA" type="submit" name="anadirInstalacion" id="anadirInstalacion" value="+ Añadir" ></td>
                <?php } else {?>
                    <td><input class="botonP botonA" type="submit" name="anadirInstalacion" id="anadirInstalacion" value="+ Añadir" style="visibility: hidden;"></td>
                <?php }?>  
                <?php if(isset($error)){ ?>
                <p class="errores"><?=mostrarError($error)?></p>
                <?php ;} else {echo "";};?> 
    <?php } else { ?>
<table class="gestionarInstalaciones addinstalacion">

        <th>Nombre</th>
        <th>Dirección</th>
        <th>Horario</th>
        <th>Imagen</th>
        <th colspan="2"></th>
        <tr>
            <td><input type="text" name="nomInstalacion" id="nomInstalacion" value=""></td> 
            <td><input type="text" name="dirInstalacion" id="dirInstalacion" value=""></td>
            <td><input type="text" name="horInstalacion" id="horInstalacion" value=""></td>
            <td><input type="file" name="imgInstalacion" id="imgInstalacion" value="" ></td>
            <td><input class="botonG" type="submit" name="nuevaInst" id="nuevaInst" value="Guardar" ></td>
            <td><button class="botonE" type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button></td>
        </tr>
        <tr class="espacio"></tr>
    <?php }?>
    <table class="gestionarInstalaciones">
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
        <td><button class="botonM" type="submit" name="modificarIns" id="modificarIns" value="<?= $datos[$indice]["id"]?>">Modificar</button>
            <button class="botonE" type="submit" name="eliminarIns" id="eliminarIns" value="<?= $datos[$indice]["id"]?>">Eliminar</button>
        </td>
        <?php } else if (($_REQUEST['modificarIns'])==$datos[$indice]["id"]){ ?>
        <td><input type="text" name="nuevoNom" id="nuevoNom" value=<?= $datos[$indice]["nombre"]?>></td> 
        <td><input type="text" name="nuevoDir" id="nuevoDir" value=<?= $datos[$indice]["direccion"]?>></td>
        <td><input type="text" name="nuevoHor" id="nuevoHor" value=<?= $datos[$indice]["horario"]?>></td>
        <td><input type="file" name="nuevoImg" id="nuevoImg" value=<?= $datos[$indice]["imagen"]?>></td>
        <td><button class="botonG" type="submit" name="guardarMod" id="guardarMod" value="<?= $datos[$indice]["id"]?>">Guardar</button></td>
        <td><button class="botonE" type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button></td>
        <?php } }?>   
        </tr>
</form>
</table>
<?php } ?>
<a class="enlaceP" href="index.php?ctl=operaciones"> &larr; Volver a operaciones</a>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>