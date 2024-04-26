<?php ob_start();?>
<div id="contenedorInicio">

    <?php if(!$_SESSION){ ?>
        <a href="https://calvarrasadeabajo.es/ultimas-noticias/" class="seccionesInicio">
        <div >
            <p>Noticias</p>
        </div>
    </a>

    <a href="index.php?ctl=instalaciones" class="seccionesInicio">
        <div>
            <p>Instalaciones</p>
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
    <?php } else if($_SESSION['perfil_usuario']=="usuario"){ ?>
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
    <?php } else if($_SESSION['perfil_usuario']=="administrador"){ ?>
    <a href="https://calvarrasadeabajo.es/ultimas-noticias/" class="seccionesInicio">
        <div >
            <p>Noticias</p>
        </div>
    </a>

    <a href="index.php?ctl=instalaciones" class="seccionesInicio">
        <div>
            <p>Instalaciones</p>
        </div>
    </a>

    <a href="#" class="seccionesInicio">
        <div>
            <p>Ayuda y normativa</p>
        </div>
    </a>
    <?php } ?>
</div>
<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>