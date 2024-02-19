<?php

// include_once("Conectar.php");

class Instalaciones{

   public function verInstalaciones(){
        try{
            $sql = "SELECT nombre, direccion, horario, imagen FROM instalaciones" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $instalacion = $consulta->execute();
            $instalacion = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $instalacion;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
   }
    
}

?>