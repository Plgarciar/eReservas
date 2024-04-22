<?php ob_start();?>

<h2>Formulario de registro</h2>

    <form action="index.php?ctl=registro" method="POST" id="formRegistro">
        <!-- <label>DNI</label> -->
        <input type="text" name="dni" id="dni" placeholder="DNI" value="<?= isset($_REQUEST['dni']) ? $_REQUEST['dni'] : "" ?>"/>
   
        <!-- <label>Nombre completo</label> -->
        <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "" ?>"/>
    
        <!-- <label>Correo electrónico</label> -->
        <input type="email" name="email" id="email" placeholder="Correo electrónico" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['email'] : "" ?>"/>
       
        <!-- <label>Usuario</label> -->
        <input type="text" name="alias" id="alias" placeholder="Usuario" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['alias'] : "" ?>"/>
       
        <!-- <label>Contraseña</label> -->
        <input type="password" name="clave" id="clave" placeholder="Contraseña" value="<?= isset($_REQUEST['nombre']) ? $_REQUEST['clave'] : "" ?>"/>
   
        <p><input class="botonP" type="submit" name="registro" id="registro" value="Registrarse"/></p>
    </form>
    <?php if(isset($error)){ ?>
        <p class="errores"><?=mostrarError($error)?></p>
    <?php ;} else {echo "";};?>

    <p>¿Ya estás registrado? <a class="enlaceI" href="index.php?ctl=login">Inicia sesión</a></p>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>