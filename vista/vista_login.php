<?php ob_start();?>

<div class="sinFondo">
    <form action="index.php?ctl=validar" method="post">
        <label>Usuario</label>
        <input type="text" name="alias" id="alias"/>
        <br><br>
        <label>Contraseña</label>
        <input type="password" name="clave" id="clave"/>
        <p><input type="submit" name="login" id="login" value="Acceder"/></p>
    </form>
    <?php if(isset($error)){ ?>
        <p class="errores"><?=mostrarError($error)?></p>
    <?php ;} else {echo "";};?>
</div>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>