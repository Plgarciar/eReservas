<?php ob_start(); var_dump($_REQUEST)?>


<h2>Mis datos</h2>
<form action="" method="POST" id="formularioDatos">
    <?php if(!isset($_REQUEST["modDatos"])){?>
            <?php if(!isset($_REQUEST['modificarIns'])){ ?>
            <?= $_SESSION['nombre_usuario'] ?>
            <?= $_SESSION['email_usuario'] ?>
            <?= $_SESSION['alias_usuario'] ?>
        <?php } ?>   
    <input type="submit" name="modDatos" id="modDatos" value="Modificar datos" >
    <?php } else { ?>
    <label>Nombre:</label>
    <input type="text" name="newNombre" id="newNombre" value="<?= $_SESSION['nombre_usuario']?>">
    <label>Email:</label>
    <input type="email" name="newEmail" id="newEmail" value="<?= $_SESSION['email_usuario']?>">
    <label>Alias:</label>
    <input type="text" name="newAlias" id="newAlias" value="<?= $_SESSION['alias_usuario']?>">
    <label>Contraseña:</label>
    <input type="text" name="newPass" id="newPass" value="">
    <button type="submit" name="guardarDatos" id="guardarDatos" value="<?= $_SESSION['id_usuario']?>">Guardar</button>
    <button type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button>
    <?php } ?>
</form>

<?php $contenido = ob_get_clean(); ?>

<?php include 'estructura.php' ;?>