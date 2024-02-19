<?php ob_start(); ?>

<div class="sinFondo">
    <p>pagina principal</p>
</div>

<?php if($_REQUEST['ctl']=="inicio"){
    echo "hola";
}?>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>