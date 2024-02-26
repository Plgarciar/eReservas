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
                <li><a href="index.php?ctl=operaciones">Operaciones</a></li>
                <li><a href="#">Mi cuenta</a>
                    <ul class="submenu">
                        <li><a href="index.php?ctl=modificarDatos">Mis datos</a></li>
                        <li><a href="index.php?ctl=logout">Cerrar sesión</a></li>
                    </ul>
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
            <div>
                <h3>Contacto</h3>
                <p>Teléfono: <a href="tel:923306024">923306024</a></p>
                <p>Email: <a href="mailto:cultura@calvarrasadeabajo.es">cultura@calvarrasadeabajo.es</a></p>

            </div>
            <div>
               <h3>Dirección</h3>
               <p>Plaza Mayor, s/n 37181<br>
               Calvarrasa de Abajo, Salamanca</p>
            </div>
            <div>
                <h3>Enlaces de interés</h3>
                <ul id="listaPie">
                    <li><a href="https://calvarrasadeabajo.es/aviso-legal/">Aviso legal</a></li>
                    <li><a href="https://calvarrasadeabajo.es/politica-de-privacidad/">Política de privacidad</a></li>
                    <li><a href="https://calvarrasadeabajo.es/politica-de-cookies/">Política de cookies</a></li>
                </ul>
            </div>
        </footer>
    </body>
</html>