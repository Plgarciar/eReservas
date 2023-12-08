<?php ob_start(); var_dump($_SESSION)?>

<div class="sinFondo">
    <p>posicion global</p>
</div>

<?php if($_REQUEST['ctl']=="inicio"){
    echo "hola";
}?>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>