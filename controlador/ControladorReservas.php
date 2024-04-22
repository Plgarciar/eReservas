<?php
    require_once("recursos/funciones.php");

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
            $datos=$instalaciones->verInstalaciones();
            // $instalacion=$_REQUEST['reser'];
            
            include('vista/vista_reservas.php');
        }

        public function reservasUsuario(){
            $idUsuario=$_SESSION["id_usuario"];
            $reservas=new Reservas();
            $datos=$reservas->verReservasUsuario($idUsuario);
            
            include('vista/vista_reservasUsuario.php');
        }

        public function operaciones(){
            
            include_once ('vista/vista_operaciones.php');
        }

        public function gestionarInstalaciones(){
            filtrar($_REQUEST);
            $instalaciones=new Instalaciones();
            $datos=$instalaciones->verInstalaciones();
            $rutaImagen="./recursos/imagenes/";
            
            if(isset($_REQUEST['nuevaInst'])){
                $imgGenerica="icono_generico.png";
                //falta controlar los input
                if($_REQUEST['imgInstalacion']==""){
                    $datos=$instalaciones->insertarInstalacion($_REQUEST['nomInstalacion'], $_REQUEST['dirInstalacion'], $_REQUEST['horInstalacion'], $imgGenerica);
                    header("Location: index.php?ctl=gestionarInstalaciones");
                }else{
                    $datos=$instalaciones->insertarInstalacion($_REQUEST['nomInstalacion'], $_REQUEST['dirInstalacion'], $_REQUEST['horInstalacion'], $_REQUEST['imgInstalacion']);
                    header("Location: index.php?ctl=gestionarInstalaciones");
                }
            }

            if(isset($_REQUEST['eliminarIns'])){
                $datos=$instalaciones->eliminarInstalacion($_REQUEST['eliminarIns']);
                header("Location: index.php?ctl=gestionarInstalaciones");
            }
            
            if(isset($_REQUEST['guardarMod'])){
                $datos=$instalaciones->modificarInstalacion($_REQUEST['nuevoNom'], $_REQUEST['nuevoDir'], $_REQUEST['nuevoHor'], $_REQUEST['nuevoImg'], $_REQUEST['guardarMod']);
                header("Location: index.php?ctl=gestionarInstalaciones");
            }

            if(isset($_REQUEST['botonCancelar'])){
                header("Location: index.php?ctl=gestionarInstalaciones");
            }
            
            include_once ('vista/vista_gestionarInstalaciones.php');
        }

        public function gestionarReservas(){
            $reservas=new Reservas();
            $datos=$reservas->verReservas();

            include_once ('vista/vista_gestionarReservas.php');
        }

        public function gestionarUsuarios(){
            $usuarios=new Usuarios();
            $datos=$usuarios->verUsuarios();

            include_once ('vista/vista_gestionarUsuarios.php');
        }
    }
