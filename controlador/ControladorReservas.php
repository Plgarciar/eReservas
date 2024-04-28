<?php
    require_once("recursos/funciones.php");

    const LIMITE_BYTES= 2000000; //2M

    class ControladorReservas{

        public function inicio(){ 
            include ('vista/vista_principal.php');
        }

        public function instalaciones(){ 
            $instalaciones=new Instalaciones();
            $datos=$instalaciones->verInstalaciones();
            $rutaImagen="./recursos/imagenes/";
           
            include ('vista/vista_instalaciones.php');
          
        } 

        public function contacto(){ 
            include ('vista/vista_contacto.php');
        }      
        
        public function reservas(){
            $instalaciones=new Instalaciones();
            $reservas=new Reservas();
            $datos=$instalaciones->verInstalaciones();
            
            if(isset($_REQUEST['reservaInst'])){
                //compruebo que se ha seleccionado la fecha
                if($_REQUEST['dia']!=""){
                    $fecha_ok=true;
                }else{
                    $error=31;
                }
                
                //compruebo que se ha seleccionado una instalacion
                if(is_numeric($_REQUEST['seleInst'])){
                    $inst_ok=true;
                }else{
                    $error=30;
                }

                

                //inserto la reserva
                if(isset($inst_ok) && isset($fecha_ok)){
                    $contenido=$reservas->insertarReserva($_REQUEST['seleInst'],$_REQUEST['reservaInst'],1,$_REQUEST['dia']);
                    $error=28;
                }
            }else{
                $error=29;
            }
            
            include('vista/vista_reservas.php');
        }

        public function reservasUsuario(){
            $idUsuario=$_SESSION["id_usuario"];
            $reservas=new Reservas();
            $datos=$reservas->verReservasUsuario($idUsuario);
            
            if(isset($_REQUEST['anular'])){
                $reservas->eliminarReserva($_REQUEST['anular']);
                header("Location: index.php?ctl=reservasUsuario");
            }else{
            }
            include('vista/vista_reservasUsuario.php');
        }

        public function operaciones(){
            
            include_once ('vista/vista_operaciones.php');
        }

        public static function comprobarInstalacion(){
            filtrar($_REQUEST);
            
            if(isset($_REQUEST['nomInstalacion'])){
                $datos=Instalaciones::existeInstalacion($_REQUEST['nomInstalacion']);
                if(count($datos)>0){
                    return false; //existe la instalacion en la base de datos
                }else{
                    return true;//no existe la instalacion en la base de datos
                }
            }

            if(isset($_REQUEST['nuevoNom'])){
                $datos2=Instalaciones::existeInstalacion($_REQUEST['nuevoNom']);
                if(count($datos2)>0){
                    return false; //existe la instalacion en la base de datos
                }else{
                    return true;//no existe la instalacion en la base de datos
                }
            }
        }

        public function gestionarInstalaciones(){
            filtrar($_REQUEST);
            $instalaciones=new Instalaciones();
            $datos=$instalaciones->verInstalaciones();
            $rutaImagen="./recursos/imagenes/";
            
            //añadir nueva instalacion
            if(isset($_REQUEST['nuevaInst'])){
                filtrar($_REQUEST);
                $imgGenerica="ayto.jfif";

                if($_REQUEST['nomInstalacion']!="" && $_REQUEST['dirInstalacion']!="" && $_REQUEST['horInstalacion']!=""){
                    //compruebo que la instalacion no existe ya en la base de datos
                    if(ControladorReservas::comprobarInstalacion($_REQUEST['nomInstalacion'])){
                        $inst_ok=true;
                    }else{
                        $error=24;
                    }

                    //compruebo que el nombre no tenga más de 20 caracteres y no tenga números
                    if(mb_strlen($_REQUEST['nomInstalacion']) <= 20){
                        if(!is_numeric($_REQUEST['nomInstalacion'])){
                            $nombre_ok=true;
                        }else{
                            $error=3;
                        }
                    }else{
                        $error=23;
                    }

                    //compruebo que la dirección no tenga más de 50 caracteres
                    if(mb_strlen($_REQUEST['dirInstalacion']) <= 50){
                        $direccion_ok=true;
                    }else{
                        $error=20;
                    }

                    //compruebo que el horario tenga el formato correcto
                    if(mb_strlen($_REQUEST['horInstalacion']) <= 11){
                            $expresionRegular = array("options"=>array("regexp"=>"/^([01]?[0-9]|2[0-3]):[0-5][0-9]-([01]?[0-9]|2[0-3]):[0-5][0-9]$/"));

                            if(filter_var($_REQUEST['horInstalacion'], FILTER_VALIDATE_REGEXP,$expresionRegular)) {
                                $horario_ok=true;
                            }else{
                                $error=22;
                            }
                    }else{
                        $error=22;
                    }

                }else{
                    $error=10;
                }

                    
                if(isset($inst_ok) && isset($nombre_ok) && isset($direccion_ok) && isset($horario_ok)){
                    if($inst_ok && $nombre_ok && $direccion_ok && $horario_ok){
                        $nombreFoto=$_FILES['imgInstalacion']['name'];
                        $nombreTemporal=$_FILES['imgInstalacion']['tmp_name'];
                        $extensiones = array('image/gif', 'image/jpeg', 'image/jpg', 'image/webp', 'image/bmp', 'image/png', 'image/tiff', 'image/jfif');
                        if(($nombreFoto!="")){
                            if(in_array(mime_content_type($nombreTemporal),$extensiones)){
                                if(filesize($nombreTemporal)<= LIMITE_BYTES){
                                    $aleatorio=round(microtime(true)*1000);
                                    $extension=pathinfo($nombreFoto, PATHINFO_EXTENSION);
                                    $nombreF=pathinfo($nombreFoto, PATHINFO_FILENAME);
                                    $nombreArchivo=$nombreF.$aleatorio.".".$extension;
                                    move_uploaded_file($nombreTemporal, $rutaImagen.$nombreF.$aleatorio.".".$extension);
                                    $_REQUEST['imgInstalacion']=$nombreArchivo;
                                    $datos=$instalaciones->insertarInstalacion($_REQUEST['nomInstalacion'], $_REQUEST['dirInstalacion'], $_REQUEST['horInstalacion'], $_REQUEST['imgInstalacion']);
                                    $error=21;
                                }else{
                                    $error=27;
                                    header("Location: index.php?ctl=gestionarInstalaciones");
                                }
                            }else{
                                $error=25;
                                header("Location: index.php?ctl=gestionarInstalaciones");
                            }
                        }else{
                            $datos=$instalaciones->insertarInstalacion($_REQUEST['nomInstalacion'], $_REQUEST['dirInstalacion'], $_REQUEST['horInstalacion'], $imgGenerica);
                            $error=21;
                            header("Location: index.php?ctl=gestionarInstalaciones");
                        }
                    }else{
                        header("Location: index.php?ctl=gestionarInstalaciones");
                    }
                }
                $_REQUEST="";         
            }

            //eliminar instalacion
            if(isset($_REQUEST['eliminarIns'])){
                    $fotos=$instalaciones->verImagen($_REQUEST['eliminarIns']);
                    if($fotos['imagen'] != "ayto.jfif"){
                        $datos=$instalaciones->eliminarInstalacion($_REQUEST['eliminarIns']);
                        $variable="./recursos/imagenes/".$fotos['imagen'];
                        unlink($variable);
                    }else{
                        $datos=$instalaciones->eliminarInstalacion($_REQUEST['eliminarIns']);
                    }
                header("Location: index.php?ctl=gestionarInstalaciones");
            }
            
            //modificar instalacion
            if(isset($_REQUEST['guardarMod'])){
                if($_REQUEST['nuevoNom']!="" && $_REQUEST['nuevoDir']!="" && $_REQUEST['nuevoHor']!=""){
                    // //compruebo que la instalacion no existe ya en la base de datos
                    $n=$instalaciones->verNombre($_REQUEST['guardarMod']);
                    if($_REQUEST['nuevoNom']!=$n['nombre']){
                        if(ControladorReservas::comprobarInstalacion($_REQUEST['nuevoNom'])){
                            $Ninst_ok=true;
                        }else{
                            $error=24;
                        }
                    }else{
                        // $n['nombre']==$_REQUEST['nuevoNom'];
                        $Ninst_ok=true;
                    }

                    //compruebo que el nombre no tenga más de 20 caracteres y no tenga números
                    if(mb_strlen($_REQUEST['nuevoNom']) <= 20){
                        if(!is_numeric($_REQUEST['nuevoNom'])){
                            $Nnombre_ok=true;
                        }else{
                            $error=3;
                        }
                    }else{
                        $error=23;
                    }

                    //compruebo que la dirección no tenga más de 50 caracteres
                    if(mb_strlen($_REQUEST['nuevoDir']) <= 50){
                        $Ndireccion_ok=true;
                    }else{
                        $error=20;
                    }

                    //compruebo que el horario tenga el formato correcto
                    if(mb_strlen($_REQUEST['nuevoHor']) <= 11){
                            $expresionRegular = array("options"=>array("regexp"=>"/^([01]?[0-9]|2[0-3]):[0-5][0-9]-([01]?[0-9]|2[0-3]):[0-5][0-9]$/"));

                            if(filter_var($_REQUEST['nuevoHor'], FILTER_VALIDATE_REGEXP,$expresionRegular)) {
                                $Nhorario_ok=true;
                            }else{
                                $error=22;
                            }
                    }else{
                        $error=22;
                    }
                }

                if(isset($Ninst_ok) && isset($Nnombre_ok) && isset($Ndireccion_ok) && isset($Nhorario_ok)){
                // if(isset($Nnombre_ok) && isset($Ndireccion_ok) && isset($Nhorario_ok)){
                    $nombreFoto=$_FILES['nuevoImg']['name'];
                    $nombreTemporal=$_FILES['nuevoImg']['tmp_name'];
                    $extensiones = array('image/gif', 'image/jpeg', 'image/jpg', 'image/webp', 'image/bmp', 'image/png', 'image/tiff', 'image/jfif');
                    if(($nombreFoto!="")){
                        if(in_array(mime_content_type($nombreTemporal),$extensiones)){
                            if(filesize($nombreTemporal)<= LIMITE_BYTES){
                                $aleatorio=round(microtime(true)*1000);
                                $extension=pathinfo($nombreFoto, PATHINFO_EXTENSION);
                                $nombreF=pathinfo($nombreFoto, PATHINFO_FILENAME);
                                $nombreArchivo=$nombreF.$aleatorio.".".$extension;
                                move_uploaded_file($nombreTemporal, $rutaImagen.$nombreF.$aleatorio.".".$extension);
                                $_REQUEST['nuevoImg']=$nombreArchivo;
                                $fotos=$instalaciones->verImagen($_REQUEST['guardarMod']);
                                if($fotos['imagen'] != "ayto.jfif"){
                                    $variable="./recursos/imagenes/".$fotos['imagen'];
                                    unlink($variable);
                                }
                                $datos=$instalaciones->modificarInstalacion($_REQUEST['nuevoNom'], $_REQUEST['nuevoDir'], $_REQUEST['nuevoHor'], $_REQUEST['nuevoImg'], $_REQUEST['guardarMod']);
                                $error=21;
                                header("Location: index.php?ctl=gestionarInstalaciones");
                            }else{
                                $error=27;
                                header("Location: index.php?ctl=gestionarInstalaciones");
                            }
                        }else{
                            $error=25;
                            header("Location: index.php?ctl=gestionarInstalaciones");
                        }

                    }else{
                        $datos=$instalaciones->modificarInstalacion2($_REQUEST['nuevoNom'], $_REQUEST['nuevoDir'], $_REQUEST['nuevoHor'], $_REQUEST['guardarMod']);
                        header("Location: index.php?ctl=gestionarInstalaciones");
                    }
                }
                
            }

            //cancelar
            if(isset($_REQUEST['botonCancelar'])){
                header("Location: index.php?ctl=gestionarInstalaciones");
            }
            
            include_once ('vista/vista_gestionarInstalaciones.php');
        }

        public function gestionarReservas(){
            $reservas=new Reservas();
            $instalaciones=new Instalaciones();
            
            $datos=$reservas->verReservas();
            $datos2=$instalaciones->verInstalaciones();

            include_once ('vista/vista_gestionarReservas.php');
        }

        public function gestionarUsuarios(){
            $usuarios=new Usuarios();
            $datos=$usuarios->verUsuarios();

            include_once ('vista/vista_gestionarUsuarios.php');
        }

    }
