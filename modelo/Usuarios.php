<?php

// include_once("Conectar.php");

class Usuarios{

    // public function registroUsuario($nombre,$email,$alias,$clave){
    //     try{
    //         $sql = "INSERT INTO usuarios (nombre_usuario,email_usuario,alias_usuario,password_usuario) VALUES (?,?,?,?)";
    //         $consulta = Conectar::conexion()->prepare($sql);
    //         $consulta->bindParam(1, $nombre);
    //         $consulta->bindParam(2, $email);
    //         $consulta->bindParam(3, $alias);
    //         $consulta->bindParam(4, $clave);
    //         $consulta->execute();
    //         $consulta->closeCursor();
    //     }catch (PDOException $e) {
    //         exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
    //     }
    // }

    // public static function existeEmail($email){
    //     try{
    //         $sql = "SELECT email_usuario FROM usuarios WHERE email_usuario LIKE ?" ;
    //         $consulta = Conectar::conexion()->prepare($sql);
    //         $consulta->bindParam(1, $email);
    //         $resultado = $consulta->execute();
    //         $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    //         $consulta->closeCursor();
            
    //         return $resultado;
    //     }catch (PDOException $e) {
    //         exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
    //     }
    // }

    // public static function existeAlias($alias){
    //     try{
    //         $sql = "SELECT alias_usuario FROM usuarios WHERE alias_usuario LIKE ?" ;
    //         $consulta = Conectar::conexion()->prepare($sql);
    //         $consulta->bindParam(1, $alias);
    //         $resultado = $consulta->execute();
    //         $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    //         $consulta->closeCursor();
            
    //         return $resultado;
    //     }catch (PDOException $e) {
    //         exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
    //     }
    // }
    
    public static function validarUsuario($alias, $clave){
        try{
            $sql = "SELECT * FROM usuarios WHERE alias_usuario = ?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $alias);
            $usuario = $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            
            if($usuario){
                // if(password_verify($clave, $usuario['password_usuario'])){
                //     $_SESSION['id_usuario']=$usuario['id_usuario'];
                //     $_SESSION['dni_usuario']=$usuario['dni_usuario'];
                //     $_SESSION['nombre_usuario']=$usuario['nombre_usuario'];
                //     $_SESSION['email_usuario']=$usuario['email_usuario'];
                //     $_SESSION['alias_usuario']=$usuario['alias_usuario'];
                //     $_SESSION['password_usuario']=$usuario['password_usuario'];
                //     $_SESSION['perfil_usuario']=$usuario['perfil_usuario'];
                //     // $_SESSION['password_usuario']=$clave;
                // }
                // return password_verify($clave, $usuario['password_usuario']);

                if($clave==$usuario['password_usuario']){
                    $_SESSION['id_usuario']=$usuario['id_usuario'];
                    $_SESSION['dni_usuario']=$usuario['dni_usuario'];
                    $_SESSION['nombre_usuario']=$usuario['nombre_usuario'];
                    $_SESSION['email_usuario']=$usuario['email_usuario'];
                    $_SESSION['alias_usuario']=$usuario['alias_usuario'];
                    $_SESSION['password_usuario']=$usuario['password_usuario'];
                    $_SESSION['perfil_usuario']=$usuario['perfil_usuario'];
                    // $_SESSION['password_usuario']=$clave;
                }
                // return password_verify($clave, $usuario['password_usuario']);
            }

            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    // public function modificarContra($nuevaContra, $idUsuario){
    //     try{
    //         $sql = "UPDATE usuarios SET clave = ? WHERE id=?" ;
    //         $consulta = Conectar::conexion()->prepare($sql);
    //         $consulta->bindParam(1, $nuevaContra);
    //         $consulta->bindParam(2, $idUsuario);
    //         $consulta->execute();
    //         $consulta->closeCursor();
    //     }catch (PDOException $e) {
    //         exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
    //     }
    // }    
    
}

?>