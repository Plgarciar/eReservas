<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="vista/css/estilosInicio.css" />
        <title>Calvarrasa de Abajo - Reserva de instalaciones</title>
    </head>

    <body>
        <nav>
            <ul id="menu">
                <li><a href="index.php?ctl=home"><img src="./recursos/imagenes/ayto-calvarrasa-3.png"></a></li>
                <li><a href="index.php?ctl=home">Inicio</a></li>
                <li><a href="index.php?ctl=instalaciones">Instalaciones</a></li>
                <?php if(!$_SESSION){?>
                <li><a href="index.php?ctl=contacto">Contacto</a></li>
                <li><a href="index.php?ctl=registro">Registro</a></li>
                <li><a href="index.php?ctl=login">Iniciar sesión</a></li>
                <?php } else if($_SESSION['perfil_usuario']=="usuario"){ ?>
                <li><a href="index.php?ctl=reservas">Reservas</a></li>
                <li><a href="index.php?ctl=contacto">Contacto</a></li>
                <li><a href="#">Mi cuenta</a>
                    <ul class="submenu">
                        <li><a href="index.php?ctl=modificarDatos">Mis datos</a></li>
                        <li><a href="index.php?ctl=reservasUsuario">Mis reservas</a></li>
                        <li><a href="index.php?ctl=logout">Cerrar sesión</a></li>
                     </ul>
                </li>
               
                <?php } else if($_SESSION['perfil_usuario']=="administrador"){?>
                <li><a href="index.php?ctl=reservas">Reservas</a></li>
                <li><a href="index.php?ctl=contacto">Operaciones</a></li>
                <li><a href="#">Mi cuenta</a>
                    <li class="submenu"><a href="index.php?ctl=modificarDatos">Mis datos</a></li>
                    <li class="submenu"><a href="index.php?ctl=logout">Cerrar sesión</a></li>
                </li>
                <?php  } ;?>
            </ul>
        </nav>

        <main>
            <div class='gestion'>
                <?php echo $contenido ;?>
            </div>
        </main> 
        
        <footer>
            <p>Pie de la página</p>
        </footer>
    </body>
</html>