<?php
    require_once("recursos/funciones.php");
    // require_once("app/modelo/Usuarios.php");

    class ControladorReservas{

        public function inicio(){ 
            include ('vista/vista_principal.php');
        }

        public function instalaciones(){ 
            $instalaciones=new Instalaciones();
            $datos=$instalaciones->verInstalaciones();
         
            include ('vista/vista_instalaciones.php');
        } 

        public function contacto(){ 
            include ('vista/vista_contacto.php');
        }      
        
        public function verInstalaciones(){
            
            include_once ('vista/vista_instalaciones.php');
        }
    }
