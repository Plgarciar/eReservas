<?php

class Intervalos{

    public $id;
    public $horas;

    public function verIntervalos(){
        try{
            $sql = "SELECT id,horas FROM intervalos" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $reservaUsuario = $consulta->execute();
            $reservaUsuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $reservaUsuario;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

   
    
}

?>