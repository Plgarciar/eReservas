<?php ob_start();?>

<h2>Inicia sesión</h2>

<form action="index.php?ctl=validar" method="post" id="formLogin">
    <input type="text" name="alias" id="alias" placeholder="Usuario"/>

    <input type="password" name="clave" id="clave" placeholder="Contraseña"/>
    <p><input class="botonP" type="submit" name="login" id="login" value="Acceder"/></p>
</form>

<p><a class="enlaceI" href="#">¿Olvidaste tu contraseña?</a></p>
<p>¿No tienes cuenta? <a class="enlaceI" href="index.php?ctl=registro">Regístrate</a></p>
<?php if(isset($error)){ ?>
    <p class="errores"><?=mostrarError($error)?></p>
<?php ;} else {echo "";};?>


<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>