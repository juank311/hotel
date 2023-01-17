<?php
include '../DataBase/DbConnect.php';
class DisponibilityModel extends DbConnect 
{
    public function __construct(){
        $this->conn = new DbConnect();
    }
    public function Disponibilidad_models($startdate, $enddate, $roomType) {
        $query = ("SELECT rt.id as 'room_type_id', startdate, enddate, rt.nof as 'num_of_rooms', COUNT(r.id) as 'num_of_reservations', rt.nof - COUNT(r.id) as 'available_rooms' 
        FROM rooms_type rt 
        LEFT JOIN Reservation r ON rt.id = r.room_type_id 
        WHERE r.startdate <= :startdate AND r.enddate >= :enddate AND
        rt.id = :roomType
        GROUP BY rt.id, r.startdate, r.enddate");

        $stmt = $this->conn->connect()->prepare($query);

        $stmt->bindParam(':startdate', $startdate);
        $stmt->bindParam(':enddate', $enddate);
        $stmt->bindParam(':roomType', $roomType);
        
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}



