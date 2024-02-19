<?php ob_start();?>

<div class="sinFondo">
    <form action="index.php?ctl=registro" method="POST">
        <label>DNI:</label>
        <input type="text" name="dni" id="dni" value="<?= isset($_REQUEST['dni']) ? $_REQUEST['dni'] : "" ?>"/>
        <br><br>
        <label>Nombre completo</label>
        <input type="text" name="nombre" id="nombre" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "" ?>"/>
        <br><br>
        <label>Correo electrónico</label>
        <input type="email" name="email" id="email" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['email'] : "" ?>"/>
        <br><br>
        <label>Usuario</label>
        <input type="text" name="alias" id="alias" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['alias'] : "" ?>"/>
        <br><br>
        <label>Contraseña</label>
        <input type="password" name="clave" id="clave" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['clave'] : "" ?>"/>
        <br><br>
        <p><input type="submit" name="registro" id="registro" value="Registrarse"/></p>
    </form>
    <?php if(isset($error)){ ?>
        <p class="errores"><?=mostrarError($error)?></p>
    <?php ;} else {echo "";};?>
</div>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>