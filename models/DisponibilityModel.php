<?php
include '../DataBase/DbConnect.php';
class DisponibilityModel extends DbConnect 
{
    public function __construct(){
        $this->conn = new DbConnect();
    }
    public function Disponibilidad_models($startdate, $enddate, $roomType) {
        //creacion de la consulta
        $query = ("SELECT rt.id as 'room_type_id', startdate, enddate, rt.nof as 'num_of_rooms', COUNT(r.id) as 'num_of_reservations', rt.nof - COUNT(r.id) as 'available_rooms' 
        FROM rooms_type rt 
        LEFT JOIN Reservation r ON rt.id = r.room_type_id 
        WHERE r.startdate <= :startdate AND r.enddate >= :enddate AND
        rt.id = :roomType
        GROUP BY rt.id, r.startdate, r.enddate");
        //conexion a la base de datos y preparacion del stmt
        $stmt = $this->conn->connect()->prepare($query);
        //pasar los valores a la base de datos
        $stmt->bindParam(':startdate', $startdate);
        $stmt->bindParam(':enddate', $enddate);
        $stmt->bindParam(':roomType', $roomType);
        //ejecucion de la query o consulta 
        $stmt->execute();
        //retorna el resultado de la consulta por medio de un array objeto
        $results = $stmt->fetchAll();
        return $results;
    }
}



