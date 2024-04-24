<?php

class Instalaciones{

    public $id;
    public $nombre;
    public $direccion;
    public $horario;
    public $imagen;

    public function verInstalaciones(){
        try{
            $sql = "SELECT id, nombre, direccion, horario, imagen FROM instalaciones" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $instalacion = $consulta->execute();
            $instalacion = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $instalacion;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
   }

   //ver foto instalacion
   public function verImagen($id){
    try {
        $sql = "SELECT imagen FROM instalaciones WHERE id LIKE ?" ;
        $consulta = Conectar::conexion()->prepare($sql);
        $consulta->bindParam(1, $id, PDO::PARAM_INT);
        $instalacion = $consulta->execute();
        $instalacion=$consulta->fetch(PDO::FETCH_ASSOC);
        $consulta->closeCursor();

        return $instalacion;
    } catch (PDOException $e) {
        exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
    }
    
}

   public static function existeInstalacion($nombre){
    try{
        $sql = "SELECT nombre FROM instalaciones WHERE nombre LIKE ?" ;
        $consulta = Conectar::conexion()->prepare($sql);
        $consulta->bindParam(1, $nombre);
        $resultado = $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $consulta->closeCursor();
        
        return $resultado;
    }catch (PDOException $e) {
        exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
    }
}

    public function insertarInstalacion($nombre,$direccion,$horario,$imagen){
        try{
            $sql = "INSERT INTO instalaciones (nombre,direccion,horario,imagen) VALUES (?,?,?,?)";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $direccion);
            $consulta->bindParam(3, $horario);
            $consulta->bindParam(4, $imagen);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
   }

    public function modificarInstalacion($nombre, $direccion, $horario, $imagen, $id){
        try{
            $sql = "UPDATE instalaciones SET nombre = ?, direccion = ?, horario = ?, imagen = ?  WHERE id=?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $direccion);
            $consulta->bindParam(3, $horario);
            $consulta->bindParam(4, $imagen);
            $consulta->bindParam(5, $id);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function modificarInstalacion2($nombre, $direccion, $horario, $id){
        try{
            $sql = "UPDATE instalaciones SET nombre = ?, direccion = ?, horario = ? WHERE id=?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $direccion);
            $consulta->bindParam(3, $horario);
            $consulta->bindParam(4, $id);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function eliminarInstalacion($id){
        try{
            $sql = "DELETE FROM instalaciones WHERE id = ?";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $id, PDO::PARAM_INT);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }


    
}

?>