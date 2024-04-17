<?php

class Usuarios{

    public $id;
    public $dni;
    public $nombre;
    public $email;
    public $alias;
    public $clave;
    public $perfil;

    public function registroUsuario($dni,$nombre,$email,$alias,$clave){
        try{
            $sql = "INSERT INTO usuarios (dni,nombre,email,alias,clave) VALUES (?,?,?,?,?)";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $dni);
            $consulta->bindParam(2, $nombre);
            $consulta->bindParam(3, $email);
            $consulta->bindParam(4, $alias);
            $consulta->bindParam(5, $clave);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }


    public static function existeDni($dni){
        try{
            $sql = "SELECT dni FROM usuarios WHERE dni LIKE ?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $dni);
            $resultado = $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $consulta->closeCursor();
            
            return $resultado;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }


    public static function existeEmail($email){
        try{
            $sql = "SELECT email FROM usuarios WHERE email LIKE ?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $email);
            $resultado = $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $consulta->closeCursor();
            
            return $resultado;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public static function existeAlias($alias){
        try{
            $sql = "SELECT alias FROM usuarios WHERE alias LIKE ?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $alias);
            $resultado = $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $consulta->closeCursor();
            
            return $resultado;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

       
    public static function validarUsuario($alias, $clave){
        try{
            $sql = "SELECT * FROM usuarios WHERE alias = ?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $alias);
            $usuario = $consulta->execute();
            $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
            
            if($usuario){
                if(password_verify($clave, $usuario['clave'])){
                    $_SESSION['id_usuario']=$usuario['id'];
                    $_SESSION['dni_usuario']=$usuario['dni'];
                    $_SESSION['nombre_usuario']=$usuario['nombre'];
                    $_SESSION['email_usuario']=$usuario['email'];
                    $_SESSION['alias_usuario']=$usuario['alias'];
                    $_SESSION['password_usuario']=$usuario['clave'];
                    $_SESSION['perfil_usuario']=$usuario['perfil'];
                    // $_SESSION['clave']=$clave;
                }
                return password_verify($clave, $usuario['clave']);
                
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

    public function verUsuarios(){
        try{
            $sql = "SELECT id, dni, nombre, email, alias, clave FROM usuarios";
            $consulta = Conectar::conexion()->prepare($sql);           
            $usuario = $consulta->execute();
            $usuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $usuario;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }
    
}

?>