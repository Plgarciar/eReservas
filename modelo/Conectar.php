<?php

class Conectar{
    public static function conexion(){
        try {
            $conexion = new PDO('mysql:host=' . Config::$host. ';dbname=' . Config::$database . ';port=' . Config::$port . ';charset=' . Config::$charset, Config::$username, Config::$password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");  
        }         
        return $conexion;
    }
}
?>