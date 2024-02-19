<?php
    require_once("recursos/funciones.php");
    // require_once("app/modelo/Usuarios.php");

    class ControladorInicio{

        public function home(){ 
            include ('vista/vista_inicio.php');
        }

        public function login(){ 
            include ('vista/vista_login.php');
        }

        public static function comprobarDni(){
            filtrar($_REQUEST);
           
            $datos=Usuarios::existeDni($_REQUEST['dni']);
            if(count($datos)>0){
                return false; //existe el dni en la base de datos
            }else{
                return true;//no existe el dni en la base de datos
            }
        }
       
        public static function comprobarEmail(){
            filtrar($_REQUEST);
           
            $datos=Usuarios::existeEmail($_REQUEST['email']);
            if(count($datos)>0){
                return false; //existe el email en la base de datos
            }else{
                return true;//no existe el email en la base de datos
            }
        }

        public static function comprobarAlias(){
            filtrar($_REQUEST);
           
            $datos=Usuarios::existeAlias($_REQUEST['alias']);
            if(count($datos)>0){
                return false; //existe el alias en la base de datos
            }else{
                return true;//no existe el alias en la base de datos
            }
        }

        public function registro(){
            if(isset($_REQUEST['registro'])){
                filtrar($_REQUEST);

                if(isset($_REQUEST['dni']) && $_REQUEST['dni']!= "" && isset($_REQUEST['nombre']) && $_REQUEST['nombre']!= "" && isset($_REQUEST['email']) && $_REQUEST['email']!= ""
                && isset($_REQUEST['alias']) && $_REQUEST['alias']!= "" && isset($_REQUEST['clave']) && $_REQUEST['clave']!= "" ){
                    
                    //Compruebo que el dni no tenga mas de 10 caracteres y que concuerda con el formato de dni
                    //Falta expresion regular para cif y nie
                    if(mb_strlen($_REQUEST['dni']) <= 10){
                        if(ControladorInicio::comprobarDni()){
                            $expresionRegular = array("options"=>array("regexp"=>"/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i"));

                            if(filter_var($_REQUEST['dni'], FILTER_VALIDATE_REGEXP,$expresionRegular)) {
                                $dni_ok=true;
                            }else{
                                //$error="formato de dni no valido"
                            }
                        }else{
                            $error=13;
                        }
                    }else{
                        $error=7;
                    }
                             
                    // //compruebo que el nombre no tenga mas de 50 caracteres y que no hay numeros.
                    if(mb_strlen($_REQUEST['nombre']) <= 50){
                        if(!is_numeric($_REQUEST['nombre'])){
                            $nombre_ok=true;
                        }else{
                            $error=3;
                        }
                    }else{
                        $error=2;
                    }
                    
                    // //compruebo el email. falta controlar que detras del punto sean 2 o 3 letras
                    // if(mb_strlen($_REQUEST['email']) <= 50){
                    //     if(filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)){
                    //         if(ControladorInicio::comprobarEmail()){
                    //             $email_ok=true;
                    //         }else{
                    //             $error=6;
                    //         }
                    //     }else{
                    //         $error=5;
                    //     }
                    // }else{
                    //     $error=4;
                    // }

                    // //compruebo el alias. falta comprobar que empiece por letra
                    // if(mb_strlen($_REQUEST['alias']) <= 20){
                    //     if(ControladorInicio::comprobarAlias()){
                    //         $alias_ok=true;
                    //     }else{
                    //         $error=8;
                    //     }
                    // }else{
                    //     $error=7;
                    // }
                    
                    // if(isset($dni_ok) && isset($nombre_ok) && isset($email_ok) && isset($alias_ok)){
                    //     $usuario= new Usuarios();
                    //     $clave_hash=password_hash($_REQUEST['clave'], PASSWORD_DEFAULT);
                    //     $usuario->registroUsuario($_REQUEST['dni'],$_REQUEST['nombre'], $_REQUEST['email'], $_REQUEST['alias'],$clave_hash);
                    //     $error=9;
                    //     $_REQUEST="";
                    // }
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
                        include ('vista/vista_principal.php');
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

        // public function modificarDatos(){
            
        //     if(isset($_REQUEST['cambiarPass'])){
        //         if($_REQUEST['passActual']!="" && $_REQUEST['passNueva']!="" && $_REQUEST['passNueva2']!=""){
        //             if(password_verify($_REQUEST['passActual'], $_SESSION['clave'])){
        //                 if($_REQUEST['passNueva']==$_REQUEST['passNueva2']){
        //                     $nuevaContra=password_hash($_REQUEST['passNueva'], PASSWORD_DEFAULT);
        //                     $usuario=new Usuarios();
        //                     $usuario->modificarContra($nuevaContra, $_SESSION['id']);
        //                     $error=13;
        //                     include_once ('vista/vista_modificarDatos.php');
        //                 }else{
        //                     $error=12;
        //                     include_once ('vista/vista_modificarDatos.php');
        //                 }
        //             }else{
        //                 $error=11;
        //                 include_once ('vista/vista_modificarDatos.php');
        //             }
        //         }else{
        //             $error=10;
        //             include_once ('vista/vista_modificarDatos.php');
        //         } 
        //     }
            
        //     include_once ('vista/vista_modificarDatos.php');
            
        // }

        public function logout(){
            $_SESSION = array();
            setcookie(session_name(), null, time() - 99999, '/');
            session_destroy();
            header("location:index.php?ctl=home");
        }
        
    }
