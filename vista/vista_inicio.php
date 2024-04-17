<?php ob_start();?>

<div id="contenedorInicio">
    <!-- <div class="seccionesInicio">
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
    </div> -->

    <a href="https://calvarrasadeabajo.es/ultimas-noticias/" class="seccionesInicio">
        <div >
            <p>Noticias</p>
        </div>
    </a>

    <a href="index.php?ctl=reservas" class="seccionesInicio">
        <div>
            <p>Reserva de instalaciones</p>
        </div>
    </a>

    <a href="#" class="seccionesInicio">
        <div >
            <p>Ayuda y normativa</p>
        </div>
    </a>

    <a href="index.php?ctl=contacto" class="seccionesInicio">
        <div>
            <p>Contacto</p>
        </div>
    </a>
</div>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>