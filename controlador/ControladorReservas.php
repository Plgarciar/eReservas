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
            $instalaciones=new Instalaciones();
            $datos=$instalaciones->verInstalaciones();
            $rutaImagen="./recursos/imagenes/";
            
            include_once ('vista/vista_gestionarInstalaciones.php');
        }

        public function gestionarReservas(){
            
            include_once ('vista/vista_gestionarReservas.php');
        }

        public function gestionarUsuarios(){
            $usuarios=new Usuarios();
            $datos=$usuarios->verUsuarios();

            include_once ('vista/vista_gestionarUsuarios.php');
        }
    }
