<?php ob_start(); var_dump($_REQUEST)?>


<h2>Mis datos</h2>
<form action="" method="POST" id="formularioDatos">
    <?php if(!isset($_REQUEST["modDatos"]) && !isset($_REQUEST["modPass"])){?>
        <label for="">Nombre completo</label>
        <p><?= $_SESSION['nombre_usuario'] ?></p>
        <label for="">DNI</label>
        <p><?= $_SESSION['dni_usuario'] ?></p>
        <label for="">Email</label>
        <p><?= $_SESSION['email_usuario'] ?></p>
        <label for="">Alias</label>
        <p><?= $_SESSION['alias_usuario'] ?></p>
    <input type="submit" name="modDatos" id="modDatos" value="Editar datos personales" >
    <input type="submit" name="modPass" id="modPass" value="Cambiar contraseña" >
    <?php } else if(isset($_REQUEST["modDatos"])){ ?>
    <p>Estos es la informacion que puedes editar:</p>
    <label>Nombre:</label>
    <input type="text" name="newNombre" id="newNombre" value="<?= $_SESSION['nombre_usuario']?>">
    <label>Email:</label>
    <input type="email" name="newEmail" id="newEmail" value="<?= $_SESSION['email_usuario']?>">
    <label>Alias:</label>
    <input type="text" name="newAlias" id="newAlias" value="<?= $_SESSION['alias_usuario']?>">
    <button type="submit" name="guardarDatos" id="guardarDatos" value="<?= $_SESSION['id_usuario']?>">Guardar cambios</button>
    <button type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button>
    <?php } else if(isset($_REQUEST["modPass"])){?>
        <p>Aquí puedes modificar tu contraseña:</p>
        <label>Introduce tu contraseña actual:</label>
        <input type="password" name="actualPass" id="actualPass" value="">
        <label>Introduce tu contraseña nueva:</label>
        <input type="password" name="newPass" id="newPass" value="">
        <label>Introduce de nuevo tu contraseña nueva:</label>
        <input type="password" name="newPass" id="newPass" value="">
        <button type="submit" name="guardarDatos" id="guardarDatos" value="<?= $_SESSION['id_usuario']?>">Guardar cambios</button>
        <button type="submit" name="botonCancelar" id="botonCancelar">Cancelar</button>
    <?php } ?>
</form>

<?php $contenido = ob_get_clean(); ?>

<?php include 'estructura.php' ;?>