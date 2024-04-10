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

//     public function insertarInstalacion($id,$nombre,$direccion,$horario,$imagen){
//         try{
//             $sql = "INSERT INTO instalaciones (id,nombre,direccion,horario,imagen) VALUES (?,?,?,?,?)";
//             $consulta = Conectar::conexion()->prepare($sql);
//             $consulta->bindParam(1, $id);
//             $consulta->bindParam(2, $nombre);
//             $consulta->bindParam(3, $direccion);
//             $consulta->bindParam(4, $horario);
//             $consulta->bindParam(5, $imagen);
//             $consulta->execute();
//             $consulta->closeCursor();
//         }catch (PDOException $e) {
//             exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
//         }
//    }

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