<?php ob_start();?>

<div id="contenedorInicio">
    <div class="seccionesInicio">
        <p>Noticias</p>
        <a href="https://calvarrasadeabajo.es/ultimas-noticias/">Ver más</a>
    </div>
    <div class="seccionesInicio">
        <p>Reserva de instalaciones</p>
        <a href="#">Ver más</a>
    </div>
    <div class="seccionesInicio">
        <p>Ayuda y normativa</p>
        <a href="#">Ver más</a>
    </div>
    <div class="seccionesInicio">
        <p>Contacto</p>
        <a href="#">Ver más</a>
    </div>
</div>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>