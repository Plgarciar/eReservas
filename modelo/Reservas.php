<?php

class Reservas{

    public $id_reserva;
    public $id_instalacion;
    public $id_usuario;
    public $id_intervalo;
    public $fecha;  

    public function verReservas(){
        try{
            $sql = "SELECT instalaciones.nombre as instalacion, intervalos.horas as horas, fecha, usuarios.nombre as usuario FROM reservas, instalaciones, intervalos, usuarios where id_instalacion=instalaciones.id and id_intervalo=intervalos.id and id_usuario=usuarios.id" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $reservaUsuario = $consulta->execute();
            $reservaUsuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $reservaUsuario;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function verReservasUsuario($idUsuario){
        try{
            $sql = "SELECT instalaciones.nombre as instalacion, intervalos.horas as horas, fecha FROM reservas, instalaciones, intervalos where id_instalacion=instalaciones.id and id_intervalo=intervalos.id and id_usuario=?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $idUsuario);
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