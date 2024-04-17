<?php ob_start();?>

<h2>Nuestras instalaciones</h2>

<div class="contenedorInstalaciones">
    
    <?php if(count($datos) < 1){ ?>
        <p>No hay instalaciones para reservar</p>
    <?php }else{ 
        for($i=0;$i<count($datos);$i++){?>
            <div class="instalacion">
                <img src="<?=$rutaImagen.$datos[$i]['imagen']?>">
                <p><?=$datos[$i]['nombre']?></p>
                <p><?=$datos[$i]['direccion']?></p>
                <p><?=$datos[$i]['horario']?></p>
                <?php if($_SESSION){?>
                <?php if($_SESSION['perfil_usuario']=="usuario"){?>
                <a href="index.php?ctl=reservas">Reservar</a>  
                <?php } } ?>   
                    
                </div>
                
    <?php } } ?>  
</div>
<?php if(($_SESSION) && ($_SESSION['perfil_usuario']=="administrador")){ ?>   
    <a href="index.php?ctl=gestionarInstalaciones">Gestionar</a>
<?php } if(!$_SESSION){?>
    <p>Para hacer una reserva es necesario <a href="index.php?ctl=login">iniciar sesión</a></p>
<?php } ?>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>