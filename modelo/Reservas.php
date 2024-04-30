<?php

class Reservas{

    public $id_reserva;
    public $id_instalacion;
    public $id_usuario;
    public $id_intervalo;
    public $fecha;  
    public $estado;  

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

    public function verReservasUsuario($id_usuario){
        try{
            $sql = "SELECT instalaciones.nombre as instalacion, fecha, intervalos.horas as horas, estado, reservas.id_reserva as idReserva FROM reservas, instalaciones, intervalos where id_instalacion=instalaciones.id and id_intervalo=intervalos.id and id_usuario=? ORDER BY idReserva ASC" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $id_usuario);
            $reservaUsuario = $consulta->execute();
            $reservaUsuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $reservaUsuario;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function verReservasInstalacion($id_instalacion){
        try{
            $sql = "SELECT instalaciones.nombre as instalacion, reservas.id_reserva as idReserva, usuarios.nombre as usuario, fecha, intervalos.horas as horas, estado FROM reservas, instalaciones, intervalos, usuarios where id_usuario=usuarios.id and id_instalacion=instalaciones.id and id_intervalo=intervalos.id and instalaciones.id=?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $id_instalacion);
            $reservaUsuario = $consulta->execute();
            $reservaUsuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $consulta->closeCursor();
            
            return $reservaUsuario;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function insertarReserva($id_instalacion,$id_usuario,$id_intervalo,$fecha){
        try{
            $sql = "INSERT INTO reservas (id_instalacion,id_usuario,id_intervalo,fecha) VALUES (?,?,?,?)";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $id_instalacion);
            $consulta->bindParam(2, $id_usuario);
            $consulta->bindParam(3, $id_intervalo);
            $consulta->bindParam(4, $fecha);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function eliminarReserva($id_reserva){
        try{
            $sql = "DELETE FROM reservas WHERE id_reserva = ?";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $id_reserva, PDO::PARAM_INT);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public static function existeReserva($id_instalacion, $id_intervalo, $fecha){
        try{
            $sql = "SELECT id_instalacion, id_intervalo, fecha FROM reservas WHERE id_instalacion LIKE ? AND id_intervalo LIKE ? AND fecha LIKE ?" ;
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $id_instalacion);
            $consulta->bindParam(2, $id_intervalo);
            $consulta->bindParam(3, $fecha);
            $resultado = $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            $consulta->closeCursor();
            
            return $resultado;
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }

    public function cambiarEstadoReserva($estado,$id_reserva){
        try{
            $sql = "UPDATE reservas SET estado = ? WHERE id_reserva = ?";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(1, $estado);
            $consulta->bindParam(2, $id_reserva, PDO::PARAM_INT);
            $consulta->execute();
            $consulta->closeCursor();
        }catch (PDOException $e) {
            exit("<h1><br>Fichero: " . $e->getFile() . "<br>Línea: " . $e->getLine() . "<br>Error: " . $e->getMessage() . "</h1>");
        }
    }
    
}

?>