<?php ob_start();?>

<div id="contenedorInicio">
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
        <div>
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