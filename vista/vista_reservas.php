<?php ob_start();?>

<h2>Página de reservas</h2>
<form action="" method="post" id="formReservas">
    
    <select name="" id="">
        <option value="">Selecciona instalación</option>
        <?php for($i=0;$i<count($datos);$i++){ ?>
            <option value="<?= $datos[$i]['id']?>"><?= $datos[$i]['nombre']?></option>
        <?php } ?>
    </select>
    <input type="date" name="" id="" >
    <?php for($i=0;$i<count($datos);$i++){ ?>
            <button type="submit">horas</button>
        <?php } ?>
    <input type="submit" value="Reservar">
</form>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>