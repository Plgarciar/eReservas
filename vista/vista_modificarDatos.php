<?php ob_start();?>


<h2>Mis datos</h2>
<form action="index.php?ctl=modificarDatos" method="POST" class="formularioDatos">
    <?php if(!isset($_REQUEST["modDatos"]) && !isset($_REQUEST["modPass"])){?>
        <label for="">Nombre completo</label>
        <p><?= $_SESSION['nombre_usuario'] ?></p>
        <label for="">DNI</label>
        <p><?= $_SESSION['dni_usuario'] ?></p>
        <label for="">Email</label>
        <p><?= $_SESSION['email_usuario'] ?></p>
        <label for="">Alias</label>
        <p><?= $_SESSION['alias_usuario'] ?></p>
        <input class="botonP" type="submit" name="modDatos" id="modDatos" value="Editar datos" >
        <input class="botonP" type="submit" name="modPass" id="modPass" value="Cambiar contraseña" >
    <?php } else if(isset($_REQUEST["modDatos"])){ ?>
        <p>Esta es la informacion que puedes editar:</p>
        <label>Nombre:
        <p><input type="text" name="newNombre" id="newNombre" value="<?= $_SESSION['nombre_usuario']?>"></p>
        <label>Email:</label>
        <p><input type="email" name="newEmail" id="newEmail" value="<?= $_SESSION['email_usuario']?>"></p>
        <label>Alias:</label>
        <p><input type="text" name="newAlias" id="newAlias" value="<?= $_SESSION['alias_usuario']?>"></p>
        <button class="botonP" type="submit" name="guardarDatos" id="guardarDatos" value="<?= $_SESSION['id_usuario']?>">Guardar cambios</button>
        <button class="botonP" type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button>
    <?php } else if(isset($_REQUEST["modPass"])){?>
        <p>Aquí puedes modificar tu contraseña:</p>
        <label>Introduce tu contraseña actual:</label>
        <p><input type="password" name="actualPass" id="actualPass" value=""></p>
        <label>Introduce tu contraseña nueva:</label>
        <p><input type="password" name="passNueva" id="passNueva" value=""></p>
        <label>Introduce de nuevo tu contraseña nueva:</label>
        <p><input type="password" name="passNueva2" id="passNueva2" value=""></p>
        <button class="botonP" type="submit" name="guardarDatos2" id="guardarDatos2" value="<?= $_SESSION['id_usuario']?>">Guardar cambios</button>
        <button class="botonP" type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button>
    <?php } ?>
</form>

<?php if(isset($error)){ ?>
    <p class="errores"><?=mostrarError($error)?></p>
<?php ;} else {echo "";};?>

<?php $contenido = ob_get_clean(); ?>

<?php include 'estructura.php' ;?>