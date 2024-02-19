<?php ob_start();?>

<h3>Nuestras instalaciones</h3>
<hr>
<div class="contenedorInstalaciones">
    
    <?php if(count($datos) < 1){ ?>
        <p>No hay instalaciones para reservar</p>
    <?php }else{ 
        for($i=0;$i<count($datos);$i++){?>
            <div class="instalacion">
                <img src="<?=$datos[$i]['imagen']?>">
                <p><?=$datos[$i]['nombre']?></p>
                <p><?=$datos[$i]['direccion']?></p>
                <p><?=$datos[$i]['horario']?></p>
                <?php if($_SESSION){?>
                <a href="index.php?ctl=reservas">Reservar</a>  
                <?php } ?>
                
            </div>
    <?php } }?>  
    
</div>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>