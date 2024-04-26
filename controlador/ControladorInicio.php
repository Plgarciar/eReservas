<?php
    require_once("recursos/funciones.php");

    class ControladorInicio{

        public function home(){ 
            include ('vista/vista_inicio.php');
        }

        public function login(){ 
            include ('vista/vista_login.php');
        }

        public static function comprobarDni(){
            filtrar($_REQUEST);
            
            if(isset($_REQUEST['email'])){
                $datos=Usuarios::existeDni($_REQUEST['dni']);
                if(count($datos)>0){
                    return false; //existe el dni en la base de datos
                }else{
                    return true;//no existe el dni en la base de datos
                }
            }
        }
       
        public static function comprobarEmail(){
            filtrar($_REQUEST);
            
            if(isset($_REQUEST['email'])){
                $datos=Usuarios::existeEmail($_REQUEST['email']);

                if(count($datos)>0){
                    return false; //existe el email en la base de datos
                }else{
                    return true;//no existe el email en la base de datos
                }
            }

            if(isset($_REQUEST['newEmail'])){
                $datos2=Usuarios::existeEmail($_REQUEST['newEmail']);

                if(count($datos2)>0){
                    return false; //existe el email en la base de datos
                }else{
                    return true;//no existe el email en la base de datos
                }
            }
           
        }

        public static function comprobarAlias(){
            filtrar($_REQUEST);
           
            if(isset($_REQUEST['alias'])){
                $datos=Usuarios::existeAlias($_REQUEST['alias']);
                $datos2=Usuarios::existeAlias($_REQUEST['newAlias']);

                if(count($datos)>0){
                    return false; //existe el alias en la base de datos
                }else{
                    return true;//no existe el alias en la base de datos
                }
            }

            if(isset($_REQUEST['newAlias'])){
                $datos2=Usuarios::existeAlias($_REQUEST['newAlias']);
                if(count($datos2)>0){
                    return false; //existe el alias en la base de datos
                }else{
                    return true;//no existe el alias en la base de datos
                }
            }
        }

        public function registro(){
            if(isset($_REQUEST['registro'])){
                filtrar($_REQUEST);

                if(isset($_REQUEST['dni']) && $_REQUEST['dni']!= "" && isset($_REQUEST['nombre']) && $_REQUEST['nombre']!= "" && isset($_REQUEST['email']) && $_REQUEST['email']!= ""
                && isset($_REQUEST['alias']) && $_REQUEST['alias']!= "" && isset($_REQUEST['clave']) && $_REQUEST['clave']!= "" ){
                    
                    //Compruebo que el dni no tenga mas de 10 caracteres y que concuerda con el formato de dni
                    //expresion regular cif y NIE ??
                    if(mb_strlen($_REQUEST['dni']) <= 10){
                        if(ControladorInicio::comprobarDni()){
                            $expresionRegular = array("options"=>array("regexp"=>"/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i"));

                            if(filter_var($_REQUEST['dni'], FILTER_VALIDATE_REGEXP,$expresionRegular)) {
                                $dni_ok=true;
                            }else{
                                $error=15;
                            }
                        }else{
                            $error=13;
                        }
                    }else{
                        $error=7;
                    }
                             
                    //compruebo que el nombre no tenga mas de 50 caracteres y que no hay numeros.
                    if(mb_strlen($_REQUEST['nombre']) <= 50){
                        if(!is_numeric($_REQUEST['nombre'])){
                            $nombre_ok=true;
                        }else{
                            $error=3;
                        }
                    }else{
                        $error=2;
                    }
                    
                    //compruebo el email. falta controlar que detras del punto sean 2 o 3 letras y que despues del @ sean 3 o mas letras
                    if(mb_strlen($_REQUEST['email']) <= 50){
                        if(filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
                            if(ControladorInicio::comprobarEmail()){
                                $email_ok=true;
                            }else{
                                $error=6;
                            }
                        }else{
                            $error=5;
                        }
                    }else{
                        $error=4;
                    }

                    //compruebo el alias. falta comprobar que empiece por letra
                    if(mb_strlen($_REQUEST['alias']) <= 20){
                        if(ControladorInicio::comprobarAlias()){
                            $alias_ok=true;
                        }else{
                            $error=8;
                        }
                    }else{
                        $error=7;
                    }
                    
                    if(isset($dni_ok) && isset($nombre_ok) && isset($email_ok) && isset($alias_ok)){
                        $usuario= new Usuarios();
                        $clave_hash=password_hash($_REQUEST['clave'], PASSWORD_DEFAULT);
                        $usuario->registroUsuario($_REQUEST['dni'],$_REQUEST['nombre'], $_REQUEST['email'], $_REQUEST['alias'],$clave_hash);
                        $error=9;
                        $_REQUEST="";
                    }
                }else{
                    $error=10;
                }
            }
            include ('vista/vista_registro.php');
        }
        
        public function validar(){ 
            filtrar($_REQUEST);
            if(isset($_REQUEST['login'])){
                if($_REQUEST['alias']!="" && $_REQUEST['clave']!=""){
                    $nombre=$_REQUEST['alias'];
                    $clave=$_REQUEST['clave'];
                    $datos=Usuarios::validarUsuario($nombre, $clave);
                    if($datos){
                        include ('vista/vista_inicio.php');
                    }else{
                        $error=12;
                        include_once ('vista/vista_login.php');
                    }
                }else{
                    $error=11;
                    include_once ('vista/vista_login.php');
                }
            }else{
                $error=11;
                include_once ('vista/vista_login.php');
            }
        }

        public function modificarDatos(){
            $datosUsuario=new Usuarios();
            $datos=$datosUsuario->verUsuarioSesion($_SESSION['id_usuario']);
            
            if(isset($_REQUEST['guardarDatos'])){
                if(isset($_REQUEST['newNombre']) && $_REQUEST['newNombre']!="" && isset($_REQUEST['newEmail']) && $_REQUEST['newEmail']!="" && isset($_REQUEST['newAlias']) && $_REQUEST['newAlias']!=""){
                    if(mb_strlen($_REQUEST['newNombre']) <= 50){
                        if(!is_numeric($_REQUEST['newNombre'])){
                            $newNombre_ok=true;
                        }else{
                            $error=3;
                        }
                    }else{
                        $error=2;
                    }

                    //compruebo el email. falta controlar que detras del punto sean 2 o 3 letras y que despues del @ sean 3 o mas letras
                    if(mb_strlen($_REQUEST['newEmail']) <= 50){
                        if(filter_var($_REQUEST['newEmail'], FILTER_VALIDATE_EMAIL)){
                            if($_REQUEST['newEmail'] != $_SESSION['email_usuario']){

                                if(ControladorInicio::comprobarEmail()){
                                    $newEmail_ok=true;
                                }else{
                                    $error=6;
                                }
                            }else{
                                $newEmail_ok=true;
                            }
                        }else{
                            $error=5;
                        }
                    }else{
                        $error=4;
                    }

                    //compruebo el alias. falta comprobar que empiece por letra
                    if(mb_strlen($_REQUEST['newAlias']) <= 20){
                        if($_REQUEST['newAlias'] != $_SESSION['alias_usuario']){
                            if(ControladorInicio::comprobarAlias()){
                                $newAlias_ok=true;
                            }else{
                                $error=8;
                            }
                        }else{
                            $newAlias_ok=true;
                        }
                    }else{
                        $error=7;
                    }

                    if(isset($newNombre_ok) && isset($newEmail_ok) && isset($newAlias_ok)){
                        $usuario= new Usuarios();
                        $usuario->modificarDatos($_REQUEST['newNombre'], $_REQUEST['newEmail'], $_REQUEST['newAlias'], $_SESSION['id_usuario']);
                        $error=16;
                        $_SESSION['nombre_usuario']=$_REQUEST['newNombre'];
                        $_SESSION['email_usuario']=$_REQUEST['newEmail'];
                        $_SESSION['alias_usuario']=$_REQUEST['newAlias'];
                        
                        $_REQUEST="";
               
                    }
                }else{
                    $error=10;
                    include ('vista/vista_modificarDatos.php');
                }

            }

            if(isset($_REQUEST['guardarDatos2'])){
                if($_REQUEST['actualPass']!="" && $_REQUEST['passNueva']!="" && $_REQUEST['passNueva2']!=""){
                    if(password_verify($_REQUEST['actualPass'], $_SESSION['password_usuario'])){
                        if($_REQUEST['passNueva']==$_REQUEST['passNueva2']){
                            $nuevaPass=password_hash($_REQUEST['passNueva'], PASSWORD_DEFAULT);
                            $usuario=new Usuarios();
                            $usuario->modificarPass($nuevaPass, $_SESSION['id_usuario']);
                            $error=17;
                            include_once ('vista/vista_modificarDatos.php');
                        }else{
                            $error=18;
                            include_once ('vista/vista_modificarDatos.php');
                        }
                    }else{
                        $error=19;
                        include_once ('vista/vista_modificarDatos.php');
                    }
                }else{
                    $error=10;
                    include_once ('vista/vista_modificarDatos.php');
                } 
            }
            
            include_once ('vista/vista_modificarDatos.php');
            
        }

        public function reservasUsuario(){
            
            include_once ('vista/vista_reservasUsuario.php');
        }

        public function logout(){
            $_SESSION = array();
            setcookie(session_name(), null, time() - 99999, '/');
            session_destroy();
            header("location:index.php?ctl=home");
        }
        
    }
