<?php ob_start(); var_dump($_SESSION)?>

<div class="sinFondo">
    <p>Modificar datos de la cuenta</p>
    <form action="" method="POST" id="formularioDatos">
        <label>Nombre:</label>
        <input type="text" name="newNombre" id="" value="<?= $_SESSION['nombre_usuario']?>">
        <label>Email:</label>
        <input type="email" name="newEmail" id="" value="<?= $_SESSION['email_usuario']?>">
        <label>Alias:</label>
        <input type="text" name="newAlias" id="" value="<?= $_SESSION['alias_usuario']?>">
        modificar datos
        <label>Contraseña:</label>
        <input type="text" name="" id="" value="">
        cambiar contraseña
    </form>
</div>


<?php $contenido = ob_get_clean(); ?>

<?php include 'estructura.php' ;?>