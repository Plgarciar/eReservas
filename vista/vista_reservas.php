<?php ob_start();?>

<h2>Página de reservas</h2>
<?php if(count($datos) < 1){ ?>
        <p>No hay instalaciones para reservar</p>
    <?php }else { ?>
<form action="" method="post" id="formReservas">
    <label for="">Selecciona una instalación</label>
    <select name="" id="">
        <option>Selecciona instalación</option>
        <?php for($i=0;$i<count($datos);$i++){ 
            if(isset($_REQUEST['reser']) && $_REQUEST['reser']==$datos[$i]['id']){?>
            <option value="<?= $datos[$i]['id']?>" selected><?= $datos[$i]['nombre']?></option>
        <?php }else{ ?>
            <option value="<?= $datos[$i]['id']?>"><?= $datos[$i]['nombre']?></option>
        <?php } }?>
    </select>
    <label for="">Selecciona una fecha</label>
    <input type="date" name="" id="" >
    <!-- <?php for($i=0;$i<count($datos);$i++){ ?>
            <button type="submit">horas</button>
        <?php } ?> -->
    <input type="submit" value="Reservar">
</form>
<?php } ?>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>