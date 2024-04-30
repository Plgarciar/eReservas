<?php ob_start();?>

<h2>Página de reservas</h2>
<?php if(count($datos) < 1){ ?>
        <p>No hay instalaciones para reservar</p>
    <?php }else { ?>
<form action="index.php?ctl=reservas" method="post" id="formReservas">
    
    <label>Selecciona una instalación</label>
    <select name="seleInst" id="seleInst">
        <option>Selecciona instalación</option>
        <?php for($i=0;$i<count($datos);$i++){ 
            if(isset($_REQUEST['reser']) && $_REQUEST['reser']==$datos[$i]['id']){?>
            <option value="<?= $datos[$i]['id']?>" selected><?= $datos[$i]['nombre']?></option>
        <?php }else{ ?>
            <option value="<?= $datos[$i]['id']?>"><?= $datos[$i]['nombre']?></option>
        <?php } }?>
    </select>

    <label>Selecciona una fecha</label>
    <input type="date" name="dia" id="dia" >

    <label>Selecciona una hora</label>
    <select name="seleHora" id="seleHora">
        <option>Selecciona hora</option>
        <?php for($i=0;$i<count($datos2);$i++){ ?>
            <option value="<?= $datos2[$i]['id']?>"><?= $datos2[$i]['horas']?></option>
        <?php } ?>
    </select>

    <button type="submit" class="botonP" name="reservaInst" id="reservaInst" value="<?= $_SESSION['id_usuario']?>">Reservar</button>
</form>
<?php if(isset($error)){ ?>
    <p class="errores"><?=mostrarError($error)?></p>
<?php ;} else {echo "";};?>
<?php } ?>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>