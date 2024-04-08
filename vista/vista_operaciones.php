<?php ob_start(); ?>


<h2>Operaciones</h2>
<a href="index.php?ctl=gestionarInstalaciones">Panel instalaciones</a>
<a href="index.php?ctl=gestionarReservas">Panel reservas</a>
<a href="index.php?ctl=gestionarUsuarios">Panel usuarios</a>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>