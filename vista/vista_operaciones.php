<?php ob_start(); ?>


<h2>Operaciones</h2>
<div id="contenedorOpe">
    <a href="index.php?ctl=gestionarInstalaciones" class="seccionesOpe">
        <div>
            <img src="./recursos/imagenes/icono_instalaciones.svg" alt="">
            <p>Panel instalaciones</p>
        </div>
    </a>


    <a href="index.php?ctl=gestionarReservas" class="seccionesOpe">
        <div>
            <img src="./recursos/imagenes/icono_reservas.svg" alt="">
            <p>Panel reservas</p>
        </div>
    </a>

    <a href="index.php?ctl=gestionarUsuarios" class="seccionesOpe">
        <div>
            <img src="./recursos/imagenes/icono_usuarios.svg" alt="">
            <p>Panel usuarios</p>
        </div>
    </a>
</div>

<?php $contenido = ob_get_clean();?>

<?php include 'estructura.php' ;?>