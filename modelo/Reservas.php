<?php

class Reservas{

    public $id_reserva;
    public $id_instalacion;
    public $id_usuario;
    public $id_intervalo;
    public $fecha;  

    public function verReservas(){
        try{
            $sql = "SELECT reservas.id_reserva as idReserva, instalaciones.nombre as instalacion, intervalos.horas as horas, fecha, usuarios.nombre as usuario, estado FROM reservas, instalaciones, intervalos, usuarios where id_instalacion=instalaciones.id and id_intervalo=intervalos.id and id_usuario=usuarios.id ORDER BY idReserva ASC" ;
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
            $sql = "SELECT instalaciones.nombre as instalacion, fecha, intervalos.horas as horas, estado, reservas.id_reserva as idReserva FROM reservas, instalaciones, intervalos where id_instalacion=instalaciones.id and id_intervalo=intervalos.id and id_usuario=? ORDER BY idReserva ASC" ;
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

    public function verReservasInstalacion($idInstalacion){
        try{
            $sql = "SELECT instalaciones.nombre as instalacion, reservas.id_reserva as idReserva, usuarios.nombre as usuario, fecha, intervalos.horas as horas, estado FROM reservas, instalaciones, intervalos, usuarios where id_usuario=usuarios.id and id_instalacion=instalaciones.id and id_intervalo=intervalos.id and instalaciones.id=?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $idInstalacion);
            $reservaUsuario = $consulta->execute();
            $reservaUsuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $reservaUsuario;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function insertarReserva($idInstalacion,$idUsuario,$idIntervalo,$fecha){
        try{
            $sql = "INSERT INTO reservas (id_instalacion,id_usuario,id_intervalo,fecha) VALUES (?,?,?,?)";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $idInstalacion);
            $consulta->bindParam(2, $idUsuario);
            $consulta->bindParam(3, $idIntervalo);
            $consulta->bindParam(4, $fecha);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
   }

   public function eliminarReserva($id){
    try{
        $sql = "DELETE FROM reservas WHERE id_reserva = ?";
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