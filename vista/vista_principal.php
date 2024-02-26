<?php ob_start(); ?>


<h2>pagina principal</h2>


<?php if($_REQUEST['ctl']=="inicio"){
    echo "hola";
}?>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>