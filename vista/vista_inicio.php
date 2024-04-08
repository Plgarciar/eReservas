<?php ob_start();?>

    <div class="seccionesInicio">
        <p>Noticias</p>
        <a href="#">Ver más</a>
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

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>