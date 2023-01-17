<?php
class DisponibilityModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=hotel', 'root', '');
    }

    public function checkAvailability($date, $roomType) {
        $query = $this->db->prepare("SELECT rt.id as 'room_type_id', startdate, enddate, rt.nof as 'num_of_rooms', COUNT(r.id) as 'num_of_reservations', rt.nof - COUNT(r.id) as 'available_rooms' 
        FROM rooms_type rt LEFT JOIN Reservation r ON rt.id = r.room_type_id AND  :startdate BETWEEN r.startdate AND r.enddate
        WHERE rt.id = :roomType
                                    GROUP BY rt.id, rt.name, rt.nof");
        $query->execute(['startdate' => $date, 'roomType' => $roomType]);
        $results = $query->fetchAll();
        return $results;
    }
}
